<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ViewController;
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

Route::get('/', [ViewController::class,'index'])->name('index');
Route::get('catalog', [ViewController::class,'catalog'])->name('catalog');
Route::get('info', [ViewController::class,'info']);
Route::get('item', [ViewController::class,'item'])->name('item');

Route::get('login', [ViewController::class,'login'])->name('login');
Route::get('create', [ViewController::class,'create'])->name('create');

//Controller's routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/create', [AuthController::class, 'registration']);


Route::middleware('user')->group(function () {

    Route::get('basket', [ViewController::class,'basket'])->name('basket');
    Route::get('orders', [ViewController::class,'orders']);

    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('buy/{id}', [BasketController::class, 'store']);
    Route::get('basket/{id}', [BasketController::class, 'destroy']);
    Route::get('basket/plus/{id}', [BasketController::class, 'plus']);
    Route::get('basket/minus/{id}', [BasketController::class, 'minus']);
    Route::post('buyAll', [HistoryController::class, 'store']);
    Route::get('history/{id}', [HistoryController::class, 'delete']);


Route::middleware('admin')->group(function () {

    Route::get('adminbuy', [ViewController::class,'adminbuy'])->name('adminbuy');
    Route::get('adminitem', [ViewController::class,'adminitem'])->name('adminitem');

    Route::post('printer', [PrinterController::class,'store']);
    Route::post('printer/update/{id}', [PrinterController::class,'update']);
    Route::get('printer/delete/{id}', [PrinterController::class,'destroy']);
    Route::post('category', [CategoryController::class, 'store']);
    Route::get('category/{id}', [CategoryController::class, 'delete']);
    Route::get('history/accept/{id}', [HistoryController::class, 'accept']);
    Route::get('history/cancel/{id}', [HistoryController::class, 'cancel']);
});

});
