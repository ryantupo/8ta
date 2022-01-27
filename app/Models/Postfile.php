<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post extends Model
{
    use HasFactory;

    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getExcerpt()
    {
        return $this->excerpt;
    }

    public function setExcerpt($excerpt)
    {
        $this->excerpt = $excerpt;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public static function allPosts()
    {
        return cache()->rememberForever('posts.allPosts', function () {

            return collect(File::files(resource_path("posts/")))

                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($document) => new Post(

                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug

                ))->sortByDesc('date');

        });

    }

    public static function find($slug)
    {

        $post = static::allPosts()->firstWhere('slug', $slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;

    }

}
