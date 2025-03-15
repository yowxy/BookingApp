@extends('dashboard.layouts.layouts')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Pembayaran Booking</h2>
    @foreach ($bookings as $booking)
    <div class="flex flex-column">
        <p class="text-gray-700">Nama: <strong>{{ $booking->user->name }}</strong></p>
        <p class="text-gray-700 mx-5">Layanan: <strong>{{ $booking->service }}</strong></p>
        <p class="text-gray-700">Tanggal Booking: <strong>{{ $booking->booking_date }}</strong></p>
        <p class="text-gray-700">Total Harga: <strong>Rp {{ number_format($booking->price, 0, ',', '.') }}</strong></p>

        <div class="mt-4 flex flex-row">
            {{-- Tombol Pembayaran --}}
            <button class="pay-button bg-blue-500 text-white px-4 py-2 rounded mx-3" data-booking-id="{{ $booking->id }}">
                Bayar Sekarang
            </button>

            {{-- Form Hapus Booking --}}

        </div>
    </div>
    @endforeach
</div>

{{-- Load Midtrans Snap & jQuery --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $(".pay-button").click(function () {
            var bookingId = $(this).data("booking-id");

            $.ajax({
                url: "{{ route('createTransaction') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    booking_id: bookingId
                },
                success: function (response) {
                    console.log("Snap Token:", response.snapToken);

                    snap.pay(response.snapToken, {
                        onSuccess: function (result) {
                            alert("Pembayaran berhasil!");
                            console.log(result);
                            location.reload();
                        },
                        onPending: function (result) {
                            alert("Menunggu pembayaran!");
                            console.log(result);
                        },
                        onError: function (result) {
                            alert("Pembayaran gagal!");
                            console.log(result);
                        }
                    });
                },
                error: function (xhr) {
                    alert("Gagal memproses pembayaran! Periksa console.");
                    console.error("Error:", xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
