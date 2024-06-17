<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('admin.dashboard.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('profile_images', 'public');

            // Delete old image if exists
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            $user->image = $path;
        }

        $user->save();

        return Redirect::route('admin.dashboard.edit')->with('success', 'Profile Has been Changed!');
    }
}
