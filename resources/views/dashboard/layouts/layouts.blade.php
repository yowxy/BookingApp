@extends('dashboard.components.layouts')

@include('dashboard.components.navbar')
<div class="flex h-screen" >
    @include('dashboard.components.sidebar')
    <main class="py-6" >
        <div class="container w-full" >
            @yield('dashboard')
            @yield('rentalPS')
            @yield('content')
        </div>
    </main>
</div>
