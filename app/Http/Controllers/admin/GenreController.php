<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\admin\GenreRequest;


class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['genres'] = DB::table('genres')
            ->ORDERBY('id', 'DESC')
            ->get();
        
        return view('admin.modules.genres.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = 1;
        $data['created_at'] = new \DateTime();
        DB::table('genres')->insert($data);
        return redirect()->route('admin.genres.index');
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
        $subjects = DB::table('genres')->where('id', $id);
        if($subjects->exists()) {
            $data['genres'] = $subjects->first();
            return view("admin.modules.genres.edit", $data);
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
    public function update(GenreRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
        DB::table('genres')->where('id', $id)->update($data);

        return redirect()->route('admin.genres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genres = DB::table('genres')->where('id', $id);
        if($genres->delete()) {
            return redirect()->route('admin.genres.index');
        }
        else {
            abort(404);
        }
    }
}
