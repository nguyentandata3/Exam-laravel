<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\admin\ExamRequest;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subject_id)
    {
        $data['exams'] = DB::table('exams')
            ->select('exams.*', 'subjects.name as subject_name', 'users.fullname as user_fullname')
            ->join('users', 'exams.user_id', '=', 'users.id')
            ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
            ->ORDERBY('id', 'DESC')
            ->where('subject_id', $subject_id)
            ->get();
        // dd($data);
        return view('admin.modules.exams.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['subjects'] = DB::table('subjects')->get();
        return view('admin.modules.exams.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRequest $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = 1;
        $data['created_at'] = new \DateTime();
        // dd($data);
        DB::table('exams')->insert($data);
        return redirect()->route('admin.exams.index', ['subject_id' => $request->subject_id]);
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
        $exams = DB::table('exams')->where('id', $id);
        if($exams->exists()) {
            $data['exams'] = $exams->first();
            return view("admin.modules.exams.edit", $data);
        }
        else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        $subject_id = DB::table('exams')->where('id', $id)->first()->subject_id;
        $exam = DB::table('exams')->where('id', $id)->update($data);
        return redirect()->route('admin.exams.index', ['subject_id' => $subject_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $results = DB::table('results')->where('exam_id', $id)->delete();
        $answer_questions = DB::table('answer_questions')->where('exam_id', $id)->get();
        $exams = DB::table('exams')->where('id', $id);
        $subject_id = DB::table('exams')->where('id', $id)->first()->subject_id;
        if($exams->delete()) {
            return redirect()->route('admin.exams.index', ['subject_id' => $subject_id]);
        }
        else {
            abort(404);
        }
    }
}
