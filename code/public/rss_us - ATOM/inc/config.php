<?php 
/***********************************************************************
 @ filename     : inc/config.php
 @ author       : Siako Chen
 @ created      : 2011-11-18
 @ modified     : 2013-12-05
***********************************************************************/

# load site wide configs   
define( 'PATH_ROOT',           '/var/www/html/tomo_us/rss_us/' );////var/www/html/rss2/	   
define( 'DEBUG',               true );
define( 'APPLICATION_URL',     'http://api.nm.anvato.net/v2/feed/'); 
define( 'PAGE_LIMIT_CATEGORY', 22); 
define( 'GETURL',              'http://api.nmhk.movideo.com/rest/media/search?tags=[%22keyword:name=*%22]&page=0&pageSize=259&orderDesc=true&orderBy=creationdate&output=json&token=' ); 
define( 'SERVER_NAME',		   $_SERVER['SERVER_NAME']);
##### Set Website folder #####
define( 'INC',	'./inc/' );	# Config folder

##### Set System config #####
require_once(INC . 'class_session.php' );  # SESSION Class
require_once(INC . 'FeedTypes.php' );      # RSS2 Class


##### Set Language encode #####
define( 'CHARSET',	'UTF-8' );

 $menuAry['U.S.']='4476';
 $menuAry['Asia']='4478';
 $menuAry['World']='4477';
 $menuAry['Sci&Tech']='4485';
 $menuAry['Entertainment']='4480';
 $menuAry['Sports']='4479';
 $menuAry['Satire']='4486';
 
 $cateRouteAry['us']='4476';
 $cateRouteAry['asia']='4478';
 $cateRouteAry['world']='4477';
 $cateRouteAry['scitech']='4485';
 $cateRouteAry['entertainment']='4480';
 $cateRouteAry['sports']='4479';
 $cateRouteAry['satire']='4486';
 
function get_indexList($page,$pageLimit,$sdate,$edate){

	if($sdate!=''&&$edate!=''){

		$d='&creationDateOperator=range&creationDate='.$sdate.'T00:00:00,'.$edate.'T23:50:59';
	
	}

	$kw='["keyword:name=*"]';
	$getUrls=APPLICATION_URL.'media/search?'.$omi.'tags='.$kw.'&page='.$page.'&pageSize='.$pageLimit.'&orderDesc=true&orderBy=creationdate&output=json&token='.$_SESSION['token'].' ';
	
	return $getUrls;
	unset($getUrls);

}

function curl_info($url) {

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

}



##### Create new SESSION CLASS Object #####
//$Session = new Session();
?>