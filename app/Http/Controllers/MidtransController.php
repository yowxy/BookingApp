<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function handleNotification(Request $request)
    {
         // Konfigurasi Midtrans
         Config::$serverKey = env('MIDTRANS_SERVER_KEY');
         Config::$isProduction = false; // Ubah ke true jika sudah live
         Config::$isSanitized = true;
         Config::$is3ds = true;

         // Tangkap notifikasi dari Midtrans
         $notification = new Notification();

         $orderId = $notification->order_id;
         $transactionStatus = $notification->transaction_status;
         $fraudStatus = $notification->fraud_status;

         // Cari booking berdasarkan ID
         $booking = Booking::find($orderId);

         if (!$booking) {
             return response()->json(['error' => 'Booking tidak ditemukan'], 404);
         }

         // Update status berdasarkan response dari Midtrans
         if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
             $booking->status = 'paid';
         } elseif ($transactionStatus == 'pending') {
             $booking->status = 'pending';
         } elseif ($transactionStatus == 'deny' || $transactionStatus == 'expire' || $transactionStatus == 'cancel') {
             $booking->status = 'canceled';
         }

         $booking->save();

         return response()->json(['message' => 'Webhook processed successfully']);
    }
}
