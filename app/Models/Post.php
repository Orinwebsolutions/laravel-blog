<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post extends Model
{
    use HasFactory;

    public $title;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $date, $body)
    {
        $this->title = $title;
        $this->date = $date;
        $this->body = $body;
        $this->slug = strtolower(str_replace(' ','-',$title));
        
    }
    
    public static function allfiles()
    {
        $files =  File::files(resource_path("posts"));
        $posts = collect($files)
        ->map(function ($file) {
            return $document = YamlFrontMatter::parseFile($file->getPathname());
        })
        ->map(function($document){
            return $post = new Post($document->title, $document->date, $document->body());
        });
        
        /**
         * Different menthod as above
         * */ 
        // $posts =  array_map(function($file){
        //     $document = YamlFrontMatter::parseFile($file->getPathname());
        //     return $post = new Post($document->title,$document->date,$document->body());
        // },$files);
            
        // ddd($posts);
        return $posts;
    }

    public static function find($slug)
    {
        /**
         * This is initial develop method and we will replace with allfiles static method
         */
        // if(!file_exists($path = resource_path("posts/{$slug}.html"))){
        //     abort(404);
        // }
        
        // $post = cache()->remember("posts.{$slug}", now()->addMinutes(10), function () use($path) {
        //     return file_get_contents($path);
        // });
        // return $post;

        $posts = static::allfiles();
        return $posts->firstWhere('slug', $slug);
        
    }

}
