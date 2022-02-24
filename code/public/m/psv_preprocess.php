<?php 
$page = 0;//$_GET['page'];
$video_id= $_GET['video_id'];
$PAGE_LIMIT = 8;
$page_name = "TomoPlay";

if (strlen($video_id) >= 14){
	$getFeed = APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?filters[]=u_Next_Media_Clip_Id_s="'.$video_id.'"';
	$dataFeed = curl_info($getFeed, null);
	$dAryFeed = json_decode($dataFeed, true);
	if ($dAryFeed['numFound'] > 0){
		$title_cp=  str_replace('%0D','',$dAryFeed['docs'][0]['c_title_s']);
		$title_cp= str_replace('’',"'",$title_cp);
		$title_cp= str_replace('“','"',$title_cp);
		$title_cp= htmlspecialchars($title_cp);
	?>
	<script type="text/javascript">
		location.href='<?php echo THIS_SITE?><?php  echo urlencode(str_replace(' ', '-', remove_punc($title_cp))).'-'.$dAryFeed['docs'][0]['obj_id']; ?>';
	</script>
	<?php 
	}	
}
$debug_mode=$_GET['debug_mode'];
//$page_name ='Passive Viewing Page';

$plTitles_arr=array();
$playlist_title = array('LATEST NEWS', 'U.S. NEWS', 'SATIRE', 'SCI & TECH', 'WORLD NEWS', 'ENTERTAINMENT', 'ASIA','SPORTS');
$themeplaylists_arr = array('240', '234','236','237','235','239','238','249');
$feedlists_arr = array('KBJRKBD5PNUFPGRALF', 'LEDFKXUWEZ4ATGZHKF','AWJAAWBJPJSRPGTSKD','AVDAMX2JE2TRRUKRBE','AMDAPWBQE2TAPT3UAG','KSLFMW4ZPZ3RIUREAG','ARBFABSIEI2WKGAHLC','KNIRIAL9PFUWEH3YAF');//,'261738295885824','261738026926080','261735611531264', '273356181897216' , '273356987203584');

$PL=$_GET['playlist_id'];
	
if(!(isset($PL)) )   $PL = $themeplaylists_arr[0] ;

if ( strlen($PL) > 3 ) { 

	$res_pl = array_search($PL, $feedlists_arr);
	if ($res_pl !== FALSE) $PL = $themeplaylists_arr[$res_pl];
}

if(!(isset($page)) )  $page  = 1;
if(!(isset($video_id)) )  $video_id  = 0;

/*GET every list title in playlists_arr*/
foreach( $themeplaylists_arr as $key => $value)
{

   $__title = $playlist_title[$key];
 
   array_push( $plTitles_arr, $__title   );
   if($PL == $value)
   {
   	$current_title =$__title;
	
   }
   unset($__title);
}

$KV_THEME = 'false';


	  $getUrls= 'http://sa-mcp.s3.amazonaws.com/playlists/'.$themeplaylists_arr[0].'.js';
	  $data=curl_info($getUrls, null);
	  $data=preg_replace('/.+?({.+}).+/','$1',$data);
      $dAry=json_decode($data, true);	  
      $dAry_j=$dAry['videos'][0];
      $meta_vid=$dAry_j['id'];
      $meta_tit = $dAry_j['title'];
      $meta_desc = $dAry_j['description'];
	  $thumb = $dAry_j['thumbnail'];
	  /*foreach ($thumbnail as $key => $value1) {
		if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
	  }*/
	  $duration = 0;//$dAry['docs'][0]['info']['duration'];
	  $parseDur[0] = 0;//floor($duration / 60);
	  $parseDur[1] = 0;//round($duration % 60);
	  $cdate22 = date('Y-m-d\TH:i:s', time());//date('Y-m-d\TH:i:s', $dAry_j['c_ts_publish_l']);




function get_title_playlist($playlist_id){
 $getUrls = get_CategoryList_info($playlist_id);
 $data=curl_info($getUrls);
 $dAry= json_decode($data , true);
 $title1 =  $dAry['playlist']['description'];
 return $title1;
 unset($getUrls);unset($data);unset($dAry);unset($title1);
}

?>