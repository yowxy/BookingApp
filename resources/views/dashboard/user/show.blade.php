@extends('dashboard.layouts.layouts')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Detail User</h2>

    <div class="mb-4">
        <label class="font-semibold">Nama:</label>
        <p class="text-gray-700">{{ $user->name }}</p>
    </div>

    <div class="mb-4">
        <label class="font-semibold">Email:</label>
        <p class="text-gray-700">{{ $user->email }}</p>
    </div>

    <div class="mb-4">
        <label class="font-semibold">Dibuat Pada:</label>
        <p class="text-gray-700">{{ $user->created_at->format('d M Y') }}</p>
    </div>

    <div class="mt-6">
        <a href="{{ route(' Dashnboard') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Kembali
        </a>
    </div>
</div>
@endsection
