<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // Fetch all upcoming conferences
        $conferences = Conference::where('date', '>=', now())->get();

        return view('client.conferences', compact('conferences'));
    }

    public function show($id)
    {
        // Fetch the conference by ID
        $conference = Conference::findOrFail($id);

        return view('client.show', compact('conference'));
    }

    public function register(Request $request, $id)
    {
        // Register logic
        $conference = Conference::findOrFail($id);

        // Check if already registered
        if ($conference->registrations()->where('user_id', auth()->id())->exists()) {
            return redirect()->back()->with('error', 'You are already registered for this conference.');
        }

        // Register the client
        $conference->registrations()->create([
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Successfully registered for the conference.');
    }
}
