<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('dashboard.Rental.payment', compact('bookings'));
    }
}
