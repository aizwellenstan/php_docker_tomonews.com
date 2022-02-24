<?php 
$ts = time();

function curl_info($url, $req) { //anvato
    $ch = curl_init($url);
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	
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

function get_videoshow($video_id){//anvato
	
	$ts=$GLOBALS['ts'];
	$str = LIST_VIDEOS;
	$xml = $str.$ts;
	$hash= generate_hash($xml); 
	$getUrls=APPLICATION_URL.'ts='.$ts.'&sgn='.urlencode($hash).'&id='.APPLICATION_PUBLIC.'&filter_by[]=video_id&filter_cond[]=%3d%3d&filter_value[]='.$video_id;
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

function get_video_images($video_id){//anvato

	$ts=$GLOBALS['ts'];
	$str = LIST_VIDEO_IMAGES;
	$xml = $str.$ts;
	$hash= generate_hash($xml); 
	$getUrls=APPLICATION_URL.'ts='.$ts.'&sgn='.urlencode($hash).'&id='.APPLICATION_PUBLIC.'&upload_id='.$video_id;
	return $getUrls;
	unset($getUrls);
}

function get_CategoryList($Category_id,$page,$pagesize){ //anvato
	$ts=$GLOBALS['ts'];
	$str = LIST_VIDEOS;
	$xml = $str.$ts;
	$hash= generate_hash($xml); 
	$getUrls=APPLICATION_URL.'ts='.$ts.'&sgn='.urlencode($hash).'&id='.APPLICATION_PUBLIC.'&filter_by[]=category_id&filter_cond[]=%3d%3d&filter_value[]='.$Category_id.'&page_no='.$page.'&page_sz='.$pagesize.'&sort_by[]=pub_date&sort_order[]=desc';
	return $getUrls;
	unset($getUrls);
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

function show_mov_content_lazy($video_id,$cateID,$cateName,$title,$cdate,$thumb){//anvato
	  global $NSFW_v;
	  global $NSFW;
		$video_box='';
		//$url=remove_punc($title);
		//$url=$url.'-'.$video_id;
		$url=urlencode(str_replace(' ', '-', remove_punc($title)));
		$url=$url.'-'.$video_id;
		//$url=$video_id;
		$video_box.='<a href="'.THIS_SITE.$url.'"">';
		$video_box.='<div class="mov">';

        if(!$NSFW_v || !$NSFW)
        {
        	 if($NSFW_v)
        	 $video_box.='<img data-original="'.THIS_SITE.TB_TEST.'" class="img-responsive lazy">';
        	 else
        	 $video_box.='<img data-original="'.$thumb.'" class="img-responsive lazy">';
        }
        else // $NSFW_v && $NSFW
		$video_box.='<img data-original="'.$thumb.'" class="img-responsive lazy">';


		$video_box.='<div class="movlabel" style="margin-top:-4px;">';
		$video_box.='<div class="w'.$cateID.' ml1" style="color:#FFFFFF;text-transform:uppercase;font-weight:bolder"><div>'.$cateName.'</div></div>';
		
		//$video_box.='<div class="ml3"><img src="'.THIS_SITE.'img/icon_eye.gif" > '.number_format($viewer).'</div>';
		$video_box.='<div class="ml2"><div>'.date('Y/m/d',strtotime($cdate)) .'</div></div>';
		$video_box.='</div><div class="minfo"><div>';
		$video_box.=$title;
		$video_box.='</div></div>';
		$video_box.='</div>';
		$video_box.='</a>';
		echo $video_box;
		unset($video_box);
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
    	?><script>location.href=<?php  THIS_SITE ?></script><?php 
    }
    unset($category_name);
}

function show_category_content_lazy($video_id,$des,$cdate,$thumb,$cat_id='',$cate_name=''){//anvato
	 global $NSFW_v; 
     global $NSFW; 
	$video_box='';
	
	$sponsored = ($cat_id == 5130) ? 'sponsored-label' : '';
		//$video_box.='<a href="'.THIS_SITE.remove_punc($des).'-'.$video_id.'">';
		$video_box.='<a href="'.THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($des))).'-'.$video_id.'">';
		//$video_box.='<a href="'.THIS_SITE.$video_id.'">';
		$video_box.='<div class="mov">';

        if(!$NSFW_v || !$NSFW)
		{
			 if($NSFW_v)
             {$video_box.='<img data-original="'.THIS_SITE.TB_TEST.'" class="img-responsive lazy">'; }
             else
			 $video_box.='<img data-original="'.$thumb.'" class="img-responsive lazy">';
		}
	    else
	    {$video_box.='<img data-original="'.$thumb.'" class="img-responsive lazy">';}	

		$video_box.='<div class="movlabel" style="margin-top:-4px;">';
		$video_box.='<div class="ml1 ' .$sponsored.'">'.$cate_name.'</div>';
		
		//$video_box.='<div class="ml3"><img src="'.THIS_SITE.'img/icon_eye.gif"> '.number_format($viewer).'</div>';
		$video_box.='<div class="ml2">'.date('Y/m/d',$cdate) .'</div>';
		$video_box.='</div><div class="minfo">';
		$video_box.=$des;
		$video_box.='</div>';
		$video_box.='</div>';
		$video_box.='</a>';
		echo $video_box;
		unset($video_box);
}

function get_searchListFromTags($kw,$page,$pagesize,$sdate,$edate){ //anvato
	/*$kw='["'.$kw.'"]';
	$exckw='["keyword:name=testvideo"]';
	if($sdate!=''&&$edate!=''){
		$d='&creationDateOperator=range&creationDate='.$sdate.'T00:00:00,'.$edate.'T23:50:59';
	}
	$getUrls=APPLICATION_URL.'media/search?tags='.$kw.$d.'&excludeTags=["keyword:name=testvideo"]&paged=true&page='.$page.'&pageSize='.$pagesize.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);*/
}

function show_mov_content($video_id,$cateID,$cateName,$title,$cdate,$thumb){ //anvato
	 global $NSFW_v;global $NSFW;
		$video_box='';
		//$url=remove_punc($title);
		//$url=$url.'-'.$video_id;
		$url=urlencode(str_replace(' ', '-', remove_punc($title)));
		$url=$url.'-'.$video_id;
		//$url=$video_id;
		$video_box.='<a href="'.THIS_SITE.$url.'"">';
		$video_box.='<div class="mov">';

        if(!$NSFW_v || !$NSFW)
        {
              if($NSFW_v)
              $video_box.='<img src="'.THIS_SITE.TB_TEST.'" class="img-responsive">';
              else
        	  $video_box.='<img src="'.$thumb.'" class="img-responsive">';
        }
        else
		$video_box.='<img src="'.$thumb.'" class="img-responsive">';



		$video_box.='<div class="movlabel" >';
		$video_box.='<div class="w'.$cateID.' ml1" style="color:#FFFFFF;text-transform:uppercase;font-weight:bolder"><div>'.$cateName.'</div></div>';
		
		//$video_box.='<div class="ml3"><img src="'.THIS_SITE.'img/icon_eye.gif" > '.number_format($viewer).'</div>';
		$video_box.='<div class="ml2"><div>'.date('Y/m/d',$cdate) .'</div></div>';
		$video_box.='</div><div class="minfo"><div>';
		$video_box.=$title;
		$video_box.='</div></div>';
		$video_box.='</div>';
		$video_box.='</a>';
		echo $video_box;
		unset($video_box);
}

function show_search_content($video_id,$des,$title,$cdate, $thumb){ //anvato
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
 
/*MEDIA*/
function get_TagsFromProfile2($profile_id){
	$kw="['".$profile_id."']";
	$getUrls=APPLICATION_URL.'tagprofile/search?keywords='.$kw.'&output=json&token='.$_SESSION['token2'].' ';
	return $getUrls;
	unset($getUrls);
}
function get_CategoryList2($kw,$kw2,$page,$pageLimit){
	if($kw2 !='0') 
	{
		$kw='["category:name='.$kw.'","category:name=NMA+Originals"]';
	}
	else
	$kw='["category:name='.$kw.'"]';
	
	$omi="omitFields=lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,description,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,imagePath,additionalImages&";
	$getUrls=APPLICATION_URL.'media/search?'.$omi.'tags='.$kw.'&operator=OR&excludeTags=["keyword:name=testvideo"]&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token'].' ';
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

// get movideo api 
function get_LatestNewsList($Category_id,$page,$pageLimit){
	//$omi="omitFields=lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,description,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,imagePath,mediaPlays,additionalImages&";
	$getUrls=APPLICATION_URL.'playlist/'.$Category_id.'/media?'.$omi.'page='.$page.'&pageSize='.$pageLimit.'&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
	//totals=true
}

function get_CategoryList_info($Category_id){
	$getUrls=APPLICATION_URL.'playlist/'.$Category_id.'?output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}
function get_MostViewedList($dtype ,$page,$pageLimit){
	$getUrls=APPLICATION_URL.'media/mostPlayed/'.$dtype.'?output=json&page='.$page.'&pageSize='.$pageLimit.'&token='.$_SESSION['token'];
	//$getUrls=APPLICATION_URL.'media/mostPlayed/'.$dtype.'?output=json&token='.$_SESSION['token'];
	return $getUrls;
	unset($getUrls);
}
function get_CategoryListCount($Category_id){
	$getUrls=APPLICATION_URL.'playlist/'.$Category_id.'/media?totals=true&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
	//
}
/*function get_searchListFromTags($kw,$page,$pageLimit,$sdate,$edate){
	$kw="['topic:tag=".$kw."']";//"ns:predicate=value"
	$exckw='["keyword:name=testvideo"]';
	if($sdate!=''&&$edate!=''){
		$d='&creationDateOperator=range&creationDate='.$sdate.'T00:00:00,'.$edate.'T23:50:59';
	}
	$getUrls=APPLICATION_URL.'media/search?keywords='.$kw.$d.'&excludeTags=["keyword:name=testvideo"]&paged=true&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}
*/

function show_category_content($video_id,$des,$cdate,$viewer){
	 global $NSFW_v; 
         global $NSFW; 
		$video_box='';

		//$video_box.='<a href="'.THIS_SITE.remove_punc($des).'-'.$video_id.'">';
		$video_box.='<a href="'.THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($des))).'-'.$video_id.'">';
		//$video_box.='<a href="'.THIS_SITE.$video_id.'">';
		$video_box.='<div class="mov">';

        if(!$NSFW_v || !$NSFW)
        {
        	 if($NSFW_v)
        	 $video_box.='<img src="'.THIS_SITE.TB_TEST.'" class="img-responsive">';
        	 else
        	 $video_box.='<img src="'.PIC_CDN.$video_id.'/400x225.jpg" class="img-responsive">';
        }
        else
		$video_box.='<img src="'.PIC_CDN.$video_id.NSTB_CDN.'/400x225.jpg" class="img-responsive">';
    


		$video_box.='<div class="movlabel">';
		$video_box.='<div class="ml1"></div>';
		
		//$video_box.='<div class="ml3"><img src="'.THIS_SITE.'img/icon_eye.gif"> '.number_format($viewer).'</div>';
		$video_box.='<div class="ml2">'.date('Y/m/d',strtotime($cdate)) .'</div>';
		$video_box.='</div><div class="minfo">';
		$video_box.=$des;
		$video_box.='</div>';
		$video_box.='</div>';
		$video_box.='</a>';
		echo $video_box;
		unset($video_box);
}


///function show_mov_content($video_id,$cateID,$cateName,$title,$cdate,$viewer){
function show_newsfeed_content($video_id,$des,$cdate,$viewer){
		$video_box='';

		//$video_box.='<a href="'.THIS_SITE.remove_punc($des).'-'.$video_id.'">';
		$video_box.='<a href="'.THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($des))).'-'.$video_id.'">';
		//$video_box.='<a href="'.THIS_SITE.$video_id.'">';
		$video_box.='<div class="mov">';
		$video_box.='<img src="'.PIC_CDN.$video_id.'/400x225.jpg" class="img-responsive">';
		$video_box.='<div class="movlabel">';
		$video_box.='<div class="ml1"></div>';
		
		//$video_box.='<div class="ml3"><img src="'.THIS_SITE.'img/icon_eye.gif"> '.number_format($viewer).'</div>';
		$video_box.='<div class="ml2">'.date('Y/m/d',strtotime($cdate)) .'</div>';
		$video_box.='</div><div class="minfo">';
		$video_box.=$des;
		$video_box.='</div>';
		$video_box.='</div>';
		$video_box.='</a>';
		echo $video_box;
		unset($video_box);
}
////// theme 

function theme_id2name($id,$toptheme){
	$theme_name='';
	$theme_name=$toptheme[$id][0];
    if($theme_name!=''){
    	return $theme_name;
    }else{
    	?><script>location.href='index.php';</script><?php 
    }
    unset($theme_name);
}	
	
function get_ThemeList($kw,$page,$pageLimit){
	$kw='["theme:name='.$kw.'"]';
	$omi="omitFields=lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,description,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,imagePath,additionalImages&";
	$getUrls=APPLICATION_URL.'media/search?'.$omi.'tags='.$kw.'&excludeTags=["keyword:name=testvideo"]&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token'].' ';
	//echo $getUrls;
	return $getUrls;
	unset($getUrls);
}






function get_videorelated($video_id,$page,$pageLimit){
	$getUrls=APPLICATION_URL.'media/'.$video_id.'/related?output=json&page='.$page.'&pageSize='.$pageLimit.'&token='.$_SESSION['token'];
	return $getUrls;
	unset($getUrls);
}

// search 
// search 


function get_searchList($kw,$page,$pageLimit,$sdate,$edate){
	$kw="['".$kw."']";
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
	$x=str_replace('＆', '-', $x);
	$x=str_replace('　', '-', $x);
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
	$x=str_replace('??, '', $x);
	$x=str_replace('??, '', $x);
	$x=str_replace("'", '', $x);
	$x=str_replace('--', '-', $x);
	$x=strtolower($x);
	return $x;
}*/

?>