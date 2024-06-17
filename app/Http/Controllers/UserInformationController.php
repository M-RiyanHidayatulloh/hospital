<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthInformation;

class UserInformationController extends Controller
{
    public function index()
    {
        $health_informations = HealthInformation::all();
        return view('user.Information.index', compact('health_informations'));
    }

    public function show(string $id)
    {
        $health_information = HealthInformation::findOrFail($id);
        // dd($health_information);
        $health_informations = HealthInformation::all();
        // dd($health_informations->category);
        // foreach ($health_informations as $tibrut) {
        //     dd($tibrut->category);
        // }

        return view('user.Information.show', compact('health_information', 'health_informations'));
    }
}
