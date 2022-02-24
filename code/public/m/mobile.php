<?php 
include_once('config.php');
include_once('api_setting.php');

$page=(int)$_GET['page'];
$debug_mode=$_GET['debug_mode'];

if(!is_int($page)||$page==''||$page==0  ){ $page=1; }
$thisURL='index.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php  site_title() ?></title>
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=0;">
	
	<meta name="description" content="TomoNews is your daily source for top animated news. We’ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?ver=1" type="image/png" />
 
    <link rel="canonical" href="<?php  echo THIS_SITE_DESKTOP.'mobileApp'; ?>" />
<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7365156/7009372/css/fonts.css" />
  <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css">
  <?php  include_once("../head_scripts.php"); ?>  
  <script src="<?php echo THIS_SITE;?>js/all.min.js"></script>
  <script src="<?php echo THIS_SITE;?>js/movideo.min.latest.js" type="text/javascript"></script>

    
</head>
<style>
     
       html{width:320px;overflow-x :hidden;position: relative;height:590px;}
        body{width:320px;overflow-x :hidden; position: relative;height:100%}
    </style>
<body>
		<?php  
    $ad300x50 = $ad_mobile_300x50;
		include_once('header.php'); 
		?>	
  <div class="wapper"> 
</div>
 	
  <div id="lists">
    <div class="m_title">MOBILE</div>
    <div class="mobilea3">
		<img class="mapPic" src="img/mobile3.png" usemap="#Map3">
    	<div class="m_footer">TOMONEWS&nbsp;©&nbsp;2018&nbsp;All&nbsp;rights&nbsp;reserved. </div>
    </div>
    <div style="position: absolute; top: 1205px; left: 327px; width: 410px; height: 40px; display:none"> 
    	<!-- <input type="text" style="width:400px;" placeholder="Enter your email"> -->
    	

    	<!-- Begin MailChimp Signup Form -->
		<link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			#mc_embed_signup{background:#262626; font:14px Helvetica,Arial,sans-serif; text-align: center; }
			#mc_embed_signup input.email{ margin:0 auto; width:380px;margin-left:0px; }
			#mc_embed_signup input.pmc{ background:#262626;margin:0 auto; margin-top:15px;margin-left:80px; border: 0px solid #262626; }
			#mc_embed_signup input.button{ display:none;  }
		</style>
		<div id="mc_embed_signup" align="center" style="display:none;">
		<form action="//nma.us2.list-manage.com/subscribe/post?u=28c2f2044f22c46a64747226f&amp;id=c5744b2475" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
		    <div style="position: absolute; left: -5000px;"><input type="text" name="b_28c2f2044f22c46a64747226f_c5744b2475" tabindex="-1" value=""></div>
		    <input type="image" class="pmc" src="<?php  echo THIS_SITE; ?>img/sign_up_now2.gif" border="0">
		    
		    <div class="clear"><input type="submit" value="SIGN UP NOW" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
		</form>
		</div>

		<!--End mc_embed_signup-->

		<!-- Begin MailChimp Signup Form -->
<!-- <link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#ededed; font:14px Helvetica,Arial,sans-serif; text-align: center; }
	#mc_embed_signup input.email{ margin:0 auto; width:400px; }
	#mc_embed_signup input.pmc{ margin:0 auto; margin-top:15px;margin-left:145px; border: 0px solid #FFF; }
	#mc_embed_signup input.button{ display:none;  }
</style>
<div id="mc_embed_signup">
<form action="//tomonews.us2.list-manage.com/subscribe/post?u=28c2f2044f22c46a64747226f&amp;id=8254ba5d15" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
    
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_28c2f2044f22c46a64747226f_8254ba5d15" tabindex="-1" value=""></div>
    <input type="image" class="pmc" src="<?php  echo THIS_SITE; ?>img/sign_up_now.gif" border="0">
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
</form>
</div> -->

<!--End mc_embed_signup-->



    </div>
    <map name="Map">
      <area shape="rect" coords="663,653,872,730" href="<?php  echo APP_GOOGLE_PLAY; ?>" target="_blank">
      <area shape="rect" coords="663,874,869,945" href="<?php  echo APP_APPLE_STORE; ?>" target="_blank">
      
      <!--area shape="rect" coords="383,1229,615,1290" href="http://eepurl.com/YDM81" target="_blank"-->
      <area shape="rect" coords="400,1115,437,1154" href="<?php  echo FB_LINKS ?>" target="_blank">
      <area shape="rect" coords="440,1116,478,1154" href="<?php  echo TWITTER_LINKS ?>" target="_blank">
      <area shape="rect" coords="481,1116,519,1153" href="<?php  echo GPLUS_LINKS ?>" target="_blank">
      <area shape="rect" coords="523,1116,561,1154" href="<?php  echo YOUTUBE_LINKS ?>" target="_blank">
      <area shape="rect" coords="565,1116,601,1154" href="<?php  echo INSTAGRAM_LINKS ?>" target="_blank">
    </map>

    <map name="Map2">
      <area shape="rect" coords="220,70,470,150" href="<?php  echo APP_GOOGLE_PLAY; ?>" target="_blank">
      <area shape="rect" coords="220,290,470,357" href="<?php  echo APP_APPLE_STORE; ?>" target="_blank">
      
      <!--area shape="rect" coords="383,1229,615,1290" href="http://eepurl.com/YDM81" target="_blank"-->
      <area shape="rect" coords="62,496,111,544" href="<?php  echo FB_LINKS ?>" target="_blank">
      <area shape="rect" coords="156,496,205,544" href="<?php  echo TWITTER_LINKS ?>" target="_blank">
      <area shape="rect" coords="250,496,299,544" href="<?php  echo GPLUS_LINKS ?>" target="_blank">
      <area shape="rect" coords="344,496,393,544" href="<?php  echo YOUTUBE_LINKS ?>" target="_blank">
      <area shape="rect" coords="438,496,487,544" href="<?php  echo INSTAGRAM_LINKS ?>" target="_blank">
    </map>

    <map name="Map3">
      <area shape="rect" coords="120,40,250,80" href="<?php  echo APP_GOOGLE_PLAY; ?>" target="_blank">
      <area shape="rect" coords="120,153,250,190" href="<?php  echo APP_APPLE_STORE; ?>" target="_blank">
      
      <!--area shape="rect" coords="383,1229,615,1290" href="http://eepurl.com/YDM81" target="_blank"-->
      <area shape="rect" coords="33,263,60,290" href="<?php  echo FB_LINKS ?>" target="_blank">
      <area shape="rect" coords="81,263,108,290" href="<?php  echo TWITTER_LINKS ?>" target="_blank">
      <area shape="rect" coords="129,263,156,290" href="<?php  echo GPLUS_LINKS ?>" target="_blank">
      <area shape="rect" coords="177,263,204,290" href="<?php  echo YOUTUBE_LINKS ?>" target="_blank">
      <area shape="rect" coords="225,263,252,290" href="<?php  echo INSTAGRAM_LINKS ?>" target="_blank">
    </map>

		<div class="cb"></div>
	</div>
	
	<?php  include_once('footer.php'); ?>
</body>

</html>