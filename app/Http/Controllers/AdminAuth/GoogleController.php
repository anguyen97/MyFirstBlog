<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use App\Admin;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        // dd($user);
        // $user->token;
        
        $data = array(
            'email' => $user->email,
            'name' => $user->name,
            'avatar' => $user->avatar,
            'password' => md5(''),
        );
        // dd($user);
        
        //save db
        // $user = Admin::create($data);

        //admin
        $user_exist = Auth::find($user->email);
        dd($user_exist);
        $a = Auth::guard('admin')->login($user);
        // dd($a);
        // Auth::guard('admin')->loginUsingId($user->id);

        //user
        // Auth::login($a);
        return redirect()->route('admin.home');
    }
}
