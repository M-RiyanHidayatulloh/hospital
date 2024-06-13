<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class UserMedicalRecordController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari model MedicalRecord
$data = MedicalRecord::all();

// Mengirim data ke view
return view('user.medicalrecord.index', ['medicalRecords' => $data]);

    }
}
