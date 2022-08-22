<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use http\Env\Response;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    //get bookings
    public function getBookings(){
        return Booking::all();
    }

    //add booking
    public function saveBooking(Request $request){
        $booking = new Booking();
        $booking->id = $request->id;
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

//Delete Booking
    public function deleteBooking($id) {
        $booking = Booking::find($id);
        if($booking) {
            $booking->delete();
            return response()->json([
               'message' => 'Booking deleted successfully',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => "Booking with id:$id does not exist",
                'code' => 300
            ]);
        }
    }

///Edit|Update booking

    public function geditBooking($id){
        $booking = Booking::find($id);
        return response()->json($booking);
    }


    public function updateBooking($id, Request $request) {
        $booking = Booking::where('id', $id)-> first();
        $booking->t_start = $request->t_start;
        $booking->t_end = $request->t_end;
        $booking->user_id = $request->user_id;
        $booking->box_id = $request->box_id;
        $booking->save();
        return response()->json([
            'message' => 'Booking updated successfully',
            'code' => 200
        ]);
    }


    //search booking
    public function searchBooking($id){
        return Booking::where('id', 'like', '%'.$id.'%')->get();
    }

}
