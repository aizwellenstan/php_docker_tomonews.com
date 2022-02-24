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
$year = $_GET['year'];
$page = $_GET['page'];

if (!isset($_GET['cat']) || ($cat == '') || ($cat == 'ALL')){ 
	$feed = $mrssFeed['ALL']; 
}else{
	$feed = $mrssFeed[$cat];
}

if (!isset($_GET['year']) || ($year == '') ){ 
	$year = date("Y");
}

if (!isset($_GET['page']) || ($page == '') ){ 
	$page = 1;
}
/// start 
	// BEGIN Syndicate Now
	$sdate30=strtotime(date('Y-m-d h:i:s A', mktime(0, 0, 0, 1, 1, $year)));
	$edate30=strtotime(date('Y-m-d h:i:s A', mktime(11, 59, 59, 12, 31, $year)));
	$getUrls2Now= APPLICATION_FEED_URL.$feed.'?start='.(($page - 1)* 100).'&count=100&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']&sort=c_ts_publish_l+desc'; 
	
	$ww=curl_info($getUrls2Now, '');
	$dAry22=json_decode($ww, true);
    $dAryn2=$dAry22['docs'];
/*print_r($dAryn2[0]['info']['categories'][0]['name']);
exit;*/
	generate_new_xml($dAryn2, $cat);

function generate_new_xml($dAryn2, $cat=''){
	$xml_doc = new DOMDocument();
		$xml_doc->formatOutput = true;
		$xml_doc->preserveWhiteSpace = false;
		$urlset = $xml_doc->createElement('rss');
		
		/*$urlsetA = $xml_doc->createAttribute('xmlns:atom');
		$urlsetA -> value = 'http://www.w3.org/2005/Atom';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		
		$urlsetA = $xml_doc->createAttribute('xmlns:metadata');
		$urlsetA -> value = 'http://www.w3.org/Metadata';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		
		$urlsetA = $xml_doc->createAttribute('xmlns:media');
		$urlsetA -> value = 'http://search.yahoo.com/mrss/';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);*/
		
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
			
			$Keywords_txt = '';
			
			$duration = $value['info']['duration'];
			$obj_id =$value['obj_id'];
			$titleS = $value['c_title_s'];
			$Keywords_txt =implode(',',$value['c_tag_smv']);
			$slug_dept = $value['u_Slug_Dept_s'];
			$category = $value['info']['categories'][0]['name'];
			$theme = isset($value['u_Theme_s']) ? $value['u_Theme_s'] : '';
			$topic = isset($value['u_Topic_Tag_smv']) ? $value['u_Topic_Tag_smv'][0] : '';
			
			$description= $value['c_description_s'];
			$description = preg_replace("(\xe2\x80\x94)", "", $description);  
			$description = preg_replace("(\r)", "", $description);
			$description = preg_replace("(\n)", "", $description);
			$thumbnail = $value['thumbnails'];	
			//$linkUrl = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($titleS))).'-'.$obj_id;
			
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
			
			/*$link = $xml_doc->createElement('link');
			$link = $item->appendChild($link);
			$linkCont = $xml_doc->createTextNode($linkUrl);
			$linkCont = $link->appendChild($linkCont);*/
			
			$kw = $xml_doc->createElement('keywords');
			$kw = $item->appendChild($kw);
			$kwCont = $xml_doc->createCDATASection($Keywords_txt);
			$kwCont = $kw->appendChild($kwCont);
			
			$cat = $xml_doc->createElement('category');
			$cat = $item->appendChild($cat);
			$catCont = $xml_doc->createCDATASection($category);
			$catCont = $cat->appendChild($catCont);
			
			$th = $xml_doc->createElement('theme');
			$th = $item->appendChild($th);
			$thCont = $xml_doc->createCDATASection($theme);
			$thCont = $th->appendChild($thCont);
			
			$tag = $xml_doc->createElement('tag');
			$tag = $item->appendChild($tag);
			$tagCont = $xml_doc->createCDATASection($topic);
			$tagCont = $tag->appendChild($tagCont);

			$videoPubDate = $xml_doc->createElement('pubDate');
			$videoPubDate = $item->appendChild($videoPubDate);
			$videoPubDateCont = $xml_doc->createTextNode(date('r',$value['c_ts_publish_l']));
			$videoPubDateCont = $videoPubDate->appendChild($videoPubDateCont);
			
			
			
			
			
			/*foreach ($thumbnail as $key => $value1) {
				if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
			}
						
			$videoThumb = $xml_doc->createElement('thumbnail');
			$thumbs = $xml_doc->createAttribute('url');
			$thumbs -> value = $thumb;
			$videoThumb->appendChild($thumbs);
			$videoThumb = $item->appendChild($videoThumb);*/
			
			
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
        foreach( $fields as $field ) {
            if( preg_match('/([^:]+): (.+)/m', $field, $match) ) {
                $match[1] = preg_replace('/(?<=^|[\x09\x20\x2D])./e', 'strtoupper("\0")', strtolower(trim($match[1])));
                if( isset($retVal[$match[1]]) ) {
                    $retVal[$match[1]] = array($retVal[$match[1]], $match[2]);
                } else {
                    $retVal[$match[1]] = trim($match[2]);
                }
            }
        }
		$data = $retVal['Location'];
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