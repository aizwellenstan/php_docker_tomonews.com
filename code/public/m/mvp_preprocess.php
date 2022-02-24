<?php 
$KW=$_GET['kw'];
$debug_mode=$_GET['debug_mode'];
$dtype = $_GET['dtype'];
if(!($dtype=='week' || $dtype=='month') ) $dtype ='day';
$page_name ='Most Viewed Videos of Tomonews';//urldecode ($KW );// str_replace('%2520', '' ,$KW);
//$cate_name = 'MOST VIEWED PAGE';
?>