<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard', [
            'usercount' => User::count(),
        ]);
    }

    public function user()
    {
        $user = Auth::user();
        return view('dashboard.user.show',compact('user'));

    }

    public function show(string $id)
    {
        return view('dashboard.user.show',compact('user'));
        // $user = User::get();
    }
}
