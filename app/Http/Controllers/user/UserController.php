<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\user\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(Auth::user()->id);
    }

    public function profile($user_uuid) 
    {
        $data['user'] = DB::table('users')->where('uuid', $user_uuid)->first();
        // dd($data);
        return view('users.modules.profile.index', $data);
    }

    public function postProfile(Request $request, $user_uuid)
    {
        $user_current = DB::table('users')->where('uuid', $user_uuid)->first();
        $data = $request->except('_token');

        if(empty($request->avatar)) {
            $data['avatar'] = $user_current->avatar;
        } else {
            $image_path = public_path('images') . '/' . $user_current->avatar;
            // if(($image_path)) {
            //     unlink($image_path);
            // }
            $avatar = time().'-'.$request->avatar->getClientOriginalName();  
            $request->avatar->move(public_path('images'), $avatar);
            $data['avatar'] = $avatar;
        }
        $data['updated_at'] = new \DateTime();
        // dd($data);
        DB::table('users')->where('uuid', $user_uuid)->update($data);
        return redirect()->route('users.profile', ['user_uuid' => $user_uuid])->with(['success' => 'Thay đổi thông tin cá nhân thành công']);
    }

    public function getChangePassword($user_uuid) 
    {
        $data['user'] = DB::table('users')->where('uuid', $user_uuid)->first();
        $data["i"] = 0;
        $data["i"]++;
        return view('users.modules.profile.changepassword', $data);
    }

    
    public function postChangePassword(Request $request, $user_uuid) 
    {
        $login = [
            'username' => Auth::user()->username,
            'password' => $request->old_password,
        ];
        if(Auth::attempt($login)) {
            $data['password'] = Hash::make($request->new_password);
            DB::table('users')->where('uuid', $user_uuid)->update($data);
            return redirect()->back()->with(['success' => 'Mật khẩu đã được thay đổi']);
        }
        return redirect()->back()->with(['alert' => 'Đổi mật khẩu thất bại. Vui lòng kiểm tra lại thông tin']);

    }

    public function transcript($user_uuid) 
    {
        $data['results'] = DB::table('results')
            ->select('results.*', 'exams.name as exam_name', 'users.fullname as user_fullname', 'subjects.name as subject_name')
            ->join('users', 'results.user_id', '=', 'users.id')
            ->join('exams', 'results.exam_id', '=', 'exams.id')
            ->join('subjects', 'exams.subject_id', '=' , 'subjects.id')
            ->where('results.uuid', $user_uuid)
            ->orderBy('id', 'DESC')
            ->get();
        // dd($data);
        return view('users.modules.profile.transcript', $data);
    }

    public function history($history_id) {
        $data['results'] = DB::table('results')
            ->select('results.*', 'exams.name as exam_name', 'users.fullname as user_fullname', 'subjects.name as subject_name')
            ->join('users', 'results.user_id', '=', 'users.id')
            ->join('exams', 'results.exam_id', '=', 'exams.id')
            ->join('subjects', 'exams.subject_id', '=' , 'subjects.id')
            ->where('results.id', $history_id)
            ->first();
        $data['exams'] = DB::table('exams')->where('id', $data['results']->exam_id)->first();
        $data['first_point'] = DB::table('results')
                                ->where('exam_id', $data['exams']->id)
                                ->ORDERBY('point', 'DESC')
                                ->join('users', 'results.user_id', 'users.id')
                                ->first();
        $data['total_question'] = DB::table('answer_questions')->where('exam_id',$data['results']->exam_id)->count();
        $data['answer_questions'] = DB::table('answer_questions')
            ->select('answer_questions.*', 'genres.name as genre_name', 'users.fullname as user_fullname', 'exams.name as exam_name')
            ->join('users', 'answer_questions.user_id', '=', 'users.id')
            ->join('genres', 'answer_questions.genre_id', '=', 'genres.id')
            ->join('exams', 'answer_questions.exam_id', '=', 'exams.id')
            ->where('exam_id', $data['exams']->id)
            ->get();
        // dd($data);
        return view('users.modules.profile.history', $data);
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
    public function store(UserRequest $request)
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
