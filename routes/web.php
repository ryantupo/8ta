<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/blog', function () {

    return view('blog', [
        'posts' => Post::allPosts(),
    ]);

});

Route::get('/blog/{post}', function ($slug) {

    return view('blogpost', [
        'post' => Post::find($slug),
    ]);

})->where('post', '[A-z_\-]+');
