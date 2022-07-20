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
    public function saveBooking(Request $request){
        $booking = new Booking();
        $booking->booking_id = $request->booking_id;
        $booking->t_start = $request->t_start;
        $booking->t_end = $request->t_end;
        $booking->user_id = $request->user_id;
        $booking->box_id = $request->box_id;
        $booking->save();
        return response()->json([
            'message' => 'Booking created with success',
            'code' => 200
        ]);
    }
}
