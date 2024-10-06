<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        // Fetch all users
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        // Fetch the user by ID
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('admin.users.index');
    }
}
