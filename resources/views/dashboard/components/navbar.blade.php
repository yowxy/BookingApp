<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Interaktif</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="">
    <nav class="bg-gray-800" x-data="{ openMenu: false, openProfile: false }">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <!-- Burger Button -->
                <button @click="openMenu = !openMenu" type="button" class="sm:hidden p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-inset">
                    <span class="sr-only">Open menu</span>
                    <svg x-show="!openMenu" class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-16 6h16" />
                    </svg>
                    <svg x-show="openMenu" class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Logo -->
                <a  href="/" class="flex items-center">
                    <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Logo">
                </a>


                <div class="hidden sm:flex space-x-4">
                    <a href="#" class="text-white bg-gray-900 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                    <a href="#" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Team</a>
                    <a href="#" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Projects</a>
                    <a href="#" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Calendar</a>
                </div>
                <!-- Desktop Menu -->

                @guest
                    <div class="text-white font-bold">
                        <a href="{{ route('auth.LoginGet') }}" class="mx-3">Login</a>
                        <a href="{{ route('auth.RegisterGet') }}">Register</a>
                    </div>
                @endguest

                @auth
                <div class="relative">
                    <button @click="openProfile = !openProfile" class="flex items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User">
                    </button>

                    <div x-show="openProfile" @click.away="openProfile = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                        <a href="{{ route('user.index') }}" class="block px-4 py-2 text-gray-700">Your Profile</a>
                        <a href="{{ route('auth.logout') }}" class="block px-4 py-2 text-gray-700">Sign out</a>
                    </div>
                </div>
                @endauth
                <!-- Profile Dropdown -->
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="openMenu" class="sm:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#" class="block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md">Dashboard</a>
                <a href="#" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700">Team</a>
                <a href="#" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700">Projects</a>
                <a href="#" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700">Calendar</a>
            </div>
        </div>
    </nav>
</body>
</html>
