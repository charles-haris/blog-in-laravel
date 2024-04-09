<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class,'index'])->name("login");
Route::post('/login', [UserController::class,'Handlelogin'])->name("login");
Route::get('/register', [UserController::class,'create'])->name("registration");
Route::post('/register', [UserController::class,'store'])->name("registration");

Route::middleware("auth")->group(function(){
    Route::get("/profile",[UserController::class, 'show'])->name("my_profile");
    Route::patch("/profile",[UserController::class, 'update'])->name("update_my_profile");
    Route::get("/faq",[PostController::class, 'faq'])->name("faq");
    Route::get("/self-posts",[PostController::class, 'my_post'])->name("my_posts");
    Route::resource('/post', PostController::class);
    Route::get('/logout', [UserController::class,'logout'])->name("logout");
}
);








