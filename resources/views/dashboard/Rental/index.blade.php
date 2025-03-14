@extends('dashboard.layouts.layouts')

@section('rentalPS')
@guest
    <div class="text-black font-bold p-4 justify-center">
        <h1 class="justify-center" >
            <a href="{{ route('auth.LoginGet') }}">Login</a> dulu atau <a href="{{ route('auth.RegisterGet') }}">Register</a>
        </h1>
    </div>
@endguest

@endsection
