<?php 
include_once('configA.php');
include_once('api_settingA.php');

$page=(int)$_GET['page'];
$debug_mode=$_GET['debug_mode'];

if(!is_int($page)||$page==''||$page==0  ){ $page=1; }
$thisURL='index.php';

header("HTTP/1.0 404 Not Found");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title><?php  site_title() ?></title>
    <meta name=viewport content="width=1200px">
	<meta name="apple-itunes-app" content="app-id=633875353">
	<meta name="google-play-app" content="app-id=com.nextmedia.gan">
	<meta name="description" content="TomoNews is your daily source for top animated news. We’ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?v=1" type="image/png" />
	<link rel="stylesheet" href="stylesheets/style.min.css">
	
	  <link rel="canonical" href="<?php  echo THIS_SITE.'404.php' ?>" />
  <link rel="alternate" media="only screen and (max-width: 640px)" href="<?php  echo THIS_SITE.'m/404.php'?>" />
  
	<script src="<?php  echo THIS_SITE; ?>js/all.min.js"></script>   
	<?php  include_once("head_scripts.php"); include_once('ga.php'); ?>
	 
</head>
<body>
	<div class="wapper"> 
		<?php 
	//	$ad728x90=$ad_about_728x90;
		include_once('header.php'); ?>	
</div>
	<div id="lists">
	<div style=" height:350px;">
    <div style="position:absolute; top:50% ; left:50%;margin-left:-285px;margin-top:-115px;"><img src="img/404.jpg" width="570" height="230"></div>
	</div>
		<div class="cb"></div>
	</div>
	
	<?php  include_once('footer.php'); ?>
</body>
</html>