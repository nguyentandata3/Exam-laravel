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
            'name' => 'Đề thi HK2 môn Tiếng Anh 12 năm 2021-2022',
            'total_time' => '3600',
            'limit' => '3',
            'subject_id' => 1,
            'user_id' => 1
        ];
        DB::table('exams')->insert($data);
    }
}
