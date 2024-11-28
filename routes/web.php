<?php

use App\Http\Controllers\testController;
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

Route::get('teste', [testController::class, 'teste']);

Route::get('private', [testController::class, 'private']);



Route::get('/chat', [testController::class, 'viewChat']);

Route::view('check', 'checkingWebsockets');
Route::view('checkPrivate', 'viewPrivateWebSockets'); 

//Route::view('chat', 'viewMessage'); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
