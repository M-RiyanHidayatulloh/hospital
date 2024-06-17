<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\OnlineConsultation;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\User;


class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::latest()->paginate(5);
        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        $patients = Patient::all();
        $appointments = Appointment::all();
        if ($patients->isEmpty() || $appointments->isEmpty()) {
            return redirect()->route('admin/payments')->with('error', 'No patients or appointments available.');
        }

        return view('admin.payments.create', compact('patients', 'appointments'));
    }

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

    public function show(Payment $payment)
    {
        return view('admin.payments.show', compact('payment'));
    }

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

    public function delete($id)
    {
        $payments = Payment::findOrFail($id)->delete();
        if($payments) {
            return redirect()->route('admin/payments')->with('success', 'Queue Data Was Deleted');
        } else {
            return redirect()->route('admin/payments')->with('error', 'Queue Delete Fail');
        }
    }

    public function showPaymentForm(Request $request)
    {
        $doctorId = $request->doctor_id;
        $doctor = User::findOrFail($doctorId);

        // dd($doctor->amount);
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $item_details = [
            [
                'id' => $doctor->id,
                'price' => $doctor->amount,
                'quantity' => 1,
                'name' => 'Biaya Konsultasi dengan ' . $doctor->name,
            ]
        ];

        $transaction_details = [
            'order_id' => uniqid(),
        ];

        $detailDoctor = [
            'amount' => $doctor->amount,
            'name' => $doctor->name,
        ];

        $customer_details = [
            'first_name' => $request->patientName,
            'email' => $request->patientEmail,
            'phone' => $request->patientPhone,
        ];

        $params = [
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details,
            'doctor_details' => $detailDoctor
        ];

        $snapToken = Snap::getSnapToken($params);

        // dd($doctor->amount);
        OnlineConsultation::create([
            'patient_id' => auth()->id(),
            'doctor_id' => $request->doctor_id,
            'consultation_date' => now(),
            'consultation_mode' => 'Chat',
            'notes' => $request->notes,
            // 'amount' => $request->amount,
            'notes' => 'Payment processed successfully.',
        ]);
        return view('user.payment.index', [
            'snapToken' => $snapToken,
            'doctor' => $doctor,
            'patientName' => $request->patientName,
        ]);
    }


    // public function showPaymentForm(Request $request)
    // {
    //     $doctor = $request->doctor_id;
    //     $doctors = User::where('id', $doctor)->get();
    //     foreach ($doctors as $item) {
    //         $item->name;
    //     }

    //     $doctorAmount = $item->amount;

    //     Config::$serverKey = config('midtrans.server_key');
    //     Config::$isProduction = config('midtrans.is_production');
    //     Config::$isSanitized = config('midtrans.is_sanitized');
    //     Config::$is3ds = config('midtrans.is_3ds');

    //     $item_details = $doctors->map(function ($doctor) {
    //         return [
    //             'id' => $doctor->id,
    //             'price' => $doctor->amount,
    //             'quantity' => 1,
    //             'name' => 'Biaya Konsultasi dengan ' . $doctor->name,
    //         ];
    //     })->toArray();

    //     $transaction_details = [
    //         'order_id' => uniqid(),
    //     ];

    //     $detailDoctor = [
    //         'amount' => $item->amount,
    //         'name' => $item->name,
    //     ];

    //     $customer_details = [
    //         'first_name' => $request->patientName,
    //         'email' => $request->patientEmail,
    //         'phone' => $request->patientPhone,
    //     ];

    //     $params = [
    //         'transaction_details' => $transaction_details,
    //         'item_details' => $item_details,
    //         'customer_details' => $customer_details,
    //         'doctor_details' => $detailDoctor
    //     ];

    //     $snapToken = Snap::getSnapToken($params);

    //     return view('user.payment.index', [
    //         'snapToken' => $snapToken,
    //         'doctors' => $doctors[0],
    //         'patientName' => $request->patientName,
    //     ]);
    // }



    public function success()
    {
        return view('user.payment.payment_success');
    }

    public function cancel()
    {
        return view('user.payment.payment_cancel');
    }


    public function processPayment(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'notes' => 'required|string',
        ]);


        OnlineConsultation::create([
            'patient_id' => auth()->id(),
            'doctor_id' => $request->doctor_id,
            'consultation_date' => now(),
            'consultation_mode' => 'Chat',
            'notes' => $request->notes,
            // 'notes' => 'Payment processed successfully.',
        ]);

    }

}
