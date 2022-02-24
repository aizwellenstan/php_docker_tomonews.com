<?php 
include_once('configA.php');
include_once('api_settingA.php');

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
<meta name=viewport content="width=1200px">
	<meta name="apple-itunes-app" content="app-id=633875353">
	<meta name="google-play-app" content="app-id=com.nextmedia.gan">
	<meta name="description" content="TomoNews is your daily source for top animated news. We’ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7365156/7009372/css/fonts.css" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?v=1" type="image/png" />
	<link rel="canonical" href="<?php  echo THIS_SITE.'mobileApp'; ?>" />
    <link rel="alternate" media="only screen and (max-width: 640px)" href="<?php  echo THIS_SITE.'m/mobileApp'; ?>" />

	<link rel="stylesheet" href="<?php echo THIS_SITE; ?>stylesheets/style.min.css">
	<script src="<?php echo THIS_SITE; ?>js/all.min.js"></script>  
    <?php  include_once("head_scripts.php"); ?>

</head>
<body>
	<div class="wapper"> 
		<?php  
		//$ad728x90=$ad_mobile_728x90;
		include_once('header.php'); 
		?>	
</div>
	<div id="lists">
	<img src="img/mobile.png" usemap="#Map">
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

		<div class="cb"></div>
	</div>
	
	<?php  include_once('footer.php'); ?>
</body>
</html>