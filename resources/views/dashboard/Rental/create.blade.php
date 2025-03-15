@extends('dashboard.layouts.layouts')

@section('content')

@auth
<div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    <h2 class="text-lg font-bold mb-4">Buat Booking</h2>
    <form action="{{ route('rental.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block">Nama</label>
            <input type="text" name="user_id" required class="w-full border p-2 rounded" value="{{ $user->name }}">
        </div>
        {{-- <input type="hidden" name="user_id" value="{{ auth()->id() }}"> --}}
        <div class="mb-4">
            <label class="block">Tanggal Booking:</label>
            <input type="date" name="booking_date" required class="w-full border p-2 rounded" >
        </div>
        <div class="mb-4">
            <label class="block">Pilih PS:</label>
            <select name="service" class="w-full border p-2 rounded">
                <option value="PS4">PS 4 - Rp 30.000</option>
                <option value="PS5">PS 5 - Rp 40.000</option>
            </select>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Lanjutkan</button>
    </form>
</div>
@endauth
@endsection
