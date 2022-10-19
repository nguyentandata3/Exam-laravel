<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = [
            'name' => 'Trắc nghiệm',
            'user_id' => 1
        ];
        $data[] = [
            'name' => 'Điền vào chỗ trống',
            'user_id' => 1
        ];
        DB::table('genres')->insert($data);
    }
}
