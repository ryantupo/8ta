<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\support\Facades\File;

class Post extends Model
{
    use HasFactory;




    public static function allPosts(){

        $files = File::files(resource_path("posts/"));

        return array_map(fn($file) => $file->getContents(), $files);
    }



    public static function find($slug)
    {

        $path = resource_path()."/posts/" . $slug . ".html";

        if (!file_exists($path)) {
            throw ModelNotFoundException();
        }

        return cache()->remember("blog.{$slug}", 1200 , fn() => file_get_contents($path));


    }

}
