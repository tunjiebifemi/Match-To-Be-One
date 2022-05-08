<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Friend;

class Message extends Model
{
    
    use HasFactory;

    protected $fillable = ['msg_from', 'msg_to', 'message', 'is_read', 'image', 'from_slug', 'to_slug'];

    
}

