<?php

namespace App\Models;

// need this to prevent 'clas File not found"
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
// when Yaml can't be found
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $title;

    public $exerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $exerpt, $date, $body, $slug) {
        $this -> title = $title;
        $this -> exerpt = $exerpt;
        $this -> date = $date;
        $this -> body = $body;
        $this -> slug = $slug;
    }

    public static function all() {

        // $files = File::files(resource_path("posts"));

    // collect is functionally the same as map_array

        return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))

            ->map(fn($document) => new Post(
                    $document -> title,
                    $document -> exerpt,
                    $document -> date,
                    $document -> body(),
                    $document -> slug
                )
            );
    }

    public static function find($slug) {

        // $posts = static::all();

        return static::all() -> firstWhere('slug', $slug);

    }
}


