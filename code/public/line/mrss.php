<?php 
require "../configA.php";

#$url = "https://cms.nextanimation.com.tw/mrss/".$_GET['code'];

# $url = "https://cms.nextanimation.com.tw/line_rss.php?code=".$_GET['code'];
$url = "http://cms.nextanimation.com.tw/line_rss.php?code=".$_GET['code'];
$xml = simplexml_load_file($url);
$xml->asXML();
//$dom=new DOMDocument;
//$dom->loadXML($xml->asXML());

header('Content-Type: text/xml');
print_r($xml->asXML());


?>
