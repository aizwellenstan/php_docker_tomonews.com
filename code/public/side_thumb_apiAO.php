<?php 
function insert_breakingNews($num){
    global $menuAry;
    global $thumaType ;
    global $PAGE ; 
    global $NSFW_v; 
    global $NSFW; 
    $k = 0;

	// $getUrls = get_playlistinfo(255);
	// $player_info = curl_info($getUrls, LIST_PLAYER);
	// $dAry= simplexml_load_string($player_info);
	// $dAry=json_encode($dAry);
	// $dAry=json_decode($dAry, true);
	// $listTitle = trim($dAry['params']['playlist_list']['playlist']['description']);

	// $getUrls3 = APPLICATION_FEED_URL.'KSIWPX4ZPE3ARGAKBB?start=0&count='.($num + 1).'&sort=c_ts_publish_l+desc';
	$getUrls3 = "https://cms.nextanimation.com.tw/api/getBreakingNews?program=TomoNews%20US&keyword=trump&counts=5";
	$data3 = curl_info($getUrls3, null);
    $dAry3 = json_decode($data3, true);
    $dAryn3 = $dAry3['docs'];

    
    // $bk_title = strtoupper($listTitle);
    $listTitle = "TRUMP IN OFFICE";
	$bk_title = "TRUMP IN OFFICE";    
    //$kw = $dAryn3['pager']['list'][0]['playlist']['title'];
    $kw2 = urlencode($listTitle);

    $link_a = THIS_SITE."tags.php?kw=".$kw2;//"'".THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id."'";
    $link_gt ='trackOutboundLink(\''.$PAGE.'\' ,\'clk\' , \''.$PAGE.'_'.$thumaType.'\' ,\''.$link_a.'\')';

    if(count($dAryn3) >1){
		echo '<div class="mov_list" >'; 
		echo '<a href="'. $link_a .'"  onclick="'.htmlentities($link_gt , ENT_QUOTES ).';return false;"><div class="right-side-title"><div>'. $bk_title.'</div></div></a>'; 
		//$i=0;
		$k = 0;
		foreach ($dAryn3 as $key => $value) {
			//if( $i>=$num)break;
			if( isset($_GET['video_id']) && ($value['obj_id'] == $_GET['video_id']) ) continue;
			//$dArynCat=$value['tags'][0]['tag']; 
			$NSFW_v = false;
			$headline=array('tit'=>$value ['c_title_s']);
			$thumbnail = $value['thumbnails'];

			if( isset($value['u_NSFW_Tag_s']) && $value['u_NSFW_Tag_s']=='NSFW' ){  $NSFW_v = true; }
	
			// foreach ($thumbnail as $key => $value1) {
				
			// 	if ( isset($value1['role']) && $value1['role']=='poster' ) {  $thumb = $value1['url']; break; }
			// 	else if( isset($value1['role']) && $value1['role']=='square' && $value1['width'] == '1000' ){  $thumb = $value1['url']; break; }
			// }		
			 
			// $thumb = preg_replace('#^http?:#', '', $thumb);
			$thumb =  $thumbnail['url'];
			$CatIndex=0;
			$cate_name=array_search( $CatIndex, $menuAry ); 
			if($cate_name=='NMA Originals')
			{
				$cate_id=$menuAry['Tomo Originals'];
				$cate_name='Tomo Originals';
			}
			else
				$cate_id=0; 
			
			if($cate_name !='Chinese' && $k < $num){  
			
				$k++;
				show_trend_contentO($value['obj_id'], /*$cate_id, $cate_name ,*/$headline,$value['c_ts_publish_l'],$thumb);
			}
			//$i++;
			
		}
        echo '</div>';
	}
}

function insert_Relatives($topic, $num){
	global $menuAry; 
	global $thumaType ;
	global $PAGE ; 
	global $NSFW_v; 
    global $NSFW; 
    $k = 0;
	
	$bk_title = strtoupper ($topic);
 
	$SUB_CATENAME= ($topic);
	$kw2=rawurlencode($SUB_CATENAME);

	$sdate='';
	$edate='';
	$getUrls = APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?start=0&count='.($num + 1 ).'&filters[]=u_Topic_Tag_smv:"'.$kw2.'"&sort=c_ts_publish_l+desc';
	$data = curl_info($getUrls, null);
	$dAry3 = json_decode($data, true);
	$dAryn3 = $dAry3['docs'];
	$total = $dAry3['numFound'];
	if( $total <= $num) { insert_breakingNews($num); }
    else {
		$kw2=urlencode($topic);
		$link_a = THIS_SITE."tags.php?kw=".$kw2;//"'".THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id."'";
		$link_gt ='trackOutboundLink(\''.$PAGE.'\' ,\'clk\' , \''.$PAGE.'_'.$thumaType.'\' ,\''.$link_a.'\')';

		echo '<div class="mov_list" >'; 
		echo '<a href="'. $link_a .'"  onclick="'.htmlentities($link_gt , ENT_QUOTES ).';return false;"><div class="right-side-title"><div>'. $bk_title.'</div></div></a>'; 
		//$i=0;               
		foreach ($dAryn3 as $key => $value) {
			//if( $i>=$num)break;
			if($value['obj_id'] == $_GET['video_id']) continue;
			//$dArynCat=$value['tags'][0]['tag']; 
			$NSFW_v = false;
			$headline=array('tit'=>$value ['c_title_s']);
			$thumbnail = $value['thumbnails'];
			
			if( isset($value['u_NSFW_Tag_s']) && $value['u_NSFW_Tag_s']=='NSFW' ){  $NSFW_v = true; }
				
			foreach ($thumbnail as $key => $value1) {
				
				if ( isset($value1['role']) && $value1['role']=='poster' ) {  $thumb = $value1['url']; break; }
				else if( isset($value1['role']) && $value1['role']=='square' && $value1['width'] == '1000' ){  $thumb = $value1['url']; break; }
				//else { $thumb=$value['thumbnails'][0]['url']; break; }
			}		
			 
			$thumb = preg_replace('#^http?:#', '', $thumb);
			 
			$CatIndex=$value['c_category_smv'][0];
            $cate_name=array_search( $CatIndex, $menuAry );
            
			if($cate_name=='NMA Originals')
            {
				$cate_id=$menuAry['Tomo Originals'];
				$cate_name='Tomo Originals';
            }
            else
				$cate_id=$CatIndex; 
            
			if($cate_name !='Chinese' && $k < $num){  
			
				$k++;
				show_trend_contentO($value['obj_id'], /*$cate_id, $cate_name ,*/$headline,$value['c_ts_publish_l'],$thumb);
			}
			//$i++;
            //$mobile_headline  =$value ['title'];
           
		}
        echo '</div>';
    }
}
?>
