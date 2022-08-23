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
//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {


    //Bookings
    Route::post('saveBooking', [BookingController::class, 'saveBooking']); //Save bookings
    Route::delete('deleteBooking/{id}', [BookingController::class, 'deleteBooking']); //Delete bookings
    Route::get('geditBooking/{id}', [BookingController::class, 'geditBooking']); //Edit booking
    Route::post('updateBooking/{id}', [BookingController::class, 'updateBooking']); //Update bookings
    Route::post('logout', [UserController::class, 'logout']); //Logout
});

//Public Routes

//Boxes
Route::get('getBoxes', [BoxController::class, 'getBoxes']); //View boxes
//Users
Route::get('getUsers', [UserController::class, 'getUsers']);
Route::post('register', [UserController::class, 'register']);//Register
Route::post('login', [UserController::class, 'login']); //Logout
Route::get('findEmail/{email}', [UserController::class, 'findEmail']); //Check if email exists
//Bookings
Route::get('getBookings', [BookingController::class, 'getBookings']); //View bookings
Route::get('searchBooking/{id}', [BookingController::class, 'searchBooking']); //Search bookings










// Route::post('saveBooking', [BookingController::class, 'saveBooking']); //Save bookings
// Route::delete('deleteBooking/{id}', [BookingController::class, 'deleteBooking']); //Delete bookings
// Route::get('geditBooking/{id}', [BookingController::class, 'geditBooking']); //Edit booking
// Route::post('updateBooking/{id}', [BookingController::class, 'updateBooking']); //Update bookings
// Route::get('searchBooking/{id}', [BookingController::class, 'searchBooking']); //Search booking