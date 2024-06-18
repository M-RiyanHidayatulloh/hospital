<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::latest()->paginate(5);
        // $users = User::orderBy('id', 'desc')->get();
        // $users = User::count();
        // $users = User::all();

        $users = User::where('usertype', 'user')->get();
        return view('admin.user_list.index', compact('users'));
    }

    public function create()
    {
        $users = User::where('usertype', 'user')->get();
        return view('admin.user_list.create', compact('users'));


    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'usertype' => 'required|string|max:255',
            'profile_image' => 'mimes:jpeg,png,jpg,gif,svg|max:1048',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $image = $request->file('profile_image');
        $image->storeAs('public/profile-image', $image->hashName());

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'profile_image' => 'profile-image/' . $image->hashName(),
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
        return view('admin.user_list.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'usertype' => 'string|max:255',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'string|max:255',
            'address' => 'string|max:255',
            'date_of_birth' => 'string|max:255',
            'gender' => 'string|max:255',
            'specialization' => 'string|max:255',
            'amount' => 'string|max:255',
            'password' => 'string|min:8|confirmed',
        ]);

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $folderPath = 'profile-image';
            $imagePath = $image->store($folderPath, 'public');
            $user->profile_image = $imagePath;
        }

        $user->update($request->all());
        return redirect()->route('admin.user_list.index')->with('success', 'User updated successfully.');

        // $user = User::findOrFail($id);
        // $user->update($request->all());

        // $image = $request->file('profile_image');
        // $image->storeAs('public/profile-image', $image->hashName());
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'usertype' => $request->usertype,
        //     'profile_image' => $image->hashName(),
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'date_of_birth' => $request->date_of_birth,
        //     'gender' => $request->gender,
        //     'specialization' => $request->specialization,
        //     'amount' => $request->amount,
        //     'password' => bcrypt($request->password),
        // ]);

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user_list.index')->with('success', 'User deleted successfully.');
    }
}



