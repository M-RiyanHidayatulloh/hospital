<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $profile = Auth::user();
        $data = [
            'profile'   => $profile
        ];
        return view('user.dashboard.index2', $data);
    }

    public function update($id)
    {
        dd($id);
    }

}





