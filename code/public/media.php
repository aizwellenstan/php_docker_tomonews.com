<?php 
include_once('configA.php');
include_once('api_settingA.php');
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
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css?nocache=0127">
  <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/media.min.css?nocache=0127">
  <?php  include_once("head_scripts.php"); ?>
	<script src="<?php echo THIS_SITE; ?>js/all.min.js?nocache=0127"></script>
  <script src="<?php echo THIS_SITE; ?>js/media_nav.min.js?nocache=0127"></script>
	<script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

   <script src="<?php echo THIS_SITE; ?>js/underscore-min.js"></script>
<script type="text/javascript">
	location.href='about';
</script>
 
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
		include_once('header.php'); ?>	
  </div>
	
  <div id="lists">
	  <!-- NAV BAR -->
    <?php include_once('./media_nav.php');?>
     <!-- NAV BAR -->

     <div class="right_content">
       <div class="header title">
           MEDIA HIGHLIGHTS
       </div>
       <div class="deco_line"></div><br>

       <div class="right_content_cnt">
      <!--  <div class="year">2015</div>
      
           <div class="block highlight">
               
               <div class="btn_left btn"><div class="btn_bg"><img src="<?php echo THIS_SITE;?>img/left_ico.gif"></div></div>
               <div class="btn_right btn"><img src="<?php echo THIS_SITE;?>img/right_ico.gif"></div>
      
               <div class="block_cnt highlight">
                 <div class="items hightlight">
                    <div class="item hightlight" style="">
                     <div class="program">BBC NEWS</div>
                     <div class="description"> kills armed black teen during North Carolina Christmas mall shooting</div>
                    </div>
         
                    <div class="item hightlight" style="">
                       <div class="program">BCOMEDY CENTRAL</div>
                       <div class="description"> kills armed black teen during North Carolina Christmas mall shooting</div>
                    </div>
                    <div class="item hightlight" style="">
                     <div class="program">BBC NEWS</div>
                     <div class="description"> kills armed black teen during North Carolina Christmas mall shooting</div>
                    </div>
         
                    <div class="item hightlight" style="">
                       <div class="program">BCOMEDY CENTRAL</div>
                       <div class="description"> kills armed black teen during North Carolina Christmas mall shooting</div>
                    </div>
      
                 </div>
               </div>
               
           </div> -->
 
      <!--  <a href="#">
            <div class="item sub_highlight">
          <span class="title">Gizbmo </span><span class="c_date">9/21/2015</span>
          <div class="description"> kills armed black teen during North Carolina Christmas mall shooting</div>
            </div>
            </a>  <a href="#">
            <div class="item sub_highlight">
          <span class="title">Gizbmo </span><span class="c_date">9/21/2015</span>
          <div class="description"> kills armed black teen during North Carolina Christmas mall shooting</div>
            </div>
            </a>  <a href="#">
            <div class="item sub_highlight">
          <span class="title">Gizbmo </span><span class="c_date">9/21/2015</span>
          <div class="description"> kills armed black teen during North Carolina Christmas mall shooting</div>
            </div>
            </a>  <a href="#">
            <div class="item sub_highlight">
          <span class="title">Gizbmo </span><span class="c_date">9/21/2015</span>
          <div class="description"> kills armed black teen during North Carolina Christmas mall shooting</div>
            </div>
            </a>  <a href="#">
            <div class="item sub_highlight">
          <span class="title">Gizbmo </span><span class="c_date">9/21/2015</span>
          <div class="description"> kills armed black teen during North Carolina Christmas mall shooting</div>
            </div>
            </a>  -->
          </div>  
     </div>
     <div class="cb"></div>       
	</div>
	
	<?php  include_once('footer.php'); ?>
     <div class="POP_CONT loading">
       <div class='POP_BG'></div>
       <div class="POP" id="loading" >        
          <div > <img src="<?php  echo THIS_SITE;?>img/loading11.gif"></div>  
       </div>
     </div>
</body>

<script>

  

   $(function() {
    _GLOBAL.base='<?php echo THIS_SITE;?>';
    _GLOBAL.page='MEDIA';
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