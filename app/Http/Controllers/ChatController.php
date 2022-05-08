<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Friend;
use stdClass;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Auth;
use DB;
use Pusher\Pusher;
use App\Events\MessageSent;
use App\Events\MessageDelivered;
use App\Events\FetchUsers;
use Purifier;

class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Edit

    public function getNewChat()
    {
        $title = 'New Chat';
        // $my_id = Auth::user()->id;

        $users = DB::select("SELECT id, slug, name, email, avatar, alias from users WHERE id != " . Auth::id() . " AND id IN ( SELECT friend_id from friends WHERE user_id = " . Auth::id() . " AND accept = 1 ) OR id IN ( SELECT user_id from friends WHERE friend_id = " . Auth::id() . " AND accept =1 ) ORDER BY name ASC" );
        return view('pages.getNewChat')->with(compact('users', 'title'));
        

    }
    

    public function makeNewChat($slug)
    {
        $recvId = User::getUserIdMs($slug);
        $user_id = Auth::user()->id;
        $fromSlug = Auth::user()->slug;
        $toSlug = User::getUserSlgMs($slug);

        if(Message::where([['msg_from', '=', $user_id], ['msg_to', '=', $recvId]])->orWhere([['msg_to', '=', $user_id], ['msg_from', '=', $recvId]])->exists()){
            return redirect()->route('chat');
        }else{
            $datas = new Message();
            $datas->msg_from = $user_id;
            $datas->msg_to = $recvId;
            $datas->from_slug = $fromSlug;
            $datas->to_slug = $toSlug;
            $datas->message = Null;
            $datas->is_read = 1; //Message will be unread by default
            $datas->is_friend = 1;

            $datas->save();

        return redirect()->route('chat', ['xDFoPW'=> $toSlug]);
        }
        
    }


    public function getChatPage()
    {
        $title = 'Chat';
                
        $users = DB::table('users')
                ->join('messages', function ($join) {
                    $join->on('users.id', '=', 'messages.msg_to')->orOn('users.id', '=', 'messages.msg_from');
                })
                
                    ->select('messages.id', 'messages.msg_from','messages.is_read', 'messages.msg_to', 'messages.message',
                     'messages.created_at', 'users.id', 'users.slug', 'users.name', 'users.email', 'users.avatar')                    
                    ->where('messages.msg_from', Auth::id())
                    ->orWhere('messages.msg_to', Auth::id())
                    ->groupBy('messages.id', 'messages.msg_from', 'messages.msg_to', 'messages.is_read', 'messages.message',
                    'messages.created_at', 'users.id', 'users.slug', 'users.name', 'users.email', 'users.avatar')
                    ->orderBy('messages.created_at', 'desc')
                    ->get()
                    ->unique('id');
       

                return view('pages.chat')->with(compact('users', 'title'));
                
        
        
    }

      

    public function getMessage($user_id)
    {
        $my_id = Auth::id();
        // $to = $request->receiver_id;
        $recvId = User::getUserIdMs($user_id);

        $checkIfBan = User::where('id', $recvId)->first();
                

        $checkIfFriend = Friend::where([ ['user_id', '=', $my_id], ['friend_slug', '=', $user_id], ['accept', '=', 1] ])
        ->orWhere([['friend_id', '=', $my_id], ['user_slug', '=', $user_id], ['accept', '=', 1]])->exists();

        // Make read all unread message
        Message::where(['from_slug' => $user_id, 'msg_to' => $my_id])->update(['is_read' => 1]);

        // Getting all messages For selected user
        $messages = Message::where(function ($query) use ($recvId, $my_id) {
            $query->where('msg_from', $recvId)->where('msg_to', $my_id);
        })->oRwhere(function ($query) use ($recvId, $my_id) {
            $query->where('msg_from', $my_id)->where('msg_to', $recvId);
        })->get();

        
        

        return view('messages.index')->with(compact('messages', 'checkIfFriend', 'checkIfBan'));

    }

    public function mobileUserDetails($user_id)
    {
        $mobileUser = User::where('slug', $user_id)->first();


        $ovbject = new stdClass;
        $ovbject->FullName = $mobileUser->name;
        $ovbject->UserPicture = $mobileUser->avatar;
    
        return  json_encode($ovbject);
    }
    

    public function sendMessage(Request $request)
    {
        
        $from = Auth::id();
        $toSlug = $request->receiver_id;
        $message = Purifier::clean($request->message);

        $fromSlug = Auth::user()->slug;
        $to = User::where('slug', $toSlug)->pluck('id')->first();

        $datas = new Message();
        $datas->msg_from = $from;
        $datas->msg_to = $to;
        $datas->message = $message;
        $datas->is_read = 0; //Message will be unread by default
        $datas->from_slug =$fromSlug;
        $datas->to_slug =$toSlug;
        $datas->is_friend = 1;
        

        if($request->hasFile('image')){
            
            $this->validate($request, [
            
                'image' => ['mimes:jpeg,png,PNG,jpg,gif,svg|max:20048']
            ]);
            
            $profileImage = $request->file('image');
            $profileImageSaveAsName = time() . Auth::id() . "-chat." . $profileImage->getClientOriginalExtension();
    
            $upload_path = 'chat_images/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);

            $datas->image = $profile_image_url;
        }

              
        $datas->save();

        
        $datas = ['from' => $from, 'to' => $to, 'to_slug' => $toSlug, 'from_slug' => $fromSlug];
        event(new MessageSent($datas));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
