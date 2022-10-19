<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\user\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Mail\Verify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function getLogin()
    {
        if(Auth::check() && Auth::user()) {
            return redirect()->route('index');
        }
        return view('login');
    }

    public function postLogin(Request $request) {
        // dd($request);
        $data = $request->except('_token');
        $login = [
            'username' => $request->username,
            'password' => ($request->password),
        ];
        // dd($login);
        if (Auth::attempt($login)) {
            if(Auth::user()->level == 1) {
                $request->session()->regenerate();
                return redirect()->route('admin.index');
            }
            elseif(Auth::user()->email_verified_at != null) {
                $request->session()->regenerate();
                return redirect()->route('index');
            }
            else {
                Auth::logout();
 
                $request->session()->invalidate();
            
                $request->session()->regenerateToken();

                return back()->with([
                    'error' => 'Vui lòng xác nhận email trước khi đăng nhập.'
                ]);
            }
        }
        return back()->with([
            'error' => 'Tài khoản hoặc mật khẩu không chính xác'
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return view('logout');
    }

    public function getRegister() {
        return view('register');
    }

    public function verify(LoginRequest $request)
    {
        $data = $request->except('_token', 'password_confirmation');
        $data['uuid'] = Str::uuid();
        $data['level'] = 2;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = new \DateTime();
        DB::table('users')->insert($data);
        try
        {
            event(new Registered($data));
            Mail::to($request->email)->send(new Verify($data['uuid']));
            return redirect()->route('getLogin')->with(['success' => 'Vui lòng đăng nhập email xác nhận tài khoản.']);
        }
        catch (Exception $th)
        {
            return response()->json('Gửi email thất bại. Vui lòng kiểm tra lại email');
        }

        // $imageName = time().'-'.$request->avatar->getClientOriginalName();  
        // $request->avatar->move(public_path('images'), $imageName);
        // $data['avatar'] = $imageName;
        
        return redirect()->route('getLogin')->with(['success' => 'Tạo thành công tài khoản. Vui lòng xác nhận Email']);
    }

    public function successverify()
    {
        return view('emails.successverify');
    }

    public function finishverify($uuid)
    {
        $user = DB::table('users')->where('uuid', $uuid)->first();
        if($user->email_verified_at == null) {
            $data['email_verified_at'] = new \Datetime;
            DB::table('users')->where('uuid', $uuid)->update($data);
            return redirect('login')->with(['success' => 'Xác thực email thành công. Vui lòng đăng nhập']);
        }
        else {
            return redirect('login');
        }
    }
}
