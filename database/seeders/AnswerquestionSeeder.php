<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AnswerquestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = [
            'question' => '{"question":"question 1","a":"dap an 1","b":"dap an 2","c":"dap an 3","d":"dap an 4"}',
            'answer' => 'a',
            'level' => '1',
            'genre_id' => 1,
            'exam_id' => 1,
            'user_id' => 1
        ];
        $data[] = [
            'question' => '{"question":"question 2","a":"dap an 11","b":"dap an 22","c":"dap an 33","d":"dap an 44"}',
            'answer' => 'c',
            'level' => '2',
            'genre_id' => 1,
            'exam_id' => 2,
            'user_id' => 1
        ];
        $data[] = [
            'question' => '{"question":"question 3","a":"dap an 111","b":"dap an 222","c":"dap an 333","d":"dap an 444"}',
            'answer' => 'd',
            'level' => '3',
            'genre_id' => 1,
            'exam_id' => 2,
            'user_id' => 1
        ];
        DB::table('answer_questions')->insert($data);
    }
}
