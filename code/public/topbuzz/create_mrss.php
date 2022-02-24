<?php 
include_once("../configA.php");
	//API key & alias
// define('APPLICATION_ALIAS','NMTomoUS-universal-flash');
/*define('APPLICATION_URL','http://nextmedia-mcp.anvato.net/api?');
define('APPLICATION_FEED_URL','http://api.nm.anvato.net/v2/feed/');
define('APPLICATION_PRIVATE','3B80540E925B4BB6B5AE7A363AA551C8');
define('APPLICATION_PUBLIC','8353B77A240044B1BA565E0393C18E88');*/
	//movideo token will expire after 3600 sec .
	//so we make our session keep 40 mins (40m*60s=2400s) . 

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
		generate_xml($dAryn2, $save_path, $fileName, $menuAry);
		
	}else{
		
		generate_new_xml($dAryn2, $save_path, $fileName, $menuAry);
		//file_put_contents($save_path.$fileName, $ww);
	}
	//header('Content-Type: application/xml');
	//header("Location: /Kl9ro/nKl9ro");

function generate_new_xml($dAryn2, $save_path, $fileName, $menuAry){
		$xml_doc = new DOMDocument('1.0','utf-8');
		$xml_doc->formatOutput = true;
		$urlset = $xml_doc->createElement('rss');
		
		$urlsetA = $xml_doc->createAttribute('version');
		$urlsetA -> value = '2.0';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		
		
		/*$channel = $xml_doc->createElement('channel');
		$channel = $urlset->appendChild($channel);*/
		
		$title = $xml_doc->createElement('source');
		$title = $urlset->appendChild($title);
		$titleCont = $xml_doc->createTextNode('RSS feed for Topbuzz');
		$titleCont = $title->appendChild($titleCont);
		
		/*$title = $xml_doc->createElement('lastBuildDate');
		$title = $channel->appendChild($title);
		$titleCont = $xml_doc->createTextNode(date('r'));
		$titleCont = $title->appendChild($titleCont);*/
	
		foreach ($dAryn2 as $key => $value) {
			
			$duration = $value['info']['duration'];
			$obj_id =$value['obj_id'];
			$titleS = $value['c_title_s'];
			$description= $value['c_description_s'];
			$description = preg_replace("(\xe2\x80\x94)", "", $description);  
			$description = preg_replace("(\r)", "", $description);
			$description = preg_replace("(\n)", "", $description);
			$url = 'http://api.nm.anvato.net'.$value['media_url'].'?fmt=mp4';
			$url = curl_info($url, 'videoLink');
			$thumbnail = $value['thumbnails'];	
			$category = $value['c_category_smv'][0];
			$CateName = array_search ( $category, $menuAry );
			$link_a = constant("THIS_SITE").urlencode(str_replace(' ', '-', remove_punc($titleS))).'-'.$obj_id;
			
			$item = $xml_doc->createElement('item');
			$item = $urlset->appendChild($item);

			$title = $xml_doc->createElement('title');
			$title = $item->appendChild($title);
			$titleCont = $xml_doc->createTextNode($titleS);
			$titleCont = $title->appendChild($titleCont);
			
			$link = $xml_doc->createElement('link');
			$link = $item->appendChild($link);
			$linkCont = $xml_doc->createTextNode($link_a);
			$linkCont = $link->appendChild($linkCont);
			
			$videoItems = $xml_doc->createElement('videoItems');
			$videoItems = $item->appendChild($videoItems);
			
			$videoItem = $xml_doc->createElement('videoItem');
			$videoItem = $videoItems->appendChild($videoItem);
			
			$videoAddress = $xml_doc->createElement('videoAddress');
			$videoAddress = $videoItem->appendChild($videoAddress);
			$videoAddressCont = $xml_doc->createTextNode($url);
			$videoAddressCont = $videoAddress->appendChild($videoAddressCont);
			
			$videoFiletype = $xml_doc->createElement('videoFiletype');
			$videoFiletype = $videoItem->appendChild($videoFiletype);
			$videoFiletypeCont = $xml_doc->createTextNode('video/mp4');
			$videoFiletypeCont = $videoFiletype->appendChild($videoFiletypeCont);
			
			$desc = $xml_doc->createElement('videoDesc');
			$desc = $videoItem->appendChild($desc);
			$descCont = $xml_doc->createCDATASection($description);
			$descCont = $desc->appendChild($descCont);
			
			foreach ($thumbnail as $key => $value1) {
				if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
			}
						
			$videoThumb = $xml_doc->createElement('videoCover');
			$videoThumb = $videoItem->appendChild($videoThumb);
			$videoThumbCont = $xml_doc->createTextNode($thumb);
			$videoThumbCont = $videoThumb->appendChild($videoThumbCont);
			
			$videoLang = $xml_doc->createElement('videoLang');
			$videoLang = $videoItem->appendChild($videoLang);
			$videoLangCont = $xml_doc->createTextNode('en');
			$videoLangCont = $videoLang->appendChild($videoLangCont);
			
			$videoDur = $xml_doc->createElement('videoDuration');
			$videoDur = $videoItem->appendChild($videoDur);
			$videoDurCont = $xml_doc->createTextNode($duration);
			$videoDurCont = $videoDur->appendChild($videoDurCont);
			
			$videoCat = $xml_doc->createElement('videoCategory');
			$videoCat = $videoItem->appendChild($videoCat);
			$videoCatCont = $xml_doc->createTextNode($CateName);
			$videoCatCont = $videoCat->appendChild($videoCatCont);
		
			$videoTags = $xml_doc->createElement('videoTags');
			$videoTags = $videoItem->appendChild($videoTags);

			foreach ($value['c_tag_smv'] as $tag){
				$videoTag = $xml_doc->createElement('Tag');
				$videoTag = $videoTags->appendChild($videoTag);
				$videoTagCont = $xml_doc->createTextNode(trim($tag));
				$videoTagCont = $videoTag->appendChild($videoTagCont);
			
			}

			$videoPubDate = $xml_doc->createElement('pubDate');
			$videoPubDate = $item->appendChild($videoPubDate);
			$videoPubDateCont = $xml_doc->createTextNode(date('r',$value['c_ts_publish_l']));
			$videoPubDateCont = $videoPubDate->appendChild($videoPubDateCont);
		}
		$xml_doc->save($save_path.$fileName);
		

}
	
function generate_xml($dAryn2, $save_path, $fileName, $menuAry){
	$xml_doc = new DOMDocument();
	$xml_doc->preserveWhiteSpace = false;
	$xml_doc -> formatOutput = true;
	$xml_doc -> load($save_path.$fileName);
	$channel =  $xml_doc -> getElementsByTagName("rss")->item(0); 
		
	foreach ($dAryn2 as $key => $value) {
			
			$duration = $value['info']['duration'];
			$obj_id =$value['obj_id'];
			$titleS = $value['c_title_s'];
			$description= $value['c_description_s'];
			$description = preg_replace("(\xe2\x80\x94)", "", $description);  
			$description = preg_replace("(\r)", "", $description);
			$description = preg_replace("(\n)", "", $description);
			$url = 'http://api.nm.anvato.net'.$value['media_url'].'?fmt=mp4';
			$url = curl_info($url, 'videoLink');
			$thumbnail = $value['thumbnails'];	
			$category = $value['c_category_smv'][0];
			$CateName = array_search ( $category, $menuAry );
			$link_a = constant("THIS_SITE").urlencode(str_replace(' ', '-', remove_punc($titleS))).'-'.$obj_id;
			
			$item = $xml_doc->createElement('item');
			$item = $channel->appendChild($item);

			$title = $xml_doc->createElement('title');
			$title = $item->appendChild($title);
			$titleCont = $xml_doc->createTextNode($titleS);
			$titleCont = $title->appendChild($titleCont);
			
			$link = $xml_doc->createElement('link');
			$link = $item->appendChild($link);
			$linkCont = $xml_doc->createTextNode($link_a);
			$linkCont = $link->appendChild($linkCont);
			
			$videoItems = $xml_doc->createElement('videoItems');
			$videoItems = $item->appendChild($videoItems);
			
			$videoItem = $xml_doc->createElement('videoItem');
			$videoItem = $videoItems->appendChild($videoItem);
			
			$videoAddress = $xml_doc->createElement('videoAddress');
			$videoAddress = $videoItem->appendChild($videoAddress);
			$videoAddressCont = $xml_doc->createTextNode($url);
			$videoAddressCont = $videoAddress->appendChild($videoAddressCont);
			
			$videoFiletype = $xml_doc->createElement('videoFiletype');
			$videoFiletype = $videoItem->appendChild($videoFiletype);
			$videoFiletypeCont = $xml_doc->createTextNode('video/mp4');
			$videoFiletypeCont = $videoFiletype->appendChild($videoFiletypeCont);
			
			$desc = $xml_doc->createElement('videoDesc');
			$desc = $videoItem->appendChild($desc);
			$descCont = $xml_doc->createCDATASection($description);
			$descCont = $desc->appendChild($descCont);
			
			foreach ($thumbnail as $key => $value1) {
				if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
			}
						
			$videoThumb = $xml_doc->createElement('videoCover');
			$videoThumb = $videoItem->appendChild($videoThumb);
			$videoThumbCont = $xml_doc->createTextNode($thumb);
			$videoThumbCont = $videoThumb->appendChild($videoThumbCont);
			
			$videoLang = $xml_doc->createElement('videoLang');
			$videoLang = $videoItem->appendChild($videoLang);
			$videoLangCont = $xml_doc->createTextNode('en');
			$videoLangCont = $videoLang->appendChild($videoLangCont);
			
			$videoDur = $xml_doc->createElement('videoDuration');
			$videoDur = $videoItem->appendChild($videoDur);
			$videoDurCont = $xml_doc->createTextNode($duration);
			$videoDurCont = $videoDur->appendChild($videoDurCont);
			
			$videoCat = $xml_doc->createElement('videoCategory');
			$videoCat = $videoItem->appendChild($videoCat);
			$videoCatCont = $xml_doc->createTextNode($CateName);
			$videoCatCont = $videoCat->appendChild($videoCatCont);
		
			$videoTags = $xml_doc->createElement('videoTags');
			$videoTags = $videoItem->appendChild($videoTags);

			foreach ($value['c_tag_smv'] as $tag){
				$videoTag = $xml_doc->createElement('Tag');
				$videoTag = $videoTags->appendChild($videoTag);
				$videoTagCont = $xml_doc->createTextNode(trim($tag));
				$videoTagCont = $videoTag->appendChild($videoTagCont);
			
			}

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