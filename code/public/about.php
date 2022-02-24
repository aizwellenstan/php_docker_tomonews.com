<?php 
include_once('configA.php');
include_once('api_settingA.php');
include_once('device.php');/*include_once('media_preprocess.php');*/
$page=isset($_GET['page']) ? (int)$_GET['page'] : '';
$debug_mode=isset($_GET['debug_mode']) ? $_GET['debug_mode'] : '';

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
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7365156/7009372/css/fonts.css" />
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?v=1" type="image/png" />
	<link rel="stylesheet" href="stylesheets/style.min.css">
 <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/about.min.css">
 <?php  include_once("head_scripts.php"); ?>
	<script src="<?php echo THIS_SITE; ?>js/all.min.js"></script>
	 <script src="<?php echo THIS_SITE; ?>js/media_nav.min.js"></script>
	<script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>  
	 <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
   
    <script type="application/ld+json"> 
    { 
      "@context": "http://schema.org", 
      "@type": "Webpage", 
      "headline": "<?php  site_title();?>", 
      "url": "<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>", 
      "thumbnailUrl": "", 
      <?php  $cdate22=date("Y-m-d\TH:i:s") ;   $cdate22= $cdate22.'.000Z';?>
      "dateCreated": "<?php  echo $cdate22; ?>", 
      "articleSection": "HOME", 
      "creator": "TOMONEWS", 
      "keywords": [<?php 
                 foreach($META_KW as $i => $value) 
                 {
                 	 if($i==0)
                 	 {echo '"'.$value.'"';}
                 	 else
                 	 {echo ' ,"'.$value.'"';}	
                 } 
                  ?>] 
    } 
</script>
<?php  include_once('ga.php'); ?>	
</head>
<body>
	<div class="wapper"> 
		<?php  
		//$ad728x90=$ad_about_728x90;
		include_once('header.php'); ?>	
</div>
	<div id="lists">
	 <!-- NAV BAR -->
    <?php  //include_once('./media_nav.php');?>
     <!-- NAV BAR -->

     <div class="right_content">
     	<div id="aboutc" >
    	
		<div id="aboutc2">
			<p style="font-size:20pt;font-weight:bold;">TomoNews</p>  <br>
			<br><p>TomoNews is your best source for real news. We combine photos and videos with our quickly produced animation to give you the full picture of how it all went down — and we have fun doing it.</p>
			<br><p>TomoNews reacts to the news in the way that a viewer might react to the news. Some stories make us laugh. Some stories make us outraged. Some stories make us sigh and shake our heads. You’ll hear that it in our voice, especially when we’re sarcastic or over the top. Our reaction to the news is uncensored — we don’t feel the need to apologize for that. Neither should the viewer.</p>
			<br><p>Politically, TomoNews defies easy categorization. We hate political correctness and don’t buy into the dominant narrative. TomoNews is neither right or left. We start by describing events as they are (and not how we wish them to be). Events inform our beliefs. Our beliefs do not inform our interpretation of events</p>
			<br><p>Here are a few things we value. We believe people should be free to do as they please. Freedom of speech, universal suffrage, civil liberties, religious freedom, due process — these rights should be inalienable to everyone, everywhere, though they are not fully guaranteed in our part of the world (we’re looking at you, China).</p>
			<br><p>We’re deeply suspicious any time someone tells another person how they should think, act or behave. We don’t like bullies in all forms, especially the ones who pretend to be your savior. We’re deeply suspicious of government intrusion, when people — if left to their own devices — can find a solution on their own. Our world is powered by ideas, and a free market of ideas is necessary to keep us moving forward.</p>
			<br><p>Finally, TomoNews animates without fear or favor. If you do something stupid, you’re going to get animated.</p>
			<br><p>Get all your top, trending stories on the go by downloading the TomoNews app in
			<a href="<?php  echo APP_GOOGLE_PLAY ?>" target="_blank">Google Play</a> and <a href="<?php  echo APP_APPLE_STORE ?>" target="_blank">Apple’s App Store</a>. Connect with us on <a href="<?php  echo FB_LINKS ?>" target="_blank">Facebook</a> ,<a href="<?php  echo TWITTER_LINKS ?>" target="_blank">Twitter</a> and <a href="<?php  echo GPLUS_LINKS ?>" target="_blank">Google+</a> for more!</p>
			
		</div>
		<div id="aboutc3">
			<a href="<?php  echo APP_APPLE_STORE; ?>" target="_blank"><img src="img/hd_as.jpg" width="155" height="50" ></a>
			<a href="<?php  echo APP_GOOGLE_PLAY; ?>" target="_blank"><img src="img/hd_gp.jpg" width="155" height="50" ></a>
			
			<a href="<?php  echo FB_LINKS ?>" target="_blank"><img src="img/icon_48_fb.gif"  ></a>
			<a href="<?php  echo TWITTER_LINKS ?>" target="_blank"><img src="img/icon_48_tw.gif" ></a>
			<a href="<?php  echo GPLUS_LINKS ?>" target="_blank"><img src="img/icon_48_gplus.gif"  ></a>
			<a href="<?php  echo INSTAGRAM_LINKS ?>" target="_blank"><img src="img/icon_48_instagram.gif"></a>
			<br><br>
			<hr>
			<br>
			<p style="font-size:20pt;font-weight:bold;">Next Animation Studio</p><br>
</p><br>
			<p>Next Animation Studio is the studio behind the innovative news platform TomoNews. Founded in 2007, Next Animation Studio is one of the largest full-service, digital animation studios in Asia with more than 500 creators and artists. Based in Taipei, Taiwan, the studio handles every step of the 3D content workflow. In addition to viral animated news stories, Next Animation Studio develops original, creative content across multiple platforms and channels.
</p><br>
			<p>For more information on Next Animation Studio and its products and services,<br> please visit: <a href="http://www.nextanimationstudio.com" target="_blank">www.nextanimationstudio.com</a></p>

</p><br>
			<p>Please direct general queries to <a href="mailto:info@nextanimation.com.tw">info@nextanimation.com.tw</a></p>
</p><br>
			<p>Please direct business queries to <a href="mailto:business@nextanimation.com.tw">business@nextanimation.com.tw</a></p>

</p><br>
</p><br>
			<p>
			Next Animation Studio Limited<br>
			Tel: (886-2) 6607-8666<br>
			No. 19, Lane 146 Xinhu 2nd Road, Neihu District, Taipei City 114, Taiwan
			</p>
            <br><br>
            <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.141555370236!2d121.57689421500685!3d25.063190883958683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442ab80e52c7059%3A0xe97fc160721da969!2sNo.+19%2C+Lane+146%2C+Xinhu+2nd+Rd%2C+Neihu+District%2C+Taipei+City%2C+Taiwan+114!5e0!3m2!1sen!2s!4v1464156287552" width="700" height="250" frameborder="0" style="border:0" allowfullscreen></iframe></p>
		</div>
		
	</div>    
 
		
	</div>
	<div class="cb"></div>
     </div>


    
	
	<?php  include_once('footer.php'); ?>
</body>

<script>


   $(function() {

    _GLOBAL.base='<?php THIS_SITE;?>'
    _GLOBAL.page='ABOUT';
    /*_GLOBAL.tok2 = "<?php echo $_SESSION['token2'];?>";
    _GLOBAL.MEDIA_Ys = <?php  echo '["' . implode('", "', $MEDIA_Ys) . '"]' ?>;
    _GLOBAL.ASOT_Chs = <?php  echo '["' . implode('", "', $ASOT_Chs) . '"]' ?>;*/

/*    var _media_nav = new MEDIA_NAV();
    _media_nav.set_model_nav ({'years':_GLOBAL.MEDIA_Ys , 'channel': _GLOBAL.ASOT_Chs}) 
    _media_nav.init();
*/
   	try{
   		 var from = (getCookie('track_menu')=="" || !getCookie('track_menu'))? "MAIN":getCookie('track_menu');
   		console.log('test:' + cnf_1X1.params['ABOUT'].sec )
cnf_1X1.nxmObj={
"region":"US",
"prod":"TOMONEWS",
"site":"<?php echo THIS_SITE;?>",
"platform":"WEB",//WEB | MOBWEB | ANDROID | IPHONE | IPAD | TABLET 
"section":cnf_1X1.params['ABOUT'].sec, ////每頁
"media":"TEXT",//Site map
"content":"HOME",//Site map
"issueid":"",//Aritcle Issue Date or send blank for homepage/index
"title":"",//Article Title, Photo Title, etc or send Blank for home page/index page
"cid":"",//Article ID/Photo ID or send blank for Menu/Index pages
"news":"TOMONEWS",//Site map
"edm":"",//Site map
"action":"PAGEVIEW",  //Always send PAGEVIEW
//"uid":"", //
"subsect":"", //Site map
"subsubsect":"",//Site map
"menu":from,//Menu Title
"auth":"",//"columnist name send blank if not available"
"ch":cnf_1X1.params['ABOUT'].ch,//Site map
"cat":cnf_1X1.params['ABOUT'].cate//Site map
};
   	var _pxl = new PIXEL1x1();
      _pxl.init();
   	}
   	catch(err)
   	{console.log('out of sitemap!................')}
   	
   })
</script>
</html>