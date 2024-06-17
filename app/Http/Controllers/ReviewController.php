<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $reviews = Review::latest()->paginate(5);
        // $reviews = Review::count();
        $reviews = Review::all();
        $reviews = Review::whereHas('user', function($query) {
            $query->where('usertype', 'user');
        })->get();
        return view('admin.reviews.index', compact('reviews'));
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
        // dd($request);
        $data=$request->validate([
            'name' => 'required|string|exists:name',
            'review' => 'required',

        ]);
        $review=review::create([
            'name' => $request->name,
            'review' => $request->review,
        ]);
        $data['user_id']=Auth::user()->id;
        Review::create($data);
        return redirect()->route('home')->with('success', 'Review created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'name' => 'required',
            'judul' => 'required',
            'review' => 'required',
        ]);
        return redirect()->route('home')->with('success', 'Review Data Was Create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Review $review)
    {
        $review->delete();
    }
}
