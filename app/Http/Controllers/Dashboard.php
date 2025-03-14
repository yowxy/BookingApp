<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard', [
            'usercount' => User::count(),
        ]);
    }
}
