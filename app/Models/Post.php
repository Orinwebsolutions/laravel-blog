<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;



    public function category(){
         return $this->belongsTo(Category::class);
    }
    /**
     * If we define like below
     * which you no need add /posts:slug on routing it automatically find based on slug not per id
     * So this is very helpfull when we have a lot of routes search based some unique columns data.
     */
    public function getRouteKeyName()
    {
        //Define db column name
        return 'slug';
    }

    /**
     * This is initial post object build based on file uploaded on resource/posts folder
     */
    // public $title;
    // public $date;
    // public $body;
    // public $slug;

    // public function __construct($title, $date, $body)
    // {
    //     $this->title = $title;
    //     $this->date = $date;
    //     $this->body = $body;
    //     $this->slug = strtolower(str_replace(' ','-',$title));
        
    // }
    
    // public static function allfiles()
    // {
    //     $files =  File::files(resource_path("posts"));
    //     $posts = collect($files)
    //     ->map(function ($file) {
    //         return $document = YamlFrontMatter::parseFile($file->getPathname());
    //     })
    //     ->map(function($document){
    //         return $post = new Post($document->title, $document->date, $document->body());
    //     });
        
    //     /**
    //      * Different menthod as above
    //      * */ 
    //     // $posts =  array_map(function($file){
    //     //     $document = YamlFrontMatter::parseFile($file->getPathname());
    //     //     return $post = new Post($document->title,$document->date,$document->body());
    //     // },$files);
            
    //     // ddd($posts);
    //     return $posts;
    // }

    // public static function find($slug)
    // {
    //     /**
    //      * This is initial develop method and we will replace with allfiles static method
    //      */
    //     // if(!file_exists($path = resource_path("posts/{$slug}.html"))){
    //     //     abort(404);
    //     // }
        
    //     // $post = cache()->remember("posts.{$slug}", now()->addMinutes(10), function () use($path) {
    //     //     return file_get_contents($path);
    //     // });
    //     // return $post;

    //     $posts = static::allfiles();
    //     return $posts->firstWhere('slug', $slug);
        
    // }

}
