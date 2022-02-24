<?php 
require "../configA.php";
	//API key & alias
// define('APPLICATION_ALIAS','NMTomoUS-universal-flash');
/*define('APPLICATION_URL','http://nextmedia-mcp.anvato.net/api?');
define('APPLICATION_FEED_URL','http://api.nm.anvato.net/v2/feed/');
define('APPLICATION_PRIVATE','074FA752D96A4AD6AD9972B3687A2F4A');
define('APPLICATION_PUBLIC','BD6795A907354B1C80EE3A2BBA9911FF');
define('GET_SYND_TAGS','<?php xml version="1.0" ?><request><type>get_synd_tags</type><params></params></request>');
define('HASHING_ALGORITHM','sha256');*/

/// start 
$ts = time();

$cat = $_GET['cat'];

if (!isset($_GET['cat']) || ($cat == '') ){ 
	exit; 
}

	$feed = $catLink[$cat];
	define('TITLEFEED', $cat);//$titleFeed = $mrssFeed[$cat][1];

	$sdate30=strtotime(date('Y-m-d', strtotime('-90 days')));
	$edate30=strtotime(date('Y-m-d'));
	$dateChar = '&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']';
	
	$fileName = 'mrss_'.$cat.'.xml';
	$save_path = 'mrss/';

	// BEGIN Syndicate Now

	$getUrls2Now= APPLICATION_FEED_URL.$feed.'?start=0&count=100'.$dateChar.'&sort=c_ts_publish_l+desc'; 
	$ww=curl_info($getUrls2Now, '', '');
	$dAry22=json_decode($ww, true);
    $dAryn2=$dAry22['docs'];
	$numFound=$dAry22['numFound'];

	generate_xml($dAryn2);

function generate_xml($dAryn2){
	$xml_doc = new DOMDocument();
		$xml_doc->formatOutput = true;
		$urlset = $xml_doc->createElement('rss');
		
		/*$urlsetA = $xml_doc->createAttribute('xmlns:media');
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
		*/
		$urlsetA = $xml_doc->createAttribute('version');
		$urlsetA -> value = '2.0';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		
		$channel = $xml_doc->createElement('channel');
		$channel = $urlset->appendChild($channel);
		
		$title = $xml_doc->createElement('title');
		$title = $channel->appendChild($title);
		$titleCont = $xml_doc->createTextNode('TomoNews - '.strtoupper(TITLEFEED). ' Feed' );
		$titleCont = $title->appendChild($titleCont);
		
		$link = $xml_doc->createElement('link');
		$link = $channel->appendChild($link);
		$linkCont = $xml_doc->createTextNode(THIS_SITE);
		$linkCont = $link->appendChild($linkCont);
		
		$language = $xml_doc->createElement('language');
		$language = $channel->appendChild($language);
		$langCont = $xml_doc->createTextNode('en-us');
		$langCont = $language->appendChild($langCont);
		
		$title = $xml_doc->createElement('lastBuildDate');
		$title = $channel->appendChild($title);
		$titleCont = $xml_doc->createTextNode(date('r'));
		$titleCont = $title->appendChild($titleCont);
	
		foreach ($dAryn2 as $key => $value) {
			
			$obj_id =$value['obj_id'];
			$titleS = $value['c_title_s'];

			$description= $value['c_description_s'];
			$duration = $value['info']['duration'];
			$description = preg_replace("(\xe2\x80\x94)", "", $description);  
			$description = preg_replace("(\r)", "", $description);
			$description = preg_replace("(\n)", "", $description);

			$linkUrl = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($titleS))).'-'.$obj_id;
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
			
			$link = $xml_doc->createElement('link');
			$link = $item->appendChild($link);
			$linkCont = $xml_doc->createTextNode($linkUrl);
			$linkCont = $link->appendChild($linkCont);
			
			$desc = $xml_doc->createElement('description');
			$desc = $item->appendChild($desc);
			$descCont = $xml_doc->createCDATASection($description);
			$descCont = $desc->appendChild($descCont);

			$videoPubDate = $xml_doc->createElement('pubDate');
			$videoPubDate = $item->appendChild($videoPubDate);
			$videoPubDateCont = $xml_doc->createTextNode(date('r',$value['c_ts_publish_l']));
			$videoPubDateCont = $videoPubDate->appendChild($videoPubDateCont);
					
				 
			foreach ($thumbnail as $key => $value1) {
				if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; break;}
			}
						
			$videoThumb = $xml_doc->createElement('enclosure');
			$thumbs = $xml_doc->createAttribute('url');
			$thumbs -> value = $thumb;
			$videoThumb->appendChild($thumbs);
			$videoThumb = $item->appendChild($videoThumb);
		}
		
		header('Content-type: text/xml');
		echo $xml_doc->saveXML();
		

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