<?php 
	include_once('configA.php');
	include_once('api_settingA.php');
	include_once('device.php');
	//include_once('lang_redirect.php');

	$page=isset($_GET['page']) ? (int)$_GET['page'] : '';
	$debug_mode=isset($_GET['debug_mode']) ? $_GET['debug_mode'] : '';
	$OPT1=isset($_GET['opt1']) ? $_GET['opt1'] : '';

	if(!is_int($page)||$page==''||$page==0  ){ $page=1; }
	$thisURL=THIS_SITE;
	//$_SESSION['us'] == 1? 1:0;
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
<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?v=1" type="image/png" />
<!--link rel="stylesheet" type="text/css" href="//cloud.typography.com/7365156/7009372/css/fonts.css" / -->
<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css">
<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/jquery-ui.min.css">
<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/index.min.css?nocache=1203" type="text/css" media="screen">
<?php  include_once("head_scripts.php"); ?>
<script src="<?php echo THIS_SITE; ?>js/all.min.js?nocache=2"></script>  
<link rel="canonical" href="<?php  echo THIS_SITE; ?>" />
<link rel="alternate" media="only screen and (max-width: 640px)" href="<?php  echo THIS_SITE.'m/'; ?>" />

<script type="application/ld+json"> 
{ 
	"@context": "http://schema.org", 
		"@type": "Webpage", 
		"potentialAction": {
			"@type": "SearchAction",
			"target": "<?php  echo THIS_SITE; ?>search?kw={search_term_string}",
			"query-input": "required name=search_term_string"
		},
		"headline": "<?php  site_title();?>", 
		"url": "<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>", 
		"thumbnailUrl": "", 
		<?php  $cdate22=date("Y-m-d\TH:i:s") ;   $cdate22= $cdate22.'.000Z';?>
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
</script>

<?php  include_once('ga.php'); ?>	
</head>

<body>

<div id ="wapper" class="wapper"> 
<?php  include_once('header.php'); ?>	
<div id="vodx_title" style="top:30px;left:15px; font-size:18pt;"><a href="<?php  echo THIS_SITE,urlencode(str_replace(' ','-',$ftitle)),'-',$fid;?>" style="color:#FFF;"><?php  echo $ftitle; ?></a></div>
</div>

<div id="vdo_wapper">
<div id="vdo_content" style="display:table-cell;width:665px;">
<?php 
	$ad300x250_1=$ad_index_300x250_1;
	$ad300x250_2=$ad_index_300x250_2;
	$ad300x250_3 = $ad_index_300x250_3;

	$today = date('Y-m-d');
	$getUrls="http://cms.nextanimation.com.tw/api/getFrontPage?program=TomoNews%20US&published_date=$today&counts=10";
	$data = curl_info($getUrls, null);

	$dAry = json_decode( $data, true );

	if($debug_mode==1){ echo $data; }

	$dAryn=$dAry['videos'];

	$i=0;

	$vids = array();
	foreach ($dAryn as $key => $value) {
		$cate_name='';
		$cate_id='';

		if($i==1){ echo '<div class="index mov" style="">'.$ad300x250_1.'</div>'; }
		if($i==6){ echo '<div class="index mov" style="">'.$ad300x250_3.'</div>'; }

		$dArynCat=$value['custom']; 
		$cate_name = is_array($value['categories'])? $value['categories'][0] : $value['categories'];

		$cate_id=$menuAry[$cate_name];

		$thumb = preg_replace('#^http?:#', '', $value['thumbnail']);

		if($i==0 || $i==4 || $i==8|| $i==13 || $i==18|| $i==23)
		{
			$ind = $i /4;
			show_XlargeThumbnail($value['upload_id'],$cate_id,$cate_name,$value['title'],$dArynCat['Mobile Description (Sub-head)'],strtotime($value['ts_published']),$thumb, $ind);
		}
		else
		{
			show_SmallThumbnail_lazy($value['upload_id'],$cate_id,$cate_name,$value['title'],strtotime($value['ts_published']),$thumb, $i);
		}
		array_push($vids,$value['upload_id']);
		$i++;
	}
?>
<div class="cb"></div>
<a href="<?php  echo THIS_SITE;?>newsfeed"><div style="width:655px ; height:47px; border:solid #005cff 1px;text-align:center;color:#005cff;font-weight:bold;font-size:20px; line-height:47px;margin-bottom:20px"><p>SEE ALL NEWS >></p></div></a>
</div>
<div id="vdo_otherlist" >
<?php 			
////Breaking News
include_once('side_thumb_apiAO.php');
$PAGE = 'Frontpage';
$thumaType = 'RR_topicthumbs_clk';

insert_breakingNews(3);

///////YOU MAY ALSO LIKE//////
$thumaType = 'RR_YMAL_clk';
$thumaTypejs= $thumaType;
$PAGEjs =  $PAGE;
$sdate=strtotime('-60 day',time());
// $getUrls5 = APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?start=0&count=31&sort=c_ts_publish_l+desc&filters[]=c_ts_publish_l:['.$sdate.'%20TO%20*]';
$getUrls5 = "https://cms.nextanimation.com.tw/api/getProgramVideos?program=TomoNews%20US&published_date=$today&counts=15&page=0";
?><div class="mov" style="width:300px;margin:0;margin-bottom: 20px;"><?php  echo $ad300x250_2;?></div><?php 
echo '<div id="ymal_list" class="mov_list" >'; 
//echo '<img src="'.THIS_SITE.'img/also_like.gif">'; 
echo '<div class="right-side-title">YOU MAY ALSO LIKE</div>';
echo '</div>';  
?>
</div>	
</div>

<div id="dialog" title=""><p></p></div>

<script>
$(document).ready(function() {

		function getPageScrollPercent(){
		var bottom = $(window).height()  + $(window).scrollTop() -300;
		var height = $(document).height();
		return Math.round(100*bottom/height);
		}
		});
</script>
<?php  include_once('footer.php'); ?>

<script src="<?php  echo THIS_SITE; ?>js/ymalO.js?nocache=0922" defer></script> 
<script src="<?php  echo THIS_SITE; ?>js/index.min.js?nocache=1203" defer></script>  
<script type="text/javascript"> 
var _GLOBAL={};
_GLOBAL.opt1 = "<?php echo $OPT1;?>";
_GLOBAL.base ='<?php  echo THIS_SITE; ?>';
_GLOBAL.page ='INDEX';
_GLOBAL.NSFW  =0;

var cnf_YMAL={};
cnf_YMAL.getUrls5 = <?php echo json_encode($getUrls5); ?>;
cnf_YMAL.vids = <?php echo json_encode($vids); ?>;
cnf_YMAL.PAGE = '<?php echo $PAGEjs;?>';
cnf_YMAL.thumaType = '<?php echo $thumaTypejs;?>';
cnf_YMAL.PAGING = '12';
</script>
</body>
</html>
