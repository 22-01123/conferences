<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Fetch all conferences (upcoming and past)
        $conferences = Conference::all();

        return view('employee.conferences', compact('conferences'));
    }

    public function show($id)
    {
        // Fetch conference with registered clients
        $conference = Conference::with('registrations.user')->findOrFail($id);

        return view('employee.show', compact('conference'));
    }
}
