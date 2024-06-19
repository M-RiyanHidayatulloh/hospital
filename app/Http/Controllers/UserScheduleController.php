<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorSchedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserScheduleController extends Controller
{
    public function index()
    {
        $userAuth = Auth::user()->id;
        $schedule = DoctorSchedule::all();
        // dd($schedule);
        $schedules = DoctorSchedule::where('user_id', $userAuth)->get();
        $user = User::all();
        return view('user.doctor_schedule.index', compact('schedule', 'user', 'schedules'));
    }

    public function edit($id)
    {
        $schedule = DoctorSchedule::find($id);
        $data = [
            'schedule' => $schedule
        ];
        return view('user.doctor_schedule.my-schedule', $data);
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'room_number' => 'required',
    //         'room_type' => 'required',
    //         'availability' => 'required',
    //         'capacity' => 'required|integer'
    //     ]);

    //     $room = Room::findOrFail($id);

    //     $room->update([
    //         'room_number' => $request->room_number,
    //         'room_type' => $request->room_type,
    //         'availability' => $request->availability,
    //         'capacity' => $request->capacity,
    //     ]);

    //     return redirect()->route('admin/rooms')->with('success', 'Room updated successfully.');
    // }

    public function update(Request $request, $id)
    {
        $schedule = DoctorSchedule::find($id);
        $request->validate([
            'day_of_week' => 'nullable',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
        ]);

        $schedule->update([
            'day_of_week' => $request->day_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        // $data = [
        //     'schedule' => $schedule
        // ];
        // $schedule->update($data);
        return redirect()->route('doctor_schedule');
    }
}
