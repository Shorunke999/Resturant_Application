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

Route::get('/',[HomeController::class , 'index'])->name('home');




//display users in db to admin page
Route::get('/users',[AdminController::class , 'user']);

//delete user
Route::get('/delete/{id}',[AdminController::class , 'delete']);

//log admin out
Route::get('/logout',[AdminController::class, 'logout']);

//foodmenu route
Route::get('/foodmenu',[AdminController::class , 'foodmenu'])->name('foodmenu');
Route::post("/uploadfood",[AdminController::class , 'upload']);

//delete foodmenu
Route::get('/delete_menu/{id}',[AdminController::class , 'delete_menu']);

//update menu
Route::get('/update_menu/{id}',[AdminController::class , 'update_view']);
Route::post('/update/{id}',[AdminController::class , 'update']);

//admin page display
Route::get('/admin_page',[HomeController::class ,'testadminPage']);

//reservation
Route::post('/reservation',[AdminController::class, 'reservation']);
Route::get('/viewreservation',[AdminController::class, 'viewreservation']);

//chef section
Route::get('/viewchef',[AdminController::class, 'viewchef'])->name('viewchef');
Route::post('/uploadchef',[AdminController::class,'uploadchef']);
Route::get('/delete_chef/{id}',[AdminController::class,'deletechef']);
Route::get('/update_chef/{id}',[AdminController::class,'updatechef']);
Route::post('/updatedchefdata/{id}',[AdminController::class,'updatechefdata']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[ HomeController::class , 'redirect'])->name('dashboard');
    //cart section
    Route::post('/addcart/{id}',[ HomeController::class , 'addcart']);
    Route::get('/showcart',[HomeController::class , 'showcart']);
});
