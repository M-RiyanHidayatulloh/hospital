<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'admin.Payments',
            'breadcrumbs' => [
                // 'Category' => "#",
            ],
            'payments' => Payment::all(),
            'content' => 'admin.payments.index',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'admin.Create Payment',
            'breadcrumbs' => [
                'Payment' => route('payments.index'),
                'Create' => "#",
            ],
            'content' => 'admin.payments.create',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'status' => 'required'
        ]);
        Payment::create($request->all());
        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $data = [
            'title' => 'admin.Patients',
            'breadcrumbs' => [
                'Payments' => route('admin.payments.index'),
                'Edit' => "#",
            ],
            'payment' => $payment,
            'content' => 'admin.payments.edit',
        ];

        return view("admin.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'status' => 'required'
        ]);
        $payment->update($request->all());
        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
