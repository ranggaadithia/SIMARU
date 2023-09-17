<?php

namespace Database\Seeders;

use App\Models\Lab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class labsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $labsData = [
            [
                'name' => 'Lab A',
                'size' => '32 x 24',
                'capacity' => '32',
                'description' => 'Lantai 2 Gedung ME'
            ],
            [
                'name' => 'Lab B',
                'size' => '15 x 15',
                'capacity' => '10',
                'description' => 'Lantai 2 Gedung ME'
            ],
            [
                'name' => 'Lab C',
                'size' => '32 x 24',
                'capacity' => '40',
                'description' => 'Gedung FTK C'
            ],
            [
                'name' => 'Lab D',
                'size' => '32 x 24',
                'capacity' => '32',
                'description' => 'Lantai 2 Gedung ME'
            ],
        ];

        foreach ($labsData as $key => $value) {
            Lab::create($value);
        }
    }
}
