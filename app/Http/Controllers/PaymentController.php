<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('dashboard.Rental.payment', compact('bookings'));
    }


    public function createTransaction(Request $request)
    {
        try {
            $booking = Booking::findOrFail($request->booking_id);

            Config::$serverKey = env('MIDTRANS_SERVER_KEY');
            Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => 'ORDER-' . $booking->id . '-' . uniqid(),
                    'gross_amount' => $booking->price, // Pastikan harga sesuai
                ],
                'customer_details' => [
                    'first_name' => auth()->user()->name,
                    'email' => auth()->user()->email,
                ]
            ];

            $snapToken = Snap::getSnapToken($params);
            return response()->json(['snapToken' => $snapToken]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function destroy(string $id)
    {
       
    }

}
