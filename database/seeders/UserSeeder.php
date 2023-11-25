<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'name' => "Syeich Khalil Annbiya",
                'email' => "syeichkhalil@gmail.com",
                'nik' => "3215013006010005",
                'phone' => "08999161805",
                'address' => "Karawang",
                'password' => Hash::make('123456789'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 2,
                'name' => "Khalil Annbiya",
                'email' => "khalilannbiya@gmail.com",
                'nik' => "3215013006010002",
                'phone' => "08999161564",
                'address' => "Karawang",
                'password' => Hash::make('123456789'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 3,
                'name' => "Indra Frimawan",
                'email' => "indrafri@gmail.com",
                'nik' => "3215013006010011",
                'phone' => "08999161564",
                'address' => "Jakarta",
                'password' => Hash::make('123456789'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
