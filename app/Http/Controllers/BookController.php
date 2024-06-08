<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{

    public function index() {
        if (Auth::id()) {
            $books = Book::latest()->paginate(5);
            $doctors = Doctor::all();
            $patients = Patient::all();

            return view('home.bookappointment', [
                'books' => $books,
                'doctors' => $doctors,
                'patients' => $patients,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function edit($id) {
        $doctors = Doctor::all();
        $patients = Patient::all();
        $book = Book::findOrFail($id);

        return view('home.bookappointment', [
            'doctors' => $doctors,
            'patients' => $patients,
            'book' => $book,
        ]);
    }
}
