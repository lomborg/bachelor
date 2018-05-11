<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Vinkla\Facebook\Facades\Facebook;


class FacebookController extends Controller
{

    public function login(){
    	return view('login');
    }

    public function redirect(){
    	return Socialite::driver('facebook')->redirect();
    }

    public function callback(){
    	$facebookUser = \Socialite::driver('facebook')->user();
    	$userToken = $facebookUser->token;
    	$userBusinessAccounts = Facebook::get('/me/accounts?fields=instagram_business_account', $userToken)->getDecodedBody();
    	$userBusinessAccounts = $userBusinessAccounts["data"];
 	
    	$instagramAccounts = [];
    	foreach ($userBusinessAccounts as $instagramBusiness) {
    		if (isset( $instagramBusiness['instagram_business_account'])) {
    			$instagramId = $instagramBusiness['instagram_business_account']['id'];
    			$instagramAccountInfo = Facebook::get('/'.$instagramId.'?fields=name,username,followers_count,follows_count,website', $userToken)->getDecodedBody();
    			array_push($instagramAccounts, $instagramAccountInfo);

    		}
    	}

    	
    	return view('accounts', compact('instagramAccounts'));
		dd($instagramAccounts);
    }
}
