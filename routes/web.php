<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepotController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderTemController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\auth\AuthenticationController;

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

Route::get('/', [AuthenticationController::class ,'showLogin'])->name('/');

Route::post('/', [AuthenticationController::class ,'loginOrSignUp'])->name('loginOrSignUp');

Route::get('/logout', [AuthenticationController::class ,'logOut'])->name('logOut');


Route::resource('dashbord' , DashbordController::class )->middleware('auth');
Route::resource('order' , OrderController::class )->middleware('auth');
Route::resource('OrderTem' , OrderTemController::class )->middleware('auth');
Route::resource('vente' , VenteController::class )->middleware('auth');
Route::resource('product' , ProductController::class )->middleware('auth');
Route::resource('client' , ClientController::class )->middleware('auth');
Route::resource('fournisseur' , FournisseurController::class )->middleware('auth');
Route::resource('employee' , EmployeeController::class )->middleware('auth');
Route::resource('depot' , DepotController::class )->middleware('auth');



