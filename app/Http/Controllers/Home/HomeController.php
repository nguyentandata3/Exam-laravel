<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        // dd($_SESSION['user_test']);
        if (isset($_SESSION['user_test'])) {
            unset($_SESSION['user_test']);
        }
        $data['subjects'] = DB::table('subjects')
        ->ORDERBY('id', 'DESC')
        ->get();
        foreach($data['subjects'] as $subject) {
            $data['exams'][$subject->id] = DB::table('exams')
                ->select('exams.*', 'subjects.name as subject_name')
                ->join('users', 'exams.user_id', '=', 'users.id')
                ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
                ->ORDERBY('id', 'DESC')
                ->where('subject_id',  $subject->id)
                ->get();
        }
        // dd($data);
        return view('home.index', $data);
    }

    public function subjects($subject_id)
    {
        session_start();
        // dd($_SESSION['user_test']);
        if (isset($_SESSION['user_test'])) {
            unset($_SESSION['user_test']);
        }
        $data['exams'] = DB::table('exams')
            ->select('exams.*', 'subjects.name as subject_name')
            ->join('users', 'exams.user_id', '=', 'users.id')
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->ORDERBY('id', 'DESC')
            ->where('subject_id', $subject_id)
            ->get();
        // dd($data);

        return view('home.subjects', $data);
    }

    public function exams(Request $request, $exam_id)
    {
        session_start();
        // dd($_SESSION['user_test']);
        if (isset($_SESSION['user_test'])) {
            unset($_SESSION['user_test']);
        }
        if ($request->session()->has('user_id')) {
            $request->session()->forget('user_id');
        }
        $data["exam"] = DB::table('exams')->where('id', $exam_id)->first();
        $data['answer_questions'] = DB::table('answer_questions')
            ->select('answer_questions.*', 'genres.name as genre_name', 'users.fullname as user_fullname', 'exams.name as exam_name')
            ->join('users', 'answer_questions.user_id', '=', 'users.id')
            ->join('genres', 'answer_questions.genre_id', '=', 'genres.id')
            ->join('exams', 'answer_questions.exam_id', '=', 'exams.id')
            ->inRandomOrder()
            ->where('exam_id', $exam_id)
            ->get();
            // dd($data);
        return view('home.exams', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
