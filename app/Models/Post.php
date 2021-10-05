<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function getTitleAttribute($value){
        return ucfirst($value) . '.';
    }

    public function getSnippetAttribute(){
        return explode("<br><br>", $this->body)[0];
    }

    public function getBodyAttribute($value) {
        return str_replace("\n\n",'<br><br>', $value);
    }
}
