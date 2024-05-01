<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These`
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',function(){
    $animals = ['lion', 'tiger', 'dog'];
    return view('homepage')->with([
        "name" => "Jeevan",
        'animals' => $animals
    ]);
})->name('login');
//User Related Route
Route::post('/register', [UserController::class, "register"])->middleware('guest');
Route::post('/login',[UserController::class, "login"])->middleware('guest');
Route::post('/logout', [UserController::class, "logout"])->middleware('auth');


//Blog Related Route

Route::get('/create-post',[PostController::class,'create'])->middleware('mustbeloggedin');
Route::post('/create-post',[PostController::class,'store'])->middleware('auth');
Route::get('/post/{post}',[PostController::class,'show'])->middleware('auth');

Route::get("/profile/{pizza:username}", [UserController::class, 'profile']);
