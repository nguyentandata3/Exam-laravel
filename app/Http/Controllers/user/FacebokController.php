<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function facebookCallback()
    {
        try {
                $user = Socialite::driver('facebook')->user();
                $finduser = User::where('facebook_id',$user->getId())->first();
                if($finduser)
                {
                    Auth::login($finduser);
                    return redirect()->intended('dashboard');
                }
                else{
                    $newUser = User::updatedOrCreate(['email'=>$user->getEmail(),'name'=>$user->getName(),'password'=>encrypt('12345678'),'facebook_id'=>$user->getId()]);
                    Auth::login($newUser);
                    return redirect()->intended('dashboard');
                }
        }
        catch (\Exception $exception)
        {
            dd($exception->getMessage());die;
        }
    }
}