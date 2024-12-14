<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
     $user = $request->user();


    // Update other validated fields
     $user->fill($request->validated());

        // Process and store the avatar if it exists
     if ($request->hasFile('avatar')) {
        // Delete the old avatar if it exists
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Store the new avatar and save the path
        $user->avatar = $request->file('avatar')->store('avatars', 'public');
    }

    if ($request->has('password')) {
        $user->password = Hash::make($request->password);
    }

    // Handle email change
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    // Save the user
    $user->save();

    return Redirect::route('settings')->with('status', 'profile-updated');

}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
