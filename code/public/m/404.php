<?php 
include_once('config.php');
include_once('api_setting.php');

$page=(int)$_GET['page'];
$debug_mode=$_GET['debug_mode'];

if(!is_int($page)||$page==''||$page==0  ){ $page=1; }
$thisURL='index.php';

header( 'HTTP/1.1 404 Not Found' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php  site_title() ?></title>
  <meta id ="viewport" name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<meta name="description" content="TomoNews is your daily source for top animated news. We??¢ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<meta property="fb:pages" content="148740698487405" />
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7365156/7009372/css/fonts.css" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?ver=1" type="image/png" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css?nocache=1103">
	
	<link rel="canonical" href="<?php  echo THIS_SITE_DESKTOP.'404.php'; ?>">
	
<?php  include_once("../head_scripts.php"); ?> 	
<script src="<?php echo THIS_SITE;?>js/all.min.js?nocache=1117"></script>

  <script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>
  <script src="<?php  echo THIS_SITE; ?>js/jquery.lazyload.min.js"></script>
  <?php  include_once('../ga.php'); ?>	
</head>
<body>
<?php  
		$ad728x90=$ad_about_728x90;
		include_once('header.php'); ?>	
	<div class="wapper"> 
		<div id="lists">
	<div style=" height:350px;">
    <div style="position:absolute; margin-top: 30%;"><img src="img/404.jpg" width="350"></div>
	</div>
		<div class="cb"></div>
	</div>	
</div>

	
	<?php  include_once('footer.php'); ?>
</body>
</html>