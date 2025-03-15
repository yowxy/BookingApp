@extends('dashboard.layouts.layouts')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Pembayaran Booking</h2>
        @foreach ($bookings as $booking )
        <p class="text-gray-700">Nama: <strong>{{ $booking->user->name }}</strong></p>
        <p class="text-gray-700">Layanan: <strong>{{ $booking->service }}</strong></p>
        <p class="text-gray-700">Tanggal Booking: <strong>{{ $booking->booking_date }}</strong></p>
        <p class="text-gray-700">Total Harga: <strong>Rp {{ number_format($booking->price, 0, ',', '.') }}</strong></p>
    
        <div class="mt-4">
            <button id="pay-button" class="bg-blue-500 text-white px-4 py-2 rounded">Bayar Sekarang</button>
        </div>
        @endforeach
</div>
{{-- 
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    document.getElementById('pay-button').onclick = function() {
        snap.pay("{{ $snapToken }}");
    };
</script> --}}
@endsection
