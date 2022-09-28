<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = [
            'name' => 'Math',
            'total_time' => '10000',
            'limit' => '3',
            'subject_id' => 1,
            'user_id' => 1
        ];
        $data[] = [
            'name' => 'Math 2022',
            'total_time' => '12000',
            'limit' => '3',
            'subject_id' => 1,
            'user_id' => 1
        ];
        $data[] = [
            'name' => 'Math abc',
            'total_time' => '11000',
            'limit' => '3',
            'subject_id' => 1,
            'user_id' => 1
        ];
        DB::table('exams')->insert($data);
    }
}
