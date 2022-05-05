<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{

    public function index()
    {
        $reservation = Reservation::latest()->get();
        return view('admin.reservations.index', compact('reservation'));
    }

    
    public function Reservation()
    {
        
        return view('frontend.reserv.reservation');
    }

    public function ReservationStore(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'tel_number' => 'required',
            'res_date' => 'required',
            'table_id' => 'required',
            'guest_number' => 'required',
        
        ], [
            'name' => 'Input Name for the Table',

        ]);
    }


}
