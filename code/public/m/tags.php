<?php 
include_once('config.php');
include_once('api_setting.php');

$KW=$_GET['kw'];

//$page=(int)$_GET['page'];
$debug_mode = isset($_GET['debug_mode']) ? $_GET['debug_mode'] : 0;
//if(!is_int($page)||$page==''||$page==0  ){ $page=1; }
$theme_name = urldecode ($KW );
$SUB_CATENAME= $theme_name;
$topic_name = $theme_name;

$KW=rawurlencode($SUB_CATENAME);
$searchTerm=$KW;
$thisURL=THIS_SITE.'tags.php?kw='.$KW;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php  echo $theme_name; ?> | <?php  site_title() ?></title>
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=0;">
   
	
	<meta name="description" content="TomoNews is your daily source for top animated news. We?™ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7365156/7009372/css/fonts.css" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?ver=1" type="image/png" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css">
 <?php  include_once("../head_scripts.php"); ?> 
    <script src="<?php echo THIS_SITE;?>js/all.min.js?nocache=1117"></script>
	 <script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script> 

  	 <script type="application/ld+json"> 
    { 
      "@context": "http://schema.org", 
      "@type": "Webpage", 
      "headline": "<?php site_title();?>", 
      "url": "<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>", 
      "thumbnailUrl": "", 
      "dateCreated": "", 
      "articleSection": "<?php echo strtoupper($topic_name);?>", 
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
		<?php  
		$ad300x50 = $ad_theme_300x50; 
		include_once('header.php'); 
		?>
	<div class="wapper"> 
	</div>

	<!-- <div id="ad2" style=""> <?php /* echo $ad300x50 */?></div> -->
	<div id="lists">
		<div id="srh_lab" class="" align="center" style="text-transform:uppercase;top:0px;margin-bottom:10px;">
			<?php  echo $theme_name ; ?>
	    </div>
		<?php 
		$sdate='*';
		$edate=strtotime(date('Y-m-d h:i:sa'));
		$getUrls=APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?start=0&count='.PAGE_LIMIT_CATEGORY.'&filters[]=c_ts_publish_l:['.$sdate.'%20TO%20'.$edate.']&filters[]=u_Topic_Tag_smv:"'.$KW.'"&sort=c_ts_publish_l+desc';

		if($debug_mode=='1'){ echo 'getUrls : <br>',$getUrls,'<hr>'; }  
        $data=curl_info($getUrls, null);
        if($debug_mode=='1'){ echo 'data : <br>',$data,'<hr>'; }
        $dAry=json_decode($data, true);

        $dAry_j=$dAry['docs'];
       
        
        /*if(   strlen($dAry_j["id"] ) ==0 )
        {       
            $dAryn = $dAry_j;
        }
        else
        {
            $dAryn = array(0 => $dAry_j) ;
        }*/

        $i=0;
        $dAryn = $dAry_j;
		
        $num_thnumbnail = count( $dAryn);
        $num_video=  $num_thnumbnail +1;
		
        foreach ($dAryn as $key => $value) {
            $NSFW_v = false;
          $title=$value ['c_title_s'];
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
			$i++;
            
            show_mov_content($value['obj_id'],$cate_id,$cate_name,$title,$value['c_ts_publish_l'],$thumb);
        }

        /*$totals=$dAry['numFound'];
        $totalPage=ceil($totals/PAGE_LIMIT_CATEGORY);*/
		if($debug_mode=='2'){ echo 'totals : <br>',$totals,'<hr>'; }
       
        /*
 $thisPage=$page;
        //echo 'totalPage',$totals,'<hr>';
        //echo 'page==>',$dAry['ItemCounter']['totalItems'];

        if($page<=1){ $prePage=1;}else{ $prePage=$page-1; }
        if($page>=$totalPage){ $nexPage=1; }else{ $nexPage=$page+1; }

        $showLimit=3;
        $showMax=$totalPage-2;




        $showStart=$page-2;
        $showEnd=$page+2;
        if($page<=$showLimit){
        	$showStart=1;
        	$showEnd=5;
        }
        
        if($page>=$showMax){
        	$showEnd=$totalPage;
        	$showStart=$totalPage-4;
        	if($showStart<=1){$showStart=1;}
        }*/

		?>	


		<div class="cb"></div>
	</div>
	<?php 
	$theme2 = str_replace(' ', '+', $theme_name);
	?>

	
	<div class="pager"style="display:table;width:320px;height:60px;">
		
	</div>
	<?php 
	//}
	?>
	<?php  include_once('footer.php'); ?>
</body>
<script type="text/javascript">
	
		

 $(function() {
    /*waterfall cate*/
     _GLOBAL.theme = '<?php echo $KW; ?>';
     _GLOBAL.NSFW  = false;
 	var datawall = new tags_waterfall();

 	_GLOBAL.datawalls.push(datawall);
    datawall.init();

     try{
      var from = (getCookie('track_menu')=="" || !getCookie('track_menu'))? "MAIN":getCookie('track_menu');
     var siteMap_index = 'TOPICS';
         console.log('test:' + '<?php echo  $topic_name ;?>' );
          cnf_1X1.nxmObj={
        "region":"US",
        "prod":"TOMONEWS",
        "site":"<?php echo THIS_SITE;?>",
        "platform":"MOBWEB",  //WEB | MOBWEB | ANDROID | IPHONE | IPAD | TABLET 
        "section":'<?php echo  $topic_name ;?>', ////Site map
        "media":"TEXT",//Site map
        "content":"INDEX",  //Site map
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