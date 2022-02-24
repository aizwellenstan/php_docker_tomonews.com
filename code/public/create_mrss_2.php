<?php 
	//API key & alias
// define('APPLICATION_ALIAS','NMTomoUS-universal-flash');
define('APPLICATION_ALIAS','NMTomoUS-universal-flash-P2');

define('APPLICATION_KEY','movideoNM-Tomo-US');
define('APPLICATION_URL','http://api.nmhk.movideo.com/rest/');
	//movideo token will expire after 3600 sec .
	//so we make our session keep 40 mins (40m*60s=2400s) . 
define('SESSION_LIFETIME',2400); 
define('THIS_SITE','http://us.tomonews.com/'); 
define('VIDEO_PATH','http://video-pdu.us.tomonews.com/encoded-586/media/');
define('VIDEO_RESOLUTION','/819200-854x480.mp4');  

//i'm using this media to test 30 days 289504721354752,289527538368512,289528343674880,289545791979520,289471703793664
//i'm using this media to test NOW 291162310295552,290820055089152,290814417944576
//i'm using this media to test Refeed 290811733590016,290787574398976

/// start 
	chk_token();
	
	$freq = 'daily';
	$priority = 0.8;
	$VESynd = array(
		0 => 'Now',
		1 => 'In+30+days',
		2 => 'Refeed',
	);
	$empty = 0;
	$fileName = 'mrss';
	$save_path = 'mrss/';
	//$sdate=date('Y-m-d', strtotime('-12 days'));
    //$edate=date('Y-m-d', strtotime('-1 days'));
	$edate=date('Y-m-d', strtotime('+1 days'));
	$sdate=date('Y-m-d', strtotime('-1 days'));
	$sdate='2016-01-01';
	$edate='2016-01-19';
	//echo "Fetching stories from $edate "."<hr>";

	// BEGIN Syndicate Now
    $d='&creationDateOperator=range&creationDate='.$sdate.'T16:00:00,'.$edate.'T23:59:59';
	$getTotalsNow = APPLICATION_URL.'media/search?tags=["VideoElephant%3Afeed%3D'.$VESynd[0].'"]&omitFields=creationDate,lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,mediaPlays,additionalImages'.$d.'&totals=true&output=json&token='.$_SESSION['token'].' ';
	$www=curl_info($getTotalsNow);
	$dAry=json_decode($www, true);
    $totals=$dAry['ItemCounter']['totalItems'];
    $getUrls2Now=APPLICATION_URL.'media/search?tags=["VideoElephant%3Afeed%3D'.$VESynd[0].'"]&omitFields=creationDate,lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,mediaPlays,additionalImages'.$d.'&paged=false&page=0&output=json&pageSize='.$totals.'&orderDesc=true&orderBy=creationdate&token='.$_SESSION['token'].' ';
    $wwNow=curl_info($getUrls2Now);

	$dAry22Now=json_decode($wwNow, true);
	if ($totals == 1)
	{
		$dAryn2Now[0]=$dAry22Now['list'][0]['media'];
		generate_new_xml($dAryn2Now, $save_path, $fileName);
	}elseif ($totals == 0)
	{
		$empty = 1;
		
	}elseif ($totals > 1){
		$dAryn2Now=$dAry22Now['list'][0]['media'];
		generate_new_xml($dAryn2Now, $save_path, $fileName);
	}
	//END Syndicate Now
	
	// BEGIN Syndicate Refeed
 /*   $d='&creationDateOperator=range&lastModifiedDate='.$sdate.'T00:00:00,'.$edate.'T23:50:59';
	$getTotalsRefeed = APPLICATION_URL.'media/search?tags=["VideoElephant%3Afeed%3D'.$VESynd[2].'"]&omitFields=creationDate,lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,mediaPlays,additionalImages'.$d.'&totals=true&output=json&token='.$_SESSION['token'].' ';
	$www=curl_info($getTotalsRefeed);
	$dAry=json_decode($www, true);
    $totals=$dAry['ItemCounter']['totalItems'];
    $getUrls2Refeed=APPLICATION_URL.'media/search?tags=["VideoElephant%3Afeed%3D'.$VESynd[2].'"]&omitFields=creationDate,lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,mediaPlays,additionalImages'.$d.'&paged=false&page=0&output=json&pageSize='.$totals.'&orderDesc=true&orderBy=creationdate&token='.$_SESSION['token'].' ';
    $wwRefeed=curl_info($getUrls2Refeed);
	
	//echo $getUrls2Refeed."<hr>";
	$dAry22Refeed=json_decode($wwRefeed, true);
	if ($totals == 1)
	{
		$dAryn2Refeed[0]=$dAry22Refeed['list'][0]['media'];
		$xml_obj = generate_xml($dAryn2Refeed, $save_path, $fileName);
	}elseif ($totals > 1){
		$dAryn2Refeed=$dAry22Refeed['list'][0]['media'];
		$xml_obj = generate_xml($dAryn2Refeed, $save_path, $fileName);
	}*/
	
	//END Syndicate Refeed
	
	// BEGIN Syndicate In 30 days
	$sdate = date('Y-m-d', strtotime('-31 days'));
	$edate = date('Y-m-d', strtotime('-30 days'));
	$d='&creationDateOperator=range&creationDate='.$sdate.'T16:00:00,'.$edate.'T23:59:59';
	$getTotals30= APPLICATION_URL.'media/search?tags=["VideoElephant%3Afeed%3D'.$VESynd[1].'"]&omitFields=creationDate,lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,mediaPlays,additionalImages'.$d.'&totals=true&output=json&token='.$_SESSION['token'].' ';
	$www=curl_info($getTotals30);
	$dAry=json_decode($www, true);
    $totals=$dAry['ItemCounter']['totalItems'];
    $getUrls230=APPLICATION_URL.'media/search?tags=["VideoElephant%3Afeed%3D'.$VESynd[1].'"]&omitFields=creationDate,lastModifiedDate,copyright,isAdvertisement,ratio,creator,tagProfileId,imageFilename,mediaFileExists,syndicated,mediaSchedules,displayStatus,syndicatedPartners,length,filename,status,defaultImage,mediaType,cuePointsExist,duration,payWalls,externalAuthentication,tagProfileId,client,mediaPlays,additionalImages'.$d.'&paged=false&page=0&output=json&pageSize='.$totals.'&orderDesc=true&orderBy=creationdate&token='.$_SESSION['token'].' ';
    $ww30=curl_info($getUrls230);
	
	//echo $getUrls230."<hr>";
	$dAry2230=json_decode($ww30, true);
	if ($empty == 1 && $totals == 1)
	{
		$dAryn2230[0]=$dAry2230['list'][0]['media'];
		generate_new_xml($dAryn2230, $save_path, $fileName);
		
	}elseif ($totals == 1)
	{
		$dAryn2230[0]=$dAry2230['list'][0]['media'];
		generate_xml($dAryn2230, $save_path, $fileName);
	}elseif ($totals == 0)
	{
		$empty = 1;
		
	}elseif ($totals > 1){
		$dAryn2230=$dAry2230['list'][0]['media'];
		generate_xml($dAryn2230, $save_path, $fileName);
	}


/*$xml_doc = new DOMDocument();
$xml_doc->formatOutput = true;
$xml_doc->preserveWhiteSpace = false;
$xml_doc -> load($save_path.$fileName);
echo htmlspecialchars($xml_doc->saveXML());*/
if (!file_exists($save_path.$fileName)){
	echo "No feeds for today";
}else{
	header('Location:  /mrss/mrss');
// http://intranet01/mrssBuilder
}

function generate_xml($dAryn2, $save_path, $fileName){
	$xml_doc = new DOMDocument();
	$xml_doc->preserveWhiteSpace = false;
	$xml_doc -> formatOutput = true;
	$xml_doc -> load($save_path.$fileName);
	$channel =  $xml_doc -> getElementsByTagName("channel")->item(0); 
	
	foreach ($dAryn2 as $key => $value) {
			
			$guid = $value['id']; 
			$title = $value['title']; 
			$description  = $value['description']; 
			$description = preg_replace("(\xe2\x80\x94)", "", $description);  
			$description = preg_replace("(\r)", "", $description);  
			$video = VIDEO_PATH.$guid.VIDEO_RESOLUTION; 
			$imgPath = $value['imagePath']; 
			$Keywords_kwarr = array();
			$Keywords_kwstr = "";
			$tags = $value['tags'][0]['tag'];
			//print_r($tags);
			foreach ($tags as $Catkey => $Catval) {
				if ($Catval['ns'] == 'keyword'){ $Keywords_kwarr[] = $Catval['value']; }
				if ($Catval['ns'] == 'category'){ $category = $Catval['value']; }
			}
			$Keywords_kwstr = implode(',', $Keywords_kwarr);
			
			$item = $xml_doc->createElement('item');
			$item = $channel->appendChild($item);
			
			$guidNode = $xml_doc->createElement('guid');
			$guidNode = $item->appendChild($guidNode);
			$guidCont = $xml_doc->createTextNode($guid);
			$guidCont = $guidNode->appendChild($guidCont);
			
			$pubdate1 = date(DATE_RFC2822);
			$pubdate = $xml_doc->createElement('pubdate');
			$pubdate = $item->appendChild($pubdate);
			$pubdateCont = $xml_doc->createTextNode($pubdate1);
			$pubdateCont = $pubdate->appendChild($pubdateCont);
			
			$mediaTitle = $xml_doc->createElement('media:title');
			$mediaTitle = $item->appendChild($mediaTitle);
			$mediaTitleCont = $xml_doc->createCDATASection($title);
			$mediaTitleCont = $mediaTitle->appendChild($mediaTitleCont);
			
			$mediaDescription = $xml_doc->createElement('media:description');
			$mediaDescription = $item->appendChild($mediaDescription);
			$mediaDescCont = $xml_doc->createCDATASection($description);
			$mediaDescCont = $mediaDescription->appendChild($mediaDescCont);
			
			$mediaVideo = $xml_doc->createElement('media:content');
			$mediaVideo = $item->appendChild($mediaVideo);
			$mediaVideoCont = $xml_doc->createTextNode($video);
			$mediaVideoCont = $mediaVideo->appendChild($mediaVideoCont);
			
			$mediaThumb = $xml_doc->createElement('media:thumbnail');
			$mediaThumb = $item->appendChild($mediaThumb);
			$mediaThumbCont = $xml_doc->createTextNode($imgPath.'original.jpg');
			$mediaThumbCont = $mediaThumb->appendChild($mediaThumbCont);
			
			$mediaKW = $xml_doc->createElement('media:tags');
			$mediaKW = $item->appendChild($mediaKW);
			$mediaKWCont = $xml_doc->createCDATASection($Keywords_kwstr);
			$mediaKWCont = $mediaKW->appendChild($mediaKWCont);
			
			$mediaCategory = $xml_doc->createElement('media:category');
			$mediaCategory = $item->appendChild($mediaCategory);
			$mediaCatCont = $xml_doc->createTextNode($category);
			$mediaCatCont = $mediaCategory->appendChild($mediaCatCont);
			
			
		}
	$xml_doc->save($save_path.$fileName);
}
	
function generate_new_xml($dAryn2, $save_path, $fileName){
	$xml_doc = new DOMDocument();
	$urlset = $xml_doc->createElement('rss');
	$urlsetA = $xml_doc->createAttribute('xmlns:media');
	$urlsetA -> value = 'http://search.yahoo.com/mrss/';
	$urlset->appendChild($urlsetA);
		
		$urlset = $xml_doc->appendChild($urlset);
		$urlsetA = $xml_doc->createAttribute('xmlns:dcterms');
		$urlsetA -> value = 'http://purl.org/dc/terms/';
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
		$titleCont = $xml_doc->createTextNode('The Feed');
		$titleCont = $title->appendChild($titleCont);
		
		$description = $xml_doc->createElement('description');
		$description = $channel->appendChild($description);
		$descriptionCont = $xml_doc->createTextNode('The Feed');
		$descriptionCont = $description->appendChild($descriptionCont);
		
		$lastbuilddate = $xml_doc->createElement('lastbuilddate');
		$lastbuilddate = $channel->appendChild($lastbuilddate);
		$lastbuilddateCont = $xml_doc->createTextNode(date('Y-m-d'));
		$lastbuilddateCont = $lastbuilddate->appendChild($lastbuilddateCont);
		
		$pubdate1 = date(DATE_RFC2822);
		$pubdate = $xml_doc->createElement('pubdate');
		$pubdate = $channel->appendChild($pubdate);
		$pubdateCont = $xml_doc->createTextNode($pubdate1);
		$pubdateCont = $pubdate->appendChild($pubdateCont);
		foreach ($dAryn2 as $key => $value) {
			
			$guid = $value['id']; 
			$title = $value['title']; 
			$description  = $value['description']; 
			$description = preg_replace("(\xe2\x80\x94)", "", $description);  
			$description = preg_replace("(\r)", "", $description);  
			$video = VIDEO_PATH.$guid.VIDEO_RESOLUTION; 
			$imgPath = $value['imagePath']; 
			$Keywords_kwarr = array();
			$Keywords_kwstr = "";
			$tags = $value['tags'][0]['tag'];
			//print_r($tags);
			foreach ($tags as $Catkey => $Catval) {
				if ($Catval['ns'] == 'keyword'){ $Keywords_kwarr[] = $Catval['value']; }
				if ($Catval['ns'] == 'category'){ $category = $Catval['value']; }
			}
			$Keywords_kwstr = implode(',', $Keywords_kwarr);
			
			$item = $xml_doc->createElement('item');
			$item = $channel->appendChild($item);
			
			$guidNode = $xml_doc->createElement('guid');
			$guidNode = $item->appendChild($guidNode);
			$guidCont = $xml_doc->createTextNode($guid);
			$guidCont = $guidNode->appendChild($guidCont);
			
			$pubdate = $xml_doc->createElement('pubdate');
			$pubdate = $item->appendChild($pubdate);
			$pubdateCont = $xml_doc->createTextNode($pubdate1);
			$pubdateCont = $pubdate->appendChild($pubdateCont);
			
			$mediaTitle = $xml_doc->createElement('media:title');
			$mediaTitle = $item->appendChild($mediaTitle);
			$mediaTitleCont = $xml_doc->createCDATASection($title);
			$mediaTitleCont = $mediaTitle->appendChild($mediaTitleCont);
			
			$mediaDescription = $xml_doc->createElement('media:description');
			$mediaDescription = $item->appendChild($mediaDescription);
			$mediaDescCont = $xml_doc->createCDATASection($description);
			$mediaDescCont = $mediaDescription->appendChild($mediaDescCont);
			
			$mediaVideo = $xml_doc->createElement('media:content');
			$mediaVideo = $item->appendChild($mediaVideo);
			$mediaVideoCont = $xml_doc->createTextNode($video);
			$mediaVideoCont = $mediaVideo->appendChild($mediaVideoCont);
			
			$mediaThumb = $xml_doc->createElement('media:thumbnail');
			$mediaThumb = $item->appendChild($mediaThumb);
			$mediaThumbCont = $xml_doc->createTextNode($imgPath.'original.jpg');
			$mediaThumbCont = $mediaThumb->appendChild($mediaThumbCont);
			
			$mediaKW = $xml_doc->createElement('media:tags');
			$mediaKW = $item->appendChild($mediaKW);
			$mediaKWCont = $xml_doc->createCDATASection($Keywords_kwstr);
			$mediaKWCont = $mediaKW->appendChild($mediaKWCont);
			
			$mediaCategory = $xml_doc->createElement('media:category');
			$mediaCategory = $item->appendChild($mediaCategory);
			$mediaCatCont = $xml_doc->createTextNode($category);
			$mediaCatCont = $mediaCategory->appendChild($mediaCatCont);
		}
		$xml_doc->formatOutput = true;
		$xml_doc->save($save_path.$fileName);

}

// get & check movideo token before get movies
function call_token_url($applicationalias,$key){
	$getUrls=APPLICATION_URL.'session?applicationalias='.$applicationalias.'&key='.$key.'&output=json';
    
    unset($applicationalias);unset($key);
    return $getUrls;
    unset($getUrls);
}

function chk_token(){
	//echo 'token : ',$_SESSION['token'];
	// if(!isset( $_SESSION['token'] )||$_SESSION['token']==''  ){
	//if(!isset( $_SESSION['token'] )||$_SESSION['token']==''  ){
	    $url=call_token_url(APPLICATION_ALIAS,APPLICATION_KEY);
	    $data=curl_info($url);

	    $dAry=json_decode($data, true);
	    $token=$dAry['session']['token'];
		    if($token!=''){
		        $_SESSION['token']=$token;
	    	}

}

function getUrls($applicationalias,$key,$action){
    $getUrls=APPLICATION_URL.$action.'?applicationalias='.$applicationalias.'&key='.$key.'&output=json';
    	unset($applicationalias);unset($key);
    return $getUrls;
    	unset($getUrls);
}

	function checkIfinArray($str , $arr){
             foreach ($arr as $key =>$val)
             {
               if($val == $str)
               return true;
             }
               return false;
           }
	function curl_info($url) {
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
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
