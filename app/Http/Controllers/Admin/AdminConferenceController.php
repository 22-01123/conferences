<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use Illuminate\Http\Request;

class AdminConferenceController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $conferences = Conference::all();
        return view('admin.conferences.index', compact('conferences'));
    }


    public function create()
    {
        return view('admin.conferences.create');
    }

    public function store(Request $request)
    {
        // Validate and store the new conference
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'lecturer' => 'required|string',
            'address' => 'required|string',
        ]);

        Conference::create($validated);
        return redirect()->route('admin.conferences.index');
    }

    public function edit($id)
    {
        $conference = Conference::findOrFail($id);
        return view('admin.conferences.edit', compact('conference'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the existing conference
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'lecturer' => 'required|string',
            'address' => 'required|string',
        ]);

        $conference = Conference::findOrFail($id);
        $conference->update($validated);

        return redirect()->route('admin.conferences.index');
    }

    public function destroy($id)
    {
        // Prevent deletion of past conferences
        $conference = Conference::findOrFail($id);
        if ($conference->date < now()) {
            return redirect()->route('admin.conferences.index')->with('error', 'Cannot delete past conferences.');
        }

        $conference->delete();
        return redirect()->route('admin.conferences.index');
    }
}
