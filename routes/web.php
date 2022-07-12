<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BoxController;

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


Route::get('/' , [UserController::class ,'login'])->name('login');
Route::post('/authenticate' , [UserController::class , 'authenticate']);

Route::get('/home' , [UserController::class , 'GethomePage'])->name('home');
Route::get('/admin' , [UserController::class , 'AdminPage'])->name('AdminPage');
Route::get('/logout' , [UserController::class ,'logout'])->name('logout');
Route::get('/register' , [UserController::class , 'register'])->name('reg');
Route::get('/item' , [ItemController::class , 'index'])->name('item');
Route::get('/itemAddpage' , [ItemController::class , 'itemAddPage'])->name('item.add');
Route::get('/Reg' , [UserController::class , 'RegisterPage']) -> name('RReg');
Route::get('/buyitem/{box_id}' , [BoxController::class , 'index'])->name('buyitem');
Route::get('/createbox' , [BoxController::class , 'create_box'])->name('create.box');

//Cart Routes 

Route::get('/AddtoCart/{item_id}' , [BoxController::class , 'Add_to_cart'])-> name('cart.Add');
Route::view('/cart' , 'cart')->name('cart');
Route::get('/DestroyCart' ,[BoxController::class , 'Empty_cart'])->name('Empty.cart');
Route::get('/Removeitem/{rowId}' ,[BoxController::class , 'Remove_item'])->name('remove.item');
//Select a Winner 
Route::get('/Getawinner' , [BoxController::class , 'winner']) -> name('winner.select');


//DataBase Load Rows for Easy Migrations 
Route::get('/loadUsers' , [UserController::class ,'load_User']);
Route::get('/loadItems' , [ItemController::class , 'create']);
Route::get('/loadBoxes' , [BoxController::class , 'create']);
