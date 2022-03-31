<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Routing\RouteGroup;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [IndexController::class, 'index'])->name('home');

Route::prefix('uche/stephen/')->group(function(){
    Auth::routes();
    Route::post('/login', [LoginController::class, 'login'])->name('post.login');
    Route::post('/register', [RegisterController::class, 'register'])->name('post.register');
});



Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){

    // protectting the admin side with middleware
    Route::get('/posts',[PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/posts/create',[PostController::class, 'create'])->name('admin.posts.create');
    Route::get('/posts/edit',[PostController::class, 'edit'])->name('admin.posts.edit');

});

