<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index() {
        $data['contact'] = DB::table('feedbacks')->ORDERBY('id', 'DESC')->get();
        // dd($data);
        return view('admin.modules.contact.index',$data);
    }
}
