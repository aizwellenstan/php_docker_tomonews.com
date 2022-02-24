<?php 

// get & check movideo token before get movies
function call_token_url($applicationalias,$key){
	$getUrls=APPLICATION_URL.'session?applicationalias='.$applicationalias.'&key='.$key.'&output=json';
    
    unset($applicationalias);unset($key);
    return $getUrls;
    unset($getUrls);
}

function chk_token(){
	// if(!isset( $_SESSION['token'] )||$_SESSION['token']==''  ){

	    $url=call_token_url(APPLICATION_ALIAS,APPLICATION_KEY);
	    $data=curl_info($url);

	    $dAry=json_decode($data, true);
	    $token=$dAry['session']['token'];
		    if($token!=''){
		        $_SESSION['token']=$token;
	    	}
	// }else{

	// }
		// ========= debug mode =========
		$debug_mode=$_GET['debug_mode'];
		if($debug_mode=='1'){
			echo 'token : ',$_SESSION['token'];
		}
}

function category_id2name($id,$topmenu){
	$category_name='';
	foreach( $topmenu as $tmv ){
            
            if($tmv[1]==$id){
            	$category_name=$tmv[0];
            }
    }
    if($category_name!=''){
    	return $category_name;
    }else{
    	/*?><script>location.href='index.php';</script><?php */
    }
    unset($category_name);
}
// get movideo api 

function get_CategoryList($Category_id,$page,$pageLimit){
	//$omi="omitFields=creationDate,lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,description,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,imagePath,mediaPlays,additionalImages&";
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

//function show_category_content($video_id,$des,$cdate,$viewer){
function show_category_content($video_id,$cateID,$cateName,$des,$cdate,$viewer){
		$video_box='';

		//$video_box.='<a href="'.THIS_SITE.remove_punc($des).'-'.$video_id.'">';
		$video_box.='<a href="'.THIS_SITE.$video_id.'">';
		$video_box.='<div class="mov">';
		//http://media.nmhk.movideo.com/media-images-587/media/116409486917632/400x225.jpg
		$video_box.='<img src="http://media.nmhk.movideo.com/media-images-587/media/'.$video_id.'/400x225.jpg" width="300" height="168">';
		$video_box.='<div class="movlabel">';
		$video_box.='<div class="w'.$cateID.' ml1" style="color:#FFFFFF;text-transform:uppercase;font-weight:bolder">'.$cateName.'</div>';
		//$video_box.='<div class="ml1"></div>';
		$video_box.='<div class="ml2">'.date('Y/m/d',strtotime($cdate)) .'</div>';
		$video_box.='<div class="ml3"><img src="'.THIS_SITE.'img/icon_eye.gif"> '.number_format($viewer).'</div>';
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
	//$omi="omitFields=lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,description,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,imagePath,additionalImages&";
	$getUrls=APPLICATION_URL.'media/search?'.$omi.'tags='.$kw.'&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}

function get_indexList($page,$pageLimit,$sdate,$edate){
	if($sdate!=''&&$edate!=''){
		$d='&creationDateOperator=range&creationDate='.$sdate.'T00:00:00,'.$edate.'T23:50:59';
	}
	//$omi="omitFields=lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,description,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,imagePath,additionalImages&";
	$kw='["keyword:name=*"]';
	$getUrls=APPLICATION_URL.'media/search?'.$omi.'tags='.$kw.'&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token'].' ';
	
	return $getUrls;
	unset($getUrls);
}


function show_mov_content($video_id,$cateID,$cateName,$title,$cdate,$viewer){
		$video_box='';
		$url = '';
		//$url=remove_punc($title);
		$url=$url.$video_id;
		$video_box.='<a href="'.THIS_SITE.$url.'"">';
		$video_box.='<div class="mov">';
		$video_box.='<img src="http://media.nmhk.movideo.com/media-images-587/media/'.$video_id.'/400x225.jpg" width="300" height="168">';
		$video_box.='<div class="movlabel" style="margin-top: -4px;">';
		$video_box.='<div class="w'.$cateID.' ml1" style="color:#FFFFFF;text-transform:uppercase;font-weight:bolder">'.$cateName.'</div>';
		$video_box.='<div class="ml2">'.date('Y/m/d',strtotime($cdate)) .'</div>';
		$video_box.='<div class="ml3"><img src="'.THIS_SITE.'img/icon_eye.gif"> '.number_format($viewer).'</div>';
		$video_box.='</div><div class="minfo">';
		$video_box.=$title;
		$video_box.='</div>';
		$video_box.='</div>';
		$video_box.='</a>';
		echo $video_box;
		unset($video_box);
}
// video 
// /media/<id>
function get_videoshow($video_id){
	$getUrls=APPLICATION_URL.'media/'.$video_id.'?output=json&token='.$_SESSION['token'];
	return $getUrls;
	unset($getUrls);
}

function get_videorelated($video_id,$page,$pageLimit){
	$getUrls=APPLICATION_URL.'media/'.$video_id.'/related?output=json&page='.$page.'&pageSize='.$pageLimit.'&token='.$_SESSION['token'];
	return $getUrls;
	unset($getUrls);
}

// search 


function get_searchList($kw,$page,$pageLimit,$sdate,$edate){
	$kw="['".$kw."']";
	if($sdate!=''&&$edate!=''){
		$d='&creationDateOperator=range&creationDate='.$sdate.'T00:00:00,'.$edate.'T23:50:59';
	}
	$getUrls=APPLICATION_URL.'media/search?keywords='.$kw.$d.'&paged=true&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}
function get_searchListCount(){
	$getUrls=APPLICATION_URL.'media/mostPlayed/day?output=json&token='.$_SESSION['token'].' ';
	return $getUrls;
	unset($getUrls);
}
function show_search_content($video_id,$des,$title,$cdate){
		$video_box='';
		//$video_box.='<a href="'.THIS_SITE.remove_punc($title).'-'.$video_id.'">';
		$video_box.='<a href="'.THIS_SITE.$video_id.'">';
		$video_box.='<div class="srh_result"><div class="srhmov">';
		$video_box.='<img src="http://media.nmhk.movideo.com/media-images-587/media/'.$video_id.'/400x225.jpg" width="210">';
		$video_box.='</div><div class="srhinfo">';
		$video_box.='<div class="srhinfo_title">'.$title.'</div>';
		$video_box.='<div class="srhinfo_date">'.date('Y/m/d',strtotime($cdate)).'</div>';
		$video_box.='<div class="srhinfo_content">'.$des.'...</div>';
		$video_box.='</div></div>';
		$video_box.='</a>';
		
		echo $video_box;
		unset($video_box);
}
////////////////////////////////////////////////////////////////////////

function getUrls($applicationalias,$key,$action){
    $getUrls=APPLICATION_URL.$action.'?applicationalias='.$applicationalias.'&key='.$key.'&output=json';
    	unset($applicationalias);unset($key);
    return $getUrls;
    	unset($getUrls);
}

	function curl_info($url) {
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $data = curl_exec($ch);
	    curl_close($ch);
	    	unset($ch);unset($url);
	    return $data;
	}

function site_title(){
	echo SITE_TITLE;
}
function site_title_name(){
	echo SITE_TITLE_SHORT;
}
function remove_punc($x){
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
	$x=str_replace('＆', '', $x);
	$x=str_replace('　', '', $x);
	$x=strtolower($x);
	return $x;
}
function utf8_substr($StrInput,$strStart,$strLen){
	$StrInput = mb_substr($StrInput,$strStart,mb_strlen($StrInput));
	$iString = urlencode($StrInput);
	$lstrResult="";
	$istrLen = 0;
	$k = 0;
	do{
	$lstrChar = substr($iString, $k, 1);
	if($lstrChar == "%"){
	$ThisChr = hexdec(substr($iString, $k+1, 2));
	if($ThisChr >= 128){
	if($istrLen+3 < $strLen){
	$lstrResult .= urldecode(substr($iString, $k, 9));
	$k = $k + 9;
	$istrLen+=3;
	}else{
	$k = $k + 9;
	$istrLen+=3;
	}
	}else{
	$lstrResult .= urldecode(substr($iString, $k, 3));
	$k = $k + 3;
	$istrLen+=2;
	}
	}else{
	$lstrResult .= urldecode(substr($iString, $k, 1));
	$k = $k + 1;
	$istrLen++;
	}
	}while ($k < strlen($iString) && $istrLen < $strLen); 
	return $lstrResult;
}
/// start 
chk_token();
?>