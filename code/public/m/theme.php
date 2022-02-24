<?php 
include_once('config.php');
include_once('api_setting.php');

$theme_id=isset($_GET['theme_id']) ? $_GET['theme_id'] : '';
$theme_title=$_GET['theme_title'];

if($theme_title=='index.php' || $theme_title=='')
{
   header('HTTP/1.0 404 Not Found');
	header( "refresh:1;url=../" ); 
	exit;
}

if($theme_title!='') $theme_id= $themeRouteAry[$theme_title];

$theme_name = theme_id2name($theme_id,$toptheme);
////判斷是否NSFW!
if( $theme_name !='NSFW')
{
	$searchTerm=urlencode($theme_name);
	$NSFW = false;
}
else
{$NSFW = true;}

$thisURL=THIS_SITE.'theme/'.$theme_title;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php  echo $theme_name; ?> | <?php  site_title() ?></title>
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=0;">
   
	
	<meta name="description" content="TomoNews is your daily source for top animated news. We?™ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<meta property="fb:pages" content="148740698487405" />
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7365156/7009372/css/fonts.css" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?ver=1" type="image/png" />

<?php  include_once("../head_scripts.php"); ?> 
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css?nocache=1117">
	<script src="<?php echo THIS_SITE;?>js/all.min.js?nocache=1117"></script>
	<script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>  
  
<script type="application/ld+json"> 
    { 
      "@context": "http://schema.org", 
      "@type": "Webpage", 
      "headline": "<?php echo $theme_name;?>", 
      "url": "<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>", 
      "thumbnailUrl": "", 
      <?php $cdate22=date("Y-m-d\TH:i:s") ;   $cdate22= $cdate22.'.000Z';?>
      "dateCreated": "<?php  echo $cdate22; ?>",  
      "articleSection": "", 
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
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-35663092-20', 'auto');
  ga('send', 'pageview');
</script>
</head>
<body>
		<?php  
		$ad300x50 = $ad_theme_300x50; 
		$ad300x250_1 = $ad_theme_300x250_1;
		$ad300x250_2 = $ad_theme_300x250_2;
		include_once('header.php'); 
		?>
	<div class="wapper"> 
	</div>

	<!-- <div id="ad2" style=""> <?php  /*echo $ad300x50*/ ?></div> -->
	<div id="lists">
		<div id="srh_lab" class="" align="center" style="text-transform:uppercase;top:0px;margin-bottom:10px;">
			<?php  echo $theme_name ; ?>
	    </div>
		<?php 
		$sdate='*';
		$edate=strtotime(date('Y-m-d h:i:sa'));
		$getUrls= APPLICATION_FEED_URL.$themeLink[$theme_id].'?start=0&count='.(PAGE_LIMIT_CATEGORY).'&filters[]=c_ts_publish_l:['.$sdate.'%20TO%20'.$edate.']&sort=c_ts_publish_l+desc'; 

		$data=curl_info($getUrls, ' ');
        $dAry=json_decode($data, true);		
		
		$dAry_j=$dAry['docs'];

		$dAryn = $dAry_j;

		$i=0;
        foreach ($dAryn as $key => $value) {
            
			if($i==1){ ?><div id="" style="width: 351px;height: 51px;overflow: hidden;margin: auto;margin-bottom:15px;"> <?php  echo $ad300x50 ?></div> <?php  }
			if($i==3){ ?><div id="" style="width: 300px;height: 251px;overflow: hidden;margin: auto;margin-bottom:15px;"> <?php  echo $ad300x250_1 ?></div> <?php  }
			if($i==6){ ?><div id="" style="width: 300px;height: 251px;overflow: hidden;margin: auto;margin-bottom:15px;"> <?php  echo $ad300x250_2 ?></div> <?php  }
			
			$NSFW_v = false;
          $mobile_headline=array('tit'=>$value ['c_title_s'], 'mb_tit'=> $value ['c_title_s']);
		  $mobile_headline['u_Mobile_Headline_s'] = $value ['c_title_s'];
			$thumbnail = $value['thumbnails'];
		 if( isset($value['u_NSFW_Tag_s']) && $value['u_NSFW_Tag_s']=='NSFW' ){  $NSFW_v = true; }
foreach ($thumbnail as $key => $value1) {
							if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
						}
						
						
			$CatIndex=$value['c_category_smv'][0];
            $cate_name=array_search( $CatIndex, $menuAry );
             if($cate_name=='NMA Originals')
                      {
                        $cate_id=$menuAry['Tomo Originals'];
                        $cate_name='Tomo Originals';
                      }
                      else
            $cate_id=$CatIndex; 
	
            $cate_id=$menuAry[$cate_name];
            $i++;
            // NSFW
            show_mov_content($value['obj_id'],$cate_id,$cate_name,$value['c_title_s'],$value['c_ts_publish_l'],$thumb);
        }

		?>	


		<div class="cb"></div>
	</div>
	<?php 
	$theme2 = str_replace(' ', '+', $theme_name);
	?>
	<?php  include_once('footer.php'); ?>
</body>
<script type="text/javascript">

 $(function() {
    /*waterfall cate*/
     _GLOBAL.theme = '<?php echo $theme2; ?>';
     _GLOBAL.NSFW  = '<?php echo $NSFW;?>'
	 _GLOBAL.thisSite = "<?php  echo THIS_SITE?>";
	 _GLOBAL.themeId = '<?php  echo $themeLink[$theme_id] ?>';
 	
 	 var datawall = new theme_waterfall()
 	 _GLOBAL.datawalls.push(datawall)
     datawall.init();

       try{var from = (getCookie('track_menu')=="" || !getCookie('track_menu'))? "MAIN":getCookie('track_menu');
         var siteMap_index = '<?php echo strtoupper($theme_name);?>';
         cnf_1X1.nxmObj={
        "region":"US",
        "prod":"TOMONEWS",
        "site":"<?php echo THIS_SITE;?>",
        "platform":"MOBWEB",  //WEB | MOBWEB | ANDROID | IPHONE | IPAD | TABLET 
        "section":cnf_1X1.params[siteMap_index].sec, ////Site map
        "media":"TEXT",//Site map
        "content":"INDEX",  //Site map
        "issueid":"",      //Aritcle Issue Date or send blank for homepage/index
        "title":"",        //Article Title, Photo Title, etc or send Blank for home page/index page
        "cid":"",          //Article ID/Photo ID or send blank for Menu/Index pages
        "news":"TOMONEWS", //Site map
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