<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentalPSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::get();
        return view('dashboard.Rental.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::first();
        return view ('dashboard.Rental.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $request->validate([
            // 'name' => 'required|string',
            'user_id' => 'required',
            'booking_date' => 'required|date',
            'service' => 'required|in:PS4,PS5'
        ]);


        // price list

        $priceList = ['PS4' => 3000, 'PS5' => 5000];
        $price = $priceList[$request->service];

        // Cek apakah hari Sabtu atau Minggu, lalu tambahkan biaya weekend
        $date = Carbon::parse($request->booking_date);
        if ($date->isWeekend()) {
            $price += 50000;
        }
    
        // Simpan booking ke database dengan field `price`
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'booking_date' => $request->booking_date,
            'service' => $request->service,
            'price' => $price, // Ubah `total_price` jadi `price`
            'status' => 'pending',
        ]);
    
        return redirect()->route('payment', $booking->id);
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
