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
define('THIS_SITE','http://us.tomonews.com/'); 

//i'm using this media to test 30 days 289504721354752,289527538368512,289528343674880,289545791979520,289471703793664
//i'm using this media to test NOW 291162310295552,290820055089152,290814417944576
//i'm using this media to test Refeed 290811733590016,290787574398976

/// start 
	
	$freq = 'daily';
	$priority = 0.8;
	$VESynd = array(
		0 => 'Now',
		1 => 'In%2030%20days',
		2 => 'Refeed',
	);
	$empty = 0;
	$fileName = 'mrssHK';
	$save_path = 'mrssHK/';

	// BEGIN Syndicate Now
	$edateNow=strtotime(date('Y-m-d'));
	$sdateNow=strtotime(date('Y-m-d', strtotime('-1 days')));
	$getUrls2Now= APPLICATION_FEED_URL.'AWIAIWSJPBURKHIDBBIA?filters[]=c_ts_publish_l:['.$sdateNow.'%20TO%20'.$edateNow.']&media_filters[]=video/mp4&fmt=mrss'; 
	$wwNow=curl_info($getUrls2Now, null);

	$doc = new DOMDocument();
	$doc-> loadXML($wwNow);
	$doc-> formatOutput = true;
	//$doc->save($save_path.$fileName);	
	//END Syndicate Now
	
	// BEGIN Syndicate Refeed
	/*$getUrls2Refeed= APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?filters[]=u_Video_Elephant_Feed_s:"'.$VESynd[2].'"&filters[]=c_ts_publish_l:['.$sdateNow.'%20TO%20'.$edateNow.']&media_filters[]=video/mp4&fmt=mrss'; 
	$wwRef=curl_info($getUrls2Refeed, null);

	$docRef = new DOMDocument();
	$docRef-> loadXML($wwRef);
	$docRef-> formatOutput = true;
	
	$docRef = $docRef->getElementsByTagName("channel")->item(0);
	
	foreach ($docRef->getElementsByTagName("item") as $node){

		$importNode = $doc->importNode($node, true);
        $doc->getElementsByTagName("channel")->item(0)->appendChild($importNode);
	}*/
	//END Syndicate Refeed
	
	// BEGIN Syndicate In 30 days
	/*$sdate30=strtotime(date('Y-m-d', strtotime('-30 days')));
	$edate30=strtotime(date('Y-m-d', strtotime('-29 days')));
    $getUrls230=APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?filters[]=u_Video_Elephant_Feed_s:"'.$VESynd[1].'"&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']&media_filters[]=video/mp4&fmt=mrss'; 
    $ww30=curl_info($getUrls230, null);

	$doc30 = new DOMDocument();
	$doc30->loadXML($ww30);
	//$doc30->preserveWhiteSpace = false;
	$doc30-> formatOutput = true;
	//header("Content-type: text/xml");
	$doc30 = $doc30->getElementsByTagName("channel")->item(0);
	
	foreach ($doc30->getElementsByTagName("item") as $node){

		$importNode = $doc->importNode($node, true);
        $doc->getElementsByTagName("channel")->item(0)->appendChild($importNode);
	}*/
//http://php.net/manual/en/domdocument.importnode.php	
	$doc->save($save_path.$fileName);

	
if (!file_exists($save_path.$fileName)){
	echo "No feeds for today";
}else{
	header("Location:  $save_path$fileName");
// 
}

  
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