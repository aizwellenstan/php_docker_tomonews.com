<?php 
	//API key & alias
$if_test4= strpos( strtolower( $_SERVER['HTTP_HOST'] )  ,'tomonews');
$if_test5= strpos( strtolower( $_SERVER['HTTP_HOST'] )  ,'intranet01');

if( is_int($if_test5) ){
	define('THIS_SITE', 'http://intranet01/tomonews/tomo_us/' );
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	
}else{
 
	define('THIS_SITE', 'http://us.tomonews.com/' );
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
}

define('APPLICATION_FEED_URL','http://api.nm.anvato.net/v2/feed/');

$mrssFeed = array (
	'l34osd' => array (0 => 'ARBFABSIEI2WKGAHLC', 1=> 'Asia'),
	'q45dd9' => array (0 => 'KSLFMW4ZPZ3RIUREAG', 1 => 'Entertainment'),
	'p3d78s' => array (0 => 'AWJAAWBJPJSRPGTSKD', 1 => 'Satire'),
	'x44ey7' => array (0 => 'AVDAMX2JE2TRRUKRBE', 1 => 'Sci&Tech'),
	'm54rru' => array (0 => 'KNIRIAL9PFUWEH3YAF', 1 => 'Sports'),
	'f8jj44' => array (0 => 'LEDFKXUWEZ4ATGZHKF', 1 => 'US'),
	'bu309n' => array (0 => 'AMDAPWBQE2TAPT3UAG', 1 => 'World'),
);

$cat = $_GET['cat'];

if (!isset($_GET['cat']) || ($cat == '') || ($cat == 'ALL')){ 
	//$feed = $mrssFeed['ALL']; 
}else{
	$feed = $mrssFeed[$cat][0];
	$catName = $mrssFeed[$cat][1];
}

	$fileName = $cat."_".date('Y').date('m').'.xml';
	$save_path = 'mrss/';
/// start 
	// BEGIN Syndicate Now
	$sdate30=strtotime('-6 hours');
	$edate30=time();
	$getUrls2Now= APPLICATION_FEED_URL.$feed.'?start=0&count=150&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']&sort=c_ts_publish_l+desc'; 	
	$ww=curl_info($getUrls2Now, '');
	$dAry22=json_decode($ww, true);
    $dAryn2=$dAry22['docs'];

	if( file_exists($save_path.$fileName) ){
		generate_xml($dAryn2, $catName, $save_path, $fileName);
		
	}else{
		
		generate_new_xml($dAryn2, $catName, $save_path, $fileName);
		//file_put_contents($save_path.$fileName, $ww);
	}
	
	/*$log = fopen("Log_$feed.txt", 'a');
	$Msg = "$catName _ $feed accessed at ".date('r')."\r\n";
	fwrite($log, $Msg); 
	fclose($log);*/
	
	//header('Content-Type: application/xml');
	//header("Location: http://intranet01/tomonews/tomo_us/rss/news_$cat.html");
	

function generate_new_xml($dAryn2, $catName, $save_path, $fileName){
	$xml_doc = new DOMDocument('1.0', 'ascii');
		$xml_doc->formatOutput = true;
		$xml_doc->preserveWhiteSpace = false;
		$urlset = $xml_doc->createElement('rss');
		
		$urlsetA = $xml_doc->createAttribute('xmlns:atom');
		$urlsetA -> value = 'http://www.w3.org/2005/Atom';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		
		$urlsetA = $xml_doc->createAttribute('xmlns:metadata');
		$urlsetA -> value = 'http://www.w3.org/Metadata';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		
		$urlsetA = $xml_doc->createAttribute('version');
		$urlsetA -> value = '2.0';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		
		$channel = $xml_doc->createElement('channel');
		$channel = $urlset->appendChild($channel);
		
		
		$link = $xml_doc->createElement('link');
		$link = $channel->appendChild($link);
		$linkCont = $xml_doc->createTextNode(THIS_SITE);
		$linkCont = $link->appendChild($linkCont);
		
		$title = $xml_doc->createElement('lastBuildDate');
		$title = $channel->appendChild($title);
		$titleCont = $xml_doc->createTextNode(date('r'));
		$titleCont = $title->appendChild($titleCont);
		
	
		foreach ($dAryn2 as $key => $value) {
			
			$obj_id =$value['obj_id'];
			$titleS = $value['c_title_s'];
			$description= $value['c_description_s'];
			$description = preg_replace("(\xe2\x80\x94)", "<br/>", $description);  
			$description = preg_replace("(\r)", "<br/>", $description);
			$description = preg_replace("(\n)", "<br/>", $description);
			$url = 'http://api.nm.anvato.net'.$value['media_url'].'?fmt=mp4';
			$url = curl_info($url, 'videoLink');
			$thumbnail = $value['thumbnails'];	
			$linkUrl = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($titleS))).'-'.$obj_id;
			
			$item = $xml_doc->createElement('item');
			$item = $channel->appendChild($item);
			
			$guidNode = $xml_doc->createElement('guid');
			$guidNode = $item->appendChild($guidNode);
			$guidCont = $xml_doc->createTextNode($obj_id);
			$guidCont = $guidNode->appendChild($guidCont);
			
			
			$title = $xml_doc->createElement('title');
			$title = $item->appendChild($title);
			$titleCont = $xml_doc->createTextNode($titleS);
			$titleCont = $title->appendChild($titleCont);
			
			$desc = $xml_doc->createElement('description');
			$desc = $item->appendChild($desc);
			$descCont = $xml_doc->createCDATASection($description);
			$descCont = $desc->appendChild($descCont);
			
			$link = $xml_doc->createElement('link');
			$link = $item->appendChild($link);
			$linkCont = $xml_doc->createTextNode($linkUrl);
			$linkCont = $link->appendChild($linkCont);
			
			foreach ($thumbnail as $key => $value1) {
				if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
			}
						
			$videoThumb = $xml_doc->createElement('thumbnail');
			$thumbs = $xml_doc->createAttribute('url');
			$thumbs -> value = $thumb;
			$videoThumb->appendChild($thumbs);
			$videoThumb = $item->appendChild($videoThumb);
			
			$videoUrl = $xml_doc->createElement('media');
			$vUrl = $xml_doc->createAttribute('url');
			$vUrl -> value = $url;
			$videoUrl->appendChild($vUrl);
			$videoUrl = $item->appendChild($videoUrl);	
			
			$cate = $xml_doc->createElement('category');
			$cate = $item->appendChild($cate);
			$cateCont = $xml_doc->createTextNode($catName);
			$cateCont = $cate->appendChild($cateCont);

			$videoPubDate = $xml_doc->createElement('pubDate');
			$videoPubDate = $item->appendChild($videoPubDate);
			$videoPubDateCont = $xml_doc->createTextNode(date('r',$value['c_ts_publish_l']));
			$videoPubDateCont = $videoPubDate->appendChild($videoPubDateCont);
				 
		}
		$xml_doc->save($save_path.$fileName);

		
}


function generate_xml($dAryn2, $catName, $save_path, $fileName){
	$xml_doc = new DOMDocument();
	$xml_doc->preserveWhiteSpace = false;
	$xml_doc -> formatOutput = true;
	$xml_doc -> load($save_path.$fileName);
	$channel =  $xml_doc -> getElementsByTagName("channel")->item(0); 
	$pubDate = $channel -> getElementsByTagName("lastBuildDate")->item(0);
	
	$title = $xml_doc->createElement('lastBuildDate');
	$title = $channel->appendChild($title);
	$titleCont = $xml_doc->createTextNode(date('r'));
	$titleCont = $title->appendChild($titleCont);
		
	$channel->replaceChild($title, $pubDate);
	
	foreach ($dAryn2 as $key => $value) {
			
		$obj_id =$value['obj_id'];
		$titleS = $value['c_title_s'];
		$Keywords_txt =implode(',',$value['c_tag_smv']);
		$description= $value['c_description_s'];
		$description = preg_replace("(\xe2\x80\x94)", "<br/>", $description);  
		$description = preg_replace("(\r)", "<br/>", $description);
		$description = preg_replace("(\n)", "<br/>", $description);
		$url = 'http://api.nm.anvato.net'.$value['media_url'].'?fmt=mp4';
		$url = curl_info($url, 'videoLink');
		$thumbnail = $value['thumbnails'];	
		$linkUrl = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($titleS))).'-'.$obj_id;
			
		$item = $xml_doc->createElement('item');
		$item = $channel->appendChild($item);
			
		$guidNode = $xml_doc->createElement('guid');
		$guidNode = $item->appendChild($guidNode);
		$guidCont = $xml_doc->createTextNode($obj_id);
		$guidCont = $guidNode->appendChild($guidCont);
			
			
		$title = $xml_doc->createElement('title');
		$title = $item->appendChild($title);
		$titleCont = $xml_doc->createTextNode($titleS);
		$titleCont = $title->appendChild($titleCont);
			
		$desc = $xml_doc->createElement('description');
		$desc = $item->appendChild($desc);
		$descCont = $xml_doc->createCDATASection($description);
		$descCont = $desc->appendChild($descCont);
			
		$link = $xml_doc->createElement('link');
		$link = $item->appendChild($link);
		$linkCont = $xml_doc->createTextNode($linkUrl);
		$linkCont = $link->appendChild($linkCont);
		
		foreach ($thumbnail as $key => $value1) {
			if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
		}
						
		$videoThumb = $xml_doc->createElement('thumbnail');
		$thumbs = $xml_doc->createAttribute('url');
		$thumbs -> value = $thumb;
		$videoThumb->appendChild($thumbs);
		$videoThumb = $item->appendChild($videoThumb);
			
		$videoUrl = $xml_doc->createElement('media');
		$vUrl = $xml_doc->createAttribute('url');
		$vUrl -> value = $url;
		$videoUrl->appendChild($vUrl);
		$videoUrl = $item->appendChild($videoUrl);			
		
		$cate = $xml_doc->createElement('category');
		$cate = $item->appendChild($cate);
		$cateCont = $xml_doc->createTextNode($catName);
		$cateCont = $cate->appendChild($cateCont);

		$videoPubDate = $xml_doc->createElement('pubDate');
		$videoPubDate = $item->appendChild($videoPubDate);
		$videoPubDateCont = $xml_doc->createTextNode(date('r',$value['c_ts_publish_l']));
		$videoPubDateCont = $videoPubDate->appendChild($videoPubDateCont);
		
	}
	$xml_doc->save($save_path.$fileName);
}


function curl_info($url, $type) { //anvato
    $ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	if ($type == 'videoLink'){
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
	}
	
	$data = curl_exec($ch);
	
	if ($type == 'videoLink'){
		$retVal = array();
        $fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $data));
        if (is_array($fields) && (count($fields) >0) ){
			foreach ($fields as $fi){
				if (strpos($fi, 'Location:') !== false) {
					$data = trim(substr($fi,10));
				}
			}
		}else{
			$data = '';
		}
	}
	curl_close($ch);
    unset($ch);unset($url);
    return $data;
	
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
	$x=strtolower($x);
	return $x;
}
?>