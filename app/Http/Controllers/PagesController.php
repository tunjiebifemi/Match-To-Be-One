<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use App\Models\Message;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use DB;
use File;
use Purifier;
Use Alert;


class PagesController extends Controller
{

    public function viewIndexPage(){

        $title = 'Match To Be One!';
               
        return view('pages.index')->with(compact('title'));

    }


    public function viewAboutPage(){
        
        $title = 'About';
        
        return view('pages.about')->with('title', $title);

    }

    
    public function viewCodeOfConductPage(){
        
        $title = 'Code Of Conduct';
        
        return view('pages.codeOfConduct')->with('title', $title);

    }


    public function viewContactPage(){
        
        $title = 'Contact';
        
        return view('pages.contact')->with('title', $title);

    }


    public function viewStayingSafePage(){
        
        $title = 'Staying Safe';
        
        return view('pages.stayingSafe')->with('title', $title);

    }


    public function viewLoginPage(){
        $title = 'Login';
        
        return view('auth.login')->with('title', $title);

    }


    public function viewReplacePicturePage(User $user){
        
        $title = 'Replace Picture';
        $user = Auth::user();                
        
        return view('pages.replacePicture')->with(compact('title', 'user'));
        
    }


    public function deleteUserPicture($id)
    {
                
        $this->deleteGalleryImage($id);
        Image::where('id', $id)->delete();

        $alerted = toast('Image Deleted', 'error');

        return redirect()->back()->with(compact('alerted'));
    }


    public function replaceUserPicture(Request $request, User $user)
    {
        $user = Auth::user();

        if($request->hasfile('image_url'))
        {
                $this->validate($request, [
            
                    'image_url' => ['mimes:jpeg,png,PNG,jpg,gif,svg|max:20048']
                ]);
                
                $image = new Image;

                $profileImage = $request->file('image_url');            
                $profileImageSaveAsName = time() . Auth::id() . "-gallery_images." . $profileImage->getClientOriginalExtension();
                
                $upload_path = 'gallery_images/';            
                $profile_image_url = $upload_path . $profileImageSaveAsName;
                
                $success = $profileImage->move($upload_path, $profileImageSaveAsName);

               $image->image_url = $profile_image_url;
               $image->user_id = $user->id;
               
               $user->images()->save($image);
           
       }
        
        $alerted = toast('Image Added', 'success');
                
    }


    protected function deleteGalleryImage($id)
    {
        $getImageUrl = Image::where('id', $id)->pluck('image_url')->first();  
        File::delete($getImageUrl);
        
      
     }

    public function viewProfile(User $user)
    {
        $title = 'Profile';

        $user = Auth::user();        
        
        return view('pages.viewProfile')->with(compact('title', 'user'));

    }


    public function editProfile()
    {
        $title = 'Edit Profile';
        $user = Auth::user();
        
        return view('pages.editProfile')->with(compact('title', 'user'));

    }

    public function update(Request $request, User $user)
    {
                
        $user = Auth::user();      

        if($request->hasfile('image_url'))
         {  
            $this->validate($request, [
            
                'image_url.*' => ['mimes:jpeg,png,jpg,gif,svg|max:20048']
            ]);
                                     
            $imageNumbers = count($request->file('image_url'));
            if( $imageNumbers > 4){
                return redirect()->back()->with('error', 'You can only upload a maximum of 4 images');
            }


            foreach ($request->file('image_url') as $imagefile) {
                $image = new Image;
               
                $filenameWithExtPr = $imagefile->getClientOriginalName();
                // Get just filename
                $filenamePr = pathinfo($filenameWithExtPr, PATHINFO_FILENAME);
                // Get just ext
                $extensionPr = $imagefile->getClientOriginalExtension();
                // Filename to store
                $fileNameToStorePr= $filenamePr.'_'.time().'.'.$extensionPr;
                // Upload path
                $upload_path = 'gallery_images/';
                // Upload Image
                $path_url = $upload_path . $fileNameToStorePr;

                $success = $imagefile->move($upload_path, $fileNameToStorePr);

                $image->image_url = $path_url;
                $image->user_id = $user->id;
                // $image->save();
                $user->images()->save($image);
            }

        }

        
        $user->name = $request->input('name');
        $user->sex = $request->input('sex');
        $user->alias = $request->input('alias');
        $user->visibility = $request->input('visibility');
        $user->age = $request->input('age');

        if(!empty($request->country && $request->state)){
            $user->country = $request->input('country');
            $user->state = $request->input('state');
        }
        $user->bio = Purifier::clean($request->input('bio'));
        $user->work = Purifier::clean($request->input('work'));
        $user->education = Purifier::clean($request->input('education'));
                
        $user->save();

        $alerted = toast('Your information has been updated', 'success');

        return redirect('/editProfile')->with(compact('alerted'));

    }


    public function changeProfile(Request $request, User $user)
    {        
       
        $user = Auth::user();
                
        if($request->hasFile('avatar')){
            
            $this->validate($request, [
            
                'avatar' => ['mimes:jpeg,png,jpg,gif,svg|max:20048']
            ]);
            
            if($user->avatar != 'profile_images/noimage.png')
            {
                $this->deleteOldImage();
            }
            $profileImage = $request->file('avatar');            
            $profileImageSaveAsName = time() . Auth::id() . "-profile." . $profileImage->getClientOriginalExtension();
            
            $upload_path = 'profile_images/';            
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        }
        
        
        $user->avatar = $profile_image_url;
        $user->save();

        toast('Your Avatar has been changed', 'success');
            
    }

    
    protected function deleteOldImage()
    {
        
      if (Auth::user()->avatar){        
        File::delete(Auth::user()->avatar);
        
      }
     
    }


    public function adminDashboard()
    {
        $title = 'Admin Dashboard';
        
        return view('adminPages.adminDashboard')->with(compact('title'));

    }

    public function adminRoles()
    {
        $title = 'Admin Role';
        
        return view('adminPages.roles')->with(compact('title'));

    }


}
