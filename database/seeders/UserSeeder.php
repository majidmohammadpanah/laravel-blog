<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => "Majid Mohammadpanah",
            'level' => 'superuser',
            'email' => 'majidmohammadpanah@gmail.com',
            'email_verified_at' => Carbon::now(),
            'username' => 'majidmohammadpanah',
            'password' => Hash::make('wo5nrxqu'),
            'profile_photo_path' => 'https://ui-avatars.com/api/?name='.'Majid Mohammadpanah'.'&color=7F9CF5&background=EBF4FF',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
