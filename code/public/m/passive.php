<?php 
include_once('config.php');
include_once('api_setting.php');
include_once('device.php');
include_once('psv_preprocess.php');

//echo $current_title;
$title = 'TEST';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php  echo $page_name; ?> | <?php  site_title() ?></title>
<meta id="viewport" name="viewport" content="width=device-width, user-scalable=0;">
<meta name="description" content="<?php  echo str_replace('"','',strip_tags($mobDes)); ?>"/>
<meta name="keywords" content="<?php  echo $Keywords_kwstr ?>" />
<meta name="news_keywords" content="<?php  echo $Keywords_kwstr ?>" />
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="apple-touch-icon-precomposed" href=""/>
<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?ver=1" type="image/png" />
	<!-- Facebook Header -->
<meta property="og:title" content="<?php  echo strip_tags($meta_tit); ?>"/>
<meta property="og:type" content="website"/>
<meta property="og:description" content="<?php  echo str_replace('"','',strip_tags($mobDes)); ?>"/>
<meta property="og:url" content="<?php  echo THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($meta_tit))).'-'.$meta_vid; ?>"/>
<meta property="og:image" content="<?php  echo $thumb; ?>" />
<meta property="og:site_name" content="<?php  echo strip_tags($meta_tit); ?>"/>
<meta property="fb:pages" content="148740698487405" />

<!-- Facebook Header -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@TomoNewsUS">
<meta name="twitter:title" content="<?php  echo strip_tags($meta_tit); ?>">
<meta name="twitter:description" content="<?php  echo str_replace('"','',strip_tags($mobDes)); ?>">
<meta name="twitter:image:src" content="<?php  echo $thumb; ?>">
<meta name="twitter:image:width" content="480">
<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7365156/7009372/css/fonts.css" />
<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css">
<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/passive.min.css">
<?php  include_once("../head_scripts.php"); ?> 
<script src="<?php echo THIS_SITE;?>js/all.min.js?cache=0922"></script>
<script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>
<script src="<?php echo THIS_SITE; ?>js/jquery.lazyload.min.js"></script>

<!--<script src="http://10.95.20.5:8080/target/target-script-min.js#anonymous"></script>-->

<script type="application/ld+json"> 
	
	{ 
      "@context": "http://schema.org", 
      "@type": "VideoObject", 
      "name": "<?php echo $meta_tit;?>", 
	  "description": "<?php  echo str_replace('"','',strip_tags($meta_desc)); ?>", 
      "thumbnailUrl": "<?php  echo $thumb; ?>", 
      "uploadDate": "<?php  echo $cdate22.'.000Z';?>", 
	  "duration": "PT<?php echo (string)$parseDur[0];?>M<?php  echo (string)$parseDur[1];?>S",
	  "contentUrl": "http://video-pdu.us.tomonews.com/encoded-586/media/<?php  echo $meta_vid; ?>/819200-854x480.mp4",
	  "interactionCount": "<?php  echo number_format($counter) ?>"
    } 
	
</script>
<?php 
$vastUrl = '';
if ($device == 'ios'){
	$vastUrl = 'http://mobile.btrll.com/vast?siteId=3868221&it=w&platform={os}&n={timestamp}&br_ip={ipaddress}&br_pageurl={pageurl}&br_ua={useragent}'; 
}elseif ($device == 'android'){
	$vastUrl = 'http://mobile.btrll.com/vast?siteId=3868224&it=w&platform={os}&n={timestamp}&br_ip={ipaddress}&br_pageurl={pageurl}&br_ua={useragent}';
}
?>
<script>	

var vastUrl = '<?php  echo $vastUrl; ?>';
var Pageurl = encodeURIComponent(document.URL);

function preProcessorFunction(vastUrl) {
	var replaceData = {                                       
        os: '<?php  echo $device; ?>',
        osversion: '<?php  echo Detect::os();?>',
        ipaddress: "<?php  echo  GET_IP_FUNC();?>",
        pageurl: Pageurl,
        useragent: "<?php echo $_SERVER['HTTP_USER_AGENT'];?>",
        timestamp: new Date().getTime().toString()
	};
 
	var output = replaceTokens(vastUrl, replaceData);
    return output;
}

function replaceTokens(str, data) {
    return str.replace(/{([^{}]*)}/g, function(a, b) {
        var r = data[b];
        return typeof r === "string" || typeof r === "number" ? r : a
    })
}

var anvp = {};
anvp.vdoplayer = {};
anvp.vdoplayer.config = {
	//autoplay: true,
	poster:"<?php  echo $thumb; ?>",
	html5: true,
	plugins : {
		dfp: {
			adTagUrl: preProcessorFunction(vastUrl),
		},
			analytics: {
				pdb: 67104571,
				serverURL: "http://sa-mcp-analytics.anvato.net/VideoAnalytics/src/video_log.php" 
			}
	}
};
</script>
<?php  include_once('../ga.php'); ?>	
</head>
<style>
#pllist_select{background: #fff url("<?php echo THIS_SITE;?>img/select2.png") no-repeat 100% 50%;}
.bar{width:321px;height:30px;bottom:0px;background:#f5f3f4;z-index:999999;}
#dots_bottom{position: relative;}
.social_top{width:100%;margin:10px 0;}
.social_top .sc_item{display: inline-block;width:34px;}
.social_top .sc_item.invi {display: none;}

</style>
<body>
	<?php  
	$ad300x50 = $ad_passive_300x50;
	include_once('header.php'); 
	?>
	
	<div id="vdo_wapper">
    
			<div id="vdo_content">
            <!-- <div class="bar"></div> -->
				<div itemscope itemtype="http://schema.org/Article"  id="vdo_cnt">
				    <div id="vdoplayer" ></div>	
		            <div class="btns_containv vdo">
						 <div class="btn_prev"><img src="<?php  echo THIS_SITE;?>img/vdo_icn_lft.png" class='rwd_image'></div>
						 <div class="btn_next"><img src="<?php  echo THIS_SITE;?>img/vdo_icn_rt.png" class='rwd_image'></div>
					</div> 
					<div id="dots_bottom">
		               <div class="dots">			
		               </div>
	                </div>
					<div id="" style="width: 351px;height: 51px;overflow: hidden;margin: auto;margin-bottom:15px;"> <?php  echo $ad300x50 ?></div>					
                    <div class="btns_contain">
					  <div class="styleSelect">

                            <select id="pllist_select">
                               <?php 
							   
                               foreach( $plTitles_arr as $key => $value)
                               {
                                  echo '<option data-type="playlist" data-id="'.$themeplaylists_arr[$key].'">'.$value.'</option>';
                               }
                               ?>
                               
                            </select>
                       </div>
                     </div>
                    <div itemprop="name" id="vdo_title"></div>
                    <a href="#" target="_blank" id="readmore_lnk"><div class="readmore">Read More Here</div></a>
					<!-- <div id="vdo_sub">VIDEO SUB DESCRIPTION</div> -->

					<div class="social_top" id="scbar_top" style="display:table;margin:10px">		
						<div class="shareBarbox"  id ='social_top'>
						  <div class="sc_item fb "><img img class='rwd_image' src="<?php echo THIS_SITE;?>img/fb_64x64.png"></div>
						  <div class="sc_item twr "><img img class='rwd_image' src="<?php echo THIS_SITE;?>img/twr_64x64.png"></div>
						  <a href="whatsapp://send?text=<?php echo THIS_SITE. $video_id?> via @TomoNewsUS" data-action="share/whatsapp/share"> <div class="sc_item wapp " ><img img class='rwd_image' src="<?php echo THIS_SITE;?>img/wapp_64x64.png"></div></a>
						  <div class="sc_item email "><img img class='rwd_image' src="<?php echo THIS_SITE;?>img/email_64x64.png"></div>
						  <div class="sc_item btn_social" ><img img class='rwd_image' src="<?php echo THIS_SITE;?>img/plus_64x64.png"></div>
						  <div class="sc_item url sc_item2 invi "><img img class='rwd_image' src="<?php echo THIS_SITE;?>img/url_64x64.png"></div>
						  <div class="sc_item gplus sc_item2 invi"><img img class='rwd_image' src="<?php echo THIS_SITE;?>img/gplus_64x64.png"></div>
						  <div class="sc_item stum sc_item2 invi"><img img class='rwd_image' src="<?php echo THIS_SITE;?>img/StumbleUpon_64x64.png"></div>
						  <div class="sc_item reddit sc_item2 invi"><img img class='rwd_image' src="<?php echo THIS_SITE;?>img/reddit_64x64.png"></div>
						</div>
					</div>
								
				</div>
       <!--Taboola-->
       <?php  include_once('footer.php'); ?>
<script src="<?php echo THIS_SITE;?>libs/jquery.touchSwipe.min.js"></script>       
<script src="<?php echo THIS_SITE;?>js/passive_touch.min.js?nocache=0119"></script>
<script src="<?php echo THIS_SITE;?>js/passive.min.js?nocache=0119"></script>
<script>


<?php  echo 'var _token="'.$_SESSION['token'].'";'; ?>
_GLOBAL.page = 'passive';
_GLOBAL.base ='<?php  echo THIS_SITE; ?>';
_GLOBAL.app_key ="<?php  echo APPLICATION_KEY;?>";
_GLOBAL.searchTerm='<?php echo $KW_THEME;?>';
_GLOBAL.pic_cdn = '<?php echo PIC_CDN;?>';
  _GLOBAL.list_id = '<?php echo $PL;?>';
_GLOBAL.anvato_player  = '<?php  echo ANVATO_PLAYER_SRC;?>';

_GLOBAL.osversion= '<?php  echo Detect::os();?>';
_GLOBAL.ipaddress= "<?php  echo  GET_IP_FUNC();?>";
_GLOBAL.useragent= "<?php echo $_SERVER['HTTP_USER_AGENT'];?>";

var _tbns_pl
$(function() {
	
    update_img($('.passive_icon img') , _GLOBAL.base+ "img/tv_off.png");
    //$('.passive_icon').unbind('click');
    $('.passive_icon  a').attr({'href' : _GLOBAL.base});
        $("img.lazy").lazyload({
		threshold : 700
	});
	
	 var _social1 = new SOCIAL_BTNS($('#scbar_top'))
        _social1.init();
		
     _tbns_pl = new TBNS_PL() ;
     _tbns_pl.init(_GLOBAL.list_id, <?php echo $page;?> ,'<?php echo $video_id;?>' ,'.thumbnails_container.current');
		
     $("#pllist_select").val("<?php echo $current_title;?>");
     $('#pllist_select').change(function (){
        var _id = $( "select option:selected").data('id');
        //location.href=_GLOBAL.base +"tomoplay/"+ _id;
		setTimeout(function(){document.location.href=_GLOBAL.base +"tomoplay/"+ _id },400);
     })      
      
	  var _touch= new TOUCH( document.getElementById('vdo_content') )
	  _touch.init();
	 // $('#vdo_content').css('overflow-x' , 'hidden')

	   //
	    try{
         var from = (getCookie('track_menu')=="" || !getCookie('track_menu'))? "MAIN":getCookie('track_menu');
           var siteMap_index = 'TOMOPLAY';
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

</body>

</html>