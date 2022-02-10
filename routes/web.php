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
        'posts' => Post::all(),
    ]);

});

Route::get('/blog/{post:slug}', function (Post $post) {

    return view('blogpost', [
        'post' => $post,
    ]);

});

Route::get('/chart', function () {
    return view('charts/testChart',[

    ]);
});


