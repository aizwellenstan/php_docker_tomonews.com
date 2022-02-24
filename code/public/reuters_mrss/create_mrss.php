<?php 
	//API key & alias
// define('APPLICATION_ALIAS','NMTomoUS-universal-flash');
define('APPLICATION_URL','http://nextmedia-mcp.anvato.net/api?');
define('APPLICATION_FEED_URL','http://api.nm.anvato.net/v2/feed/');
define('APPLICATION_PRIVATE','074FA752D96A4AD6AD9972B3687A2F4A');
define('APPLICATION_PUBLIC','BD6795A907354B1C80EE3A2BBA9911FF');
define('GET_SYND_TAGS','<?php xml version="1.0" ?><request><type>get_synd_tags</type><params></params></request>');
define('HASHING_ALGORITHM','sha256');

/// start 
$ts = time();

$mrssFeed = array (
	'r2sy8p' => array (0 => 'AWIAIWSJPBURKHIDBBIA', 1=> 'MRSS Feed for Reuters'),
	'f5h4to' => array (0 => 'LFNRIV4WQNURAGACA5CA', 1 => 'Reuters Connect Content'),
);

$cat = $_GET['cat'];

if (!isset($_GET['cat']) || ($cat == '') || ($cat == 'ALL')){ 
	exit; 
}

	$feed = $mrssFeed[$cat][0];
	define('TITLEFEED', $mrssFeed[$cat][1]);//$titleFeed = $mrssFeed[$cat][1];

	if ( $cat == 'f5h4to'){
		$sdate30=strtotime(date('Y-m-d', strtotime('-2 days')));
		$edate30=strtotime(date('Y-m-d', strtotime('-1 days')));
		$dateChar = '&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']';
		$dateName = '';
	}else{
		$dateChar ='';
		$dateName = '_'.date('Y').date('m');
	}
	
	$empty = 0;
	$fileName = 'mrss_'.$cat.$dateName.'.xml';
	$save_path = 'mrss/';

	// BEGIN Syndicate Now

	$getUrls2Now= APPLICATION_FEED_URL.$feed.'?start=0&count=100'.$dateChar; 
	//print_r($getUrls2Now);
	//exit;
	//&filters[]=obj_id:3475009
	//&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']

	$ww=curl_info($getUrls2Now, '', '');
	$dAry22=json_decode($ww, true);
    $dAryn2=$dAry22['docs'];

		if(file_exists($save_path.$fileName)){
			
			generate_xml($dAryn2, $save_path, $fileName);
			
		}else{
			
			generate_new_xml($dAryn2, $save_path, $fileName);
			//file_put_contents($save_path.$fileName, $ww);
		}
	//header('Content-Type: application/xml');
	//header("Location: /Kl9ro/nKl9ro");

function generate_new_xml($dAryn2, $save_path, $fileName){
	$xml_doc = new DOMDocument();
		$xml_doc->formatOutput = true;
		$urlset = $xml_doc->createElement('rss');
		
		$urlsetA = $xml_doc->createAttribute('xmlns:media');
		$urlsetA -> value = 'http://search.yahoo.com/mrss/';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		
		$urlsetA = $xml_doc->createAttribute('xmlns:dcterms');
		$urlsetA -> value = 'http://purl.org/dc/terms/';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		
		$urlsetA = $xml_doc->createAttribute('xmlns:openSearch');
		$urlsetA -> value = 'http://a9.com/-/spec/opensearchrss/1.0/';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		
		$urlsetA = $xml_doc->createAttribute('version');
		$urlsetA -> value = '2.0';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		
		$channel = $xml_doc->createElement('channel');
		$channel = $urlset->appendChild($channel);
		
		$title = $xml_doc->createElement('title');
		$title = $channel->appendChild($title);
		$titleCont = $xml_doc->createTextNode(TITLEFEED);
		$titleCont = $title->appendChild($titleCont);
		
		$title = $xml_doc->createElement('lastBuildDate');
		$title = $channel->appendChild($title);
		$titleCont = $xml_doc->createTextNode(date('r'));
		$titleCont = $title->appendChild($titleCont);
	
		foreach ($dAryn2 as $key => $value) {
			
			$Keywords_txt = '';
			
			$duration = $value['info']['duration'];
			$obj_id =$value['obj_id'];
			$titleS = $value['c_title_s'];
			$Keywords_txt =implode(',',$value['c_tag_smv']);
			$description= $value['c_description_s'];
			$duration = $value['info']['duration'];
			$description = preg_replace("(\xe2\x80\x94)", "", $description);  
			$description = preg_replace("(\r)", "", $description);
			$description = preg_replace("(\n)", "", $description);
			$url = 'http://api.nm.anvato.net'.$value['media_url'].'?fmt=mp4';
			$url = curl_info($url, 'videoLink','');
			$thumbnail = $value['thumbnails'];	
			
			$item = $xml_doc->createElement('item');
			$item = $channel->appendChild($item);
			
			$guidNode = $xml_doc->createElement('guid');
			$guidNode = $item->appendChild($guidNode);
			$guidCont = $xml_doc->createTextNode($obj_id);
			$guidCont = $guidNode->appendChild($guidCont);
			
			
			$title = $xml_doc->createElement('title');
			$title = $item->appendChild($title);
			$titleCont = $xml_doc->createCDATASection($titleS);
			$titleCont = $title->appendChild($titleCont);
			
			$desc = $xml_doc->createElement('description');
			$desc = $item->appendChild($desc);
			$descCont = $xml_doc->createCDATASection($description);
			$descCont = $desc->appendChild($descCont);

			$videoPubDate = $xml_doc->createElement('pubDate');
			$videoPubDate = $item->appendChild($videoPubDate);
			$videoPubDateCont = $xml_doc->createTextNode(date('r',$value['c_ts_publish_l']));
			$videoPubDateCont = $videoPubDate->appendChild($videoPubDateCont);
			
			$videoUrl = $xml_doc->createElement('media:content');
			$vUrl = $xml_doc->createAttribute('url');
			$vUrl -> value = $url;
			$videoUrl->appendChild($vUrl);
			$videoUrl = $item->appendChild($videoUrl);

			$dur = $xml_doc->createElement('duration');
			$dur = $item->appendChild($dur);
			$durCont = $xml_doc->createTextNode($duration);
			$durCont = $dur->appendChild($durCont);			
			
			$vUrl = $xml_doc->createAttribute('type');
			$vUrl -> value = 'video/mp4';
			$videoUrl->appendChild($vUrl);
			$videoUrl = $item->appendChild($videoUrl);
				 
			foreach ($thumbnail as $key => $value1) {
				if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
			}
						
			$videoThumb = $xml_doc->createElement('media:thumbnail');
			$thumbs = $xml_doc->createAttribute('url');
			$thumbs -> value = $thumb;
			$videoThumb->appendChild($thumbs);
			$videoThumb = $item->appendChild($videoThumb);
			
			if ($GLOBALS['cat'] == 'f5h4to'){
				$resp_str = get_syndtags(/*'3475009'*/$obj_id,'505');
				$ww=curl_info($resp_str, '', GET_SYND_TAGS);
				$dAry= simplexml_load_string($ww);
				$slug=(string)$dAry->params->syndication_tag_list->title_script->value;
				$slug = $slug != '' ? ','.$slug : '' ;
				/*if ($slug != ''){	
					$pos = strrpos ($slug, '-');
					$slug[$pos] = '/';
					$slug = $slug != '' ? ','.$slug : '' ;
				}else{
					$slug = '';
				}*/
			}
			$kw = $xml_doc->createElement('media:keywords');
			$kw = $item->appendChild($kw);
			$kwCont = $xml_doc->createCDATASection($Keywords_txt.$slug);
			$kwCont = $kw->appendChild($kwCont);
		}
		$xml_doc->save($save_path.$fileName);
		

}


	
function generate_xml($dAryn2, $save_path, $fileName){
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
			
		$Keywords_txt = '';
			
		$duration = $value['info']['duration'];
		$obj_id =$value['obj_id'];
		$titleS = $value['c_title_s'];
		$Keywords_txt =implode(',',$value['c_tag_smv']);
		$description= $value['c_description_s'];
		$description = preg_replace("(\xe2\x80\x94)", "", $description);  
		$description = preg_replace("(\r)", "", $description);
		$description = preg_replace("(\n)", "", $description);
		$duration = $value['info']['duration'];
		$url = 'http://api.nm.anvato.net'.$value['media_url'].'?fmt=mp4';
		$url = curl_info($url, 'videoLink','');
		$thumbnail = $value['thumbnails'];
		
		$item = $xml_doc->createElement('item');
		$item = $channel->appendChild($item);
		
		$guidNode = $xml_doc->createElement('guid');
		$guidNode = $item->appendChild($guidNode);
		$guidCont = $xml_doc->createTextNode($obj_id);
		$guidCont = $guidNode->appendChild($guidCont);
		
		$title = $xml_doc->createElement('title');
		$title = $item->appendChild($title);
		$titleCont = $xml_doc->createCDATASection($titleS);
		$titleCont = $title->appendChild($titleCont);
		
		$desc = $xml_doc->createElement('description');
		$desc = $item->appendChild($desc);
		$descCont = $xml_doc->createCDATASection($description);
		$descCont = $desc->appendChild($descCont);

		$videoPubDate = $xml_doc->createElement('pubDate');
		$videoPubDate = $item->appendChild($videoPubDate);
		$videoPubDateCont = $xml_doc->createTextNode(date('r',$value['c_ts_publish_l']));
		$videoPubDateCont = $videoPubDate->appendChild($videoPubDateCont);
		
		$videoUrl = $xml_doc->createElement('media:content');
		$vUrl = $xml_doc->createAttribute('url');
		$vUrl -> value = $url;
		$videoUrl->appendChild($vUrl);
		$videoUrl = $item->appendChild($videoUrl);
		
		$vUrl = $xml_doc->createAttribute('type');
		$vUrl -> value = 'video/mp4';
		$videoUrl->appendChild($vUrl);
		$videoUrl = $item->appendChild($videoUrl);
					
		$dur = $xml_doc->createElement('duration');
		$dur = $item->appendChild($dur);
		$durCont = $xml_doc->createTextNode($duration);
		$durCont = $dur->appendChild($durCont);	
			
		foreach ($thumbnail as $key => $value1) {
			if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
		}
					
		$videoThumb = $xml_doc->createElement('media:thumbnail');
		$thumbs = $xml_doc->createAttribute('url');
		$thumbs -> value = $thumb;
		$videoThumb->appendChild($thumbs);
		$videoThumb = $item->appendChild($videoThumb);
	
		if ($GLOBALS['cat'] == 'f5h4to'){
			$resp_str = get_syndtags(/*'3475009'*/$obj_id,'505');
			$ww=curl_info($resp_str, '', GET_SYND_TAGS);
			$dAry= simplexml_load_string($ww);
			$slug=(string)$dAry->params->syndication_tag_list->title_script->value;
			$slug = $slug != '' ? ','.$slug : '' ;
			/*if ($slug != ''){	
				$pos = strrpos ($slug, '-');
				$slug[$pos] = '/';
				$slug = $slug != '' ? ','.$slug : '' ;
			}else{
				$slug = '';
			}*/
		}
		$kw = $xml_doc->createElement('media:keywords');
		$kw = $item->appendChild($kw);
		$kwCont = $xml_doc->createCDATASection($Keywords_txt.$slug);
		$kwCont = $kw->appendChild($kwCont);
		
	}
	$xml_doc->save($save_path.$fileName);
}

function curl_info($url, $type, $req) { //anvato
    $ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	if ($type == 'videoLink'){
		curl_setopt($ch, CURLOPT_HEADER, TRUE);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
	}
	
	if ($req != ''){
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array ( "Content-Type: application/xml" ) );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $req );
	}
	
	$data = curl_exec($ch);
	
	if ($type == 'videoLink'){
		$retVal = array();
        $fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $data));
         $data = trim(substr($fields[5],10));
	}
	curl_close($ch);
    unset($ch);unset($url);
    return $data;
	
}

function generate_hash($xml){ //anvato
	return base64_encode( hash_hmac( HASHING_ALGORITHM, $xml, APPLICATION_PRIVATE, true ) );
}

function convert_xml_in_array($data){ //anvato
	
	$array_data = simplexml_load_string( $data, 'SimpleXMLElement', LIBXML_NOCDATA);
	return json_decode(json_encode((array)$array_data), TRUE);
}

function get_syndtags($video_id, $synd_id){//anvato
	
	$ts=$GLOBALS['ts'];
	$str = GET_SYND_TAGS;
	$xml = $str.$ts;
	$hash= generate_hash($xml); 
	$getUrls=APPLICATION_URL.'ts='.$ts.'&sgn='.urlencode($hash).'&id='.APPLICATION_PUBLIC.'&upload_id='.$video_id.'&syndicator_id='.$synd_id;
	return $getUrls;
	unset($getUrls);
}





?>