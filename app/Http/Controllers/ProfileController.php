<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $test = Auth::user();
        // dd($test);
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */


    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,'.$user->id,
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048', // validate profile photo
            'password' => 'nullable|string|min:8',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_image')) {

            $profile_image = $request->file('profile_image');
            $profile_image->storeAs('public/profile-image', $profile_image->hashName());

            Storage::delete('public/profile-image/' . $user->profile_image);

            $user->update([
                'profile_image'     => $profile_image->hashName(),
                'name'   => $request->name,
                'phone'   => $request->phone,
                'address'   => $request->address,
            ]);

        } else {

            $user->update([
                'name'   => $request->name,
                'phone'   => $request->phone,
                'address'   => $request->address,
            ]);

        }

        $user->save();

        return redirect()->route('user.dashboard.index')->with('success', 'Profile updated successfully');
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
