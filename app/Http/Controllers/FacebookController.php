<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class FacebookController extends Controller
{

    public function login(){
    	return view('login');
    }

    public function redirect(){
    	return Socialite::driver('facebook')->redirect();
    }

    public function callback(){
    	$providerUser = \Socialite::driver('facebook')->user();
    	dd($providerUser);
    }
}
