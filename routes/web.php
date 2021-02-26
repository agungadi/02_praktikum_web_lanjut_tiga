<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ListProgramController;
use App\Http\Controllers\ContactUsController;

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/////Praktikum 3 no 1
Route::get('/home',[HomeController::class,'index']);


/////Praktikum 3 no 2


Route::prefix('product')->group(function () {

    Route::get('/', [ProductController::class, 'product'] );
});
Route::prefix('product')->group(function () {

    Route::get('/{id}', [ProductController::class, 'products'] );
});


/////Praktikum 3 no 3

Route::get('/news/{name?}', function ($name = null) {
    if($name){
        echo '<a href=https://www.educastudio.com/news/educa-studio-berbagi-untuk-warga-sekitar-terdampak-covid-19>News '.$name.'</a>';
    }else{
        echo '<a href=https://www.educastudio.com/news>Home</a>';

    }
   });

// /////Praktikum 3 no 4
Route::prefix('program')->group(function () {

    Route::get('/', [ListProgramController::class, 'list'] );
});

Route::prefix('program')->group(function () {

    Route::get('/{id}', [ListProgramController::class, 'list'] );
});

// /////Praktikum 3 no 5

Route::get('/aboutus', function(){
    return '<a href=https://www.educastudio.com/about-us>https://www.educastudio.com/about-us</a>';
});

// /////Praktikum 3 no 6

Route::resource('contactus', ContactUsController::class);
