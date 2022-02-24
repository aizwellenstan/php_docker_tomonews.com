<?php 
	//API key & alias
define('APPLICATION_FEED_URL','http://api.nm.anvato.net/v2/feed/');
define('THIS_SITE','http://'.$_SERVER['SERVER_NAME'].'/'); 

$mrssFeed = array ('ALL' => 'KBJRKBD5PNUFPGRALF',
	'US' => 'LEDFKXUWEZ4ATGZHKF',
	'WORLD' => 'AMDAPWBQE2TAPT3UAG',
	'ASIA' => 'ARBFABSIEI2WKGAHLC',
	'SCITECH' => 'AVDAMX2JE2TRRUKRBE',
	'SPORTS' => 'KNIRIAL9PFUWEH3YAF',
	'ENTERTAINMENT' => 'KSLFMW4ZPZ3RIUREAG',
	'SATIRE' => 'AWJAAWBJPJSRPGTSKD',
	'AWWANIMALS' => 'KWIWMBU2PE3WKHZGAG',
	'NASTYORNICE' => 'KSIWPX4ZPE3ARGAKBB',
	'WTFREAK' => 'K2JFCWL3PI2AMUAEAF',
	'YOUIDIOT' => 'KECWAWU6EV2RKSZNKD',
);

$cat = strtoupper($_GET['cat']);

if (!isset($_GET['cat']) || ($cat == '') || ($cat == 'ALL')){ 
	$feed = $mrssFeed['ALL']; 
}else{
	$feed = $mrssFeed[$cat];
}
/// start 
	// BEGIN Syndicate Now
	$sdate30=strtotime(date('Y-m-d', strtotime('-18 days')));
	$edate30=time();
	$getUrls2Now= APPLICATION_FEED_URL.$feed.'?start=0&count=150&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']&sort=c_ts_publish_l+desc'; 
	$ww=curl_info($getUrls2Now, '');
	$dAry22=json_decode($ww, true);
    $dAryn2=$dAry22['docs'];

	generate_new_xml($dAryn2, $cat);

function generate_new_xml($dAryn2, $cat=''){
	$xml_doc = new DOMDocument();
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
		
		$title = $xml_doc->createElement('title');
		$title = $channel->appendChild($title);
		$titleCont = $xml_doc->createTextNode('Tomonews '. $cat .' RSS');
		$titleCont = $title->appendChild($titleCont);
		
		$link = $xml_doc->createElement('link');
		$link = $channel->appendChild($link);
		$linkCont = $xml_doc->createTextNode(THIS_SITE);
		$linkCont = $link->appendChild($linkCont);
		
		$title = $xml_doc->createElement('lastBuildDate');
		$title = $channel->appendChild($title);
		$titleCont = $xml_doc->createTextNode(date('r'));
		$titleCont = $title->appendChild($titleCont);
		
	
		foreach ($dAryn2 as $key => $value) {
			
			//$Keywords_txt = '';
			
			$duration = $value['info']['duration'];
			$obj_id =$value['obj_id'];
			$titleS = $value['c_title_s'];
			//$Keywords_txt =implode(',',$value['c_tag_smv']);
			$description= $value['c_description_s'];
			$description = preg_replace("(\xe2\x80\x94)", "", $description);  
			$description = preg_replace("(\r)", "", $description);
			$description = preg_replace("(\n)", "", $description);
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

			$videoPubDate = $xml_doc->createElement('pubDate');
			$videoPubDate = $item->appendChild($videoPubDate);
			$videoPubDateCont = $xml_doc->createTextNode(date('r',$value['c_ts_publish_l']));
			$videoPubDateCont = $videoPubDate->appendChild($videoPubDateCont);
				 
			foreach ($thumbnail as $key => $value1) {
				if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
			}
						
			$videoThumb = $xml_doc->createElement('thumbnail');
			$thumbs = $xml_doc->createAttribute('url');
			$thumbs -> value = $thumb;
			$videoThumb->appendChild($thumbs);
			$videoThumb = $item->appendChild($videoThumb);
			
			/*$kw = $xml_doc->createElement('media:keywords');
			$kw = $item->appendChild($kw);
			$kwCont = $xml_doc->createCDATASection($Keywords_txt);
			$kwCont = $kw->appendChild($kwCont);*/
		}
		header( "Content-type: text/xml" );
		$print = $xml_doc->saveXML();
		print_r($print);
		
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
         $data = trim(substr($fields[5],10));
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