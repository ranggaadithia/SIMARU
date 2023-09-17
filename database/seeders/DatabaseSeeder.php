<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Status::create(['title' => 'admin']);
        Status::create(['title' => 'dosen']);
        Status::create(['title' => 'pegawai']);
        Status::create(['title' => 'mahasiswa']);
        Status::create(['title' => 'umum']);
    }
}
