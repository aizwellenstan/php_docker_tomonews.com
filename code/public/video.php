<?php 
///////////////////////////////////////////////////
////  LOADING測試  
////  OPT1=1  拿掉之前的延遲輸出(1.5sec)
////  ELSE    維持延遲輸出(1.5sec)
///////////////////////////////////////////////////
include_once('configA.php');
include_once('api_settingA.php');
include_once('device.php');
include_once('vdo_preprocessA.php');
include_once('side_thumb_apiAO.php');
//echo session_id();

/*    延遲輸出使用!
*/

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?php  site_title_name() ?> <?php  echo $title_cp; ?></title>
		<meta name="viewport" content="width=1200px">
		<meta name="apple-itunes-app" content="app-id=633875353">
		<meta name="google-play-app" content="app-id=com.nextmedia.gan">
		<meta name="description" content="<?php  echo str_replace('"','',strip_tags($mobDes)); ?>"/>
		<meta name="keywords" content="<?php  echo $Keywords_kwstr ?>" />
		<meta name="news_keywords" content="<?php  echo $Keywords_kwstr ?>" />
		<link rel="apple-touch-icon-precomposed" href=""/>
		<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?v=1" type="image/png" />
		<meta property="article:published_time" content="<?php  echo $cdate22; ?>" />
		  <!-- Facebook Header -->
		<meta property="og:image" content="<?php  echo $thumb; ?>" />
		<meta property="og:image:width" content="600" />
		<meta property="fb:app_id" content="1594187264184986" />
		<meta property="og:title" content="<?php  echo strip_tags($title); ?>"/>
		<meta property= "og:type" content= "article"/>
		<meta property="og:description" content="<?php  echo str_replace('"','',strip_tags($mobDes)); ?>"/>
		<meta property="og:url" content="<?php  echo THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title_cp))).'-'.$video_id; ?>"/>
		<meta property="og:site_name" content="<?php  echo strip_tags($title); ?>"/>
		<meta property="fb:pages" content="148740698487405" />
		<!-- Facebook Header -->
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@TomoNewsUS">
		<meta name="twitter:title" content="<?php  echo strip_tags($title); ?>">
		<meta name="twitter:description" content="<?php  echo str_replace('"','',strip_tags($mobDes)); ?>">
		<meta name="twitter:image" content="<?php  echo $thumb; ?>">

    	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css"> 
		<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/video.min.css">
		<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/jquery-ui.min.css">
		<?php  include_once("head_scripts.php"); ?> 
		<script src="<?php  echo THIS_SITE; ?>js/all.min.js?nocache=2"></script>     
		<script src="<?php  echo THIS_SITE; ?>js/jquery.zclip.min.js"></script>  
		<script src="<?php  echo THIS_SITE; ?>js/imagesloaded.pkgd.min.js"></script>
		<script src="<?php  echo THIS_SITE; ?>js/common.min.js"></script>
		<script src="<?php  echo THIS_SITE; ?>js/slide.min.js?nocache=1208"></script> 
		<script src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
		<link href="https://vjs.zencdn.net/7.8.3/video-js.css" rel="stylesheet" />
		<link rel="canonical" href="<?php  echo THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title_cp))).'-'.$video_id; ?>" />
		<meta name="robots" content="<?php  echo ROBOT_INDEX ?>">
		<style>
			#taboola-below-article-thumbnails{width: 652px;    height: auto;    margin: 10px auto;}
			#taboola_title{background: #fff;    width: auto;    padding: 20px;}
			.formbox{width: 659px; height: 120px; background: #f8f8f8; margin: 0 auto 30px auto; position: relative; 		  }
			.formbox > .txt_success {color:#f00;width:200px; margin:0 auto;line-height:80px;}
			.formbox img{left: 0px;position: absolute;}
			.formbox .mcp_form3{position: absolute;top: -41px; left: 0px;}
			.formbox .btn_go{ position: absolute; width: 171px; height: 38px; top: 64px; left: 489px; }
			.mcp_form3  .mce-EMAIL { width: 440px; height: 32px; font-size: 16px; color: #333;  padding: 3px; }
			.mcp_form3  .mc-field-group.input-group{left: -4px; top: 36px;position:absolute;}
			.mcp_form3  .mc-field-group.input-group > ul > input{display:none;}
			.mcp_form3 .mce_inline_error{left: -1px;    top: -246px;    color: #f00;}
			.invi-preload{left:-1px;top:-1px;width:1px;height: 1px;overflow:hidden;}
			.social_top{width:100%;margin:10px 0;}
.social_top .sc_item{display: inline-block;width:34px;}
.social_top .sc_item.invi {display: none;}
.rwd_image {
    display: block;
    max-width: 100%;
    width: 100%;
    height: auto;
}
		</style>
		<script type="application/ld+json"> 
		{ 
		  "@context": "http://schema.org", 
		  "@type": "NewsArticle", 
		  "headline": "<?php echo $title;?>", 
		  "mainEntityOfPage": {
			"@type": "WebPage",
			"@id": "<?php  echo THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title_cp))).'-'.$video_id; ?>"
		  },
		  "description": "<?php echo str_replace('"','',strip_tags($mobDes));?>", 
		  "url": "<?php  echo THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title_cp))).'-'.$video_id; ?>", 
		  "thumbnailUrl": "<?php  echo $thumb ?>", 
		  "dateCreated": "<?php  echo $cdate22;?>", 
		  "datePublished": "<?php  echo $cdate22;?>", 
		  "dateModified": "<?php  echo $cdate22;?>",
		  //"article:published_time": "<?php  echo $cdate22;?>", 
		  //"uploadDate": "<?php  echo $cdate22;?>", 	  
		  "articleSection": "<?php  echo strtoupper ($CateName); ?>", 
		  "creator": "TOMONEWS", 
		  "author": "TOMONEWS", 
		  "publisher": {
		  "@type": "Organization",
			  "name": "TOMONEWS",
				  "logo": {
					"@type": "ImageObject",
					"url": "http://us.tomonews.com/img/logo.gif"
				  } 
		   },
		 /* "image": {
			  	"@type": "ImageObject",
				"url": "<?php  echo $thumb ?>",
				"height": 9,
				"width": 16
		  },*/
		   "image": [
				"<?php  echo $thumb ?>"
			],
		  "keywords": [<?php 
					$Keywords_kwstr = str_replace ( ',' , '","' , $Keywords_kwstr);
					echo '"'.$Keywords_kwstr.'"';
			?>] 
		} 
		</script>
	
		<script type="application/ld+json"> 
		{ 
		  "@context": "http://schema.org", 
		  "@type": "VideoObject", 
		  "name": "<?php echo $title;?>", 
		  "description": "<?php  echo str_replace('"','',strip_tags($mobDes)); ?>", 
		  "thumbnailUrl": "<?php  echo $thumb; ?>", 
		  "uploadDate": "<?php  echo $cdate22;?>", 
		  "duration": "PT<?php echo (string)$durMin;?>M<?php  echo (string)$durSec;?>S",
		  //"contentUrl": "http://video-pdu.us.tomonews.com/encoded-586/media/<?php  echo $video_id; ?>/819200-854x480.mp4"
		  //"interactionCount": "<?php  echo number_format($counter) ?>"
		} 			
		</script>

		<meta itemprop="headline" content="<?php  echo strip_tags($title); ?>" />
		<meta itemprop="description" content="<?php  echo str_replace('"','',strip_tags($mobDes)); ?>" />
		<meta itemprop="image"  content="<?php  echo $thumb ?>" />
		<meta itemprop="datePublished"  content="<?php  echo $cdate ; ?>" />
		<?php  include_once('ga.php'); ?>
	</head>

<body>
	<style>
		@media screen and (max-width: 1500px) {
		  #bg {
			 width: 14vw !important;
		  }
		}
	</style>

	<div class="wapper"> 
		<?php  include_once('header.php'); ?>
	</div>
	<div id="vdo_wapper">
		<div id="vdoplayer" style=" padding-left: 15px">
			<video
			    id="my-video"
			    class="video-js"
			    controls
			    preload="auto"
			    width="970"
			    height="auto"
			    poster="<?php =$thumb_url?>"
			    data-setup="{}"
			  >
			    <source src="<?php =$video_url?>" type="video/mp4" />
			    <p class="vjs-no-js">
			      To view this video please enable JavaScript, and consider upgrading to a
			      web browser that
			      <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
			    </p>
			  </video>	
		</div>
		<div id="vdo_content" style="position: relative;float: left; max-width: 970px;">
			<div id="vdo_cnt">
				<h1 id="vdo_title"><?php  echo $title_cp; ?></h1> 
				
				<h2 id="vdo_sub"><?php  echo htmlspecialchars($mobDes); ?></h2>			
				<div id="viewdeos-player"></div>
				<div style="display:table;">
					<div class="social_top" style="display:table-cell" id="scbar_top">			
						  <div class="sc_item fb "><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_fb_s.png"></div>
						  <div class="sc_item twr "><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_tw_s.png"></div>
						  <a href="whatsapp://send?text=<?php echo THIS_SITE. $video_id?> via @TomoNewsUS" data-action="share/whatsapp/share"> <div class="sc_item wapp " ><img img width="100%"  class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_wapp_s.png"></div></a>
						  <div class="sc_item email "><img img width="100%"  class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_email_s.png"></div>
						  <div class="sc_item btn_social" ><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_plus_s.png"></div>
						  <div class="sc_item url sc_item2 invi "><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_url_s.png"></div>
						  <div class="sc_item gplus sc_item2 invi"><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_gplus_s.png"></div>
						  <div class="sc_item stum sc_item2 invi"><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_stumble_s.png"></div>
						  <div class="sc_item reddit sc_item2 invi"><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_reddit_s.png"></div>
					</div>
					<div style="display:table-cell;vertical-align:middle;width:150px;" align="right">
						<span>&nbsp;&nbsp;&nbsp;</span>
						<span style="font-size:12pt"><?php  echo $cdate ?></span>
							<!--<img src="img/icon_eye.gif">
							<span style="font-size:9.5pt"><?php  //echo number_format($counter) ?></span>-->
					</div>
				</div>	

				<div id="vdo_inf">
					<br>
					<a href="<?php  echo THIS_SITE; ?>theme/nsfw" style="text-decoration: none;<?php  if(!$NSFW  || IFNSFW_TEST!=1 || $thmenName=='NSFW'){echo 'display:none;';}?>">
						<span style="color:#FF6600;font-weight:bold;"><b>NSFW&nbsp;&nbsp;&nbsp;</b></span>
					</a>
								
					<?php  if($thmenName!=''){ 
							$thmenName_title  =$thmenName;
							$thmenName = str_replace('?', '', $thmenName);
							$thmenName = str_replace(' ', '-', $thmenName);
							$thmenName = str_replace('  ', '-', $thmenName);
							$thmenName = str_replace(';', '', $thmenName);
							$thmenName = str_replace('?', '', $thmenName);
							$thmenName = str_replace('.', '', $thmenName);
				            $thmenName = str_replace(',', '', $thmenName);
						    $thmenName = str_replace('#', '', $thmenName);
				            $thmenName = str_replace('$', '', $thmenName);
				            $thmenName = str_replace('(', '', $thmenName);
				            $thmenName = str_replace(')', '', $thmenName);
				            $thmenName = str_replace('&', '', $thmenName);
				            $thmenName = str_replace('%', '', $thmenName);
				            $thmenName = str_replace('@', '', $thmenName);
				            $thmenName = str_replace('=', '', $thmenName);
				            $thmenName = str_replace('|', '', $thmenName);
				            $thmenName = str_replace('/', '', $thmenName);
				            $thmenName = str_replace('"', '', $thmenName);
				            $thmenName = str_replace('!', '', $thmenName);
							$thmenName = str_replace(':', '', $thmenName);
							$thmenName = str_replace('’', '', $thmenName);
							$thmenName = str_replace('‘', '', $thmenName);
							$thmenName = str_replace('＆', '', $thmenName);
							$thmenName = str_replace('　', '', $thmenName);
							$thmenName = str_replace("'", '', $thmenName);
							$thmenName = str_replace('--', '-', $thmenName);
                       
							if(substr($thmenName, -1)=='-'){
							   $thmenName=	substr($thmenName, 0,-1);
							}
							if(substr($thmenName, 0 , 1)=='-'){
							   $thmenName=	substr($thmenName, 1);
							}
					?>
							<a href="<?php  echo THIS_SITE; ?>theme/<?php  echo strtolower($thmenName); ?>" style="text-decoration: none;">
								<span style="color:#FF6600;font-weight:bold;"><b><?php  echo $thmenName_title; ?></b> </span>
							</a>
							
					<?php  } 

					if (!( (!$NSFW  || IFNSFW_TEST!=1 || $thmenName=='NSFW') && $thmenName=='' )  )echo '<br><br>';
					include_once('vdo_descriptA.php'); ?>
				</div>
        
				<div class= "formbox">
					<img src='<?php  echo THIS_SITE; ?>img/bg_vdo_signup.png'>
					<div class="mcp_form3">
						<form action="//tomonews.us2.list-manage.com/subscribe/post?u=28c2f2044f22c46a64747226f&amp;id=8254ba5d15" method="get" id="mc-embedded-subscribe-form3" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							<div style="position:absolute;top:105px;left:17px;">  
								<div class="mc-field-group" style="position:relative;top:0px;left:0px;">    
									<input class="mce-EMAIL" class="required email"   type="email" name="EMAIL" placeholder="Enter your email" style="font-size:14px;"></input>
									<div for="mce-EMAIL" class="mce_inline_error" id="mce_inline_error_msg3" style="    font-size: 12px;    margin-top: 2px;"></div>
									<div style="position: absolute; left: -5000px;display:none"><input type="text" name="b_28c2f2044f22c46a64747226f_8254ba5d15" tabindex="-1" value=""></div>
									<div class="clear" style="position: absolute; left: -5000px;display:none"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"><input type="hidden" name="SIGNUP" id="SIGNUP" value="TomoUS_PCVidPage"/></div>
								</div>     
								<div class="mc-field-group input-group" style="margin-top: 5px;"></div>               
								<div class="clear mail_box_btn invi" class="mailbox_submit" style="position: absolute;  top: 00px;  left: 185px;  width:100px;  height: 30px;  cursor: pointer;"></div>
							</div>
						</form>
					</div>
					<div class="btn_go btn"></div>
				</div>
				<div class= "nxt_vdo">
				<!--  $next_id $next_title-->
					<div class= "nxt_vdo_item" data-link="<?php echo $next_link;?>">
						<div ><img src="<?php  echo $next_thumb ?>" width="211"></div>
                        <div class="title" style="width:230px;height: 26px;font-weight: normal;font-size:14px;padding-left: 20px;color: #000;font-weight: 700;">NEXT ON TOMONEWS</div>
                        <div class="txt" style="font-weight: 700;font-size:20px;"><?php echo $next_title;?></div>
					</div>

				</div>
				<?php  
					echo '<div style="width:100%; height:90px; background-color:#FFF; float:left; margin: 15px 0px 10px 0px;">'.$ad_video_970x90.'</div>';?>
				<br>
				

				<!--<div id="disqus">
					<h1 style="color:#333;display:inline;font-size:22px;font-weight: 900;"><?php  echo $comm_qa; ?></h1><h2 style="color:#999;display:inline;margin:0px 20px;"></h2>
				</div>-->
				<div class="fbc-title comm-title" style="height: auto;margin: 0;">Facebook Conversation</div>
				<div class="fb-comments" data-href="<?php echo 'http://us.tomonews.com/'.$video_id;?>" data-width="663" data-numposts="5" data-colorscheme="light" style="padding: 0px "></div>
				<div id="subcrip" style="background:none;display:none">
					<div style="background:#ededed;margin-left:15px; padding:30px 80px;width:490px">
						<div align="center" style="font-size:24pt">Want more stuff like this?<br></div><br>
						<div align="center" style="font-size:10pt;line-height:16pt">We've got all the latest viral headlines from around the internet.
						<br>Sign up for our daily email to stay on top of what's trending now!</div><br>
						<div align="center">
							<!-- Begin MailChimp Signup Form -->
							<link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
							<style type="text/css">
								#mc_embed_signup{background:#ededed; font:14px Helvetica,Arial,sans-serif; text-align: center; }
								#mc_embed_signup input.email{ margin:0 auto; width:400px; }
								#mc_embed_signup input.pmc{ margin:0 auto; margin-top:15px;margin-left:145px; border: 0px solid #FFF; }
								#mc_embed_signup input.button{ display:none;  }
							</style>
							<div id="mc_embed_signup">
								<form action="//tomonews.us2.list-manage.com/subscribe/post?u=28c2f2044f22c46a64747226f&amp;id=8254ba5d15" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
									<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
									<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
									<div style="position: absolute; left: -5000px;"><input type="text" name="b_28c2f2044f22c46a64747226f_8254ba5d15" tabindex="-1" value=""></div>
									<input type="image" class="pmc" src="<?php  echo THIS_SITE; ?>img/sign_up_now.gif" border="0" style="margin-left:125px;">
									<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="vdo_otherlist" style="position: relative; float: right; max-width: 300px;">
				<?php  	if ( isset($removeAdd) && $removeAdd == true){
						$ad300x600 = '<img src="'.THIS_SITE.'img/GIF_300x600.gif">';
					}else{
						$ad300x600 = $ad_video_300x600;
					}?>
				<div class="mov" style="width: 300px; height: 600px;display:block;background:#ccc;margin:0;margin-top:25px;margin-bottom:25px;"><?php  echo $ad300x600;?></div>
				<?php  include_once ('vdo_side_thumbnailA.php'); 
				   ///////YOU MAY ALSO LIKE//////
					$thumaType = 'RR_YMAL_clk';
					$thumaTypejs= $thumaType;
					$PAGEjs =  $PAGE;
					$vids = array();
					array_push($vids,$video_id);
					$sdate=strtotime('-60 day',time());//Uncomment when you get full data from anvato
					$edate=strtotime(date('Y-m-d h:i:sa'));
					$today = date('Y-m-d');
					// $getUrls5 = APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?start=0&sort=c_ts_publish_l+desc&count=4&filters[]=c_ts_publish_l:['.$sdate.'%20TO%20'.$edate.']';
					$getUrls5 = "https://cms.nextanimation.com.tw/api/getProgramVideos?program=TomoNews%20US&published_date=$today&counts=5&page=0";

					?><div class="mov" style="width:300px;margin:0;margin-bottom: 20px;"><?php  echo $ad300x250;?></div><?php 
						echo '<div id="ymal_list" class="mov_list" >'; 
						echo '<div class="right-side-title">YOU MAY ALSO LIKE</div>';
						echo '</div>';
					?>
			</div>
			
<script type="text/javascript">
  window._taboola = window._taboola || [];
  _taboola.push({
    mode: 'alternating-thumbnails-a',
    container: 'taboola-right-rail-thumbnails',
    placement: 'Right Rail Thumbnails',
    target_type: 'mix'
  });
</script>

				<!-- video lise end -->
			</div>
	</div>
   
<div class="POP_CONT invi SLIDE">  
   <div class='POP_BG2'></div>
<div class='slideme'> 
 <?php   $i=1;
     foreach($photos_array_Slide as $key => $value)
     {
        echo '<div id="s_box'.$i.'" class ="s_box"><div><img src="'.$value.'"/></div><input style="display:none" value="'.$captions_array_Slide[$key].'"></div>';
        $i++;
     }
 ?>
</div>
    <div class="top_nav">
       <div class="count"></div>
       <div class="btn_close btn"><img  src="<?php  echo THIS_SITE; ?>img/close_btn.png" width='20' height='20'></div>
   </div>
   <div class="caption">
       
   </div>
   <div class="bottom_nav">
      <div>
         <div class="arr_l btn"><img  src="<?php  echo THIS_SITE; ?>img/arrow_l.png"></div>
         <div class="arr_r btn"><img  src="<?php  echo THIS_SITE; ?>img/arrow_r.png"></div>
      </div>
   </div>
</div>
<div id="dialog" title="">
  <p></p>
</div>
	<?php  include_once('footer.php'); ?>  
<?php 
/*if($if_test2)
{echo '<script data-cfasync="false"  type="text/javascript" src="http://cdn.gigya.com/JS/gigya.js?APIKey=3_XCNoW0nuB2xMvBhyYHvhdAxJZoTFyB2pYGJbhFvjx9sIpwoj4DSz9r9I6CmJOtMX" >';}
else
{echo '<script data-cfasync="false"  type="text/javascript" src="http://cdn.gigya.com/JS/gigya.js?APIKey=3_yd2Kh3JG8E1BiB34gNegYuzfNQgMXXtUcTP70cOtuiOfWdwcWhiEFIZSQ4srU-1S" >';}*/
?>  
<!-- {
    siteName: 'TomoNews site',
    enabledProviders: 'facebook,twitter,google',
    lang: "en",
    defaultRegScreenSet: 'Tomonews-web-login' 
}
</script> -->
<script type='text/javascript'>
  var _GLOBAL={};
  _GLOBAL.template_name = '';
  _GLOBAL.tempstr       = "<?php  echo htmlspecialchars ($title);?>"; //htmlentities($str, ENT_QUOTES); /
  _GLOBAL.XLARGE_THUMB  = '';
  _GLOBAL.app_key ="";
  _GLOBAL.vdo_id = <?php  echo $video_id; ?>;
  _GLOBAL.nxt_lnk=<?php  echo json_encode($next_link); ?>;
  _GLOBAL.prv_lnk=<?php  echo json_encode($prev_link); ?>;
  _GLOBAL.opt1 = "<?php echo $OPT1;?>";
  _GLOBAL.base ='<?php  echo THIS_SITE; ?>';
  _GLOBAL.page ='VDO';
  _GLOBAL.NSFW  ='<?php  echo $NSFW;?>';
  _GLOBAL.uid = '<?php  echo session_id(); ?>';
  
  
</script> 
        
<script src="<?php  echo THIS_SITE; ?>js/ymalO.js" defer></script>
<script src="<?php  echo THIS_SITE; ?>js/video.js" defer></script>
<script>
// anvp.onReady = function (anvp) {
// 	anvp.vdoplayer.setListener(playerCallback);
// }
// function playerCallback(event)   {
// 	switch(event.name) {
//         case "PLAYING_START":
//            anvp.vdoplayer.getEmbedCode(response);
//             break;
//     }
// }
function response(result) {
	var $textA = $('textarea');
	$textA.html((result));
	
}
	
var cnf_YMAL={};
cnf_YMAL.getUrls5 = <?php echo json_encode($getUrls5); ?>;//
cnf_YMAL.PAGE = '<?php echo $PAGEjs;?>';
cnf_YMAL.thumaType = '<?php echo $thumaTypejs; ?>';
cnf_YMAL.vids = <?php echo json_encode($vids); ?>;
		   
 var _img_slider
 $(function(){
	
	var _social1 = new SOCIAL_BTNS($('#scbar_top'))
      _social1.init();

          $("img.lazy").lazyload({
            event : "sporty"
          });
           setTimeout(function() {
             $("img.lazy").trigger("sporty");

          }, 2000);
           setTimeout(function (){var _ld_img = new IMG_LOAD();} , 3000);
		   
		   
		   
	 set_listen();

    var sidebar_code = '';
     var _ymal=new  YMAL();
     _ymal.init();
   
    setTimeout(function (){
        ///////////delay call thumbnail
        //$("#list_taboola").before( '' );
        
        $(".minfo p").ellipsis({
        row: 7,
        char: '...'
     });
     $(".nxt_vdo_item .txt").ellipsis({
        row: 3,
        char: '...'
     });
     ///////IE 8 以下重新指定SRC
     if (true) {
       $('img').each(function(){
       $(this).attr('src', $(this).attr('src'));
       });
     }
     $("img").error(function(){  
     
        $(this).hide();
      });
    } , 1500);

    /* var _gg =new GIGYA();
     _gg.init();*/
     var _mcp3= new MCP();
     _mcp3.init('.formbox' , $('#mc-embedded-subscribe-form3'));
     
     //console.log(getHashParams())
     var _tag = getHashParams();
     
      if(_tag.c)
      //GT(_tag.c , _tag.a , _tag.l)

    
      if(_tag.l)
      cnf_1X1.edm_tag = (_tag.l.indexOf("topic") > -1)? 'TOPIC' :(_tag.l.indexOf("Most") > -1)?'MOST':'RECOMM';
      else
      cnf_1X1.edm_tag = 'DEFAULT';
      var siteMap_index = '';
      console.log('test:'+cnf_1X1.edm_tag);
      cnf_1X1.path = '<?php echo $file_path; ?>'
     try{
        var from = (getCookie('track_menu')=="" || !getCookie('track_menu'))? "MAIN":getCookie('track_menu');
        var theme_tag ='<?php echo isset($thmenName_title) ? $thmenName_title : '';?>';
        var cate_tag = "<?php echo remove_punc(remove_punc($CateName)); ?>";
        var siteMap_index =''
        var cdate = "<?php echo $cdate;?>";

        var section_tag,category_tag , channel_tag;

        ///siteMap_index
        if(theme_tag!="")
        siteMap_index = theme_tag.toUpperCase();
        else
        { 
           siteMap_index= cate_tag.toUpperCase();
        }
       
        channel_tag = cnf_1X1.params[siteMap_index].ch;
        section_tag=cnf_1X1.params[siteMap_index].sec;
        category_tag=cnf_1X1.params[siteMap_index].cate;


        console.log('siteMap_index>:'+siteMap_index+".....")
        console.log('channel_tag>:'+channel_tag+".....")

        cnf_1X1.nxmObj={
        "region":"US",
        "prod":"TOMONEWS",
        "site":"<?php echo THIS_SITE;?>",
        "platform":"WEB",  //WEB | MOBWEB | ANDROID | IPHONE | IPAD | TABLET 
        "section":section_tag, ////Site map
        "media":"TEXT",//Site map
        "content":"ARTICLE",  //Site map
        "issueid": cdate.replaceAll("/", ''),      //Aritcle Issue Date or send blank for homepage/index
        //  $x=$x.replaceAll("'", '-');
        "title":"<?php  echo urlencode($title_cp); ?>",        //Article Title, Photo Title, etc or send Blank for home page/index page
        "cid":"<?php echo $video_id;?>",          //Article ID/Photo ID or send blank for Menu/Index pages
        "news":"TOMONEWS", //Site map
        "edm":cnf_1X1.edm_tag,          //Site map
        "action":"PAGEVIEW",  //Always send PAGEVIEW
    
        "subsect":"", //Site map
        "subsubsect":"",//Site map
        "menu":from,//Menu Title
        "auth":"",//"columnist name send blank if not available"
        "ch":channel_tag,//Site map
        "cat":category_tag//Site map
        };
    var _pxl = new PIXEL1x1();
    _pxl.init();
}
catch(err)
{
  console.log('out of siteMap!');
}
     



 });


 function getHashParams() {

    var hashParams = {};
    var e,
        a = /\+/g,  // Regex for replacing addition symbol with a space
        r = /([^&;=]+)=?([^&;]*)/g,
        d = function (s) { return decodeURIComponent(s.replace(a, " ")); },
        q = window.location.hash.substring(1);

    while (e = r.exec(q))
    hashParams[d(e[1])] = d(e[2]);

    return hashParams;
}

	function SOCIAL_BTNS(t) {
    function e() {
        window.prompt("Select all and press 'Copy'", location.href)
    }
    var i = 0,
        n = t.find(".btn_social"),
        o = t.find(".sc_item2");
    this.init = function() {
        n.click(function() {
            i ? ($(this).fadeIn("fast").css("display", "inline-block"), o.hide(), i = 0) : ($(this).hide(), o.fadeIn("fast").css("display", "inline-block"), i = 1)
        }), t.find(".sc_item.fb").click(function() {
            window.open("http://www.facebook.com/share.php?u=".concat(encodeURIComponent(location.href)))
        }), t.find(".sc_item.twr").click(function() {
            window.open("https://twitter.com/share?url=" + encodeURIComponent(location.href) + "&via=TomoNewsUS&text=" + _GLOBAL.title)
        }), t.find(".sc_item.email").click(function() {
            window.location.href = "mailto:?subject=" + _GLOBAL.title + "&body=" + encodeURIComponent(location.href)
        }), t.find(".sc_item.url").click(function() {
            e()
        }), t.find(".sc_item.gplus").click(function() {
            window.open("https://plus.google.com/share?url=" + encodeURIComponent(location.href))
        }), t.find(".sc_item.stum").click(function() {
            window.open("http://www.stumbleupon.com/submit?url=" + encodeURIComponent(location.href) + "&title=" + _GLOBAL.title)
        }), t.find(".sc_item.reddit").click(function() {
            window.open("http://reddit.com/submit?url=" + encodeURIComponent(location.href) + "&title=" + _GLOBAL.title)
        })
    }
}




function GIGYA(){
   this.init = function (){
    var commentParams ={
      categoryID: 'TomoNews US',
        streamID: "http://tomonews.com/<?php echo $video_id ; ?>",
        version: 2,
        containerID: 'commentsBox',
        deviceType:'auto',
        cid:'',
        enabledShareProviders: 'facebook,twitter,guest,google',
        minShareOptions: 5,        
        defaultRegScreenSet: 'Tomonews-web-login',
        width:642 
    }
    gigya.comments.showCommentsUI(commentParams);
    _cb();
   }
	function _cb(){
	  if( $('#commentsBox').children().length == 0 )
	  {setTimeout(_cb , 3000);}
	  else  update_css();
	}
	/*jojo*/
	function update_css(){    
		   $("#commentsBox").css('margin' , '0 auto');
		   $("#commentsBox").css('width' , 'auto');
		   $("#commentsBox").css('padding' , '0px 20px');
		   $("#commentsBox").css('background' , "#fff");
		   $("#commentsBox").css("color" , "#333")
		   $(".gig-comment-username").css("color" , "#ff6600");
		   $(".gig-comments-count").css("color" , "#333");
		   $(".gig-comment-body").css("color" , "#000");
		   $(".gig-comments-header").css("border-bottom" , "0px");
	}
}
</script>
<script type="text/javascript">

function update_css2(){
  $('.videoCube').css("margin-bottom" , 17)
}
</script>

</body>
</html>
