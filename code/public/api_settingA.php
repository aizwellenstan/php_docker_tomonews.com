<?php 
$ts = time();

function curl_info($url, $req) { //anvato
    $ch = curl_init($url);
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	
	if ($req != ''){
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array ( "Content-Type: application/xml" ) );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $req );
	}
	
 
	$data = curl_exec($ch);
	curl_close($ch);
    unset($ch);unset($url);
    return $data;
	
	
	/*$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $data = curl_exec($ch);
	    curl_close($ch);
	    unset($ch);unset($url);
	    return $data;*/
}

function generate_hash($xml){ //anvato
	return base64_encode( hash_hmac( HASHING_ALGORITHM, $xml, APPLICATION_PRIVATE, true ) );
}

function convert_xml_in_array($data){ //anvato
	
	$array_data = simplexml_load_string( $data, 'SimpleXMLElement', LIBXML_NOCDATA);
	return json_decode(json_encode((array)$array_data), TRUE);
}

function get_playlistinfo($playlist){//anvato
	
	$ts=$GLOBALS['ts'];
	$str = LIST_PLAYER;
	$xml = $str.$ts;
	$hash= generate_hash($xml); 
	$getUrls=APPLICATION_URL.'ts='.$ts.'&sgn='.urlencode($hash).'&id='.APPLICATION_PUBLIC.'&playlist_id='.$playlist;
	return $getUrls;
	unset($getUrls);
}

function get_videoshow($video_id){//anvato
	
	$ts=$GLOBALS['ts'];
	$str = LIST_VIDEOS;
	$xml = $str.$ts;
	$hash= generate_hash($xml); 
	$getUrls=APPLICATION_URL.'ts='.$ts.'&sgn='.urlencode($hash).'&id='.APPLICATION_PUBLIC.'&filter_by[]=video_id&filter_cond[]=%3d%3d&filter_value[]='.$video_id;
	return $getUrls;
	unset($getUrls);
}

function get_video_images($video_id){//anvato

	$ts=$GLOBALS['ts'];
	$str = LIST_VIDEO_IMAGES;
	$xml = $str.$ts;
	$hash= generate_hash($xml); 
	$getUrls=APPLICATION_URL.'ts='.$ts.'&sgn='.urlencode($hash).'&id='.APPLICATION_PUBLIC.'&upload_id='.$video_id;
	return $getUrls;
	unset($getUrls);
}

function get_list_videos_by_cat($cat_id){//anvato

	$ts=$GLOBALS['ts'];
	$str = LIST_VIDEOS;
	$xml = $str.$ts;
	$hash= generate_hash($xml); 
	$getUrls=APPLICATION_URL.'ts='.$ts.'&sgn='.urlencode($hash).'&id='.APPLICATION_PUBLIC.'&filter_by[]=category_id&filter_cond[]=%3d%3d&filter_value[]='.$cat_id;
	return $getUrls;
	unset($getUrls);
}

function get_next_video($sdate, $edate, $cat_id){//anvato
	
	$ts=$GLOBALS['ts'];
	$str = LIST_VIDEOS;
	$xml = $str.$ts;
	$hash= generate_hash($xml); 
	$getUrls=APPLICATION_URL.'ts='.$ts.'&sgn='.urlencode($hash).'&id='.APPLICATION_PUBLIC.'&filter_by[]=category_id&filter_cond[]=%3d%3d&filter_value[]='.$cat_id.'&filter_by[]=pub_date&filter_cond[]=ge&filter_value[]='.$sdate.'&filter_by[]=pub_date&filter_cond[]=le&filter_value[]='.$edate;
	return $getUrls;
	unset($getUrls);
}


function get_list_categories(){//anvato

	$ts=$GLOBALS['ts'];
	$str = LIST_CATEGORIES;
	$xml = $str.$ts;
	$hash= generate_hash($xml); 
	$getUrls=APPLICATION_URL.'ts='.$ts.'&sgn='.urlencode($hash).'&id='.APPLICATION_PUBLIC;
	return $getUrls;
	unset($getUrls);

}

function get_CategoryList($Category_id,$page,$pagesize){ //anvato
	$ts=$GLOBALS['ts'];
	$str = LIST_VIDEOS;
	$xml = $str.$ts;
	$hash= generate_hash($xml); 
	$getUrls=APPLICATION_URL.'ts='.$ts.'&sgn='.urlencode($hash).'&id='.APPLICATION_PUBLIC.'&filter_by[]=category_id&filter_cond[]=%3d%3d&filter_value[]='.$Category_id.'&page_no='.$page.'&page_sz='.$pagesize.'&sort_by=pub_date';
	return $getUrls;
	unset($getUrls);
}

function show_trend_content_v($video_id,/*$cateID,$cateName,*/$title,$cdate){ //anvato
		global $thumaType ;
        global $PAGE ;
        global $NSFW_v; 
         global $NSFW; 
        
        $link_a = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title['tit']))).'-'.$video_id.'#c='.$PAGE.'&a=clk&l='.$PAGE.'_'.$thumaType;
		$thumb = $title['thumb'];
        //$link_gt ='GT(\''.$PAGE.'\' ,\'clk\' , \''.$PAGE.'_'.$thumaType.'\')';//'".$PAGE."' ,'clk' , '".$PAGE."_".$thumaType."'
        //$link_gt ='trackOutboundLink(\''.$PAGE.'\' ,\'clk\' , \''.$PAGE.'_'.$thumaType.'\' ,\''.$link_a.'\')';
		$video_box='';		
		//$video_box.='<a href="'. $link_a .'"  onclick="'.htmlentities($link_gt , ENT_QUOTES ).';return false;">';
		$video_box.='<a href="'. $link_a .'" >';
		$video_box.='<div class="mov" style="width:310px;height:170px;margin:0 auto;position:relative;">';
		$video_box.='<div class="movlabel" style="width:182px;width:182px;margin-left:0px;">';
		if(!$NSFW_v || !$NSFW)
		{

            if($NSFW_v)
            {	
                
            	$video_box.='<div style="position:relative;width:128px;height:128px;overflow:hidden;display:block;">            				             
            				             <img src="'.THIS_SITE.TB_TEST.'" width="228" height="128" style="position:absolute;top:0px;left:-50px;">
            				             <img  id="pic_128" src="'.THIS_SITE.TB_TEST.'" width="128" height="128" style="position:absolute;top:0px;left:0px;">
            				             </div>';
            }
			else
			$video_box.='<div style="position:relative;width:128px;height:128px;overflow:hidden;display:block;">				             
				             <img src="'.$thumb.'" width="228" height="128" style="position:absolute;top:0px;left:-50px;">
				             <img  id="pic_128" src="'.$thumb.'" width="128" height="128" style="position:absolute;top:0px;left:0px;">
				             </div>';
	    }
		else
        $video_box.='<div style="position:relative;width:128px;height:128px;overflow:hidden;display:block;">		             
		             <img  id="pic_128" src="'.$thumb.'" width="128" height="128" style="position:absolute;top:0px;left:0px;">
		             </div>';


		//$video_box.='<div class="w'.$cateID.' ml1" style="display:block;width:125px;height:27px;color:#FFFFFF;text-transform:uppercase;font-weight:bolder;margin:0; padding:0px;font-size:12px;">'.$cateName.'</div>';
        $video_box.='</div>';
        $video_box.='<div class="minfo" style="width:166px;height:165px;display:inline-block;position:absolute;top: 0px;left: 123px;font-size: 18px;font-weight: bold; line-height:21px;padding-left: 15px;"><p>';
		$video_box.= $title['tit'];
		$video_box.='</p></div>';
		$video_box.='</div>';
		$video_box.='</a>';
		return $video_box;
		unset($video_box);unset($path);
}

function category_id2name($id,$topmenu){ //anvato
	$category_name='';
	foreach( $topmenu as $tmv ){
            
            if($tmv[1]==$id){
            	$category_name=$tmv[0];
            }
    }

    if($category_name!=''){
    	return $category_name;
    }else{
    	?><script>location.href=<?php  THIS_SITE ?>;</script><?php 
    }
    unset($category_name);
}

function get_60daysList($page,$pagesize,$sdate,$edate){ //anvato
	if($sdate!=''&&$edate!=''){
		$d='&filter_by[]=pub_date&filter_cond[]=ge&filter_value[]='.$sdate.'&filter_by[]=pub_date&filter_cond[]=le&filter_value[]='.$edate;
	}	
	$ts=$GLOBALS['ts'];
	$str = LIST_VIDEOS;
	$xml = $str.$ts;
	$hash= generate_hash($xml); 
	$getUrls=APPLICATION_URL.'ts='.$ts.'&sgn='.urlencode($hash).'&id='.APPLICATION_PUBLIC.$d.'&page_no='.$page.'&page_sz='.$pagesize;
	return $getUrls;
	unset($getUrls);
}

function show_trend_content($video_id,/*$cateID,$cateName,*/$title,$cdate,$thumb){ //anvato
        global $thumaType ;
        global $PAGE ; 
        global $NSFW_v;
        global $NSFW; 
        $link_a = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title['tit']))).'-'.$video_id.'#c='.$PAGE.'&a=clk&l='.$PAGE.'_'.$thumaType;
        //$link_gt ="GT('".$PAGE."' ,'clk' , '".$PAGE."_".$thumaType."')";
        //$link_gt ='trackOutboundLink(\''.$PAGE.'\' ,\'clk\' , \''.$PAGE.'_'.$thumaType.'\' ,\''.$link_a.'\')';
		$video_box='';		
		//$video_box.='<a href="'. $link_a .'"  onclick="'.htmlentities($link_gt , ENT_QUOTES ).';return false;">';		
		$video_box.='<a href="'. $link_a .'"  >';		
		$video_box.='<div class="mov">';
		$video_box.='<div class="movlabel" style="width:182px;width:182px;margin-left:0px;">';
		
		if(!$NSFW_v || !$NSFW)
		{
            if($NSFW_v)
            $video_box.='<div style="position:relative;width:128px;height:128px;overflow:hidden;display:block;">
			             
			             <img src="'.THIS_SITE.SQ_TEST.'" width="228" height="128" style="position:absolute;top:0px;left:-50px;">
			             <img  id="pic_128" src="'.THIS_SITE.SQ_TEST.'" width="128" height="128" style="position:absolute;top:0px;left:0px;">
			             </div>';
            else
			$video_box.='<div style="position:relative;width:128px;height:128px;overflow:hidden;display:block;">
				         <img src="'.$thumb.'" width="228" height="128" style="position:absolute;top:0px;left:-50px;">
				         <img  id="pic_128" src="'.$thumb.'" width="128" height="128" style="position:absolute;top:0px;left:0px;">
				         </div>';
		}
		else	
		$video_box.='<div style="position:relative;width:128px;height:128px;overflow:hidden;display:block;">
		             <img  id="pic_128" src="'.$thumb.'" width="128" height="128" style="position:absolute;top:0px;left:0px;">
		             </div>';



		//$video_box.='<div class="w'.$cateID.' ml1" style="display:block;width:125px;height:27px;color:#FFFFFF;text-transform:uppercase;font-weight:bolder;margin:0; padding:0px;font-size:12px;">'.$cateName.'</div>';
        $video_box.='</div>';
        $video_box.='<div class="minfo"><p>';
		$video_box.= $title['tit'];
		$video_box.='</p></div>';
		$video_box.='</div>';
		$video_box.='</a>';
		echo $video_box;
		unset($video_box);unset($path);
}

function show_trend_contentO($video_id,/*$cateID,$cateName,*/$title,$cdate,$thumb){ //anvato
        global $thumaType ;
        global $PAGE ; 
        global $NSFW_v;
        global $NSFW; 
        $link_a = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title['tit']))).'-'.$video_id.'#c='.$PAGE.'&a=clk&l='.$PAGE.'_'.$thumaType;
        //$link_gt ="GT('".$PAGE."' ,'clk' , '".$PAGE."_".$thumaType."')";
        //$link_gt ='trackOutboundLink(\''.$PAGE.'\' ,\'clk\' , \''.$PAGE.'_'.$thumaType.'\' ,\''.$link_a.'\')';
		$video_box='';		
		//$video_box.='<a href="'. $link_a .'"  onclick="'.htmlentities($link_gt , ENT_QUOTES ).';return false;">';		
		$video_box.='<a href="'. $link_a .'"  >';		
		$video_box.='<div class="mov" style="width:310px;height:170px;margin:10px auto;position:relative;">';
		$video_box.='<div class="movlabel" style="width:300px;height:170px; margin-left:0px;">';
		
		if(!$NSFW_v || !$NSFW)
		{
            if($NSFW_v)
            $video_box.='<div style="position:relative;width:310px;height:170px;overflow:hidden;display:block;">
			             
			             <img src="'.THIS_SITE.TB_TEST.'" width="300" height="170" style="position:absolute;top:0px;">
			             <img  id="pic_128" src="'.THIS_SITE.TB_TEST.'" width="300" height="170" style="position:absolute;top:0px;left:0px;">
			             </div>';
            else
			$video_box.='<div style="position:relative;width:300px;height:170px;overflow:hidden;display:block;">
				         <img src="'.$thumb.'" width="300" height="170" style="position:absolute;top:0px;">
				         <img  id="pic_128" src="'.$thumb.'" width="300" height="170" style="position:absolute;top:0px;left:0px;">
				         </div>';
		}
		else	
		$video_box.='<div style="position:relative;width:310px;height:170px;overflow:hidden;display:block;">
		             <img  id="pic_128" src="'.$thumb.'" width="300" height="170" style="position:absolute;top:0px;left:0px;">
		             </div>';



		//$video_box.='<div class="w'.$cateID.' ml1" style="display:block;width:125px;height:27px;color:#FFFFFF;text-transform:uppercase;font-weight:bolder;margin:0; padding:0px;font-size:12px;">'.$cateName.'</div>';
        $video_box.='</div>';
        $video_box.='<div class="minfo" style="display:inline-block;top: 0px;font-size: 18px;font-weight: bold; line-height:21px;padding-left: 0px; width: 300px;height: auto;padding: 10px 0;position:initial;"><p>';
		$video_box.= $title['tit'];
		$video_box.='</p></div>';
		$video_box.='</div>';
		$video_box.='</a>';
		echo $video_box;
		unset($video_box);unset($path);
}

function get_indexList($page,$pagesize,$sdate,$edate){//anvato
	if($sdate!=''&&$edate!=''){
		$d='&filter_by[]=pub_date&filter_cond[]=ge&filter_value[]='.$sdate.'&filter_by[]=pub_date&filter_cond[]=le&filter_value[]='.$edate;
	}
	$ts=$GLOBALS['ts'];
	$str = LIST_VIDEOS;
	$xml = $str.$ts;
	$hash= generate_hash($xml); 
	$getUrls=APPLICATION_URL.'ts='.$ts.'&sgn='.urlencode($hash).'&id='.APPLICATION_PUBLIC.$d.'&page_no='.$page.'&page_sz='.$pagesize;
	return $getUrls;
	unset($getUrls);
}


function show_SmallThumbnail_lazy($video_id,$cateid , $catename,$des,$cdate,$thumb , $nail_id){	//anvato
	global  $theme_name;
	global  $NSFW_v;
	global  $NSFW;
	
    echo '<a href="'.THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($des))).'-'.$video_id.'">';
    echo '<div class="index mov" data-id="'.$nail_id.'" >';

    if($NSFW && $NSFW_v)
    echo '<img class="lazy" data-original="'.$thumb.'" width="320" height="180" data-id="NSFW">';
    else
    {
    	    if($NSFW_v)
    		echo '<img class="lazy" data-original="'.THIS_SITE.TB_TEST.'" width="320" height="180">';
    		else
			// echo '<img class="lazy" src=http://cms.nextanimation.com.tw/storage/images/A758DEF0854DE93F55A9B9AA13684627.jpg width="320" height="180">';
    	    echo '<img class="lazy" data-original=http://cms.nextanimation.com.tw/'.$thumb.' width="320" height="180">';
    }

    echo '<div class="movlabel" style="margin-top: -3px;">';
    echo '<div class="w'.$cateid.' ml1" style="color:#FFFFFF;text-transform:uppercase;font-weight:bolder">'.$catename.'</div>';
    
    //echo '<div class="ml3"><img src="'.THIS_SITE.'img/icon_eye.gif">'.number_format($viewer).'</div>';//$video_box.='<div class="ml3"><img src="'.THIS_SITE.'img/icon_eye.gif"> '.number_format($viewer).'</div>';
    echo '<div class="ml2">'.date('Y/m/d',$cdate) .'</div></div>';
	
    echo '<div class="minfo" style="">'.$des.'</div>';
    echo '</div>';
    echo '</a>';
}

function theme_id2name($id,$toptheme){//anvato
	$theme_name='';
	$theme_name=$toptheme[$id][0];
    if($theme_name!=''){
    	return $theme_name;
    }else{
    	?><script>location.href='index.php';</script><?php 
    }
    unset($theme_name);
}	

function show_XlargeThumbnail($video_id,$cateid , $catename,$des,$des2,$cdate,$thumb , $ind){	//anvato
    global  $NSFW_v;  
    echo '<a href="'.THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($des))).'-'.$video_id.'">';
	// echo '<a href="'.THIS_SITE.'video.php?video_id='.$video_id.'">';

    echo '<div class="vdo_item_XLARGE" >';
    
    if($NSFW_v)
     echo '<img src="'.THIS_SITE.TB_TEST.'" class="img-full" width="657" height="370">';
    else
    echo '<img src="'.$thumb.'" class="img-full" width="657" height="370">';


	echo '<div class="movlabel">';
    echo '<div class="w'.$cateid.' vdo_item_XLARGE_cate title ml1" style="">'.strtoupper($catename).'</div>';  //strtoupper($str)
    //echo '<div class="m'.$cateid.' vdo_item_XLARGE_title title" data-id="'.$ind.'" style=""><span>'.$des.'</span></div>';
     echo '<div class="ml2" style="font-weight: bold;margin-top: 2px;">'.date('Y/m/d',$cdate) .'</div></div>';
	//$temp_wrap_str = wordwrap($des,80 , '</span><br><span style="position:relative;top:-3px;">');
	$temp_wrap_str2 = wordwrap($des2,90 , '</span><br><span style="position:relative;">');
    echo '<div class="m'.$cateid.' vdo_item_XLARGE_title title" data-id="'.$ind.'" style=""><span>'.$des.'</span></div>';
	echo '<div class="m'.$cateid.' vdo_item_XLARGE_title subtitle" data-id="'.$ind.'" style=""><span>'.$des2.'</span></div>';
    echo '</div>'; 
    echo '</a>';

}

function show_SmallThumbnail($video_id,$cateid , $catename,$des,$cdate,$thumb , $nail_id){	//anvato
	global $theme_name;
	global  $NSFW_v;
	global  $NSFW;
    echo '<a href="'.THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($des))).'-'.$video_id.'">';
    echo '<div class="index mov" data-id="'.$nail_id.'" >';

    if($NSFW && $NSFW_v)
    echo '<img src="'.$thumb.'" width="320" height="180" data-id="NSFW">';
    else
    {
    	if($NSFW_v)
    	echo '<img src="'.THIS_SITE.TB_TEST.'" width="320" height="180">';	
    	else
    	echo '<img src="'.$thumb.'" width="320" height="180">';
    }

  



    echo '<div class="movlabel" style="margin-top: -3px;">';
    echo '<div class="w'.$cateid.' ml1" style="color:#FFFFFF;text-transform:uppercase;font-weight:bolder">'.$catename.'</div>';
    //echo '<div class="ml3"><img src="'.THIS_SITE.'img/icon_eye.gif">'.number_format($viewer).'</div>';
    echo '<div class="ml2">'.date('Y/m/d',$cdate) .'</div></div>';
   
    echo '<div class="minfo">'.$des.'</div>';
    echo '</div>';
    echo '</a>';
}

function show_search_content($video_id,$des,$title,$cdate, $thumb){//anvato
	 global $NSFW_v;
     global $NSFW; 
		$video_box='';
		$video_box.='<a href="'.THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id.'">';
		//$video_box.='<a href="'.THIS_SITE.remove_punc($title).'-'.$video_id.'">';
		//$video_box.='<a href="'.THIS_SITE.$video_id.'">';
		$video_box.='<div class="srh_result"><div class="srhmov">';
		
		if($NSFW_v)
		$video_box.='<img src="'.THIS_SITE.TB_TEST.'" width="210">';	
		else			
		$video_box.='<img src="'.$thumb.'" width="210">';
		
		$video_box.='</div><div class="srhinfo">';
		$video_box.='<div class="srhinfo_title">'.$title.'</div>';
		$video_box.='<div class="srhinfo_date">'.date('Y/m/d',$cdate).'</div>';
		$video_box.='<div class="srhinfo_content">'.$des.'...</div>';
		$video_box.='</div></div>';
		$video_box.='</a>';
		
		echo $video_box;
		unset($video_box);
}

function get_TitleFromPlayList($Category_id){
	//http://api.movideo.com/rest/playlist/114510306066432/playlists
	$kw="['".$Category_id."']";
	$getUrls=APPLICATION_URL.'playlist/search?keywords='.$kw.'&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}
function get_TagsFromProfile($profile_id){
	//http://api.movideo.com/rest/playlist/114510306066432/playlists
	$kw="['".$profile_id."']";
	$getUrls=APPLICATION_URL.'tagprofile/search?keywords='.$kw.'&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}
/*MEDIA*/
function get_TagsFromProfile2($profile_id){
	$kw="['".$profile_id."']";
	$getUrls=APPLICATION_URL.'tagprofile/search?keywords='.$kw.'&output=json&token='.$_SESSION['token2'].' ';
	return $getUrls;
	unset($getUrls);
}

function get_YearList2($kw,$page,$pageLimit){
	$kw='["publish:year='.$kw.'"]';
	$omi="omitFields=lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,description,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,imagePath,additionalImages&";
	$getUrls=APPLICATION_URL.'media/search?'.$omi.'tags='.$kw.'&excludeTags=["keyword:name=testvideo"]&operator=OR&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token2'].' ';
	return $getUrls;
	unset($getUrls);
}



// get movideo api 
function get_CategoryList_info($Category_id){
	$getUrls=APPLICATION_URL.'playlist/'.$Category_id.'?output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}
function get_LatestNewsList($Category_id,$page,$pageLimit){
	//$omi="omitFields=lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,description,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,imagePath,mediaPlays,additionalImages&";
	$getUrls=APPLICATION_URL.'playlist/'.$Category_id.'/media?'.$omi.'page='.$page.'&pageSize='.$pageLimit.'&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
	//totals=true
}
function get_CategoryListCount($Category_id){
	$getUrls=APPLICATION_URL.'playlist/'.$Category_id.'/media?totals=true&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
	//
}

function show_category_content($video_id,$des,$cdate,$viewer){
		$video_box='';
		//$video_box.='<a href="'.THIS_SITE.remove_punc($des).'-'.$video_id.'">';
		$video_box.='<a href="'.THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($des))).'-'.$video_id.'">';
		//$video_box.='<a href="'.THIS_SITE.$video_id.'">';
		$video_box.='<div class="mov">';
		$video_box.='<img src="'.PIC_CDN.$video_id.'/400x225.jpg" width="300" height="168">';
		$video_box.='<div class="movlabel">';
		$video_box.='<div class="ml1"></div>';
		$video_box.='<div class="ml2">'.date('Y/m/d',strtotime($cdate)) .'</div>';
		//$video_box.='<div class="ml3"><img src="'.THIS_SITE.'img/icon_eye.gif"> '.number_format($viewer).'</div>';
		$video_box.='</div><div class="minfo">';
		$video_box.=$des;
		$video_box.='</div>';
		$video_box.='</div>';
		$video_box.='</a>';
		echo $video_box;
		unset($video_box);
}

///


////// theme 


	
function get_ThemeList($kw,$page,$pageLimit){
	$kw='["theme:name='.$kw.'"]';
	$omi="omitFields=lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,description,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,imagePath,additionalImages&";
	$getUrls=APPLICATION_URL.'media/search?'.$omi.'tags='.$kw.'&excludeTags=["keyword:name=testvideo"]&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}
////////
//用類別名稱搜尋
////////
function get_CategoryList2($kw,$kw2,$page,$pageLimit){
	
	if($kw2 !='0') 
	{
		$kw='["category:name='.$kw.'","category:name=NMA+Originals"]';
	}
	else
		$kw='["category:name='.$kw.'"]';
	$omi="omitFields=lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,description,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,imagePath,additionalImages&";
	$getUrls=APPLICATION_URL.'media/search?'.$omi.'tags='.$kw.'&excludeTags=["keyword:name=testvideo"]&operator=OR&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}
function get_CategoryList3($kw,$page,$pageLimit ,$sdate,$edate ){
	if($sdate!=''&&$edate!=''){
		$d='&creationDateOperator=range&creationDate='.$sdate.'T00:00:00,'.$edate.'T23:50:59';
	}
	$kw='["keyword:name=*"]';
	/*$omi="omitFields=lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,description,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,imagePath,additionalImages&"*/
	$getUrls=APPLICATION_URL.'media/search?'.$omi.'tags='.$kw.$d.'&excludeTags=["keyword:name=testvideo"]&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=playsmonth&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}



function get_CountryCityList($country,$city, $page,$pageLimit,$sdate,$edate){
	if($sdate!=''&&$edate!=''){
		$d='&creationDateOperator=range&creationDate='.$sdate.'T00:00:00,'.$edate.'T23:50:59';
	}
	$omi="omitFields=lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,description,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,imagePath,additionalImages&";
	$kw='["geo:country='.$country.'"]';
	$getUrls=APPLICATION_URL.'media/search?'.$omi.'tags='.$kw.'&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}



function show_mov_content($video_id,$cateID,$cateName,$title,$cdate,$viewer){
		$video_box='';
		//$url=remove_punc($title);
		//$url=$url.'-'.$video_id;
		$url=urlencode(str_replace(' ', '-', remove_punc($title)));
		$url=$url.'-'.$video_id;
		//$url=$video_id;
		$video_box.='<a href="'.THIS_SITE.$url.'"">';
		$video_box.='<div class="mov" >';
		$video_box.='<img src="'.PIC_CDN.$video_id.'/400x225.jpg" width="300" height="168">';
		$video_box.='<div class="movlabel" style="margin-top: -4px;">';
		$video_box.='<div class="w'.$cateID.' ml1" style="color:#FFFFFF;text-transform:uppercase;font-weight:bolder">'.$cateName.'</div>';
		$video_box.='<div class="ml2">'.date('Y/m/d',strtotime($cdate)) .'</div>';
		//$video_box.='<div class="ml3"><img src="'.THIS_SITE.'img/icon_eye.gif"> '.number_format($viewer).'</div>';
		$video_box.='</div><div class="minfo">';
		$video_box.=$title;
		$video_box.='</div>';
		$video_box.='</div>';
		$video_box.='</a>';
		echo $video_box;
		unset($video_box);
}
function show_mov_content2($video_id,$cateID,$cateName,$title,$cdate,$viewer){
	    global $thumaType ;
        global $PAGE ; 
        $link_a = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id;
        //$link_gt ='trackOutboundLink(\''.$PAGE.'\' ,\'clk\' , \''.$PAGE.'_'.$thumaType.'\' ,\''.$link_a.'\')';

        //<a href="'. $link_a .'"  onclick="'.htmlentities($link_gt , ENT_QUOTES ).';return false;">
		$video_box='';		
		
		//$video_box.='<a href="'. $link_a .'"  onclick="'.htmlentities($link_gt , ENT_QUOTES ).';return false;">';		
		$video_box.='<a href="'. $link_a .'">';		
		$video_box.='<div class="mov" style="width:310px;height:170px;margin:0 auto;position:relative;">';
		$video_box.='<div class="movlabel" style="width:182px;width:182px;margin-left:0px;">';
		$video_box.='<div style="position:relative;width:128px;height:128px;overflow:hidden;display:block;">
		             
		             <img src="http://media-ssl.nextmedia.com/media-images-586/media/'.$video_id.'/400x225.jpg" width="228" height="128" style="position:absolute;top:0px;left:-50px;">
		             <img  id="pic_128" src="http://media-ssl.nextmedia.com/media-images-586/media/'.$video_id.'/square/cropped/128x128.jpg" width="128" height="128" style="position:absolute;top:0px;left:0px;">
		             </div>';	

		$video_box.='<div class="w'.$cateID.' ml1" style="display:block;width:125px;height:27px;color:#FFFFFF;text-transform:uppercase;font-weight:bolder;margin:0; padding:0px;font-size:12px;">'.$cateName.'</div>';
        $video_box.='</div>';
        $video_box.='<div class="minfo" style="width:166px;height:165px;display:inline-block;position:absolute;top: 0px;left: 123px;font-size:18px;font-weight: bold; line-height:21px; padding-left: 15px;"><p>';
		$video_box.= $title;
		$video_box.='</p></div>';
		$video_box.='</div>';
		$video_box.='</a>';
		echo $video_box;
		unset($video_box);
}
function show_mov_content2_lazy($video_id,$cateID,$cateName,$title,$cdate,$viewer){
	    global $thumaType ;
        global $PAGE ; 
        $link_a = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id;
       // $link_gt ='trackOutboundLink(\''.$PAGE.'\' ,\'clk\' , \''.$PAGE.'_'.$thumaType.'\' ,\''.$link_a.'\')';

        //<a href="'. $link_a .'"  onclick="'.htmlentities($link_gt , ENT_QUOTES ).';return false;">
		$video_box='';		
		
		$video_box.='<a href="'. $link_a .'"  onclick="'.htmlentities($link_gt , ENT_QUOTES ).';return false;">';		
		$video_box.='<a href="'. $link_a .'">';		
		$video_box.='<div class="mov" style="width:310px;height:170px;margin:0 auto;position:relative;">';
		$video_box.='<div class="movlabel" style="width:182px;width:182px;margin-left:0px;">';
		$video_box.='<div style="position:relative;width:128px;height:128px;overflow:hidden;display:block;">
		             
		             <img src="http://media-ssl.nextmedia.com/media-images-586/media/'.$video_id.'/400x225.jpg" width="228" height="128" style="position:absolute;top:0px;left:-50px;">
		             <img  id="pic_128" src="http://media-ssl.nextmedia.com/media-images-586/media/'.$video_id.'/square/cropped/128x128.jpg" width="128" height="128" style="position:absolute;top:0px;left:0px;">
		             </div>';
		             
		$video_box.='<div class="w'.$cateID.' ml1" style="display:block;width:125px;height:27px;color:#FFFFFF;text-transform:uppercase;font-weight:bolder;margin:0; padding:0px;font-size:12px;">'.$cateName.'</div>';
        $video_box.='</div>';
        $video_box.='<div class="minfo" style="width:166px;height:165px;display:inline-block;position:absolute;top: 0px;left: 123px;font-size:18px;font-weight: bold; line-height:21px; padding-left: 15px;"><p>';
		$video_box.= $title;
		$video_box.='</p></div>';
		$video_box.='</div>';
		$video_box.='</a>';
		echo $video_box;
		unset($video_box);
}
function show_mov_content2v($video_id,$cateID,$cateName,$title,$cdate,$viewer){
		global $thumaType ;
        global $PAGE ;
        global $NSFW_v;
        global $NSFW;  
        $link_a = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id;
        //$link_gt ='trackOutboundLink(\''.$PAGE.'\' ,\'clk\' , \''.$PAGE.'_'.$thumaType.'\' ,\''.$link_a.'\')';
		$video_box='';		
		//$video_box.='<a href="'. $link_a .'"  onclick="'.htmlentities($link_gt , ENT_QUOTES ).';return false;">';
		$video_box.='<a href="'. $link_a .'">';
		$video_box.='<div class="mov" style="width:310px;height:170px;margin:0 auto;position:relative;">';
		$video_box.='<div class="movlabel" style="width:182px;width:182px;margin-left:0px;">';
		$video_box.='<div style="position:relative;width:128px;height:128px;overflow:hidden;display:block;">
		             
		             <img src="http://media-ssl.nextmedia.com/media-images-586/media/'.$video_id.'/400x225.jpg" width="228" height="128" style="position:absolute;top:0px;left:-50px;">
		             <img  id="pic_128" src="http://media-ssl.nextmedia.com/media-images-586/media/'.$video_id.'/square/cropped/128x128.jpg" width="128" height="128" style="position:absolute;top:0px;left:0px;">
		             </div>';	
		$video_box.='<div class="w'.$cateID.' ml1" style="display:block;width:125px;height:27px;color:#FFFFFF;text-transform:uppercase;font-weight:bolder;margin:0; padding:0px;font-size:12px;">'.$cateName.'</div>';
        $video_box.='</div>';
        $video_box.='<div class="minfo" style="width:166px;height:165px;display:inline-block;position:absolute;top: 0px;left: 123px;font-size:18px;font-weight: bold; line-height:21px; padding-left: 15px;"><p>';
		$video_box.= $title;
		$video_box.='</p></div>';
		$video_box.='</div>';
		$video_box.='</a>';
		return $video_box;
		unset($video_box);unset($path);
}

function get_MostViewedList($dtype ,$page,$pageLimit){
	$getUrls=APPLICATION_URL.'media/mostPlayed/'.$dtype.'?output=json&page='.$page.'&pageSize='.$pageLimit.'&token='.$_SESSION['token'].'&orderDesc=true&orderBy=mediaplays';
	//$getUrls=APPLICATION_URL.'media/mostPlayed/'.$dtype.'?output=json&token='.$_SESSION['token'];   orderDesc=true&orderBy=creationdate
	return $getUrls;
	unset($getUrls);
}



function get_videorelated($video_id,$page,$pageLimit){
	$getUrls=APPLICATION_URL.'media/'.$video_id.'/related?output=json&page='.$page.'&pageSize='.$pageLimit.'&token='.$_SESSION['token'];
	return $getUrls;
	unset($getUrls);
}

// search 
function get_searchListFromTags($kw,$page,$pageLimit,$sdate,$edate){

	$kw='["'.$kw.'"]';
	$exckw='["keyword:name=testvideo"]';
	if($sdate!=''&&$edate!=''){
		$d='&creationDateOperator=range&creationDate='.$sdate.'T00:00:00,'.$edate.'T23:50:59';
	}
	$getUrls=APPLICATION_URL.'media/search?tags='.$kw.$d.'&excludeTags=["keyword:name=testvideo"]&paged=true&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}

function get_searchList($kw,$page,$pageLimit,$sdate,$edate){
	$kw="['".$kw."']";
	$exckw='["keyword:name=testvideo"]';
	if($sdate!=''&&$edate!=''){
		$d='&creationDateOperator=range&creationDate='.$sdate.'T00:00:00,'.$edate.'T23:50:59';
	}
	$getUrls=APPLICATION_URL.'media/search?keywords='.$kw.$d.'&excludeTags=["keyword:name=testvideo"]&paged=true&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}
function get_searchListCount(){
	$getUrls=APPLICATION_URL.'media/mostPlayed/day?output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}

////////////////////////////////////////////////////////////////////////

function getUrls($applicationalias,$key,$action){
    $getUrls=APPLICATION_URL.$action.'?applicationalias='.$applicationalias.'&key='.$key.'&output=json';
    	unset($applicationalias);unset($key);
    return $getUrls;
    	unset($getUrls);
}

function checkIfinArray($str , $arr){
             foreach ($arr as $key =>$val)
             {
               if($val == $str)
               return true;
             }
               return false;
           }
		   




function chk_CDN_exist($link){
	$ch = curl_init($link);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//    echo $retcode;// >= 400 -> not found, $retcode = 200, found.
    curl_close($ch);
    unset($ch);unset($link);
    if($retcode=='200')
    {return true;}
    else
    {return false;}
}

function site_title(){
	echo SITE_TITLE;
}
function site_title_name(){
	echo SITE_TITLE_SHORT;
}

function remove_punc($x){
	$x=str_replace('-', '-', $x);
	$x=str_replace(' ', '-', $x);
	$x=str_replace(';', '-', $x);
	$x=str_replace('?', '-', $x);
	$x=str_replace('.', '-', $x);
	$x=str_replace(',', '-', $x);
	$x=str_replace('#', '-', $x);
	$x=str_replace('$', '-', $x);
	$x=str_replace('(', '-', $x);
	$x=str_replace(')', '-', $x);
	$x=str_replace('&', '-', $x);
	$x=str_replace('%', '-', $x);
	$x=str_replace('#', '-', $x);
	$x=str_replace('@', '-', $x);	
	$x=str_replace('=', '-', $x);
	$x=str_replace('|', '-', $x);
	$x=str_replace('/', '-', $x);
	$x=str_replace('"', '-', $x);
	$x=str_replace('|', '-', $x);
	$x=str_replace('!', '-', $x);
	$x=str_replace(':', '-', $x);
	$x=str_replace('’', '-', $x);
	$x=str_replace('‘', '-', $x);
	$x=str_replace("'", '-', $x);
	$x=str_replace('--', '-', $x);
	$x=strtolower($x);
	return $x;
}

/*function remove_punc($x){
	$x=str_replace('-', '', $x);
	$x=str_replace(' ', '-', $x);
	$x=str_replace(';', '', $x);
	$x=str_replace('?', '', $x);
	$x=str_replace('.', '', $x);
	$x=str_replace(',', '', $x);
	$x=str_replace('#', '', $x);
	$x=str_replace('$', '', $x);
	$x=str_replace('(', '', $x);
	$x=str_replace(')', '', $x);
	$x=str_replace('&', '', $x);
	$x=str_replace('%', '', $x);
	$x=str_replace('#', '', $x);
	$x=str_replace('@', '', $x);	
	$x=str_replace('=', '', $x);
	$x=str_replace('|', '', $x);
	$x=str_replace('/', '', $x);
	$x=str_replace('"', '', $x);
	$x=str_replace('|', '', $x);
	$x=str_replace('!', '', $x);
	$x=str_replace(':', '', $x);
	$x=str_replace('’', '', $x);
	$x=str_replace('‘', '', $x);
	$x=str_replace("'", '', $x);
	$x=str_replace('--', '-', $x);
	$x=strtolower($x);
	return $x;
}*/

?>