<?php 
	//API key & alias
// define('APPLICATION_ALIAS','NMTomoUS-universal-flash');
define('APPLICATION_URL','http://nextmedia-mcp.anvato.net/api?');
define('APPLICATION_FEED_URL','http://api.nm.anvato.net/v2/feed/');
define('APPLICATION_PRIVATE','3B80540E925B4BB6B5AE7A363AA551C8');
define('APPLICATION_PUBLIC','8353B77A240044B1BA565E0393C18E88');
	//movideo token will expire after 3600 sec .
	//so we make our session keep 40 mins (40m*60s=2400s) . 
define('SESSION_LIFETIME',2400);  

	$fileName = 'mrss_'.date('Y').date('m').'.xml';
	$save_path = 'mrss/';

	// BEGIN Syndicate Now
	$sdate30=strtotime(date('Y-m-d', strtotime('-60 days')));
	$edate30=strtotime(date('Y-m-d', strtotime('-29 days')));
	//$sdate30=strtotime('2018-12-01');
	//$edate30=strtotime('2018-12-31');
	$getUrls2Now= APPLICATION_FEED_URL.'LFIWKWUWPE4AKHCSBRAA?start=0&count=150&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']&sort=c_ts_publish_l+desc'; 
	$ww=curl_info($getUrls2Now, '');
	$dAry22=json_decode($ww, true);
    $dAryn2=$dAry22['docs'];
    generate_new_xml($dAryn2, $save_path, $fileName);


function generate_new_xml($dAryn2, $save_path, $fileName){
	$replace_1 = "For story suggestions or custom animation requests, contact tips@nextanimation.com.tw. Visit http://archive.nextanimationstudio.com to view News Direct's complete archive of 3D news animations.RESTRICTIONS: Broadcast: NO USE JAPAN, NO USE TAIWAN Digital: NO USE JAPAN, NO USE TAIWAN";
    $replace_2 = "***For story suggestions please contact tips@nextanimation.com.twFor technical and editorial support, please contact:Asia: +61 2 93 73 1841Europe: +44 20 7542 7599Americas and Latam: +1 800 738 8377";
    
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
		$titleCont = $xml_doc->createTextNode('NewsDirect');
		$titleCont = $title->appendChild($titleCont);
		
		$link = $xml_doc->createElement('link');
		$link = $channel->appendChild($link);
		$linkCont = $xml_doc->createTextNode('https://newsdirect.nextanimationstudio.com/');
		$linkCont = $link->appendChild($linkCont);

		$desc = $xml_doc->createElement('description');
		$desc = $channel->appendChild($desc);
		$descCont = $xml_doc->createTextNode('3D Animated News Graphics');
		$descCont = $desc->appendChild($descCont);

		$lang = $xml_doc->createElement('language');
		$lang = $channel->appendChild($lang);
		$langCont = $xml_doc->createTextNode('en');
		$langCont = $lang->appendChild($langCont);

		$lastBuildDate = $xml_doc->createElement('lastBuildDate');
		$lastBuildDate = $channel->appendChild($lastBuildDate);
		$lastBuildDateCont = $xml_doc->createTextNode(date('r'));
		$lastBuildDateCont = $lastBuildDate->appendChild($lastBuildDateCont);
	
		foreach ($dAryn2 as $key => $value) {
			
			$Keywords_txt = '';
			
			$duration = $value['info']['duration'];
			$obj_id =$value['obj_id'];
			$titleS = $value['c_title_s'];
			$summaryS = $value['u_summary_s'];
			$Keywords_txt =implode(',',$value['c_tag_smv']);
			$description= $value['c_description_s'];
			$description = preg_replace("(\xe2\x80\x94)", "", $description);  
			$description = preg_replace("(\r)", "", $description);
			$description = preg_replace("(\n)", "", $description);
			$description = str_replace($replace_1, "", $description);
			$description = str_replace($replace_2, "", $description);
			$description = preg_replace("/VOICEOVER(.*)SOURCES:/","SOURCES:", $description);

			$url = 'http://api.nm.anvato.net'.$value['media_url'].'?fmt=mp4';
			$url = curl_info($url, 'videoLink');
			$thumbnail = $value['thumbnails'];	
			
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
			
			$summary = $xml_doc->createElement('summary');
			$summary = $item->appendChild($summary);
			$summaryCont = $xml_doc->createTextNode($summaryS);
			$summaryCont = $title->appendChild($summaryCont);

			$desc = $xml_doc->createElement('description');
			$desc = $item->appendChild($desc);
			$descCont = $xml_doc->createCDATASection($description);
			$descCont = $desc->appendChild($descCont);


			$videoPubDate = $xml_doc->createElement('pubDate');
			$videoPubDate = $item->appendChild($videoPubDate);
			$videoPubDateCont = $xml_doc->createTextNode(date('r',$value['c_ts_publish_l']));
			$videoPubDateCont = $videoPubDate->appendChild($videoPubDateCont);
			
			// $mediaTitle = $xml_doc->createElement('media:title');
			// $mediaTitle = $item->appendChild($mediaTitle);
			// $mediaTitleCont = $xml_doc->createTextNode($value['c_title_s']);
			// $mediaTitleCont = $mediaTitle->appendChild($mediaTitleCont);

			// $mediaDesc = $xml_doc->createElement('media:description');
			// $mediaDesc = $item->appendChild($mediaDesc);
			// $mediaDescCont = $xml_doc->createTextNode($value['c_description_s']);
			// $mediaDescCont = $mediaDesc->appendChild($mediaDescCont);

			// $mediaKey = $xml_doc->createElement('media:keywords');
			// $mediaKey = $item->appendChild($mediaKey);
			// $mediaKeyCont = $xml_doc->createTextNode($value['c_tag_smv']);
			// $mediaKeyCont = $mediaKey->appendChild($mediaKeyCont);

			$videoUrl = $xml_doc->createElement('media:content');
			$vUrl = $xml_doc->createAttribute('url');
			$vUrl -> value = $url;
			$videoUrl->appendChild($vUrl);
			$videoUrl = $item->appendChild($videoUrl);	
			
			$vUrl = $xml_doc->createAttribute('type');
			$vUrl -> value = 'video/mp4';
			$videoUrl->appendChild($vUrl);
			$videoUrl = $item->appendChild($videoUrl);
			$vUrl = $xml_doc->createAttribute('lang');
			$vUrl -> value = 'en';
			$videoUrl->appendChild($vUrl);
			$videoUrl = $item->appendChild($videoUrl);
				 
			foreach ($thumbnail as $key => $value1) {
				if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
			}
			$videoThumb = $xml_doc->createElement('media:thumbnail');
			$thumbs = $xml_doc->createAttribute('url');
			$thumbs -> value = htmlspecialchars($thumb);
			$videoThumb->appendChild($thumbs);
			$videoThumb = $item->appendChild($videoThumb);
			
			$kw = $xml_doc->createElement('media:keywords');
			$kw = $item->appendChild($kw);
			$kwCont = $xml_doc->createCDATASection($Keywords_txt);
			$kwCont = $kw->appendChild($kwCont);
		}
		header('Content-Type: text/xml');
		echo $xml_doc->saveXML();

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
		$url = 'http://api.nm.anvato.net'.$value['media_url'].'?fmt=mp4';
		$url = curl_info($url, 'videoLink');
		$thumbnail = $value['thumbnails'];
		
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
		 
		foreach ($thumbnail as $key => $value1) {
			if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
		}
					
		// $videoThumb = $xml_doc->createElement('media:thumbnail');
		// $thumbs = $xml_doc->createAttribute('url');
		// $thumbs -> value = $thumb;
		// $videoThumb->appendChild($thumbs);
		// $videoThumb = $item->appendChild($videoThumb);
			
		$kw = $xml_doc->createElement('media:keywords');
		$kw = $item->appendChild($kw);
		$kwCont = $xml_doc->createCDATASection($Keywords_txt);
		$kwCont = $kw->appendChild($kwCont);
		
	}
	//$xml_doc->save($save_path.$fileName);

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
		if ( is_array($fields) && (count($fields) >0) ){
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

?>
