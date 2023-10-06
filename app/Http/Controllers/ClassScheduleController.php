<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ClassSchedule;
use App\Utilities\TimeMappings;

class ClassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labs = Lab::all();
        $days = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
        $classSchedules = ClassSchedule::all();


        return view('dashboard.class_schedule.index', compact('labs', 'days', 'classSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lecturers = User::where('role', 'dosen')->pluck('name')->toArray();

        $labs = Lab::all();

        return view('dashboard.class_schedule.create', compact('lecturers', 'labs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ClassSchedule::$rules);

        $isLabAvailable = ClassSchedule::isLabAvailable($request->lab_id, $request->day, $request->start_time, $request->end_time)->count() == 0;

        if ($isLabAvailable) {
            $data = [
                "lab_id" => $request->lab_id,
                "day" => $request->day,
                "start_time" => TimeMappings::getMapping($request->start_time)[0],
                "end_time" => TimeMappings::getMapping($request->end_time)[1],
                "subject" => $request->subject,
                "lecturer" => $request->lecturer,
                "class" => $request->class
            ];

            ClassSchedule::create($data);
            return redirect()->route('class-schedule.index')->with('success', 'Data berhasil ditambahkan.');
        } else {
            return back()->with([
                'error' => 'Slot waktu sudah digunakan',
            ])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassSchedule $classSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassSchedule $classSchedule)
    {
        $time_format = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M'];
        $lecturers = User::where('role', 'dosen')->pluck('name')->toArray();

        $labs = Lab::all();
        return view('dashboard.class_schedule.edit', compact('classSchedule', 'labs', 'lecturers', 'time_format'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassSchedule $classSchedule)
    {
        $this->validate($request, ClassSchedule::$rules);

        $newLab = $request->lab_id;
        $newDay = $request->day;
        $newStartTime = TimeMappings::getMapping($request->start_time)[0];
        $newEndTime = TimeMappings::getMapping($request->end_time)[1];

        if (
            $newLab != $classSchedule->lab_id ||
            $newDay != $classSchedule->day ||
            $newStartTime != $classSchedule->start_time ||
            $newEndTime != $classSchedule->end_time
        ) {
            $isLabAvailable = ClassSchedule::isLabAvailable($newLab, $newDay, $request->start_time, $request->end_time)->count() == 0;
            if ($isLabAvailable) {
                $data = [
                    "lab_id" => $newLab,
                    "day" => $newDay,
                    "start_time" => $newStartTime,
                    "end_time" => $newEndTime,
                    "subject" => $request->subject,
                    "lecturer" => $request->lecturer,
                    "class" => $request->class
                ];

                $classSchedule->update($data);
                return redirect()->route('class-schedule.index')->with('success', 'Data berhasil di update.');
            } else {
                return back()->with([
                    'error' => 'Slot waktu sudah digunakan',
                ])->withInput();
            }
        } else {
            $classSchedule->update($request->only(['subject', 'lecturer', 'class']));
            return redirect()->route('class-schedule.index')->with('success', 'Data berhasil di update.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassSchedule $classSchedule)
    {
        //
    }
}
