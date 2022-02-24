<?php 
	require "../configA.php";

	$fileName = 'mrss_'.date('Y').date('m').'.xml';
	$save_path = 'mrss/';

	// BEGIN Syndicate Now
	$sdate30=strtotime(date('Y-m-d h:i:sa', strtotime('-36 hours')));
	$edate30=strtotime(date('Y-m-d h:i:sa'));
	$dateChar = '&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']';
	$getUrls2Now= APPLICATION_FEED_URL.'LFIWPADWPE3FGU3VANNA?start=0&count=100'.$dateChar.'&sort=c_ts_publish_l+desc';
	$ww=curl_info($getUrls2Now, '');
	$dAry22=json_decode($ww, true);
    $dAryn2=$dAry22['docs'];
    generate_xml($dAryn2, $save_path, $fileName);

function generate_xml($dAryn2, $lang, $typeContent){

		$xml_doc = new DOMDocument('1.0','utf-8');
		$xml_doc->formatOutput = true;
		$xml_doc->preserveWhiteSpace = false;
		$root = $xml_doc->appendChild($xml_doc->createElement("articles"));
		
		$title = $xml_doc->createElement('UUID');
		$title = $root->appendChild($title);
		$titleCont = $xml_doc->createTextNode('d0r3hz'.$lang.$dAryn2[0]['obj_id']);
		$titleCont = $title->appendChild($titleCont);
		
		$date = $xml_doc->createElement('time');
		$date = $root->appendChild($date);
		$dateCont = $xml_doc->createTextNode(round(microtime(true) * 1000));
		$dateCont = $date->appendChild($dateCont);
	
		foreach ($dAryn2 as $key => $value) {
			
			$obj_id =$value['obj_id'];
			$titleS = $value['c_title_s'];
			$description= $value['c_description_s'];
			$description = preg_replace("(\xe2\x80\x94)", "", $description);  
			$description = preg_replace("(\r)", "", $description);
			$description = preg_replace("(\n)", "", $description);
			$category = isset($value['info']['categories'][0]['name']) ? $value['info']['categories'][0]['name'] : '';
			$fmt = $typeContent == 'mp4' ? '?fmt=mp4' : '';
			$url = 'http://api.nm.anvato.net'.$value['media_url'].$fmt;
			$url = curl_info($url, 'videoLink', $typeContent);

			$linkUrl = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($titleS))).'-'.$obj_id;
			$thumbnail = $value['thumbnails'];	
			
			$item = $xml_doc->createElement('article');
			$item = $root->appendChild($item);
			
			$guidNode = $xml_doc->createElement('ID');
			$guidNode = $item->appendChild($guidNode);
			$guidCont = $xml_doc->createTextNode($obj_id);
			$guidCont = $guidNode->appendChild($guidCont);
			
			$nativeNode = $xml_doc->createElement('nativeCountry');
			$nativeNode = $item->appendChild($nativeNode);
			$nativeCont = $xml_doc->createTextNode('ID');
			$nativeCont = $nativeNode->appendChild($nativeCont);
			
			$langNode = $xml_doc->createElement('language');
			$langNode = $item->appendChild($langNode);
			$langCont = $xml_doc->createTextNode('id');
			$langCont = $langNode->appendChild($langCont);
			
			$title = $xml_doc->createElement('title');
			$title = $item->appendChild($title);
			$titleCont = $xml_doc->createCDATASection($titleS);
			$titleCont = $title->appendChild($titleCont);
			
			$cat = $xml_doc->createElement('category');
			$cat = $item->appendChild($cat);
			$catCont = $xml_doc->createCDATASection($category);//
			$catCont = $cat->appendChild($catCont);
			
			$type = $xml_doc->createElement('contentType');
			$type = $item->appendChild($type);
			$typeCont = $xml_doc->createTextNode('5');
			$typeCont = $type->appendChild($typeCont);

			$videoPubDate = $xml_doc->createElement('publishTimeUnix');
			$videoPubDate = $item->appendChild($videoPubDate);
			$videoPubDateCont = $xml_doc->createTextNode( round($value['c_ts_publish_l'] *1000 ) );
			$videoPubDateCont = $videoPubDate->appendChild($videoPubDateCont);
			
			$startDate = $xml_doc->createElement('startYmdtUnix');
			$startDate = $item->appendChild($startDate);
			$startDateCont = $xml_doc->createTextNode( round($value['c_ts_airdate_l'] *1000 ) );
			$startDateCont = $startDate->appendChild($startDateCont);
			
			$endDate = $xml_doc->createElement('endYmdtUnix');
			$endDate = $item->appendChild($endDate);
			$endDateCont = $xml_doc->createTextNode( round($value['c_ts_expire_l'] *1000 ) );
			$endDateCont = $endDate->appendChild($endDateCont);
					
				 
			foreach ($thumbnail as $key => $value1) {
				if ( $value1['role']=='poster' ) {  
					$thumb = $value1['url']; 
					break;
				}elseif ($value1['role']=='thumbnail'){
					$thumb = $value1['url']; 
					break;
				}
			}
						
			$videoThumb = $xml_doc->createElement('thumbnail');
			$videoThumb = $item->appendChild($videoThumb);
			$videoThumbCont = $xml_doc->createTextNode($thumb);
			$videoThumbCont = $videoThumb->appendChild($videoThumbCont);
			
			$contents = $xml_doc->createElement('contents');
			$contents = $item->appendChild($contents);			
			$video = $xml_doc->createElement('video');
			$video = $contents->appendChild($video);
			
			$videoT = $xml_doc->createElement('title');
			$videoT = $video->appendChild($videoT);
			$videoTCont = $xml_doc->createCDATASection($titleS);
			$videoTCont = $videoT->appendChild($videoTCont);
			$videoU = $xml_doc->createElement('url');
			$videoU = $video->appendChild($videoU);
			$videoUCont = $xml_doc->createTextNode($url);
			$videoUCont = $videoU->appendChild($videoUCont);			
			$videoI = $xml_doc->createElement('thumbnail');
			$videoI = $video->appendChild($videoI);
			$videoICont = $xml_doc->createTextNode($thumb);
			$videoICont = $videoI->appendChild($videoICont);
			
			$text = $xml_doc->createElement('text');
			$text = $contents->appendChild($text);
			$content = $xml_doc->createElement('content');
			$content = $text->appendChild($content);
			$Cont = $xml_doc->createCDATASection($description);
			$Cont = $content->appendChild($Cont);

		}
		
		header('Content-type: text/xml');
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
