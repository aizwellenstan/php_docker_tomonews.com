<?php 
$url = $_GET['url'];
$req = '';

#print($url."\n");

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
    //unset($ch);unset($url);
//echo $data;
//exit;
	if ( $data === false )
	{	
		echo "FALSE";
	}

	$data=preg_replace('/.+?({.+}).+/','$1',$data);
	 echo $data."\n";
//$resp = json_decode($data, true);
//print_r($resp);
exit;
	/*if ( $resp!==false && count($resp['videos']) > 0) {
            echo $data."\n";
			//echo $url;
    }    
	else
        {
                if ( isset($resp) && isset($resp->comments) )
                        echo "Request rejected. Reason: ".(string)$resp."\n";
                else
                        echo "Request rejected. Received: ".$resp."\n";
                echo "FALSE";
        }*/

?>
