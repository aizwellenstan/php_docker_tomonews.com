<?php 

$video_id=$_GET['video_id'];

if (strlen($video_id) >= 14){
	$getFeed = APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?filters[]=u_Next_Media_Clip_Id_s="'.$video_id.'"';
	$dataFeed = curl_info($getFeed, null);
	$dAryFeed = json_decode($dataFeed, true);
	if ($dAryFeed['numFound'] > 0){
		print_r('aqui');
		$title_cp=  str_replace('%0D','',$dAryFeed['docs'][0]['c_title_s']);
		$title_cp= str_replace('’',"'",$title_cp);
		$title_cp= str_replace('“','"',$title_cp);
		$title_cp= htmlspecialchars($title_cp);
		header("Location: ". THIS_SITE . urlencode(str_replace(' ', '-', remove_punc($title_cp))).'-'.$dAryFeed['docs'][0]['obj_id'], true, 301);
		exit;
	}elseif ($dAryFeed['numFound'] == 0){
		header( 'HTTP/1.1 404 Not Found' );
		include('404.php');
		exit;
	}	
}
$getUrls = APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?filters[]=obj_id:"'.$video_id.'"';
$data2=curl_info($getUrls, null);
$dAry=json_decode($data2, true);

if( $dAry['numFound'] == 0){
	//universidae videos. Sponsored videos category A5BAIV2LEJURAGZLAJJA
	$getUrls = APPLICATION_FEED_URL.'A5BAIV2LEJURAGZLAJJA?filters[]=obj_id:"'.$video_id.'"';
	$data2=curl_info($getUrls, null);
	$dAry=json_decode($data2, true);
	
	if( $dAry['numFound'] == 0){ 	header( 'HTTP/1.1 404 Not Found' ); include('404.php'); exit; }
}

$title   = str_replace('%0D','',$dAry['docs'][0]['c_title_s']);
$title   = htmlspecialchars($title );
$title_cp=  str_replace('%0D','',$dAry['docs'][0]['c_title_s']);
$title_cp= str_replace('’',"'",$title_cp);
$title_cp= str_replace('“','"',$title_cp);
$title_cp= htmlspecialchars($title_cp);
$des=$dAry['docs'][0]['c_description_s'];
$_date = $dAry['docs'][0]['c_ts_publish_l'];
$cdate22=date("c", $_date);
$cdate=date('Y/m/d',$_date);
$Addtinal_imgsArr = $dAry['docs'][0]['thumbnails']; 
$duration = $dAry['docs'][0]['info']['duration'];
$durMin = floor($duration / 60);
$durSec = round($duration % 60);

$mobDes="";
$tag_topic = '';
$Keywords_kwstr = "";
$NSFW=false;
$thumb = '';
	
    $tag_topic =  isset($dAry['docs'][0]['u_Topic_Tag_smv'][0]) ? $dAry['docs'][0]['u_Topic_Tag_smv'][0] : ''; 
	
	for($ind = 2; $ind<=3 ; $ind++)
    {   
        $ind_str = $ind;
        $posA1 = isset($dAry['docs'][0]['u_Add_Caption_'.$ind_str.'_s']) ? $dAry['docs'][0]['u_Add_Caption_'.$ind_str.'_s'] : '';//addtional:headline02

		//if( !empty($posA1) ){
            $Addtional_heads [$ind_str] =  $posA1 ;
            $check_pic= 0;
            $this_imagePath = '';
			foreach( $Addtinal_imgsArr as $images  )
			{

				$img_path = $images['role'];
				
				if ( empty($thumb) ){ if ($img_path == 'poster') $thumb=$images["url"]; }
				
				if($img_path == 'photo'.$ind_str)
				{
					 $check_pic= 1;
					 $this_imagePath = $images["url"];
				}
			}  
			if($check_pic != 1){ $this_imagePath =""; }
				  
			$Addtional_pics [$ind_str] = $this_imagePath;  
		//}
    }
	
	$mobDes= $dAry['docs'][0]['u_Mobile_Description__Sub_head__s'];

    $thmenName= isset($dAry['docs'][0]['u_Theme_s']) ? $dAry['docs'][0]['u_Theme_s'] : ''; 

    if(isset($dAry['docs'][0]['u_NSFW_Tag_s']) && $dAry['docs'][0]['u_NSFW_Tag_s'] =="NSFW" && $dAry['docs'][0]['u_NSFW_Tag_s'] =="NSFW"){ $NSFW=true; }

	
$file_path = $thumb;

$Keywords_kwstr =  implode(",", $dAry['docs'][0]['c_tag_smv']);

$cat_id = $dAry['docs'][0]['c_category_smv'][0];

$CateName = array_search ( $cat_id, $menuAry );

$edate=strtotime('-3 day',$_date);

$sdate=$_date;

$getNextUrls = APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?start=0&count=10&sort=c_ts_publish_l+desc&filters[]=c_ts_publish_l:['.$edate.'%20TO%20'.$sdate.']';

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

		$_next_thumb = $dAryn4[$next_key]['thumbnails'];
		
		foreach ($_next_thumb as $key => $value1) {
			if ( $value1['role']=='poster' ) {  $next_thumb = $value1['url']; }
		}
		
		$next_id= $dAryn4[$next_key]['obj_id'];
		$prev_link=THIS_SITE.remove_punc($prev_title).'-'.$prev_id;
		$next_link=THIS_SITE.remove_punc($next_title).'-'.$next_id;
	}
	
	//Remove Ad
$removeAdsArr = array('2929429','2913924','3196077','3084274','2929247','2929462','2913669','2924575','2912521','3142714','2916254','3307045','2916111','3391283','2925934','3123283',
'2913530','2916788','2914377','3140004','3069620','3354086','2929594','2928479','2924546','3104523');
$removeAdd = false;
if (in_array($video_id, $removeAdsArr)) {
    $removeAdd = true;
}
?>