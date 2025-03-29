<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    // Show profile edit form
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Update profile information
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if a file was uploaded
        if ($request->hasFile('profile_image')) {
            // Store the image in the 'public' disk, saving it with a unique name
            $path = $request->file('profile_image')->store('profile_images', 'public');

            // Update the user profile image field
            $user->profile_image = $path;
        }

        // Update other user information
        $user->update($validated);

        return redirect()->route('dashboard')->with('updated', 'Profile updated successfully!');
    }

}

