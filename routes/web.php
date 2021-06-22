<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    Post::allfiles();
    // $object = YamlFrontMatter::parseFile(resource_path("posts/my-first-post.html"));
    // ddd($object);
    // return view('welcome');
    return view('posts', [
        'posts' => Post::allfiles()
        // 'posts' => Post::all()
    ]);
});
// Route::get('/posts', function () {
//     return view('posts', [
//         'posts' => Post::allfiles()
//         // 'posts' => Post::all()
//     ]);
// });

Route::get('/posts/{slug}', function ($slug) {
    return view('post', [
        'post' => Post::find($slug)
    ]);
// })->whereAlpha('slug');
})->where('slug', '[A-z_\-]+');
