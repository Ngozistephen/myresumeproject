<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PorfolioController;
use App\Http\Controllers\TrainingController;
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
    
    // CRUD  Porfolio section
    Route::get('/porfolios/create',[PorfolioController::class, 'create'])->name('admin.porfolios.create');
    Route::post('/porfolios',[PorfolioController::class, 'store'])->name('admin.porfolios.store');
    
    
    Route::get('/porfolios/{slug}/edit',[PorfolioController::class, 'edit'])->name('admin.porfolios.edit');
    Route::get('/porfolios/{slug}',[PorfolioController::class, 'preview'])->name('admin.porfolios.preview');
    Route::post('/porfolios/{slug}/',[PorfolioController::class, 'update'])->name('admin.porfolios.update');
    Route::delete('/porfolios/{slug}/',[PorfolioController::class, 'delete'])->name('admin.porfolios.delete');

         // CRUD  Training section
    Route::get('/trainings',[TrainingController::class, 'index'])->name('admin.trainings.index');
    Route::get('/trainings/create',[TrainingController::class, 'create'])->name('admin.trainings.create');
    Route::post('/trainings',[TrainingController::class, 'store'])->name('admin.trainings.store');


    Route::get('/trainings/{slug}/edit', [TrainingController::class, 'edit'])->name('admin.trainings.edit');
    Route::get('/trainings/{slug}', [TrainingController::class, 'preview'])->name('admin.trainings.preview');
    Route::post('/trainings/{slug}', [TrainingController::class, 'update'])->name('admin.trainings.update');
    Route::delete('/trainings/{slug}', [TrainingController::class, 'delete'])->name('admin.trainings.delete');
    
    // Skill Setion
    Route::get('/skills',[SkillController::class, 'index'])->name('admin.skills.index');
    Route::get('/skills/create',[SkillController::class, 'create'])->name('admin.skills.create');
    Route::post('/skills',[SkillController::class, 'store'])->name('admin.skills.store');

    
    Route::get('/skills/{slug}/edit',[SkillController::class, 'edit'])->name('admin.skills.edit');
    Route::delete('/skills/{slug}', [SkillController::class, 'delete'])->name('admin.skills.delete');


    // Contact Section
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::post('/{user}/contacts', [ContactController::class, 'store'])->name('admin.contacts.store');

    Route::get('/{user}/contacts/{slug}/edit', [ContactController::class, 'edit'])->name('admin.contacts.edit');
    // edit is not prefilling 

    Route::get('/{user}/contacts/{slug}', [ContactController::class, 'preview'])->name('admin.contacts.preview');
   
    
});


