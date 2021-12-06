<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function getAuthHasLikedAttribute(){
        if(auth()->check()) {
            return $this->likes()->where('user_id', auth()->user()->id)->exists();
        }
        return false;
    }
}
