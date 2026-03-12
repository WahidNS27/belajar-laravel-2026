<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::with('student')->latest()->get();
        $title = 'Data Attendance';
        return view('attendance.index', compact('attendances', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::get();
        return view('attendance.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $request->date;
        $attendances = $request->attendances;

        foreach ($attendances as $attendance) {

            // cek apakah absensi sudah ada
            $existingAttendance = Attendance::where('student_id', $attendance['student_id'])
                ->whereDate('date', $date)
                ->first();

            if ($existingAttendance) {

                // update data
                $existingAttendance->update([
                    'status_in' => $attendance['status_in'] ?? null,
                    'check_in' => $attendance['check_in'] ?? null,
                    'status_out' => $attendance['status_out'] ?? null,
                    'check_out' => $attendance['check_out'] ?? null,
                    'note' => $attendance['note'] ?? null,
                ]);

            } else {

                // insert data
                Attendance::create([
                    'student_id' => $attendance['student_id'],
                    'date' => $date,
                    'status_in' => $attendance['status_in'] ?? null,
                    'check_in' => $attendance['check_in'] ?? null,
                    'status_out' => $attendance['status_out'] ?? null,
                    'check_out' => $attendance['check_out'] ?? null,
                    'note' => $attendance['note'] ?? null,
                ]);

            }
        }

        Alert::success('Success', 'Attendance saved successfully');
        return redirect()->route('attendance.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $attendance = Attendance::with('student')->findOrFail($id);
        $title = 'Edit Attendance';

        return view('attendance.edit', compact('attendance', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'date' => 'required|date',
            'status_in' => 'nullable|string',
            'status_out' => 'nullable|string',
        ]);

        $attendance->update([
            'date' => $request->date,
            'status_in' => $request->status_in,
            'check_in' => $request->check_in,
            'status_out' => $request->status_out,
            'check_out' => $request->check_out,
            'note' => $request->note,
        ]);

        Alert::success('Success', 'Attendance updated successfully');
        return redirect()->route('attendance.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        Alert::success('Success', 'Attendance removed successfully');
        return redirect()->route('attendance.index');
    }
}
