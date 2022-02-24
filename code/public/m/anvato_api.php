<?php 
header('Content-type: application/xml');
$pub_key = "8353B77A240044B1BA565E0393C18E88";
$pri_key = "3B80540E925B4BB6B5AE7A363AA551C8";
$hostname = "nextmedia-mcp.anvato.net";
$mid = $_GET['mid'];
$searchBy = $_GET['searchBy'];
$page = $_GET['page'];
$pagesize = $_GET['pageSize'];

$paging = '';
if ($page != "" && $pagesize !="" ){
	$paging = '&page_no='.$page.'&page_sz='.$pagesize;
}

$ts = time();
$req =  '<?php xml version="1.0" ?><request><type>LIST_VIDEOS</type><params></params></request>';
$str = $req.$ts;
$sgn = base64_encode (hash_hmac ( "sha256", $str, $pri_key, true) );

$url = "http://{$hostname}/api?ts={$ts}&sgn=".urlencode($sgn)."&id={$pub_key}&filter_by[]=".$searchBy."&filter_cond[]='=='&filter_value[]=".$mid.$paging.'&sort_by[]=pub_date&sort_order[]=desc';
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
