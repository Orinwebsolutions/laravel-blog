<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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



// Route::get('category/{id}', function($id){
//     $cate = Category::find($id);
//     return view('posts', [ 'posts' => $cate->post ]);
// });

Route::get('/', function () {
    // ddd(Post::all());
    return view('posts', [
        // 'posts' => Post::allfiles()
        // 'posts' => Post::all()
        'posts' => Post::oldest('created_at')->with('category','user')->get()
    ]);
})->name('home');

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        // 'post' => Post::find($post)
        // 'post' => Post::findOrFail($post)
        'post' => $post
    ]);
});
Route::get('category/{category:slug}', function(Category $category){
    // ddd($category->post);
    // $cate = Category::find($id);
    return view('posts', [ 'posts' => $category->post ]);
});

Route::get('user/{user}', function(User $user){
    // $cate = Category::find($id);
    return view('posts', [ 'posts' => $user->posts ]);
});