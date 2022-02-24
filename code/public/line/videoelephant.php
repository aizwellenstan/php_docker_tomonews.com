<?php 
define('APPLICATION_FEED_URL','http://api.nm.anvato.net/v2/feed/');
	//movideo token will expire after 3600 sec .
	//so we make our session keep 40 mins (40m*60s=2400s) . 
define('SESSION_LIFETIME',2400);  

	$fileName = 'mrss_'.date('Y').date('m').'.xml';
	$save_path = 'mrss/';

	// BEGIN Syndicate Now
	$sdate30=strtotime(date('Y-m-d', strtotime('-90 days')));
	$edate30=strtotime(date('Y-m-d', strtotime('-29 days')));
	// $sdate30=strtotime('2019-01-01');
	// $edate30=strtotime('2019-01-14');
	$getUrls2Now= APPLICATION_FEED_URL.'LFIWKWUWPE4AKHCSBRAA?start=0&count=40&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']&sort=c_ts_publish_l+desc'; 
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

		$titleCont = $xml_doc->createCDATASection('News Direct for VideoElephant MRSS');
		$titleCont = $title->appendChild($titleCont);
		
		$link = $xml_doc->createElement('link');
		$link = $channel->appendChild($link);
		$linkCont = $xml_doc->createTextNode('/feeds');
		$linkCont = $link->appendChild($linkCont);

		$desc = $xml_doc->createElement('description');
		$desc = $channel->appendChild($desc);
		$descCont = $xml_doc->createCDATASection('News Direct for VideoElephant MRSS feed');
		$descCont = $desc->appendChild($descCont);

		$lastBuildDate = $xml_doc->createElement('pubDate');
		$lastBuildDate = $channel->appendChild($lastBuildDate);
		$lastBuildDateCont = $xml_doc->createTextNode(date('Y-m-d H:i:s'));
		$lastBuildDateCont = $lastBuildDate->appendChild($lastBuildDateCont);
	
		foreach ($dAryn2 as $key => $value) {
			
			$Keywords_txt = '';
			
			$duration = $value['info']['duration'];
			$categories_name = $value['info']['categories'][0]['name'];
			$obj_id =$value['obj_id'];
			$titleS = $value['c_title_s'];
	
			$Keywords_txt =implode(',',$value['c_tag_smv']);
			$description= $value['c_description_s'];
			$description = preg_replace("(\xe2\x80\x94)", "", $description);  
			$description = preg_replace("(\r)", "", $description);
			$description = preg_replace("(\n)", "", $description);
			$description = str_replace($replace_1, "", $description);
			$description = str_replace($replace_2, "", $description);
			$url = 'http://api.nm.anvato.net'.$value['media_url'].'?fmt=mp4';
			$url = curl_info($url, 'videoLink');
			$thumbnail = $value['thumbnails'];	
			
			$item = $xml_doc->createElement('item');
			$item = $channel->appendChild($item);
			
			$guidNode = $xml_doc->createElement('guid');
			$tmp = $xml_doc->createAttribute('isPermaLink');
			$tmp -> value = "false";
			$guidNode->appendChild($tmp);
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
			$videoPubDateCont = $xml_doc->createTextNode(date('Y-m-d H:i:s',$value['c_ts_publish_l']));
			$videoPubDateCont = $videoPubDate->appendChild($videoPubDateCont);
			
			$category = $xml_doc->createElement('category');
			$category = $item->appendChild($category);
			$categoryCont = $xml_doc->createTextNode($categories_name);
			$categoryCont = $category->appendChild($categoryCont);
			//===
			$enclosure = $xml_doc->createElement('enclosure');
			$enclosureUrl = $xml_doc->createAttribute('url');
			$enclosureUrl -> value = $url;
			$enclosure->appendChild($enclosureUrl);
			$enclosure = $item->appendChild($enclosure);	
			$enclosureUrl = $xml_doc->createAttribute('type');
			$enclosureUrl -> value = 'video/mp4';
			$enclosure->appendChild($enclosureUrl);
			$enclosure = $item->appendChild($enclosure);
			//===

			$videoUrl = $xml_doc->createElement('media:content');
			$vUrl = $xml_doc->createAttribute('url');
			$vUrl -> value = $url;
			$videoUrl->appendChild($vUrl);
			$videoUrl = $item->appendChild($videoUrl);	
			$vUrl = $xml_doc->createAttribute('type');
			$vUrl -> value = 'video/mp4';
			$videoUrl->appendChild($vUrl);
			$videoUrl = $item->appendChild($videoUrl);
			$vUrl = $xml_doc->createAttribute('duration');
			$vUrl -> value = $duration;
			$videoUrl->appendChild($vUrl);
			$videoUrl = $item->appendChild($videoUrl);
			
			$mediaCategory = $xml_doc->createElement('media:category');
			$mediaCategory = $videoUrl->appendChild($mediaCategory);
			$mediaCategoryCont = $xml_doc->createCDATASection($categories_name);
			$mediaCategoryCont = $mediaCategory->appendChild($mediaCategoryCont);

			$mediaTags = $xml_doc->createElement('media:tags');
			$mediaTags = $videoUrl->appendChild($mediaTags);
			$mediaTagsCont = $xml_doc->createCDATASection($Keywords_txt);
			$mediaTagsCont = $mediaTags->appendChild($mediaTagsCont);

			$mediaKeywords = $xml_doc->createElement('media:keywords');
			$mediaKeywords = $videoUrl->appendChild($mediaKeywords);
			$keywordsCont = $xml_doc->createCDATASection($Keywords_txt);
			$keywordsCont = $mediaKeywords->appendChild($keywordsCont);

			foreach ($thumbnail as $key => $value1) {
				if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
			}
			$videoThumb = $xml_doc->createElement('media:thumbnail');
			$thumbs = $xml_doc->createAttribute('url');
			$thumbs -> value = htmlspecialchars($thumb);
			$videoThumb->appendChild($thumbs);
			$videoThumb = $videoUrl->appendChild($videoThumb);

			$mediaCredit = $xml_doc->createElement('media:credit');
			$tmp = $xml_doc->createAttribute('role');
			$tmp -> value = "producer";
			$mediaCredit->appendChild($tmp);
			$tmp = $xml_doc->createAttribute('scheme');
			$tmp -> value = "urn:ebu";
			$mediaCredit->appendChild($tmp);
			$mediaCredit = $videoUrl->appendChild($mediaCredit);
			$creditCont = $xml_doc->createCDATASection("News Direct");
			$creditCont = $mediaCredit->appendChild($creditCont);
	
		}
		header('Content-Type: text/xml');
		echo $xml_doc->saveXML();

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
