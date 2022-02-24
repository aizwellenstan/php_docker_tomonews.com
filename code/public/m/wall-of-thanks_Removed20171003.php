<?php 
include_once('config.php');
include_once('api_setting.php');

$debug_mode = isset($_GET['debug_mode']) ? $_GET['debug_mode'] : 0;
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
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7365156/7009372/css/fonts.css" />
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?v=1" type="image/png" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css">
  <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/about.min.css">

 <?php  include_once("../head_scripts.php"); ?> 
	<script src="<?php echo THIS_SITE;?>js/all.min.js"></script>
  <script src="<?php echo THIS_SITE; ?>js/media_nav.min.js?nocache=0112"></script>
	<script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>  
  
    
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
<style>
h1 { text-align: center; font-family: 'Droid Serif', serif;font-size: 20pt;}
h2 { border-bottom: 0px solid #c4c6c9;font-size: 15pt; }
.div-table-col{ line-height: 20px; }
</style>
</head>
<body>
	<?php  include_once('header.php'); ?>	
	<div class="wapper"> 
	<div id="lists">
		<div id="aboutc">
			<div id="aboutc2">
				<h1>WALL OF THANKS</h1><br>
				<iframe width="280" height="150" src="https://www.youtube.com/embed/45rlSixTn4I" frameborder="0" allowfullscreen></iframe></iframe><br>
				<br><br><p>The individuals below have helped out tremendously in the creation of TomoNews content.</p><br>
				<p>If you'd like to see your name here check out our <a href="https://www.patreon.com/tomonews" target="_blank">Patreon page</a>. We'd also like to give a big thank you to everyone else — you know who you are.</p></br>
				<p>Thank you again for supporting TomoNews!</p></br></br>
				<h2>Directors</h2><br>
				<div class="div-table">
					<div class="div-table-row">
						<div class="div-table-col">Kris Simpson</div>
						<div class="div-table-col">Winston Newton</div>
						<div class="div-table-col">Vincent Millage</div>
						<div class="div-table-col">David Innes</div>
						<div class="div-table-col">Matt Floto</div>
					</div>
					<div class="div-table-row">
						<div class="div-table-col">Lance B</div>
						<div class="div-table-col">Cheeki Breeki</div>
					</div>
				</div>
				<br><br><h2>Producer</h2>
				<div class="div-table">
					<div class="div-table-row">
						<div class="div-table-col">Jake Kitchen</div>	
						<div class="div-table-col">Daniel Smirnou</div>
						<div class="div-table-col">Goatse</div>
						<div class="div-table-col">Ivan Lagunes</div>
					</div>
					<div class="div-table-row">
						<div class="div-table-col">Gary Des Roches</div>	
						<div class="div-table-col">Chip Chapin</div>
						<div class="div-table-col">Silang Sang</div>
						<div class="div-table-col">Kizzume Fowler</div>
					</div>
				</div>
				<br><br><h2>Key Grip</h2>
					<div class="div-table">
						<div class="div-table-row">	
							<div class="div-table-col">Stephen Kwong</div>
							<div class="div-table-col">Juan Camilo Rodriguez</div>		
							<div class="div-table-col">Jackie</div>
							<div class="div-table-col">Felipe Rivera</div>	
							<div class="div-table-col">repsycl3d</div>							
						</div>
						<div class="div-table-row">
							<div class="div-table-col">Harry from YouTube</div>
							<div class="div-table-col">Andrew Wang</div>
							<div class="div-table-col">CaseAgainstFaith1</div>
							<div class="div-table-col">Grant Ross</div>
							<div class="div-table-col">Andrew Wang</div>
						</div>
						<div class="div-table-row">
							<div class="div-table-col">Nipz Keem</div>
							<div class="div-table-col">Chanon Lophanitchakun</div>
							<div class="div-table-col">Nicole Pardon</div>
							<div class="div-table-col">Kyubi_max</div>
							<div class="div-table-col">Billyds123</div>
						</div>
						<div class="div-table-row">
							<div class="div-table-col">Jackie</div>
							<div class="div-table-col">Joey Fiorentino</div>
							<div class="div-table-col">SkyBoxEye</div>
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
    _GLOBAL.page='ABOUT';

    var _media_nav = new MEDIA_NAV();
    _media_nav.set_model_nav ({'years':[] , 'channel': []}) 
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