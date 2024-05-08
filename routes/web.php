<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/',[HomeController::class , 'index']);

//display users in db to admin page
Route::get('/users',[AdminController::class , 'user']);

//delete user
Route::get('/delete/{id}',[AdminController::class , 'delete']);

//foodmenu route
Route::get('/foodmenu',[AdminController::class , 'foodmenu']);
Route::post("/uploadfood",[AdminController::class , 'upload']);

//admin page display
Route::get('/admin_page',[HomeController::class ,'testadminPage']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[ HomeController::class , 'redirect'])->name('dashboard');
});
