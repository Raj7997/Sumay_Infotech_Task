<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserMessageController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function ($user) {
    $user->get('user-message',[UserMessageController::class,'index'])->name('user-message');
    $user->post('store-user-message',[UserMessageController::class,'store'])->name('store-user-message');
});