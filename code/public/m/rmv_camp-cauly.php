<?php 
include_once('config.php');
include_once('api_setting.php');
//include_once('device.php');
//include_once('lang_redirect.php');
$page=(int)$_GET['page'];
$debug_mode=$_GET['debug_mode'];
if(!is_int($page)||$page==''||$page==0  ){ $page=1; }
$thisURL=THIS_SITE;
$_SESSION['jp'] = $_SESSION['jp'] == 1 ? 1 : 0;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php  site_title() ?></title>
	<meta name="google-site-verification" content="LNkk7F3gMpWHgnHPEz5vsFDYBjONRopvjCGwaypBy6c" />
  <meta id ="viewport" name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<meta name="description" content="TomoNews is your daily source for top animated news. We??¢ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<meta property="fb:pages" content="148740698487405" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png" type="image/png" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css?nocache=1103">
	
	<link rel="canonical" href="<?php  echo THIS_SITE_DESKTOP; ?>" />
<?php  include_once("../head_scripts.php"); ?> 	
<script src="<?php echo THIS_SITE;?>js/all.min.js?nocache=1117"></script>

  <!--<script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>-->
  <script src="<?php  echo THIS_SITE; ?>js/jquery.lazyload.min.js"></script>
  
  	<?php  echo '<script>'; ?>
  	<?php  echo 'var _token="'.$_SESSION['token'].'";'; ?>
  	<?php  echo '</script>'; ?>
     <script type="application/ld+json"> 
    { 
      "@context": "http://schema.org", 
      "@type": "Webpage", 
      "headline": "<?php site_title();?>", 
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

<style>
.wapper{margin-bottom: 0px;}
.newsfeed_btn{
  width: 300px;
  height: 45px;
  border: 1px solid #ff6600;
  background-color: #fff;
  font-weight: 900;
  font-size: 1rem;
  color: #ff6600;
  display: inline-block;
  text-align: center;
  margin: 10px;
  line-height: 45px;
}
</style>
<body>
<?php 
$p=$_GET['p'];
/*if($p!=''){
	$getUrls=get_videoshow($p);
	$data2=curl_info($getUrls, LIST_VIDEOS );
	$dAry=convert_xml_in_array($data2);
	$title=$dAry['params']['video_list']['video']['title'];
	if($title!=''){
		$title=remove_punc($title);
		?>
		<script>
		location.href='<?php  echo THIS_SITE; ?><?php  echo $title; ?>-<?php  echo $p; ?>';
		</script>
		<?php 
		exit;
	}
	
}*/
?>
<?php 
	
   /* $getUrls=get_CategoryList('64222680793088',0,PAGE_LIMIT_CATEGORY);

    $data=curl_info($getUrls);
    $dAry=json_decode($data, true);
    $dAryn=$dAry['list'][0]['media'];
print_r($getUrls);
exit;
    foreach ($dAryn as $key => $value) {            
    	if($ftitle==''){ $ftitle= $value['title']; } 
    	if( $fid == '' ){ $fid = $value['id']; }
    }*/
?>
		<?php  
		$ad300x50 = $ad_index_300x50;
		include_once('header.php'); 
		?>
	<div class="wapper"> 
	<!-- <div id="ad2" style=""> <?php /* echo $ad300x50 */?></div> -->
		<div id="lists3">
			<br><br>
			<a href="http://api.cauly.co.id/v.Y5Q2"><img style=" width: 100%;" src="<?php echo THIS_SITE.'img/camp_cauly/JENIUS_AdImage.jpg'?>"/></a><br><br>
			<a href="http://api.cauly.co.id/v.wLP"><img style=" width: 100%;" src="<?php echo THIS_SITE.'img/camp_cauly/17_AdImage.jpg'?>"/></a><br><br>
			<a href="http://api.cauly.co.id/v.Voer"><img style=" width: 100%;" src="<?php echo THIS_SITE.'img/camp_cauly/vivle.jpg'?>"/></a><br><br>
		</div>	
	</div>

 
	<?php  include_once('footer.php'); ?>
   <!-- <div class="test_info" style="position:fixed;width:100px;height:15px;background:#fff;top: 100px;">test</div> -->
</body>

<script >


$(function() {
    $("img.lazy").lazyload({
		threshold : 700
	});
    try{
       var from = (getCookie('track_menu')=="" || !getCookie('track_menu'))? "MAIN":getCookie('track_menu');
         var siteMap_index = 'HOME';
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
