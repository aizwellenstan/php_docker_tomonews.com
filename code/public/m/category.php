<?php 
include_once('config.php');
include_once('api_setting.php');

$cate_id=isset($_GET['category_id']) ? $_GET['category_id'] : '';
$cate_title=$_GET['cate_title'];
if($cate_title=='index.php' || $cate_title=='')
{
   header('HTTP/1.0 404 Not Found');
	header( "refresh:1;url=../" ); 
	exit;
}

$cate_id= isset($cateRouteAry[$cate_title])? $cateRouteAry[$cate_title] : '';

if($cate_id=='')
{
   header('HTTP/1.0 404 Not Found');
	header( "refresh:1;url=../" ); 
	exit;
}

$cate_name = category_id2name($cate_id,$topmenu);
// $thisURL='category.php?category_id='.$cate_id;
$thisURL=THIS_SITE.'category/'.$cate_title;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php  echo $cate_name; ?> | <?php  site_title() ?></title>
    <meta id ="viewport" name="viewport" content="width=device-width">
  
	<meta property="fb:pages" content="148740698487405" />
	<meta name="description" content="TomoNews is your daily source for top animated news. We?™ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?ver=1" type="image/png" />
<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7365156/7009372/css/fonts.css" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css">
    <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/jquery-ui.min.css" />	
    <?php  include_once("../head_scripts.php"); ?> 
    <script src="<?php echo THIS_SITE;?>js/all.min.js?nocache=1217"></script>
     <script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>
    <script src="<?php  echo THIS_SITE; ?>js/jquery.lazyload.min.js"></script>
	<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    
	<?php  //echo '<script>'; ?>
  	<?php  //echo 'var _token="'.$_SESSION['token'].'";'; ?>
  	<?php  //echo '</script>'; ?>
  	<script type="application/ld+json"> 
    { 
      "@context": "http://schema.org", 
      "@type": "Webpage", 
      "headline": "<?php site_title();?>", 
      "url": "<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>", 
      "thumbnailUrl": "", 
      <?php $cdate22=date("Y-m-d\TH:i:s") ;   $cdate22= $cdate22.'.000Z';?>
      "dateCreated": "<?php  echo $cdate22; ?>", 
      "articleSection": "<?php  echo strtoupper ($cate_name); ?>", 
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
<style>
.mov{margin-left: 10px;}
</style>
<body>
		<?php 
		$ad300x50 = $ad_category_300x50; 
		$ad300x250_1 = $ad_category_300x250_1;
		$ad300x250_2 = $ad_category_300x250_2;
		include_once('header.php'); 
		?>
	<div class="wapper"> 
	</div>
	<!-- <div id="ad2" style=""> <?php  /*echo $ad300x50*/ ?></div> -->
	<div id="lists">
		<div id="cate_lab" class="w<?php  echo $cate_id; ?>" align="center" style="text-trans; top:0px;margin-bottom:10px;">
			<?php  echo strtoupper ($cate_name) ; ?>
	    </div>
		<?php 
	
	$feedId = $catLink[$cate_title];
	$mobile_title = '';
	$sdate='*';
	$edate=strtotime(date('Y-m-d h:i:sa'));
	
	$getUrls= APPLICATION_FEED_URL.$feedId.'?start=0&count='.(PAGE_LIMIT_CATEGORY).'&filters[]=c_ts_publish_l:['.$sdate.'%20TO%20'.$edate.']&sort=c_ts_publish_l+desc'; 
	$data=curl_info($getUrls, null);
    $dAry=json_decode($data, true);
	
	$dAry_j=$dAry['docs'];
	$dAryn = $dAry_j;	
    $i=0;
    
    foreach ($dAryn as $key => $value) {
        $cate_name='';
        $cate_id='';
		
        if($i==1){ ?><div id="" style="width: 351px;height: 51px;overflow: hidden;margin: auto;margin-bottom:15px;"> <?php  echo $ad300x50 ?></div> <?php  }
		if($i==3){ ?><div id="" style="width: 300px;height: 251px;overflow: hidden;margin: auto;margin-bottom:15px;"> <?php  echo $ad300x250_1 ?></div> <?php  }
		if($i==6){ ?><div id="" style="width: 300px;height: 251px;overflow: hidden;margin: auto;margin-bottom:15px;"> <?php  echo $ad300x250_2 ?></div> <?php  }
            
           $NSFW_v = false;

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

            show_category_content_lazy($value['obj_id'],$value['c_title_s'],$value['c_ts_publish_l'], $thumb, $cate_id, $cate_name); 
            $i++;
        }
        unset($dAryn);unset($i);unset($data);unset($getUrls);
		?>	


		<div class="cb"></div>
	</div>
	<?php  include_once('footer.php'); ?>
</body>
<script type="text/javascript">
		

 $(function() {
/*waterfall cate*/
    $("img.lazy").lazyload({
		threshold : 700
	});

     _GLOBAL.NSFW  = false;
     _GLOBAL.temp_str_kw="<?php echo $cate_id;?>";
	_GLOBAL.thisSite = "<?php  echo THIS_SITE?>";
	_GLOBAL.feedId = "<?php  echo $feedId ?>";


 	var datawall = new cate_waterfall()
 	_GLOBAL.datawalls.push(datawall)
  datawall.init('<?php echo $cate_id;?>' , '<?php echo $cate_name;?>', '<?php echo PAGE_LIMIT_CATEGORY;?>');


    try{
       var from = (getCookie('track_menu')=="" || !getCookie('track_menu'))? "MAIN":getCookie('track_menu');
     var siteMap_index = '<?php echo strtoupper($cate_title) ;?>';
         
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


} )
	
</script>
</html>