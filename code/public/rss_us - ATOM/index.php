<?php 
/***************************************************************************
 @ system		: RSS - inyoho.com
 @ version		: V1.0
 @ WebSite		: TOMONEWS RSS2.0 parse
 @ author       : Siako Chen
 @ release      : 2014-09-30
 @ modified     : 2048M14-09-30
 @ comment		: (RSS2 output)
***************************************************************************/
############################################################################
# Load system config													   #
############################################################################
require_once( './inc/config.php' );

ini_set( "memory_limit", "2048M" );

############################################################################
# Document output encode												   #
############################################################################
header( "Content-type: text/html; charset=" . CHARSET );

############################################################################
# Loading NMA JP Video data query                         				   #
############################################################################
//$getUrls = chk_token();
$sdate30=strtotime(date('Y-m-d', strtotime('-1 days')));
$edate30=strtotime(date('Y-m-d'));
$getUrls =APPLICATION_URL.'KBJRKBD5PNUFPGRALF?start=0&count=150&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']&sort=c_ts_publish_l+desc'; 
$data = curl_info($getUrls, '');
$dAry=json_decode($data, true);
$dAryn=$dAry['docs'];


/*$dAry = json_decode($data, true);
$dAryn = $dAry['pager']['list'][0]['media'];*/
 

############################################################################
# Create RSS2 Class 													   #
############################################################################
$newFeed = new ATOMFeedWriter();
$newItem = $newFeed->createNewItem();

############################################################################
# Create Feeds & Item       											   #
############################################################################
$i = 0;
foreach( (array)$dAryn as $key => $value ){

	$content = trim(preg_replace('/\s+/', ' ', $value['u_Mobile_Description__Sub_head__s']));
	$thumbnail = $value['thumbnails'];
	$category_id = array_search( $value['c_category_smv'][0], $cateRouteAry );
	$category = array_search( $value['c_category_smv'][0], $menuAry );
	
	foreach ($thumbnail as $key => $value1) {
		if ( $value1['role']=='Thumbnail' || $value1['role'] == 'thumbnail') {  $thumb = $value1['url']; break;}
	}

	$newItem = $newFeed->createNewItem();
	$newItem->setCategory( $category );
	$newItem->setLink($value['c_title_s'].'-'.$value['obj_id']);
	$newItem->addElementArray( array( //'id'       => $value['obj_id'], 
									  'title'       => $value['c_title_s'], 
	                                  'content' => '<p>'.$content.'</p><p><a href="'.SERVER_NAME.'/category/'.$category_id.'">'.$category.'</p><img src="'.$thumb.'" " width="240" height="160" alt="'.$value['c_title_s'].'">'
	                                ) );
	$newItem->setDate( $value['c_ts_publish_l'] ); 
	
	$newFeed->addItem( $newItem );
	
}	  

############################################################################
# parse RSS2 start          											   #
############################################################################
/*
header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header( "Last-Modified: " . gmdate("D, d M Y H:i:s ") . " GMT" );
header( "Cache-Control: must-revalidate, post-check=0, pre-check=0" );
header( "Pragma: public" );
header( "Content-type: text/xml" );
header( 'Content-Disposition: attachment; filename="tomonews_jp_rss2.xml";' );
*/
$newFeed->generateFeed();
?>