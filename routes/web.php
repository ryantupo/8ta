<?php

use App\Models\Post;
use App\Models\Chart;
use Illuminate\Support\Facades\Auth;
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

Route::get('/chart/{chart:id}', function (Chart $chart) {
    if (Auth::check()) {
        $id = Auth::user()->id;
        return view('charts/testChart',[
            'chart' => chart::where('user_id', $id )->first()
        ]);
    }else{
        abort(404);
    }
});

//route for testing error pages
Route::get('/error', function () {
    abort(500);
});

