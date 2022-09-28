<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ResultController extends Controller
{
    public function index() {
        return redirect()->route('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subjects($subject_id)
    {
        $data['exams'] = DB::table('exams')
            ->select('exams.*', 'subjects.name as subject_name')
            ->join('users', 'exams.user_id', '=', 'users.id')
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->ORDERBY('id', 'DESC')
            ->where('subject_id', $subject_id)
            ->get();
        // dd($data);

        return view('users.modules.subjects.index', $data);
    }

  
    public function exams(Request $request, $exam_id)
    {
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
            ->limit(10)
            ->get();
        $data['first_point'] = DB::table('results')
                                ->where('exam_id', $exam_id)
                                ->ORDERBY('point', 'DESC')
                                ->join('users', 'results.user_id', 'users.id')
                                ->first();
        $data['total_question'] = DB::table('answer_questions')->where('exam_id', $exam_id)->count();
        $data['results'] = DB::table('results')
                                ->where('exam_id', $exam_id)
                                ->ORDERBY('point', 'DESC')
                                ->join('users', 'results.user_id', 'users.id')
                                ->get();
        $data['medium_point'] = 0;
        foreach($data['results'] as $item) {
            $data['medium_point'] += $item->point;
        }
        if ($data['results']->count() != 0) {
            $data['medium_point'] /= (int)(($data['results']->count()*100)/100);
        }
        $data['medium_point'] = round($data['medium_point'] , 2);
        $data['hours'] = (int)($data['exam']->total_time / 3600);
        $data['minutes'] = (int)(($data['exam']->total_time - $data['hours'] * 3600) / 60);
        $data['seconds'] = (int)(($data['exam']->total_time - ($data['hours'] * 3600 + $data['minutes'] * 60 )) % 3600);
        // dd($data);
    return view('users.modules.exams.index', $data);
    }

    public function addSession(Request $request, $exam_id)
    {
        $data = $request->except('_token');
        $exam = DB::table('exams')->where('id', $exam_id)->first();
        session(['user_id' => 15]);
        // DB::table('sessions')->insert($data);
        return redirect()->route('users.answer_questions', ['exam_id' => $exam->id]);
    }

    public function answer_questions(Request $request, $exam_id)
    {
        if ($request->session()->has('user_id')) {
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
            $data['routecurrent'] = Route::currentRouteName();
            // dd($data);
            return view('users.modules.answer_questions.index', $data);
        }
        else {
            dd($request);
            abort(404);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request, $exam_id)
    {
        $data = $request->except('_token');
        $results['point'] = 0;
        $number = strpos("$request->time",":");
        $seconds = (int)substr("$request->time", $number + 1);
        $minutes = (int)substr($request->time, 0, $number);
        $results['history'] = json_encode($data);
        $data['exam'] = DB::table('exams')->where('id', $exam_id)->first();
        $total_time = $data['exam']->total_time;
        $results['completion_time'] = $total_time - ($minutes * 60 + $seconds);
        // dd($data);
        $data['answer_questions'] = DB::table('answer_questions')
            ->select('answer_questions.*', 'genres.name as genre_name', 'users.fullname as user_fullname', 'exams.name as exam_name')
            ->join('users', 'answer_questions.user_id', '=', 'users.id')
            ->join('genres', 'answer_questions.genre_id', '=', 'genres.id')
            ->join('exams', 'answer_questions.exam_id', '=', 'exams.id')
            ->ORDERBY('id', 'DESC')
            ->where('exam_id', $exam_id)
            ->get();
        foreach($data['answer_questions'] as $item) {
            foreach($data as $result => $key) {
                    if($item->id == $result) {
                        if($item->answer == $key) {
                            $results['point'] = $results['point'] + 1;
                        }
                    }
                }
            }
        $results['uuid'] = Auth::user()->uuid;
        $results['user_id'] = Auth::user()->id;
        $results['exam_id'] = $data['exam']->id;
        $results['created_at'] = new \DateTime;
        // dd($results);
        DB::table('results')->insert($results);
        return redirect()->route('users.deleteSession');
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

    public function deleteSession (Request $request) {
        if ($request->session()->has('user_id')) {
            $request->session()->forget('user_id');
        }
        return redirect()->route('users.transcript',['user_uuid' => Auth::user()->uuid]);
    }
}
