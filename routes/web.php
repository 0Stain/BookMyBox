<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\BookingController;
use App\Models\Box;
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


//Route::prefix('api')->group(function () {
//    //get Boxes
//    Route::get('getBoxes', [BoxController::class, 'getBoxes']);
//});

//Route::prefix('api')->group(function () {
//    //get Boxes
//    Route::get('getBookings', [BookingController::class, 'getBookings']);
//});
