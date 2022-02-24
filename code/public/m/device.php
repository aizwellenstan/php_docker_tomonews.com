<?php 
require_once 'libs/detect.php';
$mobile_browser = 0;
$tablet_browser =0;
function GET_IP_FUNC(){
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
	$ip = $_SERVER['REMOTE_ADDR'];
	}
	$ip = explode("," , $ip);
	return $ip[0];
	unset($ip);
}

preg_match("/iPhone|Android|iPad|iPod|webOS/", $_SERVER['HTTP_USER_AGENT'], $matches);
$os = current($matches);

switch($os){
   case 'iPhone': $device='ios'; break;
   case 'Android': $device='android'; break;
   case 'iPad': $device='ios'; break;
   case 'iPod': $device='ios'; break;
   case 'webOS': $device='web'; break;
}

?>
