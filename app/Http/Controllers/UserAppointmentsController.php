<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAppointmentsController extends Controller
{
   public function index()
    {
        return view('user.Appointments.index');
    }
}
