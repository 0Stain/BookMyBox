<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Boxes
Route::get('getBoxes', [BoxController::class, 'getBoxes']); //View boxes
//Users
Route::get('getUsers', [UserController::class, 'getUsers']);
//Bookings
Route::get('getBookings', [BookingController::class, 'getBookings']); //View bookings
Route::post('saveBooking', [BookingController::class, 'saveBooking']); //Save bookings
Route::delete('deleteBooking/{id}', [BookingController::class, 'deleteBooking']); //Delete bookings
Route::get('geditBooking/{id}', [BookingController::class, 'geditBooking']); //Edit booking
