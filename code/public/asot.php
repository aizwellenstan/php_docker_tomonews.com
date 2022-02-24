<?php 
include_once('config.php');
include_once('api_setting.php');
include_once('device.php');
include_once('media_preprocess.php');
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
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.ico" type="image/icon" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css">
  <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/asot.min.css">
 
	<script src="<?php echo THIS_SITE; ?>js/all.min.js"></script>
  <script src="<?php echo THIS_SITE; ?>js/media_nav.min.js"></script>
	<script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

   <script src="<?php echo THIS_SITE; ?>js/underscore-min.js"></script>

  <?php  include_once("head_scripts.php"); ?>
  <script type="application/ld+json"> 
    { 
      "@context": "http://schema.org", 
      "@type": "NewsArticle", 
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

</head>
<body>
	<div class="wapper"> 
		<?php  
		include_once('header.php'); ?>	
  </div>
	
  <div id="lists">
	  <!-- NAV BAR -->
    <?php include_once('./media_nav.php');?>
     <!-- NAV BAR -->

     <div class="right_content">
       

       <div class="right_content_cnt">
          <div id="vdo_player">
            
             <div class="btn_left btn"><img src="<?php echo THIS_SITE;?>img/left_ico.gif"></div>
             <div class="btn_right btn"><img src="<?php echo THIS_SITE;?>img/right_ico.gif"></div>
          </div>
          <div class="block_cnt highlight">
                     
            <div class="items hightlight">
                        <div class="item hightlight">
                             <div class="playingtxt" style="display: block;"><img src="http://ec2-54-169-178-69.ap-southeast-1.compute.amazonaws.com/tomo_us/img/playing.png">Playing Now</div>
                             <div class="mask"></div>
                        </div>
                        <div class="item hightlight"></div>
                        <div class="item hightlight"></div>
                        <div class="item hightlight"></div>
            </div>
            <div class="btn_left btn"><img src="<?php echo THIS_SITE;?>img/left_ico.gif"></div>
            <div class="btn_right btn"><img src="<?php echo THIS_SITE;?>img/right_ico.gif"></div>
          </div>

          <div class="player_info">
               <div class="CHANNEL"><span class="program">NEWSNIGHT</span><span class="channel">(BBS)-</span> <span class="title">CLEGmania</span>  <span class="date">AirDate:2016-05-16</span></div>

               <div class="social">
                   <span class="btn btn_fb"><img class="img-responsive"  src="<?php echo THIS_SITE;?>img/fb_64x64.png"></span>
                   <span class="btn btn_twr"><img class="img-responsive" src="<?php echo THIS_SITE;?>img/twr_64x64.png"></span>
                   <span class="btn btn_url"><img class="img-responsive" src="<?php echo THIS_SITE;?>img/url_64x64.png"></span>
               </div>

               <div class="description">A move to ban comedians and satirists from commenting on the Royal Wedding of Prince William and Kate Middleton drew the ire of Jon Stewart and the Daily Show. A live feed of their 2011 marriage was supplied by the BBC, which made an agreement with Clarence House and the private office of the Prince of Wales to prevent comedians and satirists from accessing the footage.\r\rWhat’s a satirist to do when no footage is available? Jon Stewart and his Daily Show writers turned to the Taiwanese Animators for a reliable reenactment of events. The result: an uncensored Westminster wedding simulation, Gollum presents the rings and Hitler attends the royal consummation.</div>
               <a href="#" target="_blank"><div class="readmore">Watch the full animation>></div></a>
          </div>

          </div>  
     </div>
     <div class="cb"></div>       
	</div>
	
	<?php  include_once('footer.php'); ?>
    <!--  <div class="POP_CONT loading inv">
      <div class='POP_BG'></div>
      <div class="POP" id="loading" >        
         <div > <img src="<?php  echo THIS_SITE;?>img/loading11.png"></div>  
      </div>
    </div> -->
</body>

<script>

  

   $(function() {
    _GLOBAL.base='<?php THIS_SITE;?>'
    _GLOBAL.page='ASOT';
    _GLOBAL.tok2 = "<?php echo $_SESSION['token2'];?>";
   _GLOBAL.MEDIA_Ys = <?php  echo '["' . implode('", "', $MEDIA_Ys) . '"]' ?>;
    _GLOBAL.ASOT_Chs = <?php  echo '["' . implode('", "', $ASOT_Chs) . '"]' ?>;
    _GLOBAL.dtype = "<?php echo $_GET['dtype'];?>";

    var _media_nav = new MEDIA_NAV();
    _media_nav.set_model_nav ({'years':_GLOBAL.MEDIA_Ys , 'channel': _GLOBAL.ASOT_Chs}) 
    _media_nav.init();



  
   	try{
      var from = (getCookie('track_menu')=="" || !getCookie('track_menu'))? "MAIN":getCookie('track_menu');
   		//console.log('test:' + cnf_1X1.params['ABOUT'].sec )
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