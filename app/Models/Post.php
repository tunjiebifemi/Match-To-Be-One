<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;


class Post extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected static function boot(){
        parent::boot();

        static::created(function ($post) {
            $addCurntTime = time();
            $post->update(['slug' => $post->title."-".$addCurntTime]);
            
        });
    }

    
    public function setSlugAttribute($value){
        if (static::whereSlug($slug = str_slug($value))->exists()) {
            $slug = "{$slug}-{$this->id}";
        }
        $this->attributes['slug'] = $slug;
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }


}
