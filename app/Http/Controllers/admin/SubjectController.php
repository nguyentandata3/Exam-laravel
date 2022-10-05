<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\SubjectRequest;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subjects'] = DB::table('subjects')
            ->ORDERBY('id', 'DESC')
            ->get();
        return view('admin.modules.subjects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = 1;
        $data['created_at'] = new \DateTime();
        DB::table('subjects')->insert($data);
        return redirect()->route('admin.subjects.index');
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
        $subjects = DB::table('subjects')->where('id', $id);
        if($subjects->exists()) {
            $data['subjects'] = $subjects->first();
            return view("admin.modules.subjects.edit", $data);
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
    public function update(SubjectRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        DB::table('subjects')->where('id', $id)->update($data);

        return redirect()->route('admin.subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subjects = DB::table('subjects')->where('id', $id);
        $exam = DB::table('exams')->where('subject_id', $id)->get();
        foreach($exam as $item) {
            DB::table('answer_questions')->where('exam_id', $item->id)->delete();
            DB::table('results')->where('exam_id', $item->id)->delete();
        }
        DB::table('exams')->where('subject_id', $id)->delete();
        if($subjects->delete()) {
            return redirect()->route('admin.subjects.index');
        }
        else {
            abort(404);
        }
    }
}
