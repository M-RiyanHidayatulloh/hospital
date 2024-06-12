<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthInformation;

class UserInformationController extends Controller
{
    public function index()
    {
        $health_informations = HealthInformation::all();
        return view('Information.index',compact('health_informations'));
    }
}
