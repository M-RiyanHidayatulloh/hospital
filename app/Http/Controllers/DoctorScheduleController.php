<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorSchedule;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DoctorScheduleController extends Controller
{
    public function index(): View
    {
        $schedules = DoctorSchedule::whereHas('user', function ($query) {
            $query->where('usertype', 'doctor');
        })->get();
        // $schedules = DoctorSchedule::latest()->paginate(5);

        // $schedules = DoctorSchedule::orderBy('id', 'desc')->get();
        // $schedules = DoctorSchedule::count();
        // $schedules = DoctorSchedule::all();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $users = User::where('usertype', 'doctor')->whereNotNull('specialization')->get();
        $doctor = User::where('usertype', 'user')->get();

        return view('admin.schedules.create', compact('users', 'doctor'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validation = $request->validate([
            'user_id' => 'required|exists:users,id',
            'day_of_week' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
        $schedule = DoctorSchedule::create([
            'user_id' => $request->user_id,
            'day_of_week' => $request->day_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time
        ]);
        // $data = DoctorSchedule::create($validation);
        if ($schedule) {
            return redirect()->route('admin/schedules')->with('success', 'Schedule Data Was Added');
        } else {
            return redirect()->route('admin/schedules/create')->with('error', 'Some Problem Secure');
        }
    }

    public function edit($id)
    {
        // $doctor = Doctor::findOrFail($id);
        // $users = User::where('usertype', 'doctor')->get();
        // return view('admin.doctors.update', compact('doctor', 'users'));
        // $patients = User::where('usertype', 'user')->get();
        // $doctors = User::where('usertype', 'doctor')->get();
        $schedule = DoctorSchedule::findOrFail($id);
        $users = User::where('usertype', 'doctor')->get();
        return view('admin.schedules.update', compact('schedule', 'users'));
    }

    public function update(Request $request, $id)
    {
        $schedules = DoctorSchedule::findOrFail($id);
        $user_id = $request->user_id;
        $day_of_week = $request->day_of_week;
        $start_time = $request->start_time;
        $end_time = $request->end_time;

        $schedules->user_id = $user_id;
        $schedules->day_of_week = $day_of_week;
        $schedules->start_time = $start_time;
        $schedules->end_time = $end_time;
        $data = $schedules->save();
        if ($data) {
            return redirect()->route('admin/schedules')->with('success', 'Schedule Data Was Changed');
        } else {
            return redirect()->route('admin/schedules/update')->with('error', 'Some Problem Secure');
        }
    }

    public function delete($id)
    {
        $schedules = DoctorSchedule::findOrFail($id)->delete();
        if ($schedules) {
            return redirect()->route('admin/schedules')->with('success', 'Schedule Data Was Deleted');
        } else {
            return redirect()->route('admin/schedules')->with('error', 'Schedule Delete Fail');
        }
    }

    public function trash()
    {
        $schedules = DoctorSchedule::onlyTrashed()->get();
        return view('admin.schedules.trash', compact('schedules'));
    }

    public function restore($id = null)
    {
        if ($id != null) {
            $schedules = DoctorSchedule::onlyTrashed()
                ->where('id', $id)
                ->restore();
        } else {
            $schedules = DoctorSchedule::onlyTrashed()->restore();
        }
        return redirect()->route('admin/schedules/trash')->with('success', 'Doctor Schedule Was Restore');
    }

    public function destroy($id = null)
    {
        if ($id != null) {
            $schedules = DoctorSchedule::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        } else {
            $schedules = DoctorSchedule::onlyTrashed()->forceDelete();
        }
        return redirect()->route('admin/schedules/trash')->with('success', 'Doctor Schedule Was Delete Permanently');
    }
}
