<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function getImageId($userImage){
        $getImageId = Image::select('id')->where('image_url', $userImage)->first();
        return $getImageId->id;
    }

}
