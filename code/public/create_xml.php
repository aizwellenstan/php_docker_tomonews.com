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
define('VIDEO_PATH','http://video-pdu.us.tomonews.net/encoded-586/media/');
define('THIS_SITE','http://us.tomonews.com/'); 


/// start 
	
	$freq = 'daily';
	$priority = 0.8;
	$fileName = 'sitemap_'.date('Y').date('m').'.xml';
	$news_file =  'sitemap_news.xml';
	$save_path = 'sitemaps/';
	
	$edate=strtotime(date('Y-m-d'));
	$sdate=strtotime(date('Y-m-d', strtotime('-1 days')));
	$getUrls= APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?filters[]=c_ts_publish_l:['.$sdate.'%20TO%20'.$edate.']'; 
	$ww=curl_info($getUrls, null);
	$dAryn2=json_decode($ww,true);

	if(file_exists($save_path.$fileName)){
		$xml_doc = new DOMDocument();
		$xml_doc -> load($save_path.$fileName);
		foreach ($dAryn2['docs'] as $key => $value) {
			$urlN = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($value['c_title_s']))).'-'.$value['obj_id']; 
			$urlNM = THIS_SITE.'m/'.urlencode(str_replace(' ', '-', remove_punc($value['c_title_s']))).'-'.$value['obj_id']; 
			$f = $xml_doc->createDocumentFragment();
			$f -> appendXML("\n<url>\n  <loc>$urlN</loc>\n" .
					 "  <changefreq>$freq</changefreq>\n" .
					 "  <lastmod>".date('c',time())."</lastmod>\n" .
					 "  <priority>$priority</priority>\n" .
					 '  <xhtml:link rel="alternate" media="only screen and (max-width: 640px)" href="'.$urlNM.'" />'."\n</url>\n");
			$xml_doc->documentElement->appendChild($f);
		}
	
		$xml_doc->save($save_path.$fileName);
		
	}else{
		
		$xml_doc = new DOMDocument();
		$xml_doc->formatOutput = true;
		$urlset = $xml_doc->createElement('urlset');
		$urlsetA = $xml_doc->createAttribute('xmlns:xsi');
		$urlsetA -> value = 'http://www.w3.org/2001/XMLSchema-instance';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		$urlsetA = $xml_doc->createAttribute('xmlns');
		$urlsetA -> value = 'http://www.sitemaps.org/schemas/sitemap/0.9';
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		$urlsetA = $xml_doc->createAttribute('xsi:schemaLocation');
		$urlsetA -> value = 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd';
		
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		$urlsetA = $xml_doc->createAttribute('xmlns:xhtml');
		$urlsetA -> value = 'http://www.w3.org/1999/xhtml';
		
		
		$urlset->appendChild($urlsetA);
		$urlset = $xml_doc->appendChild($urlset);
		foreach ($dAryn2['docs'] as $key => $value) {
			
			$urlN = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($value['c_title_s']))).'-'.$value['obj_id']; 
			$urlNM = THIS_SITE.'m/'.urlencode(str_replace(' ', '-', remove_punc($value['c_title_s']))).'-'.$value['obj_id']; 
			$f = $xml_doc->createDocumentFragment();
			$f -> appendXML("\n<url>\n  <loc>$urlN</loc>\n" .
					 "  <changefreq>$freq</changefreq>\n" .
					 "  <lastmod>".date('c',time())."</lastmod>\n" .
					 "  <priority>$priority</priority>\n" .
					 '  <xhtml:link rel="alternate" media="only screen and (max-width: 640px)" href="'.$urlNM.'"/>'."\n</url>\n");
			$xml_doc->documentElement->appendChild($f);
		}
		$xml_doc->save($save_path.$fileName);
		
		//add new month to main sitemap
		$xml_root = new DOMDocument();
		$xml_root -> load($save_path.$news_file);
		$f = $xml_root->createDocumentFragment();
		$f -> appendXML("\n    <sitemap>\n      <loc>".THIS_SITE."$save_path$fileName</loc>\n    </sitemap>\n");
		$xml_root->documentElement->appendChild($f);
		$xml_root->save($save_path.$news_file);
		
	}
	
	echo " Done!!!";

function curl_info($url, $req) { //anvato
    $ch = curl_init($url);
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	
	if ($req != ''){
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, array ( "Content-Type: application/xml" ) );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $req );
	}
	
 
	$data = curl_exec($ch);
	curl_close($ch);
    unset($ch);unset($url);
	
    return $data;
	
	
	/*$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $data = curl_exec($ch);
	    curl_close($ch);
	    unset($ch);unset($url);
	    return $data;*/
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