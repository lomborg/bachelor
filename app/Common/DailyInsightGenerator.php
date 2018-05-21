<?php 

namespace App\common;

use Config;
use Storage;
use Vinkla\Facebook\Facades\Facebook;
use App\DailyInsight;


/**
* 
*/
class DailyInsightGenerator
{
	public static function generate($user)
	{
		$graphUserToken =  $user->graph_user_token;
		$graphInstagramId = $user->graph_instagram_id;

		$instagramAccountInfo = Facebook::get('/'.$graphInstagramId.'/insights?metric=impressions,reach,profile_views&period=day', $graphUserToken)->getDecodedBody();
		$insights = $instagramAccountInfo['data'];

		$newInsights = DailyInsight::create([
            'user_id' => $user->id,
            'graph_instagram_id' => $user->graph_instagram_id,
            'reach' => $insights[1]['values'][0]['value'],
            'impressions' => $insights[0]['values'][0]['value'],
            'profile_views' => $insights[2]['values'][0]['value'],
            'end_time' => $insights[0]['values'][0]['end_time']
        ]);
        
	}
	
}






 ?>