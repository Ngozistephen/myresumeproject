<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PorfolioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
Route:: get('/', [IndexController::class, 'index'])->name('home');

Route::prefix('uche/stephen/')->group(function(){
    Auth::routes();
    Route::post('/login', [LoginController::class, 'login'])->name('porfolio.login');

    Route::post('/register', [RegisterController::class, 'register'])->name('porfolio.register');
    });



Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){

    Route::get('/', function(){
        // return 'implement dasboard view';

        return redirect(Route('admin.porfolios.index'));
        })->name('admin.dashbord');

    // protecting the admin side with middleware
    Route::get('/porfolios',[PorfolioController::class, 'index'])->name('admin.porfolios.index');
    Route::get('/porfolios/create',[PorfolioController::class, 'create'])->name('admin.porfolios.create');
    Route::get('/porfolios/edit',[PorfolioController::class, 'edit'])->name('admin.porfolios.edit');

    // CRUD 
    Route::post('/porfolios',[PorfolioController::class, 'store'])->name('admin.porfolios.store');


    Route::get('/skills',[SkillController::class, 'index'])->name('admin.skills.index');
    Route::get('/skills/create',[SkillController::class, 'create'])->name('admin.skills.create');

    // crud
    Route::post('/skills',[SkillController::class, 'store'])->name('admin.skills.store');
    Route::get('/skills/edit',[SkillController::class, 'edit'])->name('admin.skills.edit');
    
});


