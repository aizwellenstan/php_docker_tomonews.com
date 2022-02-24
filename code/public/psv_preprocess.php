<?php 
$page=isset($_GET['page']) ? (int)$_GET['page'] : 1;
$debug_mode=isset($_GET['debug_mode']) ? $_GET['debug_mode'] : '';
$video_id=isset($_GET['video_id']) ? $_GET['video_id'] : 0;
$PAGE_LIMIT = 4;
	
// $getFeed = APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?filters[]=u_Next_Media_Clip_Id_s="'.$video_id.'"';
$today = date('Y-m-d');
$getFeed = "https://cms.nextanimation.com.tw/api/getProgramVideos?program=TomoNews%20US&published_date=$today&counts=20&page=0";
$dataFeed = curl_info($getFeed, null);
$dAryFeed = json_decode($dataFeed, true);
if ($dAryFeed['numFound'] > 0){
	$title_cp=  str_replace('%0D','',$dAryFeed['docs'][0]['c_title_s']);
	$title_cp= str_replace('’',"'",$title_cp);
	$title_cp= str_replace('“','"',$title_cp);
	$title_cp= htmlspecialchars($title_cp);
?>
<script type="text/javascript">
	// location.href='<?php echo THIS_SITE?><?php  echo urlencode(str_replace(' ', '-', remove_punc($title_cp))).'-'.$dAryFeed['docs'][0]['obj_id']; ?>';
</script>
<?php 
}	

$page_name ='TomoPlay';
$playlist_title = array('LATEST NEWS', 'U.S. NEWS', 'SATIRE', 'SCI & TECH', 'WORLD NEWS', 'ENTERTAINMENT', 'ASIA','SPORTS');
$playlists_arr = array('KBJRKBD5PNUFPGRALF', 'LEDFKXUWEZ4ATGZHKF','AWJAAWBJPJSRPGTSKD','AVDAMX2JE2TRRUKRBE','AMDAPWBQE2TAPT3UAG','KSLFMW4ZPZ3RIUREAG','ARBFABSIEI2WKGAHLC','KNIRIAL9PFUWEH3YAF');
$playlistsBottom_arr=array(   '',
							  'u.s.', 
                              'satire',      
                              'sci&tech',      
                              'world',           
                              'entertainment',
							  'asia',
							  'sports');
$themeplaylists_arr = array('240', '234','236','237','235','239','238');
//$themeplaylists_arr=array('270564721590272','270563916283904','270564184719360','270564453154816','270564721590272','270564990025728','270564990025729','270565258461184','270565258461185','270565527420928','270565526896640','270565795856384','270566063767552','270566332203008','270566600638464');

$plTitles_arr=array();
/*$thmTitles_arr=array('270564721590272'=>'Nasty or Niiiice',
                     '270563916283904'=>'What the Freak?',	
                     '270564184719360'=>  'Good Cop',	
                     '270564453154816'=>  'Bad Cop',	
                     '270564721590272'=>  'Celebrity Shorts',
                     '270564990025728'=>  'What the Foul?',	
                     '270564990025729'=>  'Aww! Animals!',
                     '270565258461184'=>  'Defying Death',
                   	'270565258461185'=>  'Gun Crazy',     	
                     '270565527420928'=>  'Everyday Heroes', 	        
                     '270565526896640'=> 'Justice is Served',	
                     '270565795856384'=> 'You Idiot!',	
                     '270566063767552'=> 'Police State' , 
                     '270566332203008'=> 'PC Police' , 
                     '270566600638464'=> 'Maximum Suffrage');*/

$PL = isset($_GET['playlist_id']) ? $_GET['playlist_id'] : $playlists_arr[0];

if ( strlen($PL) <= 3 ) { 

	$res_pl = array_search($PL, $themeplaylists_arr);
	if ($res_pl !== FALSE) $PL = $playlists_arr[$res_pl];
}

/*GET every list title in playlists_arr*/
foreach( $playlists_arr as $key => $value)
{

   $__title = $playlist_title[$key];//strtoupper (get_title_playlist($value));
 
   array_push( $plTitles_arr, $__title   );
   if($PL == $value)
   {
   	$current_title =$__title;
	
   }
   unset($__title);
}

$KV_THEME = 'false';




//////HANDLE target VIODE
  $today = date('Y-m-d');
  // $getUrls= APPLICATION_FEED_URL.$playlists_arr[0].'?start=0&count=1';
  $getUrls = "https://cms.nextanimation.com.tw/api/getProgramVideos?program=TomoNews%20US&published_date=$today&counts=1&page=0&category=".$playlistsBottom_arr[0];

  $data=curl_info($getUrls, ' ');
  $dAry=json_decode($data, true);		
  $dAry_j=$dAry['docs'][0];
  $meta_vid=$dAry_j['obj_id'];
  $meta_tit = $dAry_j['c_title_s'];
  $meta_desc = $dAry_j['u_Mobile_Description__Sub_head__s'];
  $thumbnail = $dAry_j['thumbnails'];
  $thumb = $thumbnail['url'];

  $duration = $dAry['docs'][0]['info']['duration'];
  $parseDur[0] = floor($duration / 60);
  $parseDur[1] = round($duration % 60);
  $cdate22 = date('Y-m-d\TH:i:s', $dAry_j['c_ts_publish_l']);

///變更META

 print_r($meta_desc);

?>
