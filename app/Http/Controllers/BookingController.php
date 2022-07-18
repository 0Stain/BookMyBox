<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Box;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function getBookings(){
        return Booking::all();
    }
}
