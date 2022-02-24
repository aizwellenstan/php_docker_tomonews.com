<?php 
include_once('config.php');
include_once('api_setting.php');
include_once('mvp_preprocess.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php  echo $page_name; ?> | <?php  site_title() ?></title>
<meta id ="viewport" name="viewport" content="width=device-width">
<meta name="description" content="TomoNews is your daily source for top animated news. We?™ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
<meta property="fb:pages" content="148740698487405" />
<link rel="apple-touch-icon-precomposed" href=""/>
<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.ico" type="image/icon" />
<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css">
<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/jquery-ui.min.css" />	
<?php  include_once("../head_scripts.php"); ?> 
<script src="<?php echo THIS_SITE;?>js/all.min.js"></script>
<script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>
<script src="<?php  echo THIS_SITE; ?>js/jquery.lazyload.min.js"></script>

<?php  echo '<script>'; ?>
<?php  echo 'var _token="'.$_SESSION['token'].'";'; ?>
<?php  echo '</script>'; ?>
<script type="application/ld+json"> 
    { 
      "@context": "http://schema.org", 
      "@type": "Webpage", 
      "headline": "<?php echo $page_name; ?>", 
      "url": "<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>", 
      "thumbnailUrl": "", 
      <?php $cdate22=date("Y-m-d\TH:i:s") ;   $cdate22= $cdate22.'.000Z';?>
      "dateCreated": "<?php  echo $cdate22; ?>", 
      "articleSection": 'MOST VIEWED', 
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
.ml2, .ml3{padding-right:7px;}

#cate_lab{text-align:left; top:0px;margin-bottom:10px;background:#000;}
#cate_lab>span{margin-left:10px;}
#cate_lab >div{display:inline-block;float:right;margin-right:0px;position: relative;}  
.styleSelect img , .styleSelect select{position:absolute;}
.styleSelect img {width: 80px;    top: 12px;    right: 7px;}

.styleSelect{
   width: 140px;
   height: 34px;
   overflow: hidden;
   border: 0px solid #000;
   }
#mv_date {
	font-size: 14px;
	top: 13px;
    right: 9px;
    color:#ff6600;
    font-weight:bold;
    background: transparent;
    /*-webkit-appearance: menulist;*/
    -webkit-appearance: none;
    border: 0px solid #000;
    width: 120px;
   }

.POP_CONT{position:fixed; width:100%;height:100%;z-index:99999; background:rgba(255, 255, 255, 0.6);}
.POP{width:auto ;position:absolute;top:50%;left:50%;}
.POP div{position:absolute;left:-16px;top:-16px;}
.POP > .btn_go{cursor:pointer;width:270px;height:220px;position:absolute;top:-75px;left:0px;}
.POP > .btn_cls{cursor:pointer;width:307px;height:23px;position:absolute;    left: -30px;    top: 150px;}
.POP > .btn_clsx{cursor:pointer;position:absolute;width:20px;height:20px;    left: 285px;    top: -175px;}
</style>
<body>
<div class="preload">
<img  src="<?php  echo THIS_SITE;?>img/loading11.png" width='32' height='32'>
</div>
  <div class="POP_CONT invi">
  <div class="POP" >        
    <div ><img src="<?php  echo THIS_SITE;?>img/loading11.png" width='32' height='32'></div>  
  </div></div>
		<?php 
		$ad300x50 = $ad_mv_320X501; 		
		$ad300x250_1=$ad_mv_300X250_1;
		$ad300x250_2=$ad_mv_300X250_2;
		include_once('header.php'); 
		?>
	<div class="wapper"> 
	</div>
	<!-- <div id="ad2" style=""> <?php /*echo $ad300x50;*/?></div> -->
	<div id="lists">
		<div id="cate_lab">
			<span ><?php  echo strtoupper('Most Viewed') ; ?></span>
			 <div class="styleSelect">
			 	<img src="<?php  echo THIS_SITE;?>img/select.gif">
             <select id="mv_date">
                <option value='day' id='day'   data-type="day">Past 24 Hours</option>
                <option value='week' id='week'  data-type="week">Past 7 Days</option>
                <option value='month' id='month' data-type="month">Past 30 Days</option>
             </select>
             </div>
	    </div>
		<?php 
		switch ($dtype) {
				case 'day':
					$_timestamp = strtotime('-1 day',time());
					break;
				case 'week':
					$_timestamp = strtotime('-7 day',time());
					break;
				case 'month':
					$_timestamp = strtotime('-30 day',time());
					break;
			}

			$getUrls3 = APPLICATION_FEED_URL.'A5CWEWBLEVZRPS3TBD?start=0&count=50&filters[]=c_ts_publish_l:['.$_timestamp.'%20TO%20*]&sort=u_View_Count_s+desc';
		
			$data3 = curl_info($getUrls3, null);
			$dAry3 = json_decode($data3, true);
            $dAryn3=$dAry3['docs'];
            $totals=count($dAry3['docs']);    
			/*print_r($dAryn3);
			exit;*/
			if(count($dAryn3) >1 ){ 
				
				foreach ($dAryn3 as $key => $value) {
					
					$cate_name='';
					$cate_id='';
				   /* if($i==2){ echo '<div class="index mov" style="">'.$ad300x250_1.'</div>'; }
					if($i==6){ echo '<div class="index mov" style="">'.$ad300x250_2.'</div>'; }*/
					
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
				
					$i++;
					if(i<=3)
					show_mov_content($value['obj_id'],$cate_id,$cate_name,$value['c_title_s'],$value['c_ts_publish_l'],$thumb);
					else	
					show_mov_content_lazy($value['obj_id'],$cate_id,$cate_name,$value['c_title_s'],$value['c_ts_publish_l'],$thumb);
				}
        unset($dAryn);unset($i);unset($data);unset($getUrls);
        /// get totals for page counter
			}
		?>	
		<div class="cb"></div>
	</div>
	<div class="pager"style="display:table;width:320px;height:60px;">
		
	</div>
	<?php  include_once('footer.php'); ?>
</body>
<script type="text/javascript">
		
_GLOBAL.base ='<?php  echo THIS_SITE; ?>';
 $(function() {

     $("img.lazy").lazyload({
        event : "sporty"
     });
     setTimeout(function() {
        $("img.lazy").trigger("sporty")
    }, 2000);
       $("#mv_date").val("<?php echo $dtype;?>");

     //$("#mv_date").find("option#<?php echo $dtype;?>").attr("selected", true);

     $("#mv_date").change(function (){
        var _typ =   $( "select option:selected" ).data('type');
        $('.POP_CONT').show();
        setTimeout(function (){location.href=_GLOBAL.base+'mostviewed/' + _typ ;} , 300) 
     })

     try{
        var from = (getCookie('track_menu')=="" || !getCookie('track_menu'))? "MAIN":getCookie('track_menu');
          var siteMap_index = 'MOST-VIEWED';
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

} )
	
</script>
</html>