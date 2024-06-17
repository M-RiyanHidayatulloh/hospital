<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user()->id;
        $app = Review::where('review', $auth)->get();
        // dd($app);

        $data = [
            'nama'    => Auth::get(),
            'review'  => $app
        ];

        return view('home.book', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all()->get();
        return view('admin.reviews.create',compact('reviews'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string|exists:users,id',
            'name' => 'required',
            'review' => 'required',
        ]);

        Review::create($request->all());
        redirect()->route('admin.reviews.index')->with('success', 'Review created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $status = 'Wait';
        // $doctorId = $request->input('doctor_id');

        Review::create([
            'user_id' => Auth::user()->id,
            'review' => $request->review,
        ]);

        return redirect()->back()->with('success', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
