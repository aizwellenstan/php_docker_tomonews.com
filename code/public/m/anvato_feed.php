<?php 
header('Content-type: application/xml');
$pub_key = "8353B77A240044B1BA565E0393C18E88";
$pri_key = "3B80540E925B4BB6B5AE7A363AA551C8";
$hostname = "nextmedia-mcp.anvato.net";
$url = $_GET['url'];

#print($url."\n");

$ch = curl_init($url);
curl_setopt ( $ch, CURLOPT_HEADER, 0 );
curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_HTTPHEADER, array ( "Content-Type: application/xml" ) ); 
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $req );

$resp_str = curl_exec($ch);

	if ( $resp_str === false )
	{	
		echo "FALSE";
	}

$resp = simplexml_load_string ($resp_str);

	if ( $resp!==false && isset($resp->result) && (string)$resp->result=='success' )
            echo json_encode($resp)."\n";
			//echo $url;
        
	else
        {
                if ( isset($resp) && isset($resp->comments) )
                        echo "Request rejected. Reason: ".(string)$resp->comments."\n";
                else
                        echo "Request rejected. Received: ".$resp_str."\n";
                echo "FALSE";
        }

?>
