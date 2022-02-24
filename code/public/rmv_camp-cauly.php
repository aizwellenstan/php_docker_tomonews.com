<?php 
///////////////////////////////
///  #3.0測試  
///  Program Log .Taboola update.......
///  
//////////////////////////////
include_once('configA.php');
include_once('api_settingA.php');
include_once('device.php');
//include_once('lang_redirect.php');

$page=(int)$_GET['page'];
$debug_mode=$_GET['debug_mode'];

if(!is_int($page)||$page==''||$page==0  ){ $page=1; }
$thisURL=THIS_SITE;
$_SESSION['us'] == 1? 1:0;
?>

<!DOCTYPE html>
<html>
  <head>
	
	<title><?php  site_title() ?></title>
	<meta name="google-site-verification" content="LNkk7F3gMpWHgnHPEz5vsFDYBjONRopvjCGwaypBy6c" />
  <meta name=viewport content="width=1200px">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="apple-itunes-app" content="app-id=633875353">
	<meta name="google-play-app" content="app-id=com.nextmedia.gan">
	<meta name="description" content="TomoNews is your daily source for top animated news. We’ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<meta property="fb:pages" content="148740698487405" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.ico" type="image/icon" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css?nocache=0901">
  <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/jquery-ui.min.css">
  <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/index.min.css?nocache=1203" type="text/css" media="screen">
  <?php  include_once("head_scripts.php"); ?>
	<script src="<?php echo THIS_SITE; ?>js/all.min.js?nocache=2"></script>  
  <!--<script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script> -->
  
   <link rel="canonical" href="<?php  echo THIS_SITE; ?>" />
  <link rel="alternate" media="only screen and (max-width: 640px)" href="<?php  echo THIS_SITE.'m/'; ?>" />
  
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

<body>
  
	<div class="wapper"> 
		<?php  
		include_once('header.php'); 
		?>	
	</div>

    <div id="vdo_wapper" style="display:table;position:relative;top:150px;">
      
			<div id="cate_lab" style="display:table-cell;width:665px;color:black; ">
				This content is only available on mobile devices.
			</div>
		<div id="vdo_otherlist" >
			<?php 			
              ////Breaking News
			include_once('side_thumb_apiAO.php');
            $PAGE = 'Frontpage';
            $thumaType = 'RR_topicthumbs_clk';
			
			insert_breakingNews(3);
 ?>
        </div>	
	</div>

<div id="dialog" title="">
<p></p>
</div>
<style>

</style>
<script>

  $(document).ready(function() {
    /*var nxmObj = {"region":"HK","prod":"ADAILY","site":"hk.apple.nextmedia.com","platform":"WEB","section":"HIGHLIGHT","media":"TEXT","content":"ARTICLE","issueid":"20151120","title":"\u4e0d\u6eff\u5357\u6c99\u4e2d\u91ab\u57ce\u7528\u970d\u82f1\u6771\u62db\u5fa0\u970d\u5bb6\u9577\u623f\u64ec\u544a\u4e09\u623f","cid":"19380442","news":"DAILY","edm":"","action":"PAGEVIEW","uid":"","subsect":"","subsubsect":"","menu":"\u4eca\u65e5\u860b\u679c\/\u8981\u805e\u6e2f\u805e\/\u982d\u689d","auth":"","ch":"LOCALNEWS","cat":"LOCALNEWS"};
    for (var nxmProp in nxmObj) {
        nxmTrack.nxmAddSeg(nxmProp.toUpperCase() + '=' + nxmObj[nxmProp]);
      }
    var ngs_id = nxmTrack.readCookie('ngs_id');
    if (ngs_id == null) ngs_id = '';
    nxmTrack.nxmAddSeg('NGSID=' + ngs_id);

        nxmTrack.nxmSendPageDepth(0, new Date().getTime());
    //Scroll Depth tracking
    var trackRecords = [];
    $(window).scroll(function(){
      var scrollPercent = getPageScrollPercent();
      if(scrollPercent>=25 && trackRecords.indexOf("25")==-1) {
        trackRecords.push("25");
        nxmTrack.nxmSendPageDepth(25, new Date().getTime());
      }
      else if(scrollPercent>=50 && trackRecords.indexOf("50")==-1) {
        trackRecords.push("50");
        nxmTrack.nxmSendPageDepth(50, new Date().getTime());
      }
      else if(scrollPercent>=75 && trackRecords.indexOf("75")==-1) {
        trackRecords.push("75");
        nxmTrack.nxmSendPageDepth(75, new Date().getTime());
      }
      else if(scrollPercent==100 && trackRecords.indexOf("100")==-1) {
        trackRecords.push("100");
        nxmTrack.nxmSendPageDepth(100, new Date().getTime());
      }
    });*/

    function getPageScrollPercent()
    {
      var bottom = $(window).height()  + $(window).scrollTop() -300;
      var height = $(document).height();
      return Math.round(100*bottom/height);
    }

  });
</script>
<?php  include_once('footer.php'); ?>

<script src="<?php  echo THIS_SITE; ?>js/index.min.js?nocache=1203" defer></script>  
<script type="text/javascript"> 
var _GLOBAL={};
_GLOBAL.app_key ="<?php  echo APPLICATION_KEY;?>";
_GLOBAL.opt1 = "<?php echo $OPT1;?>";
_GLOBAL.base ='<?php  echo THIS_SITE; ?>';
_GLOBAL.page ='INDEX';
_GLOBAL.NSFW  =0;
  
</script>

</body>
</html>



