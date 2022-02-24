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
	$sdate30=strtotime(date('Y-m-d', strtotime('-1 days')));
	$edate30=strtotime(date('Y-m-d'));
	$getUrls2Now= APPLICATION_FEED_URL.'KJJAAX47PJSRRUTTA5GA?start=0&count=150&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']&sort=c_ts_publish_l+desc'; 
	$ww=curl_info($getUrls2Now, '');
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
		$titleCont = $xml_doc->createTextNode('RSS Feed for Watchup');
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
						
			$videoThumb = $xml_doc->createElement('media:thumbnail');
			$thumbs = $xml_doc->createAttribute('url');
			$thumbs -> value = $thumb;
			$videoThumb->appendChild($thumbs);
			$videoThumb = $item->appendChild($videoThumb);
			
			$kw = $xml_doc->createElement('media:keywords');
			$kw = $item->appendChild($kw);
			$kwCont = $xml_doc->createCDATASection($Keywords_txt);
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
					
		$videoThumb = $xml_doc->createElement('media:thumbnail');
		$thumbs = $xml_doc->createAttribute('url');
		$thumbs -> value = $thumb;
		$videoThumb->appendChild($thumbs);
		$videoThumb = $item->appendChild($videoThumb);
			
		$kw = $xml_doc->createElement('media:keywords');
		$kw = $item->appendChild($kw);
		$kwCont = $xml_doc->createCDATASection($Keywords_txt);
		$kwCont = $kw->appendChild($kwCont);
		
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