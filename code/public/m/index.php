<?php 
include_once('config.php');
include_once('api_setting.php');
//include_once('device.php');
//include_once('lang_redirect.php');
$debug_mode = isset($_GET['debug_mode']) ? $_GET['debug_mode'] : 0;

$thisURL=THIS_SITE;
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
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7365156/7009372/css/fonts.css" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?v=2" type="image/png" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css?nocache=1103">
	
	<link rel="canonical" href="<?php  echo THIS_SITE_DESKTOP; ?>" />
<?php  include_once("../head_scripts.php"); ?> 	
<script src="<?php echo THIS_SITE;?>js/all.min.js?nocache=1117"></script>
  <script src="<?php  echo THIS_SITE; ?>js/jquery.lazyload.min.js"></script>
  
  	<?php  echo '<script>'; ?>
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
	"potentialAction": {
		"@type": "SearchAction",
		"target": "<?php  echo THIS_SITE; ?>/search?kw={search_term_string}",
		"query-input": "required name=search_term_string"
	}
	</script>

<?php  include_once('../ga.php'); ?>	
</head>

<style>
.wapper{margin-bottom: 0px;}
.newsfeed_btn{
  width: 300px;
  height: 45px;
  border: 1px solid #005cff;
  background-color: #fff;
  font-weight: 900;
  font-size: 1rem;
  color: #005cff;
  display: inline-block;
  text-align: center;
  margin: 10px;
  line-height: 45px;
}
</style>
<body>
		<?php  
		$ad300x50 = $ad_index_300x50;
		$ad300x250_1 = $ad_index_300x250_1;
		$ad300x250_2 = $ad_index_300x250_2;
		include_once('header.php'); 
		?>
	<div class="wapper"> 
	<div id="lists3">
		
		<?php 
		
		$getUrls=APPLICATION_FRONT_PAGE_URL;
		
		$data = curl_info($getUrls, null);
		
		$dAry = json_decode( $data, true );
	
		if($debug_mode==1)
        {echo $data;
        }
		
        $dAryn=$dAry['videos'];
		
        $i=0;
		
        foreach ($dAryn as $key => $value) {
            $cate_name='';
            $cate_id='';
			
			if($i==1){ ?><div id="" style="width: 351px;height: 51px;overflow: hidden;margin: auto;margin-bottom:15px;"> <?php  echo $ad300x50 ?></div> <?php  }
			if($i==3){ ?><div id="" style="width: 300px;height: 251px;overflow: hidden;margin: auto;margin-bottom:15px;"> <?php  echo $ad300x250_1 ?></div> <?php  }
			if($i==6){ ?><div id="" style="width: 300px;height: 251px;overflow: hidden;margin: auto;margin-bottom:15px;"> <?php  echo $ad300x250_2 ?></div> <?php  }
			
            $dArynCat=$value['custom']; 
            $cate_name = is_array($value['categories'])? $value['categories'][0] : $value['categories'];
            $NSFW_v = false;
			
            foreach ($dArynCat as $Catkey => $Catval) {   
				if( $Catkey =="NSFW Tag" && !empty( $Catval )){ $NSFW_v=true; }
            } 
			
            $cate_id=$menuAry[$cate_name];
			
			$i++;
			
			show_mov_content_lazy($value['upload_id'],$cate_id,$cate_name,$value['title'],$value['ts_published'],$value['thumbnail']);


        }
        
         unset($dAryn);unset($i);unset($data);unset($getUrls);

		?>
       
		<div class="cb"></div>

	</div>

    <a href="<?php echo THIS_SITE.'newsfeed/'?>" target="_self"><div class="newsfeed_btn" >SEE ALL NEWS >></div></a>
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
