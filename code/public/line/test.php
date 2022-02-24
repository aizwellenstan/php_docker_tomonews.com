<?php 

$getURL = 'https://api.nm.anvato.net/v2/feed/LFKACVUWPSSACSRLARGA?start=0&count=100&filters[]=c_ts_publish_l:[1593874012%20TO%201594003612]&sort=c_ts_publish_l+desc';
$ww = curl_info($getURL,'','');
print_r($ww);


echo "FIN";



function curl_info($url, $type, $content_type) { //anvato
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
		
		if (is_array($fields) && (count($fields) >0) ){
			foreach ($fields as $fi){
				if (strpos($fi, 'Location:') !== false) {
					$data = trim(substr($fi,10));
				}
			}
		}
			
		//print_r($data);
		
		/*if($content_type == 'm3u8'){
			$pieces = explode("\n", end($fields)); // make an array out of curl return value
			$data = $pieces[3]; 
		}else{
			$data = trim(substr($fields[5],10));
		}*/
	}

	curl_close($ch);
    unset($ch);unset($url);unset($pieces);
    return $data;
	
}
?>
