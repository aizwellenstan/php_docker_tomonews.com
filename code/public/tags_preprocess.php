<?php 
$AdImg_arr = array('GIF_300x250-Baby-Panda.gif','GIF_300x250-Baby-Panda-2.gif','GIF_300x250-marijuana-and-panda.gif' ,  'GIF_300x250_marijuana-man.gif');//'GIF_300x250-marijuana-man.gif' ,
$KW=$_GET['kw'];
$page=isset($_GET['page']) ? (int)$_GET['page'] : '';
$debug_mode=isset($_GET['debug_mode']) ? $_GET['debug_mode'] : '';
if(!is_int($page)||$page==''||$page==0  ){ $page=1; }

$cate_name =urldecode ($KW );// str_replace('%2520', '' ,$KW);
$topic_name = $cate_name;
$thisURL=THIS_SITE.'tags.php?kw='.$KW;
//
 $SUB_CATENAME= $cate_name;
 $KW=rawurlencode($SUB_CATENAME);
 
 	$getUrls = get_playlistinfo(255);
	$player_info = curl_info($getUrls, LIST_PLAYER);
	$dAry= simplexml_load_string($player_info);
	$dAry=json_encode($dAry);
	$dAry=json_decode($dAry, true);
	$listTitle = trim($dAry['params']['playlist_list']['playlist']['description']);

//$cate_id = "232699752988672";

?>