<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Vinkla\Facebook\Facades\Facebook;
use App\User;
use Auth;


class GraphController extends Controller
{
	public function index(){
		//Check if user is logged in
		if (Auth::check()) {
    		// The user is logged in...
    		$user = Auth::User();
    		return view('welcome');
		} else {
			// If not logged in
			return redirect()->route('login');
		}
	}

    public function login(){
    	return view('login');
    }

    public function redirect(){
    	return Socialite::driver('facebook')->redirect();
    }

    public function callback(){
    	$graphUser = \Socialite::driver('facebook')->user();
    	$authUser = $this->findOrCreateUser($graphUser);
    	Auth::login($authUser, true);
    	return redirect()->route('home');
    	dd($authUser);

    	/*$userToken = $graphUser->token;
    	$userBusinessAccounts = Facebook::get('/me/accounts?fields=instagram_business_account', $userToken)->getDecodedBody();
    	$userBusinessAccounts = $userBusinessAccounts["data"];
 	
    	$instagramAccounts = [];
    	foreach ($userBusinessAccounts as $instagramBusiness) {
    		if (isset( $instagramBusiness['instagram_business_account'])) {
    			$instagramId = $instagramBusiness['instagram_business_account']['id'];
    			$instagramAccountInfo = Facebook::get('/'.$instagramId.'?fields=name,username,followers_count,follows_count,website', $userToken)->getDecodedBody();
    			array_push($instagramAccounts, $instagramAccountInfo);

    		}
    	}*/

    	return view('accounts', compact('instagramAccounts'));
    }



    public function test(){
		
		$user = Auth::User();
    	$graphUserToken = $user->graph_user_token;
    	$userBusinessAccounts = Facebook::get('/me/accounts?fields=instagram_business_account', $graphUserToken)->getDecodedBody();
    	$userBusinessAccounts = $userBusinessAccounts["data"];
 	
    	$instagramAccounts = [];
    	foreach ($userBusinessAccounts as $instagramBusiness) {
    		if (isset( $instagramBusiness['instagram_business_account'])) {
    			$instagramId = $instagramBusiness['instagram_business_account']['id'];
    			$instagramAccountInfo = Facebook::get('/'.$instagramId.'?fields=name,username,followers_count,follows_count,website', $graphUserToken)->getDecodedBody();
    			array_push($instagramAccounts, $instagramAccountInfo);

    		}
    	}

    	return view('accounts', compact('instagramAccounts'));

    }


	public function findOrCreateUser($user)
    {
        $authUser = User::where('graph_user_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }

        $newUser= User::create([
            'name' => $user->name,
            'email' => $user->email,
            'graph_user_id' => $user->id,
            'graph_user_token' => $user->token
        ]);

        return $newUser;
    }

    public function instagramInfo(){
		$user = Auth::User();
		$graphUserToken =  $user->graph_user_token;
		$graphInstagramId = $user->graph_instagram_id;

		$instagramAccountInfo = Facebook::get('/'.$graphInstagramId.'/insights?metric=impressions,reach,profile_views&period=day', $graphUserToken)->getDecodedBody();
		dd($instagramAccountInfo);

    }
}
