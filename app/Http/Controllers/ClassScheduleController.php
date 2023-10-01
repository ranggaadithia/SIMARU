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
        return view('dashboard.class_schedule.index');
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

        $isAvaliable = ClassSchedule::isTimeSlotAvailable($request->lab_id, $request->day, $request->start_time, $request->end_time)->count() == 0;

        if ($isAvaliable) {
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
            return back()->withErrors([
                'subject' => 'Slot waktu sudah digunakan',
            ])->onlyInput('subject');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassSchedule $classSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassSchedule $classSchedule)
    {
        //
    }
}
