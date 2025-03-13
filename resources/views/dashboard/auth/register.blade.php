@extends('dashboard.components.layouts')



@include('dashboard.components.navbar')

{{-- @section('login') --}}
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 mb-10">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto"
                src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create your account</h2>
            <p class="text-center">Welcome to Booking App</p>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('auth.RegisterPost') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>

                    @error('emai')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror


                </div>

                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Name</label>
                    <div class="mt-2">
                        <input type="text" name="name" id="name" autocomplete="name" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                </div>

                <div>
                    <label for="alamat" class="block text-sm/6 font-medium text-gray-900">Alamat</label>
                    <div class="mt-2">
                        <input type="text" name="alamat" id="alamat" autocomplete="alamat" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>

                    @error('alamat')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                </div>
                <div>
                    <label for="no_handphone" class="block text-sm/6 font-medium text-gray-900">No Handphone</label>
                    <div class="mt-2">
                        <input type="text" name="no_handphone" id="no_handphone" autocomplete="email" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>

                    @error('no_handphone')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="password" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>

                    @error('password')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="password_confirmation" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>

                    @error('password_confirmation')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mb-10">Create an account</button>
                </div>
            </form>


        </div>
    </div>
{{-- @endsection --}}

@include('dashboard.components.footer')
