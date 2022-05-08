<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;
use App\Models\Friend;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){
        parent::boot();

        static::created(function ($user) {
            $addCurntTime = time();
            $randSlug = Str::random(40);
            $user->update(['slug' => $randSlug."-".$addCurntTime]);
            
        });
    }
    
    public function setSlugAttribute($value){
        if (static::whereSlug($slug = str_slug($value))->exists()) {
            $slug = "{$slug}-{$this->id}";
        }
        $this->attributes['slug'] = $slug;
    }


    //Get User details for friends Table

    //Get UserId to sned message to
    public static function getUserIdMs($slug){
        $getUserIdMs = User::select('id')->where('slug', $slug)->first();
        return $getUserIdMs->id;
    }

    //Get user slug to send message to
    public static function getUserSlgMs($slug){
        $getUserSlgMs = User::select('slug')->where('slug', $slug)->first();
        return $getUserSlgMs->slug;
    }

    public static function getUserId($slug){
        $getUserId = User::select('id')->where('slug', $slug)->first();
        return $getUserId->id;
    }

    public static function getUserSlug($slug){
        $getUserSlug = User::select('slug')->where('slug', $slug)->first();
        return $getUserSlug->slug;
    }

    public static function sender_id($receiver_id){
        $sender_id = Friend::select('user_id')->where('friend_id', $receiver_id)->first();
        return $sender->id;
    }

    public static function sender_slug($receiver_slug){
        $sender_slug = Friend::select('user_slug')->where('friend_id', $receiver_id)->first();
        return $sender->slug;
    }

    public function posts() {
  
        return $this->hasMany(Post::class);
     
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'user_id');
    }
    

    public function isAdmin() {
        
        return $this->admin;
    }

    public function isSuperAdmin() {
        
        return $this->super_admin;
    }
    
    
}