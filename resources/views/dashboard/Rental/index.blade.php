@extends('dashboard.layouts.layouts')

@section('rentalPS')
@guest
    <div class="text-black font-bold p-4 justify-center">
        <h1 class="justify-center" >
            <a href="{{ route('auth.LoginGet') }}">Login</a> dulu atau <a href="{{ route('auth.RegisterGet') }}">Register</a>
        </h1>
    </div>
@endguest


    @auth

    @section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-md shadow-md w-full">
        <h2 class="text-lg font-bold mb-4">Daftar Booking</h2>
        <div class="max-w-6xl mx-auto bg-white p-6 rounded-md shadow-md overflow-x-auto">
            <h2 class="text-lg font-bold mb-4">Daftar Booking</h2>

            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100 text-center">
                        <th class="border px-4 py-3">Nama</th>
                        <th class="border px-4 py-3">Tanggal</th>
                        <th class="border px-4 py-3">Jenis Rental</th>
                        <th class="border px-4 py-3">Total Harga</th>
                        <th class="border px-4 py-3">Status</th>
                        <th class="border px-4 py-3">Aksi</th>
                        <th class="border px-4 py-3">Hapus</th>
                    </tr>
            </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr class="hover:bg-gray-50 text-center">
                        <td class="border px-4 py-3 whitespace-nowrap">{{ $booking->user->name }}</td>
                        <td class="border px-4 py-3 whitespace-nowrap">{{ $booking->booking_date }}</td>
                        <td class="border px-4 py-3 whitespace-nowrap">{{ $booking->service }}</td>
                        <td class="border px-4 py-3 whitespace-nowrap">Rp {{ number_format($booking->price, 0, ',', '.') }}</td>
                        <td class="border px-4 py-3">
                            <span class="px-3 py-1 rounded text-white text-sm font-semibold
                                {{ $booking->status == 'paid' ? 'bg-green-500' : 'bg-yellow-500' }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td class="border px-4 py-3">
                            @if ($booking->status == 'pending')
                                <a href="{{ route('payment') }}" class="bg-blue-500 text-white px-4 py-2 rounded text-sm font-semibold hover:bg-blue-600">Bayar</a>
                            @else
                                <span class="text-gray-500 text-sm">Lunas</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('rental.destroy', $booking->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white rounded px-4 py-2 text-sm">
                                    DELETE
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>


            </table>

            <a href="{{ route('rental.create') }}" class="mt-4 inline-block bg-green-500 text-white px-5 py-2 rounded font-semibold hover:bg-green-600">Buat Booking</a>
        </div>


    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const bookingDate = document.getElementById("bookingDate");
            const rentalService = document.getElementById("rentalService");
            const totalPrice = document.getElementById("totalPrice");
            const payButton = document.getElementById("payButton");

            function updatePrice() {
                let price = rentalService.value === "ps4" ? 30000 : 40000;
                const date = new Date(bookingDate.value);
                const day = date.getDay(); // 0 = Minggu, 6 = Sabtu

                if (day === 0 || day === 6) {
                    price += 50000; // Tambahan weekend
                }

                totalPrice.textContent = `Rp ${price.toLocaleString()}`;
            }

            bookingDate.addEventListener("change", updatePrice);
            rentalService.addEventListener("change", updatePrice);

            payButton.addEventListener("click", function () {
                fetch("{{ route('booking.store') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        date: bookingDate.value,
                        service: rentalService.value
                    })
                })
                .then(response => response.json())
                .then(data => {
                    window.snap.pay(data.snapToken, {
                        onSuccess: function () {
                            window.location.href = "{{ route('payment.success') }}";
                        }
                    });
                });
            });
        });
    </script> --}}
    @endsection

    @endauth



@endsection
