@extends('dashboard.layouts.layouts')

@section('dashboard')
<div class="p-4" >
    <h1 class="text-2xl font-bold" >Welcome to BookingApp</h1>
    <p>in here you can book anything you want </p>

    <div class="w-full p-6 bg-white rounded-lg shadow-md ">
        <h2 class="text-lg font-semibold text-gray-800">Total user</h2>
        <p class="mt-1 text-gray-500">Jumlah pengguna terdaftar.</p>
        <span class="text-4xl font-bold text-green-500">{{ $usercount }} </span>
    </div>
    


</div>
@endsection