<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        $users = User::orderBy('id', 'desc')->get();
        $users = User::count();
        $users = User::all();
        return view('admin.user_list.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user_list.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'usertype' => 'required|string|max:255',
            'profile_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1048',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/profile-image', $image->hashName());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'profile_image' => $image->hashName(),
            'phone' => $request->phone,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'specialization' => $request->specialization,
            'amount' => $request->amount,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.user_list.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user_list.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'usertype' => 'required|string|max:255',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.user_list.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user_list.index')->with('success', 'User deleted successfully.');
    }
}



