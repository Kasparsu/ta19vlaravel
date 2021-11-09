<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'title'];
//    public function getTitleAttribute($value){
//        return ucfirst($value) . '.';
//    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->latest();
    }

    public function images(){
        return $this->hasMany(Image::class);
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

    public function getSnippetAttribute(){
        return explode("\n\n", $this->body)[0];
    }

    public function getDisplayBodyAttribute() {
        return nl2br($this->body);
    }

    protected static function booted()
    {
        static::deleted(function ($post) {
            File::delete(public_path($post->image_path));
        });
    }
}
