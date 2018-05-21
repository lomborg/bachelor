<?php 


namespace App\common;

use Config;
use Storage;
use Vinkla\Facebook\Facades\Facebook;




/**
* 
*/
class InstagramWidgetGenerator
{
	public static function generate($user)
	{
		
		$instagramMediaInfo = Facebook::get('/'.$user->graph_instagram_id.'/media?fields=media_type,media_url,permalink,like_count,comments_count,caption', $user->graph_user_token)->getDecodedBody();
		$media = $instagramMediaInfo['data'];
		$feed = [];

		foreach ($media as $img) {
			array_push($feed, $img);
		}

        $columnsenv = 5;
    	$rowsenv = 4;
   		$image_wrapenv = 1;
        
		for ($columns = 1; $columns < $columnsenv+1; $columns++) { 
			for ($rows = 1; $rows < $rowsenv+1; $rows++) { 
				for ($image_wrap = 0; $image_wrap < $image_wrapenv+1; $image_wrap++) {
					$html = view('instagram.'.$columns, compact('feed', 'columns', 'rows', 'image_wrap'))->render();
					Storage::put('instagramwidgets/'.$user->id.'/'.$columns.'/'.$rows.'/'.$image_wrap.'/'.$user->graph_instagram_id.'.html', $html);
				}
			}
		}

        
	}
	
}






 ?>