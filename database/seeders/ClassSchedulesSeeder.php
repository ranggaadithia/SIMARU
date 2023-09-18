<?php

namespace Database\Seeders;

use App\Models\ClassSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scheduleData = [
            [
                'lab_id' => 2,
                'day' => 'monday',
                'start_time' => 'D',
                'end_time' => 'F',
                'subject' => 'OOP',
                'lecturer' => 'A.A Yudhi Ambara M.Kom',
                'class' => 'ilkom A'
            ],
            [
                'lab_id' => 4,
                'day' => 'wednesday',
                'start_time' => 'A',
                'end_time' => 'C',
                'subject' => 'HCI',
                'lecturer' => 'Resika Arthana S.T, M.Kom',
                'class' => 'ilkom IKI'
            ],
        ];

        foreach ($scheduleData as $key => $value) {
            ClassSchedule::create($value);
        }
    }
}
