<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\user\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin()
    {
        if(Auth::check()) {
            return redirect()->route('users.index');
        }
        return view('login');
    }

    public function postLogin(Request $request) {
        // dd($request->password);
        $data = $request->except('_token');
        $login = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::attempt($login) && Auth::user()->level == 1) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }
        elseif (Auth::attempt($login)) {
            $request->session()->regenerate();
            return redirect()->route('index')->with(['success' => 'Success Login']);
        }
        return back()->with([
            'error' => 'The provided credentials do not match our records.'
        ]);
    }

    public function logout(Request $request) {
        // dd(123);
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return view('logout');
    }

    public function getRegister() {
        return view('register');
    }

    public function postRegister(UserRequest $request) {
        // dd($request);
        $data = $request->except('_token', 'password_confirmation');
        $data['uuid'] = Str::uuid();
        $data['level'] = 2;
        $data['password'] = md5($request->password);
        $data['created_at'] = new \DateTime();

        // $imageName = time().'-'.$request->avatar->getClientOriginalName();  
        // $request->avatar->move(public_path('images'), $imageName);
        // $data['avatar'] = $imageName;
        
        DB::table('users')->insert($data);
        return redirect()->route('getLogin')->with(['success' => 'Success Create New a User']);

    }
}
