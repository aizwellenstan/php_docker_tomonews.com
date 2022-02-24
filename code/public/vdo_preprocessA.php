<?php 
$vid_Arr=array('34621228072963' ,"154019978657792" ,"115723634327552", "233696988774400","235919634350080" ,"102280118255616");
$AdImg_arr = array('GIF_300x250-Baby-Panda.gif','GIF_300x250-Baby-Panda-2.gif','GIF_300x250-marijuana-and-panda.gif' ,  'GIF_300x250_marijuana-man.gif');//'GIF_300x250-marijuana-man.gif' ,
$video_id=$_GET['video_id'];
$debug_mode=isset($_GET['debug_mode']) ? $_GET['debug_mode'] : '';
$TEST = isset($_GET['TEST']) ? $_GET['TEST'] : '';
$OPT1=isset($_GET['opt1']) ? $_GET['opt1'] : '';
$OPT2=isset($_GET['opt2']) ? $_GET['opt2'] : '';

// $getUrls = APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?filters[]=obj_id:"'.$video_id.'"';
$getUrls = "https://cms.nextanimation.com.tw/api/getVideos?video_id=$video_id";

$data2=curl_info($getUrls, null);
$dAry=json_decode($data2, true);

if($debug_mode=='1'){
 //echo $getUrls."<br>";
 echo htmlentities($data2); 
 exit;
}
	
if( $dAry['numFound'] == 0){ 
	header( 'HTTP/1.1 404 Not Found' ); include('404.php'); exit;
}

$title   = str_replace('%0D','',$dAry['docs'][0]['c_title_s']);
$title   = htmlspecialchars($title );
$title_cp=  str_replace('%0D','',$dAry['docs'][0]['c_title_s']);
$title_cp= str_replace('’',"'",$title_cp);
$title_cp= str_replace('“','"',$title_cp);
$title_cp= htmlspecialchars($title_cp);
$video_url = $dAry['docs'][0]['video_url'];
$thumb_url = $dAry['docs'][0]['thumbnails']['url'];
$request_url=$_SERVER['REQUEST_URI'];
$posWord = strpos($request_url, 'video.php', 0);
if ($posWord){
	header("Location: ". THIS_SITE . urlencode(str_replace(' ', '-', remove_punc($title_cp))).'-'.$dAry['docs'][0]['obj_id'], true, 301);
}

$des=$dAry['docs'][0]['c_description_s'];
$_date = $dAry['docs'][0]['c_ts_publish_l'];
$cdate=date('Y/m/d',$_date);
$cdate22=date("c",$_date) ;
$Addtinal_imgsArr = $dAry['docs'][0]['thumbnails']; 
$duration = $dAry['docs'][0]['info']['duration'];
$durMin = floor($duration / 60);
$durSec = round($duration % 60);
$mobDes = '';
$tag_topic = '';
/*$HT_NAME ='';
$HT_URL ='';*/
$Keywords_kwstr = "";
$NSFW=false;
$Addtional_heads= array();
$Addtional_pics= array();
$thumb = '';

    $tag_topic =  isset($dAry['docs'][0]['u_Topic_Tag_smv'][0]) ?  $dAry['docs'][0]['u_Topic_Tag_smv'][0] : ''; 
	
	$mobDes= $dAry['docs'][0]['u_Mobile_Description__Sub_head__s'];
	
	// foreach( $Addtinal_imgsArr as $images  )
	// {

	// 	$img_path = $images['role'];
				
	// 	if ( empty($thumb) ){
	// 		if ($img_path == 'poster') $thumb=$images["url"]; 
			
	// 	}
				
	// } 

    $thmenName= isset($dAry['docs'][0]['u_Theme_s']) ? $dAry['docs'][0]['u_Theme_s'] : ''; 

    if(isset($dAry['docs'][0]['u_NSFW_Tag_s']) && $dAry['docs'][0]['u_NSFW_Tag_s'] =="NSFW" && $dAry['docs'][0]['u_NSFW_Tag_s'] =="NSFW"){ $NSFW=true; }
	
	for($ind = 2; $ind<=9 ; $ind++)
    {   
        $ind_str = $ind;
        $posA1 = isset($dAry['docs'][0]['u_Add_Caption_'.$ind_str.'_s']) ? $dAry['docs'][0]['u_Add_Caption_'.$ind_str.'_s'] : '';//addtional:headline02

		if( !empty($posA1) ){
            $Addtional_heads [$ind_str] =  $posA1 ;
            $check_pic= 0;
            $this_imagePath = '';
			foreach( $Addtinal_imgsArr as $images  )
			{

				$img_path = $images['role'];
				
				
				/*if ( empty($thumb) ){ 
					if ($img_path == 'poster') $thumb=$images["url"]; 
				}*///($img_path == 'Thumbnail' || $img_path == 'thumbnail')
				
				if($img_path == 'photo'.$ind_str)
				{
					 $check_pic= 1;
					 $this_imagePath = $images["url"];
				}
			}  
			if($check_pic != 1){ $this_imagePath =""; }
				  
			$Addtional_pics [$ind_str] = $this_imagePath;  
		}else continue;
    } 


$file_path = $thumb;

$Keywords_kwstr =  implode(",", $dAry['docs'][0]['c_tag_smv']);

$cat_id = $dAry['docs'][0]['c_category_smv'][0];

$CateName = array_search ( $cat_id, $menuAry );

$edate=date('Y-m-d', strtotime('-3 day',$_date));

$sdate=$_date;

// $getNextUrls = APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?start=0&count=10&sort=c_ts_publish_l+desc&filters[]=c_ts_publish_l:['.$edate.'%20TO%20'.$sdate.']';
$getNextUrls = "https://cms.nextanimation.com.tw/api/getProgramVideos?program=TomoNews%20US&published_date=$edate&counts=10";
$data4=curl_info($getNextUrls, null);

$dAry4=json_decode($data4, true);

    $dAryn4=$dAry4['docs'];
    $i=0;
	
	$flag_key = 1;
	
	if ($dAryn4 > 0) {
		foreach ($dAryn4 as $key => $value) {
		  if($video_id == $value['obj_id']){
			$flag_key=$key;
		  }
		  $i++;
		}  
		$i--;
		//print_r($dAryn2[$prev_key]['title']);
		if($flag_key>=$i){ $next_key=0; }else{ $next_key=$flag_key+1; }
		if($flag_key==0){ $prev_key=$i; }else{ $prev_key=$flag_key-1; }
		$prev_title= htmlspecialchars( str_replace('%0D','', $dAryn4[$prev_key]['c_title_s'] ));
		$prev_id= $dAryn4[$prev_key]['obj_id'];
		$next_title= htmlspecialchars( str_replace('%0D','',$dAryn4[$next_key]['c_title_s']));

		$next_thumb = $dAryn4[$next_key]['thumbnails']['url'];
		// foreach ($_next_thumb as $key => $value1) {
		// 	if ( $value1['role']=='poster' ) {  $next_thumb = $value1['url']; }
		// }
		
		$next_id= $dAryn4[$next_key]['obj_id'];
		$prev_link=THIS_SITE.remove_punc($prev_title).'-'.$prev_id;
		$next_link=THIS_SITE.remove_punc($next_title).'-'.$next_id;
	}

    /*判斷此業是否為NSFW*/

//Remove Ad
$removeAdsArr = array('2929429','2913924','3196077','3084274','2929247','2929462','2913669','2924575','2912521','3142714','2916254','3307045','2916111','3391283','2925934','3123283',
'2913530','2916788','2914377','3140004','3069620','3354086','2929594','2928479','2924546','3104523');
$removeAdd = false;
if (in_array($video_id, $removeAdsArr)) {
    $removeAdd = true;
} 
    ?>
  
