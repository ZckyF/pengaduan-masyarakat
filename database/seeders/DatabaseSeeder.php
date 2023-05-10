<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Complaint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Complaint::factory(20)->create();
        User::create([
            'username' => 'Jaki',
            'password' => Hash::make('123'),
            'level' => 'admin'
        ]);
        User::create([
            'username' => 'Daus',
            'password' => Hash::make('12345'),
            'level' => 'super_admin'
        ]);
    }
}