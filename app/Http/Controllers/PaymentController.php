<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::latest()->paginate(5);
        $payments = Payment::orderBy('id', 'desc')->get();
        $payments = Payment::count();
        $payments = Payment::all();
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::all();
        $appointments = Appointment::all();
        if ($patients->isEmpty() || $appointments->isEmpty()) {
            return redirect()->route('admin/payments')->with('error', 'No patients or appointments available.');
        }

        return view('admin.payments.create', compact('patients', 'appointments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'patient_id' => 'required|exists:patients,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'status' => 'required'
        ]);
        Payment::create($request->all());
        return redirect()->route('admin/payments')->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $appointments = Appointment::all();
        $patients = Patient::all();
        $payment = Payment::findOrFail($id);
        if ($patients->isEmpty() || $appointments->isEmpty()) {
            return redirect()->route('admin.payments.index')->with('error', 'No patients or appointments available.');
        }
        return view('admin.payments.update', compact('payment', 'patients', 'appointments'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'patient_id' => 'required|exists:patients,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'status' => 'required'
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($request->all());

        return redirect()->route('admin/payments')->with('success', 'Payment updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $payments = Payment::findOrFail($id)->delete();
        if($payments) {
            return redirect()->route('admin/payments')->with('success', 'Queue Data Was Deleted');
        } else {
            return redirect()->route('admin/payments')->with('error', 'Queue Delete Fail');
        }
    }

    public function trash() {
        $payments = Payment::onlyTrashed()->get();
         return view('admin.payments.trash', compact('payments'));
     }
 
     public function restore($id = null) {
         if($id != null) {
             $payments = Payment::onlyTrashed()
             ->where('id', $id)
             ->restore();
         } else {
             $payments = Payment::onlyTrashed()->restore();
         }
         return redirect()->route('admin/payments/trash')->with('success', 'Payment Data Was Restore');
     }
 
     public function destroy($id = null) {
         if($id != null) {
             $payments = Payment::onlyTrashed()
             ->where('id', $id)
             ->forceDelete();
         } else {
             $payments = Payment::onlyTrashed()->forceDelete();
         }
         return redirect()->route('admin/payments/trash')->with('success', 'Payment Data Was Delete Permanently');
     }
}
