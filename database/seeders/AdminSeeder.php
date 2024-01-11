<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // \App\Models\User::factory(10)->create();

        DB::table('Admins')->insert([
            'nama' => 'SuperAdmin',
            'email' => 'Superadmin@gmail.com',
            'password' => Hash::make('123123123'),
            'role' => '0',
        ]);
    }
}
