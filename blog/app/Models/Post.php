<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $slug, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all(){
//        Unable to clear cache with php artisan tinker within the docker container so not caching this
//        return cache()->rememberForever('posts.all', function () {
//            return collect(File::files(resource_path("posts")))
//                ->map(fn($file) => YamlFrontMatter::parseFile($file))
//                ->map(fn($document) => new Post(
//                    $document->title,
//                    $document->excerpt,
//                    $document->date,
//                    $document->slug,
//                    $document->body()
//                ))
//                ->sortByDesc('date' );
//        });

        return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->slug,
                $document->body()
            ))
            ->sortByDesc('date' );


    }

    public static function find($slug) {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug) {
        $post = static::find($slug);

        if (! $post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}
