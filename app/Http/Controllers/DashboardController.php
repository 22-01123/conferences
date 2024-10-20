<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Conference; // Add this line to import the Conference model

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == 'admin') {
            return view('admin.dashboard'); // Admin Dashboard
        } elseif ($role == 'employee') {
            return view('employee.dashboard'); // Employee Dashboard
        } elseif ($role == 'client') {
            // Fetch conferences using the user's 'id' instead of 'user_id'
            $conferences = Conference::where('id', Auth::user()->id)->get();
            return view('client.dashboard', compact('conferences')); // Pass conferences to view
        } else {
            return redirect('/'); // Fallback
        }
    }
}
