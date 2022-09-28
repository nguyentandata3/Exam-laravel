<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => 'Nguyen Tan Dat',
            'sex' => 1,
            'username' => 'admin',
            'email' => 'admin'.'@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '0908849314',
            'avatar' =>'123',
            'level' => 1,
            'uuid' => Str::uuid()
        ]);
    }
}
