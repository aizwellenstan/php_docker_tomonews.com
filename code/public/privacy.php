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
      <?php $cdate22=date("Y-m-d\TH:i:s") ;   $cdate22= $cdate22.'.000Z';?>
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
    <?php //include_once('./media_nav.php');?>
     <!-- NAV BAR -->

     <div class="right_content">
     	<div id="aboutc" >
    	
		<div id="aboutc2">
			<p style="font-size:20pt;font-weight:bold;">Cookies and Privacy Permissions</p>  <br>
			<br><p>We use cookies on our websites in order to understand anonymous and broad demographic information about our visitors. We would like to stress that this is completely anonymous and is used purely to help us align our content better with our audience. 
			We also use cookies to limit the number of times we show you the same advertisements, for statistical analysis of ad reporting, and to combat fraud and abuse.</p>
			<br><p>If you continue to use this site, we'll assume you are happy to accept these cookies.</p>
			<br><p>Please note: we require setting a cookie in your browser in order to remember these settings for you.</p>
			<br><p>3rd Party Cookies</p>
			<p>Some of the adverts carried on this website are delivered by third party servers and in doing so they may leave cookies on your machine. Please note that we engage in NO behavioural advertising of any kind. Nevertheless, 
			you may opt-out of these cookies by following these links:</p>
			<br><p>Zedo opt-out: <a href="https://zutils.zedo.com/tools/zedo_optout.cgi" target="_blank">https://zutils.zedo.com/tools/zedo_optout.cgi</a></p>
			<p>LKQD opt-out: <a href="https://ad.lkqd.net/optout/optout.html" target="_blank">https://ad.lkqd.net/optout/optout.html</a></p>
			<p>Google Analytics opt-out: <a href="https://tools.google.com/dlpage/gaoptout/" target="_blank">https://tools.google.com/dlpage/gaoptout/</a></p>
			
			
		</div>

		
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