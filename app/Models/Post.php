<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public static function find($slug)
    {

        $path = resource_path()."/posts/" . $slug . ".html";

        if (!file_exists($path)) {
            return redirect('/');
        }

        return cache()->remember("blog.{$slug}", 1200 , fn() => file_get_contents($path));


    }

}
