<?php 

$lessthan = new DateTime();

$dir    = 'mrss/';
$files = scandir($dir);
unset($files[0]);
unset($files[1]);

foreach ($files as $file){
	
	$fileLoc = $dir.$file;
	$domElemsToRemove = array();
	
	if (file_exists($fileLoc) ){

		$xml_doc = new DOMDocument();
		$xml_doc -> load($fileLoc);

		$channel =  $xml_doc -> getElementsByTagName("channel")->item(0); 
		
		$pubDate = $channel -> getElementsByTagName("lastBuildDate")->item(0);
		$title = $xml_doc->createElement('lastBuildDate');
		$title = $channel->appendChild($title);
		$titleCont = $xml_doc->createTextNode(date('r'));
		$titleCont = $title->appendChild($titleCont);
		$channel->replaceChild($title, $pubDate);
		$items = $xml_doc->getElementsByTagName('item');
	
		if ( ($items->length) >= 1){
			foreach ($items as $item){
				$tz = new DateTimeZone('Asia/Taipei');
				$timestamp = new DateTime($item->getElementsByTagName('pubDate')->item(0)->nodeValue);
				$timestamp -> setTimezone($tz);
				if($lessthan->diff($timestamp)->days > 1) { 
					$domElemsToRemove[] = $item; 
				}
			}
	
			foreach( $domElemsToRemove as $domElement ){ 
				$domElement->parentNode->removeChild($domElement); 
			}
		}

		$xml_doc->save($fileLoc);
	}
}
$log = fopen("Log_removeOld.txt", 'a');
$Msg = "Executed at ".date('r')."\r\n";
fwrite($log, $Msg); 
fclose($log);

?>