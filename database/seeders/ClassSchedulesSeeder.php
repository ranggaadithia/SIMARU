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
                'start_time' => '10:30:00',
                'end_time' => '13:00:00',
                'subject' => 'OOP',
                'lecturer' => 'A.A Yudhi Ambara M.Kom',
                'class' => 'ilkom A'
            ],
            [
                'lab_id' => 4,
                'day' => 'wednesday',
                'start_time' => '07:30:00',
                'end_time' => '10:00:00',
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
