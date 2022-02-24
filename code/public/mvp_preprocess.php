<?php 
$KW=$_GET['kw'];
$debug_mode=$_GET['debug_mode'];
$dtype = $_GET['dtype'];
if(!($dtype=='week' || $dtype=='month') ) $dtype ='day';
$page_name ='Most Viewed Videos of Tomonews';
$dtype_title= array('day'=>'Past 24 Hours' , 'week'=>'Past 7 Days' , 'month'=>'Past 30 Days');
?>