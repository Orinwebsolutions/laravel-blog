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
    return view('posts', [
        // 'posts' => Post::allfiles()
        'posts' => Post::all()
    ]);
});

// Route::get('/posts/{post}', function (Post $post) {
//     return view('post', [
//         // 'post' => Post::find($post)
//         // 'post' => Post::findOrFail($post)
//         'post' => $post
//     ]);
// });
// })->whereAlpha('id');
// })->whereNumber('id');
// })->where('id', '[A-z_\-]+');

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        // 'post' => Post::find($post)
        // 'post' => Post::findOrFail($post)
        'post' => $post
    ]);
});