<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailnotify;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SendemailRequest;
use Illuminate\Support\Facades\Hash;
use Exception;

class MailController extends Controller
{
    public function getSendemail() 
    {
        return view('emails.index');
    }
    
    public function postSendemail(SendemailRequest $request) 
    {
        try
        {
            $password = str_shuffle('qwertyuuiopasdfghjkl123456789');
            $data['password'] = Hash::make($password);
            $user = DB::table('users')->where('email', $request->email)->update($data);
            Mail::to("$request->email")->send(new Mailnotify($password));
            return redirect()->route('getLogin')->with(['success' => 'Mật khẩu mới đã được gửi tới email của bạn']);
        }
        catch (Exception $th)
        {
            return response()->json('Gửi email thất bại. Vui lòng kiểm tra lại email');
        }
    }

    public function successemail() 
    {
        return view('emails.successemail');
    }
}
