<?php 
include_once('config.php');
include_once('api_setting.php');
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
   <meta id="viewport" name="viewport" content="width=device-width, user-scalable=0;">
	<meta name="description" content="TomoNews is your daily source for top animated news. We’ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.ico" type="image/icon" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css?nocache=0113">
  <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/media.min.css?nocache=0013">

 <?php  include_once("../head_scripts.php"); ?> 
	<script src="<?php echo THIS_SITE;?>js/all.min.js"></script>
  <script src="<?php echo THIS_SITE; ?>js/media_nav.min.js?nocache=0111g"></script>
	<script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>  
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
   <script src="<?php echo THIS_SITE; ?>js/passive_touch.min.js"></script>
  <script src="<?php echo THIS_SITE; ?>js/underscore-min.js"></script>
<script type="text/javascript">
	location.href='404.php';
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
<?php  include_once('../ga.php'); ?>	
</head>
<body>
 <div class="POP_CONT loading">
  <div class="POP" >        
    <div ><img src="<?php  echo THIS_SITE;?>img/loading11.png" width='32' height='32'></div>  
  </div></div>
   <!-- <div class="POP_CONT loading">
  <div class="POP" >        
    <div ><img src="<?php  echo THIS_SITE;?>img/loading11.png" width='32' height='32'></div>  
  </div></div> -->
		<?php  
		$ad300x50 = $ad_about_300x50;
		include_once('header.php'); ?>	
	<div class="wapper" id="wapper"> 

	<div id="lists">
	  <div class="container">
      <!-- NAV bAR -->
           <?php include_once('./media_nav.php');?>
      <!-- NAV bar -->
            <div class="deco_line"></div>
            <div class="right_content_cnt" >
            <div class="year"></div> 
            <div class="block highlight">
             <div class="block_cnt highlight">
               
                <div class="items hightlight">  
                   <!--   <a target="_blank" href="http://www.buzzfeed.com/jamieross/taiwanese-animators-have-made-an-absolutely-bizarr#.mnBnXkvjl">
                   <div class="item hightlight" style="background: url(http://media-ssl.nextmedia.com/media-images-586/media/316205726449664/photo3/original.jpg);background-size:cover">
                    <div class="program">Buzzfeed</div>
                    <div class="description"> Taiwanese Animators Have Made An Absolutely Bizarre Video About Jeremy Corbyn</div>
                   </div></a>
                   <a target="_blank" href="http://www.buzzfeed.com/jamieross/taiwanese-animators-have-made-an-absolutely-bizarr#.mnBnXkvjl">
                   <div class="item hightlight" style="background: url(http://media-ssl.nextmedia.com/media-images-586/media/316205726449664/photo3/original.jpg);background-size:cover">
                    <div class="program">Buzzfeed</div>
                    <div class="description"> Taiwanese Animators Have Made An Absolutely Bizarre Video About Jeremy Corbyn</div>
                   </div></a>
                   <a target="_blank" href="http://www.buzzfeed.com/jamieross/taiwanese-animators-have-made-an-absolutely-bizarr#.mnBnXkvjl">
                   <div class="item hightlight" style="background: url(http://media-ssl.nextmedia.com/media-images-586/media/316205726449664/photo3/original.jpg);background-size:cover">
                    <div class="program">Buzzfeed</div>
                    <div class="description"> Taiwanese Animators Have Made An Absolutely Bizarre Video About Jeremy Corbyn</div>
                   </div></a>
                   <a target="_blank" href="http://www.buzzfeed.com/jamieross/taiwanese-animators-have-made-an-absolutely-bizarr#.mnBnXkvjl">
                   <div class="item hightlight" style="background: url(http://media-ssl.nextmedia.com/media-images-586/media/316205726449664/photo3/original.jpg);background-size:cover">
                    <div class="program">Buzzfeed</div>
                    <div class="description"> Taiwanese Animators Have Made An Absolutely Bizarre Video About Jeremy Corbyn</div>
                   </div></a> -->
                </div>
                 <!-- <div class="btn_left" style=""><img src="http://us.tomonews.com/m/img/vdo_icn_lft.png" class="rwd_image"></div>
                                 <div class="btn_right" style=""><img src="http://us.tomonews.com/m/img/vdo_icn_rt.png" class="rwd_image"></div> -->
             </div> 
            
            </div>
           
          </div>
       
      </div>


	</div>
	
	<?php  include_once('footer.php'); ?>
</div>
</body>
<script>
$(function() {
    _GLOBAL.base='<?php THIS_SITE;?>'
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
             var siteMap_index = 'ABOUT';
             console.log('test:' + cnf_1X1.params[siteMap_index].sec );
              cnf_1X1.nxmObj={
            "region":"US",
            "prod":"TOMONEWS",
            "site":"<?php echo THIS_SITE;?>",
            "platform":"MOBWEB",  //WEB | MOBWEB | ANDROID | IPHONE | IPAD | TABLET 
            "section":cnf_1X1.params[siteMap_index].sec, ////Site map
            "media":"TEXT",//Site map
            "content":"HOME",  //Site map
            "issueid":"",      //Aritcle Issue Date or send blank for homepage/index
            "title":"",        //Article Title, Photo Title, etc or send Blank for home page/index page
            "cid":"",          //Article ID/Photo ID or send blank for Menu/Index pages
            "news":"TOMONEWS", //Site map
            "edm":"",          //Site map
            "action":"PAGEVIEW",  //Always send PAGEVIEW
            //"uid":"", //
            "subsect":"", //Site map
            "subsubsect":"",//Site map
            "menu":from,//Menu Title
            "auth":"",//"columnist name send blank if not available"
            "ch":cnf_1X1.params[siteMap_index].ch,//Site map
            "cat":cnf_1X1.params[siteMap_index].cate//Site map
            };
        var _pxl = new PIXEL1x1();
        _pxl.init();
    }
    catch(err)
    {
      console.log('out of siteMap!');
    }
})
</script>

</html>