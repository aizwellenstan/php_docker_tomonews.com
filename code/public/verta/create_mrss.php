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

//i'm using this media to test 30 days 289504721354752,289527538368512,289528343674880,289545791979520,289471703793664
//i'm using this media to test NOW 291162310295552,290820055089152,290814417944576
//i'm using this media to test Refeed 290811733590016,290787574398976

/// start 

	$empty = 0;
	$fileName = 'mrss_'.date('Y').date('m').'.xml';
	$save_path = 'mrss/';


	if(file_exists($save_path.$fileName)){
		
		generate_xml($save_path, $fileName);
		
	}else{
		
		generate_new_xml($save_path, $fileName);
	}
	
	function generate_xml($save_path, $fileName){
		// BEGIN Syndicate Now DPS_iUS
		$doc = new DOMDocument();
		$doc->preserveWhiteSpace = false;
		$doc -> formatOutput = true;
		$doc -> load($save_path.$fileName);
		//$channel =  $doc -> getElementsByTagName("channel")->item(0);  
	
		$edateNow=strtotime(date('Y-m-d'));
		$sdateNow=strtotime(date('Y-m-d', strtotime('-1 days')));
		$getUrls2Now= APPLICATION_FEED_URL.'K5DREWL4E6RRMTRDAIBA?start=0&count=200&filters[]=u_Slug_Dept_s:"DPS_iUS"&filters[]=c_ts_publish_l:['.$sdateNow.'%20TO%20'.$edateNow.']&fmt=mrss&media_filters[]=video/mp4'; 
		$wwNow=curl_info($getUrls2Now, null);
		$docRef = new DOMDocument();
		$docRef-> loadXML($wwNow);
		$docRef-> formatOutput = true;	
		
		$docRef = $docRef->getElementsByTagName("channel")->item(0);
		
		foreach ($docRef->getElementsByTagName("item") as $node){

			$importNode = $doc->importNode($node, true);
			$doc->getElementsByTagName("channel")->item(0)->appendChild($importNode);
		}
		//END Syndicate Now DPS_iUS
		
		// BEGIN Syndicate Now iUS
		$edateNow=strtotime(date('Y-m-d'));
		$sdateNow=strtotime(date('Y-m-d', strtotime('-1 days')));
		$getUrls2Now= APPLICATION_FEED_URL.'K5DREWL4E6RRMTRDAIBA?start=0&count=200&filters[]=u_Slug_Dept_s:"iUS"&filters[]=c_ts_publish_l:['.$sdateNow.'%20TO%20'.$edateNow.']&fmt=mrss&media_filters[]=video/mp4'; 
		$wwNow=curl_info($getUrls2Now, null);

		$docRef = new DOMDocument();
		$docRef-> loadXML($wwNow);
		$docRef-> formatOutput = true;
		
		$docRef = $docRef->getElementsByTagName("channel")->item(0);
		
		foreach ($docRef->getElementsByTagName("item") as $node){

			$importNode = $doc->importNode($node, true);
			$doc->getElementsByTagName("channel")->item(0)->appendChild($importNode);
		}
		//END Syndicate Now iUS
		
		// BEGIN Syndicate 30 days OR
		$sdate30=strtotime(date('Y-m-d', strtotime('-30 days')));
		$edate30=strtotime(date('Y-m-d', strtotime('-29 days')));
		$getUrls2Now= APPLICATION_FEED_URL.'K5DREWL4E6RRMTRDAIBA?start=0&count=200&filters[]=u_Slug_Dept_s:"OR"&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']&fmt=mrss&media_filters[]=video/mp4'; 
		$wwNow=curl_info($getUrls2Now, null);

		$docRef = new DOMDocument();
		$docRef-> loadXML($wwNow);
		$docRef-> formatOutput = true;
		
		$docRef = $docRef->getElementsByTagName("channel")->item(0);
		
		foreach ($docRef->getElementsByTagName("item") as $node){

			$importNode = $doc->importNode($node, true);
			$doc->getElementsByTagName("channel")->item(0)->appendChild($importNode);
		}
		//END Syndicate 30 days OR
		
		// BEGIN Syndicate 30 days DPS_OR
		$sdate30=strtotime(date('Y-m-d', strtotime('-30 days')));
		$edate30=strtotime(date('Y-m-d', strtotime('-29 days')));
		$getUrls2Now= APPLICATION_FEED_URL.'K5DREWL4E6RRMTRDAIBA?start=0&count=200&filters[]=u_Slug_Dept_s:"DPS_OR"&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']&fmt=mrss&media_filters[]=video/mp4'; 
		$wwNow=curl_info($getUrls2Now, null);

		$docRef = new DOMDocument();
		$docRef-> loadXML($wwNow);
		$docRef-> formatOutput = true;
		
		$docRef = $docRef->getElementsByTagName("channel")->item(0);
		
		foreach ($docRef->getElementsByTagName("item") as $node){

			$importNode = $doc->importNode($node, true);
			$doc->getElementsByTagName("channel")->item(0)->appendChild($importNode);
		}
		//END Syndicate 30 days DPS_OR
		
		$doc->save($save_path.$fileName);
		
	}
	
	function generate_new_xml($save_path, $fileName){
		// BEGIN Syndicate Now DPS_iUS
		$edateNow=strtotime(date('Y-m-d'));
		$sdateNow=strtotime(date('Y-m-d', strtotime('-1 days')));
		$getUrls2Now= APPLICATION_FEED_URL.'K5DREWL4E6RRMTRDAIBA?start=0&count=200&filters[]=u_Slug_Dept_s:"DPS_iUS"&filters[]=c_ts_publish_l:['.$sdateNow.'%20TO%20'.$edateNow.']&fmt=mrss&media_filters[]=video/mp4'; 
		$wwNow=curl_info($getUrls2Now, null);
	
		$doc = new DOMDocument();
		$doc-> loadXML($wwNow);
		$doc-> formatOutput = true;	
		//END Syndicate Now DPS_iUS
		
		// BEGIN Syndicate Now iUS
		$edateNow=strtotime(date('Y-m-d'));
		$sdateNow=strtotime(date('Y-m-d', strtotime('-1 days')));
		$getUrls2Now= APPLICATION_FEED_URL.'K5DREWL4E6RRMTRDAIBA?start=0&count=200&filters[]=u_Slug_Dept_s:"iUS"&filters[]=c_ts_publish_l:['.$sdateNow.'%20TO%20'.$edateNow.']&fmt=mrss&media_filters[]=video/mp4'; 
		$wwNow=curl_info($getUrls2Now, null);

		$docRef = new DOMDocument();
		$docRef-> loadXML($wwNow);
		$docRef-> formatOutput = true;
		
		$docRef = $docRef->getElementsByTagName("channel")->item(0);
		
		foreach ($docRef->getElementsByTagName("item") as $node){

			$importNode = $doc->importNode($node, true);
			$doc->getElementsByTagName("channel")->item(0)->appendChild($importNode);
		}
		//END Syndicate Now iUS
		
		// BEGIN Syndicate 30 days OR
		$sdate30=strtotime(date('Y-m-d', strtotime('-30 days')));
		$edate30=strtotime(date('Y-m-d', strtotime('-29 days')));
		$getUrls2Now= APPLICATION_FEED_URL.'K5DREWL4E6RRMTRDAIBA?start=0&count=200&filters[]=u_Slug_Dept_s:"OR"&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']&fmt=mrss&media_filters[]=video/mp4'; 
		$wwNow=curl_info($getUrls2Now, null);

		$docRef = new DOMDocument();
		$docRef-> loadXML($wwNow);
		$docRef-> formatOutput = true;
		
		$docRef = $docRef->getElementsByTagName("channel")->item(0);
		
		foreach ($docRef->getElementsByTagName("item") as $node){

			$importNode = $doc->importNode($node, true);
			$doc->getElementsByTagName("channel")->item(0)->appendChild($importNode);
		}
		//END Syndicate 30 days OR
		
		// BEGIN Syndicate 30 days DPS_OR
		$sdate30=strtotime(date('Y-m-d', strtotime('-30 days')));
		$edate30=strtotime(date('Y-m-d', strtotime('-29 days')));
		$getUrls2Now= APPLICATION_FEED_URL.'K5DREWL4E6RRMTRDAIBA?start=0&count=200&filters[]=u_Slug_Dept_s:"DPS_OR"&filters[]=c_ts_publish_l:['.$sdate30.'%20TO%20'.$edate30.']&fmt=mrss&media_filters[]=video/mp4'; 
		$wwNow=curl_info($getUrls2Now, null);

		$docRef = new DOMDocument();
		$docRef-> loadXML($wwNow);
		$docRef-> formatOutput = true;
		
		$docRef = $docRef->getElementsByTagName("channel")->item(0);
		
		foreach ($docRef->getElementsByTagName("item") as $node){

			$importNode = $doc->importNode($node, true);
			$doc->getElementsByTagName("channel")->item(0)->appendChild($importNode);
		}
		//END Syndicate 30 days DPS_OR
		
		$doc->save($save_path.$fileName);
		
	}

	
/*if (!file_exists($save_path.$fileName)){
	echo "No feeds for today";
}else{
	header("Location: cB45yt/cB45yt");
// 
}*/

  
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
?>