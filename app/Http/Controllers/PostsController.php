<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Message;
use App\Models\Comment;
use App\Models\Post;
use Auth;
use DB;
use File;
use Purifier;
use Alert;
use Mail;

class PostsController extends Controller
{
    

    public function getCreatePostPage()
    {
        $title = 'Create Post';
        return view('adminPages.createBlogPost')->with('title', $title);

    }

    
    public function blogAdminView()
    {
        $title = 'View Posts';
        $posts = Post::orderBy('created_at','desc')->paginate(12);
        return view('adminPages.blogAdminView')->with(compact('title', 'posts'));

    }


    public function viewBlogPage(){
        $title = 'Blog';       
        $posts = Post::orderBy('created_at','desc')->paginate(12);
        
        return view('pages.blog')->with(compact('posts', 'title'));

    }

    
    public function viewBlogDetailsPage($slug){
        $title = 'Blog';
        $post = Post::where('slug', $slug)->firstOrFail();
        $randomPosts = Post::where('slug', '!=', $slug)
        ->inRandomOrder()->limit(2)->get();
        $publiclyVis = 'Public';
        $privatelyVis = 'Private';
                
        return view('pages.blogDetails')->with(compact('title', 'post', 'randomPosts','publiclyVis', 'privatelyVis'));

    }


    public function createPost(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:20048',
            'body' => 'required'
        ]);

        if($request->hasFile('image')){
            $profileImage = $request->file('image');
            $profileImageSaveAsName = time() . Auth::id() . "-blog." . $profileImage->getClientOriginalExtension();
    
            $upload_path = 'blog_images/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }

        $adminName = Auth::user()->name;
        $post = new Post;
        $post->title = $request->title;
        $post->body = Purifier::clean($request->body);
        $post->author = $adminName;
        $post->image = $profile_image_url;
        $post->save();

        $usersToSend = User::where('alias', 'A')->get();

        foreach($usersToSend as $usersTo){
            
            \Mail::send('blogPostMail', array(                        
                'subject' => 'New Blog Post',
                'usernameSend' => $usersTo->name,
                'blogPostLink' => $post->slug        
            ), function($message) use ($request, $usersTo){
            // $message->from(env('MAIL_FROM_NAME'));
            //   $adminEmails = ['waleborokini@gmail.com', 'wborokini@gmail.com', 'olawaleborokini@gmail.com', 'topeborokini99@gmail.com'];
                $message->to($usersTo->email)->subject('New Blog Post');
            });
        }

        $alerted = toast('Post Created', 'success');

        return redirect()->route('blogAdminView')->with(compact('alerted'));

    }

    public function edit(Post $post)
    {                
        $title = 'Edit Post';
        
        return view('adminPages.editPost')->with(compact('title', 'post'));

    }
    

    public function update(Request $request, Post $post)
    {
                
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        
        if($request->hasFile('image')){
            
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,png,jpeg|max:20048'
            ]);
            
            // Delete previous Image from blog_images folder
            $this->deleteOldImage($post);

            $profileImage = $request->file('image');
            $profileImageSaveAsName = time() . Auth::id() . "-blog." . $profileImage->getClientOriginalExtension();
    
            $upload_path = 'blog_images/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        
        }

        $post->title = $request->input('title');
        $post->body = Purifier::clean($request->input('body'));
        if($request->hasFile('image')){
            $post->image = $profile_image_url;
        }
        
        $post->save();

        $alerted = toast('Post Updated', 'success');

        return redirect()->route('blogAdminView')->with(compact('alerted'));

    }


    protected function deleteOldImage(Post $post)
    {
      if ($post->image){        
        File::delete($post->image);        
      }
    }


    public function destroy(Post $post)
    {
        // Delete Image from blog_images folder
        $this->deleteOldImage($post);

        $post->delete();

        $alerted = toast('Post was deleted successfully', 'success');

        return redirect()->back()->with(compact('alerted'));
    }


}