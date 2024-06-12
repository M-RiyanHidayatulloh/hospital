<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
class HomeController extends Controller
{

    public function home()
    {
        $doctor = Doctor::all();
        return view('home.index', compact('doctor'));
    }
    public function admin()
    {
        return view('admin.dashboard.index');
    }

    public function user()
    {
        $doctor = Doctor::all();
        return view('home.index', compact('doctor'));
    }

    // public function doctor()
    // {
    //     return view('users.index');
    // }
}
