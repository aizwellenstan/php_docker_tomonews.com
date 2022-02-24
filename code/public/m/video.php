<?php 

include_once('config.php');
include_once('api_setting.php');
include_once('device.php');
include_once('vdo_preprocess.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php  site_title_name() ?> <?php  echo $title; ?></title>
<meta id="viewport" name="viewport" content="width=device-width, user-scalable=0">
<meta name="description" content="<?php  echo str_replace('"','',strip_tags($mobDes)); ?>"/>
<meta name="keywords" content="<?php  echo $Keywords_kwstr ?>" />
<meta name="news_keywords" content="<?php  echo $Keywords_kwstr ?>" />
<link rel="apple-touch-icon-precomposed" href=""/>
<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?ver=1" type="image/png" />

<meta property="article:published_time" content="<?php  echo $cdate22; ?>" />
	<!-- Facebook Header -->
<meta property="og:title" content="<?php  echo strip_tags($title); ?>"/>
<meta property= "og:type" content= "article"/>
<meta property="og:description" content="<?php  echo str_replace('"','',strip_tags($mobDes)); ?>"/>
<meta property="og:url" content="<?php  echo THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id; ?>"/>
<meta property="og:image" content="<?php  echo $thumb; ?>">
<meta property="og:image:width" content="1200" />
<meta property="og:site_name" content="<?php  echo strip_tags($title); ?>"/>
<meta property="fb:pages" content="148740698487405" />
<!-- Facebook Header -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@TomoNewsUS">
<meta name="twitter:title" content="<?php  echo strip_tags($title); ?>">
<meta name="twitter:description" content="<?php  echo str_replace('"','',strip_tags($mobDes)); ?>">
<meta name="twitter:image" content="<?php  echo $thumb; ?>">

<link rel="stylesheet" type="text/css" href="//cloud.typography.com/7365156/7009372/css/fonts.css" />
<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css">
<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/jquery-ui.min.css">
<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/video.min.css">
<?php  include_once("../head_scripts.php"); ?>  <script src="<?php echo THIS_SITE;?>js/all.min.js?nocache=1211"></script>

<!--<script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>-->
<script src="<?php echo THIS_SITE; ?>js/jquery.lazyload.min.js"></script>
<script src="<?php echo THIS_SITE; ?>js/mcp.js?nocache=1010" defer></script>
<script src="<?php echo THIS_SITE; ?>js/jquery-ui.min.js"></script>
<script src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<meta name="robots" content="<?php  echo ROBOT_INDEX ?>">
<link rel="canonical" href="<?php  echo THIS_SITE_DESKTOP.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id; ?>" />

<script type="application/ld+json"> 
    { 
      "@context": "http://schema.org", 
      "@type": "NewsArticle", 
      "headline": "<?php echo $title;?>",
	  "description": "<?php echo str_replace('"','',strip_tags($mobDes));?>", 
      "url": "<?php  echo THIS_SITE_DESKTOP.urlencode(str_replace(' ', '-', remove_punc($title_cp))).'-'.$video_id; ?>", 
      "thumbnailUrl": "<?php  echo $thumb ?>", 
      "dateCreated": "<?php  echo $cdate22;?>", 
	  "datePublished": "<?php  echo $cdate22;?>", 
	  "dateModified": "<?php  echo $cdate22;?>",
	 // "article:published_time": "<?php  echo $cdate22;?>", 
	  //"uploadDate": "<?php  echo $cdate22;?>", 	  
      "articleSection": "<?php  echo strtoupper ($CateName); ?>", 
	 "mainEntityOfPage": {
			"@type": "WebPage",
			"@id": "<?php  echo THIS_SITE_DESKTOP.urlencode(str_replace(' ', '-', remove_punc($title_cp))).'-'.$video_id; ?>"
		  },
      "creator": "TOMONEWS", 
	  "author": "TOMONEWS", 
	  "publisher": {
		"@type": "Organization",
		"name": "TOMONEWS",
		"logo": {
		  "@type": "ImageObject",
		  "url": "http://us.tomoplace.net/img/logo.gif"
		} 
	  },
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
	  "description": "<?php echo str_replace('"','',strip_tags($mobDes));?>", 
      "thumbnailUrl": "<?php  echo $thumb; ?>", 
      "uploadDate": "<?php  echo $cdate22.'.000Z';?>", 
	  "duration": "PT<?php echo (string)$durMin;?>M<?php  echo (string)$durSec;?>S",
	  "contentUrl": "http://video-pdu.us.tomonews.com/encoded-586/media/<?php  echo $video_id; ?>/819200-854x480.mp4"
	  //"interactionCount": "<?php  echo number_format($counter) ?>"
    } 
</script>
<?php 
//$vastUrl = "http://ssp.lkqd.net/ad?pid=252&sid=438744&output=vast&execution=any&placement=&playinit=auto&volume=100&width={Player_w}&height={Player_h}&pageurl={pageurl}&ip={ipaddress}&ua={useragent}";
//$vastUrl = "//ssp.lkqd.net/ad?pid=252&sid=438744&output=vast&execution=any&placement=&playinit=auto&volume=100&width={Player_w}&height={Player_h}&pageurl={pageurl}&ua={useragent}";
$vastUrl = "//v.lkqd.net/ad?pid=252&sid=504292&output=vastvpaid&support=html5&execution=any&placement=&playinit=auto&volume=100&width={Player_h}&height={Player_h}&pageurl={pageurl}";
$useragent = urlencode($_SERVER['HTTP_USER_AGENT']);

?>
<script>	

var vastUrl = "<?php  echo $vastUrl; ?>";
var Pageurl = encodeURIComponent(document.URL);
var useragent = "<?php  echo $useragent; ?>";

function preProcessorFunction(vastUrl) {
	var replaceData = {                                       
        os: '<?php  echo $device; ?>',
        osversion: '<?php  echo Detect::os();?>',
        ipaddress: "<?php  echo  GET_IP_FUNC();?>",
        pageurl: Pageurl,
        useragent: useragent,
        timestamp: new Date().getTime().toString(),
		Player_w : "640",
		Player_h : "360"
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
	accessKey : "X8POa4zYBLKbwUqmWLHOUZ9OlGAM9VN3",
    token : "default",
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
.taboola_title_contain{width:300px; margin:0 auto;}
.comm_qa{margin-bottom: 15px;  display: inline-block;}
#more_mv{color:#ff6600;padding-left:6px;}
#taboola-below-article-thumbnails{width:320px;height:auto;margin:10px auto;}
#vdo_inf{display:block;font-size:16px;line-height:20px;height:20px;padding: 10px 0 5px 0;font-weight:900;font-family: 'Roboto',sans-serif;}

#vdo_title{padding: 0;}
.vdo_inf_state{width:100%;text-align: right}
.vdo_inf_state img{width:16px;}
#vdoplayer{position:static;margin-left:-10px;}
#vdo_cnt{padding: 0px 10px }
.social_top{width:100%;margin:10px 0;}
.social_top .sc_item{display: inline-block;width:34px;}
.social_top .sc_item.invi {display: none;}
</style>
<body>
	<?php  
	
	if ( $removeAdd == true){
					$ad300x250_1 = '<img src="'.THIS_SITE.'img/GIF_300x250-marijuana-and-panda.gif">';
					$d300x250_2 = '<img src="'.THIS_SITE.'img/GIF_300x250-Baby-Panda.gif">';
					$ad300x50 = '<img src="'.THIS_SITE.'img/gif_300x50.gif">';
				}else{
					$ad300x250_1 = $ad_video_300x250_1;
					$d300x250_2 = $ad_video_320x50_2;
					$ad300x50 = $ad_video_320x50;
				}
	include_once('header.php'); 
	?>
  <div id="ad2" style=""> 
	<?php  
	if ( $removeAdd == true){
					$ad300x250_1 = '<img src="'.THIS_SITE.'img/GIF_300x250-marijuana-and-panda.gif">';
					$d300x250_2 = '<img src="'.THIS_SITE.'img/GIF_300x250-Baby-Panda.gif">';
					$ad300x50 = '<img src="'.THIS_SITE.'img/gif_300x50.gif">';
	}else{
					$ad300x250_1 = $ad_video_300x250_1;
					$d300x250_2 = $ad_video_320x50_2;
					$ad300x50 = $ad_video_320x50;
				}
	echo $ad300x50; ?>
  </div> 
  
	<div id="vdo_wapper">
		    
			<div id="vdo_content">
				<div id="vdo_cnt">					
				    <div id="vdoplayer"></div>	
					<?php  //if ($cat_id == 5130) { //shows sponsored content for universiade content?>
						<!--<div id="sponsored-content">SPONSORED CONTENT</div>-->
					<?php  //} ?>
					<div style="width: 95%; margin: 15px 0 10px 0;" ><div id="viewdeos-player"><script type="text/javascript">(function () {var t = document.createElement('script'), s = document.getElementsByTagName('script')[0];t.src = 'https://app.viewdeos.com/tags/9f7640bc-a620-4806-92bb-c0c1b8e1aced';s.parentNode.insertBefore(t, s);})();</script></div></div>
					<h1 id="vdo_title"><?php  echo htmlspecialchars($title); ?>
						<div class="vdo_inf_state">
						<span  style="font-weight:normal ;font-size:9pt;text-align: right;padding-right:2%;"><?php  echo $cdate ?></span>             
						<!-- <img src="img/icon_eye.gif"> <span style="font-weight:normal ;font-size:9pt;text-align: right;"><?php  //echo number_format($counter) ?></span>-->             
						</div>
					</h1>
        
					<h2 id="vdo_sub" ><?php  echo htmlspecialchars($mobDes); ?></h2>
					<div class="social_top" id="scbar_top">			
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
					
					      <style>
        #ad2{z-index:9999}
        .nxt_vdo{width:320px;height:70px;/*overflow:hidden;bottom:50;position: fixed;*/opacity:1;z-index:999; -webkit-overflow-scrolling: touch; margin-left: -8px;margin-top: 20px;margin-bottom: 20px; }
        .nxt_vdo .nxt_vdo_bg{width:320px;height:55px;background:#fff;position:absolute;top:0px ;left:0px;}
        .nxt_vdo_slide{width:3300px;height: 70px;position: relative; left:5px;top:0px; -webkit-transform: translateZ(0)!important; }
        .nxt_vdo_item{display:inline-block;width:302px;background: #f3f3f3;margin:0 2px; margin-right:10px;height: 79px;}
        .nxt_vdo_item > .nxt_vdo_img{width:45%;margin:3px;float: left;display:inline-block;}
		.nxt_vdo_item > .nxt_vdo_img img{ width:100%; }
        .nxt_vdo_item > .nxt_vdo_right{width:50%;/*width:216px;height:55px;*/display:inline-block;;overflow:hidden;float: right;}

        .nxt_vdo_item .nxt_vdo_right .title {width:160px;height: 16px;color:#005cff; font-weight:bold;font-size:0.75rem;padding:4px 1px 0 0px;margin-top:2px;}
        .nxt_vdo_item .nxt_vdo_right .txt{
          font-size:0.74rem;padding:4px 0 0 0px;font-weight:bold;height: 60px;    overflow: hidden;color:#000;
          width: 100%;
        }
        .nxt_vdo_item .nxt_vdo_right .txt .txtline{ display: inline-block;
          position: relative;
          overflow: hidden;
          max-width: 100%;padding-right:4px;line-height: 0.80rem;
        }
		
		.nxt_vdo_item .nxt_vdo_right .txt .txtline.suggest{ height: auto !important; }
		
        .nxt_vdo .btn_left , .nxt_vdo .btn_right{position:fixed;width:12px;top:0px;}
		.nxt_vdo .btn_left img, .nxt_vdo .btn_right img{ height: 100%; }
        .nxt_vdo .btn_left {margin-left:-2px;}
		/*.nxt_vdo .btn_right {right:-2px;}*/
        .nxt_vdo  .btn_sense{background: #fff ; width:35px;height: 80px; opacity:0;
         position: absolute;    top: 0px;}

        .nxt_vdo .btn_left .btn_sense{left:0px;}
        .nxt_vdo .btn_right .btn_sense{right:0px; }


        .nxt_vdo .btn_right{right:0px; -webkit-transform: translateZ(0) !important;}
        </style>
  <div class="nxt_vdo port">   
     <div class='nxt_vdo_bg'></div>
     <div class="nxt_vdo_slide"></div>
    <div class="btn_left">
       <img src="<?php echo THIS_SITE; ?>img/story_pop_leftV.gif" class="rwd_image">
       <div class='btn_sense'></div>
    </div>
    <div class="btn_right"> <img src="<?php echo THIS_SITE; ?>img/story_pop_rightV.gif" class="rwd_image"><div class='btn_sense'></div></div>
      
      
  </div>
					
					
					<div  id="vdo_inf" style="display: <?php  echo (  (!$NSFW || IFNSFW_TEST!=1) && $thmenName=='')?'none':'block' ?>">
					    <a href="<?php  echo THIS_SITE; ?>theme/nsfw" style="text-decoration: none;<?php  if(!$NSFW || IFNSFW_TEST!=1){echo 'display:none;';}?>">
                  <span style="color:#FF6600;font-weight:bold;"><b>NSFW&nbsp;&nbsp;&nbsp;</b></span>
              </a>
						<?php  $thmenName_title = "";
						if($thmenName!=''){ 
                        $thmenName_title  =$thmenName;
                        $thmenName = str_replace('?', '', $thmenName);
					            	$thmenName = str_replace(' ', '-', $thmenName);
					            	$thmenName = str_replace('  ', '-', $thmenName);
					            	$thmenName = str_replace(';',  '', $thmenName);
					            	$thmenName = str_replace('?',  '', $thmenName);
					            	$thmenName = str_replace('.',  '', $thmenName);
					            	$thmenName = str_replace(',',  '', $thmenName);
					            	$thmenName = str_replace('#',  '', $thmenName);
					            	$thmenName = str_replace('$',  '', $thmenName);
					            	$thmenName = str_replace('(',  '', $thmenName);
					            	$thmenName = str_replace(')',  '', $thmenName);
					            	$thmenName = str_replace('&',  '', $thmenName);
					            	$thmenName = str_replace('%',  '', $thmenName);
					            	$thmenName = str_replace('@',  '', $thmenName);
					            	$thmenName = str_replace('=',  '', $thmenName);
					            	$thmenName = str_replace('|',  '', $thmenName);
					            	$thmenName = str_replace('/',  '', $thmenName);
					            	$thmenName = str_replace('"',  '', $thmenName);
					            	$thmenName = str_replace('!',  '', $thmenName);
                        $thmenName = str_replace(':',  '', $thmenName);
                        $thmenName = str_replace('’',  '', $thmenName);
                        $thmenName = str_replace('‘',  '', $thmenName);
                        $thmenName = str_replace('＆', '', $thmenName);
                        $thmenName = str_replace('　', '', $thmenName);
                        $thmenName = str_replace("'",  '', $thmenName);
                        $thmenName = str_replace('--', '-', $thmenName);
                       
                        if(substr($thmenName, -1)=='-')
                        {  ///i??1
                           $thmenName=	substr($thmenName, 0,-1);
                        }
                        if(substr($thmenName, 0 , 1)=='-'){ ///çµå°¾??1
                           $thmenName=	substr($thmenName, 1);
                        }

							?>
            
							<a href="<?php  echo THIS_SITE; ?>theme/<?php  echo strtolower($thmenName); ?>" style="text-decoration: none;">
                 <span style="color:#FF6600;font-weight:bold;"><b><?php  echo $thmenName_title; ?></b> </span>
              </a>
							
						<?php  } ?>
					</div>
					<div class="vdo_subT"><?php  
              $content = nl2br(htmlspecialchars_decode($des));
              $turned = array( '&lt;a','&lt;/a&gt;' ,'&gt;' , '&quot;');
              $turn_back = array( '<a', '</a>' , '>' , '"' );
              $content = str_replace( $turned, $turn_back, $content );
              echo  $content;             
             ?></div>
         <!--  MAILCHIMP-->
         <style>
         .formbox{position:relative;background:#e4e4e4;width:300px;height:auto; padding:0;}
         .formbox > .btn_go {width:50px;height:30px;left: 236px;}
         .formbox > div{position:absolute;top:46px;left:12px;}
         .formbox .mce-EMAIL{width: 180px;    height: 26px;}
         .mce_inline_error{color:#f00;}
         .formbox > .txt_success{color:#f00;width:180px; margin:0 auto;line-height:80px;padding:0;position:static;}
         .MORE_INFO{margin: 0 10px;}
         </style>
         <div class= "formbox" >
            <!-- <div class="txt_success">Thanks for subscribing!</div> -->

         <img class='rwd_image' src="<?php  echo THIS_SITE; ?>img/bg_mcp.png" > 
           <div class="mcp_form3">
              <form method="get" id="mc-embedded-subscribe-form3" name="mc-embedded-subscribe-form" class="validate" novalidate data-ajax="false">
                <div>  
                <div class="mc-field-group" style="position:relative;top:0px;left:0px;">    
                  <input class="mce-EMAIL required email" type="email" name="EMAIL" placeholder="Enter your email" style="font-size:14px;"></input>
                      <div for="mce-EMAIL" class="mce_inline_error" id="mce_inline_error_msg3" style="    font-size: 12px;    margin-top: 2px;"></div>
                      <div style="position: absolute; left: -5000px;display:none">
                         <input type="text" name="b_28c2f2044f22c46a64747226f_8254ba5d15" tabindex="-1" value=""></div>
                        <div class="clear"style="position: absolute; left: -5000px;display:none"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"><input type="hidden" name="SIGNUP" id="SIGNUP" value="TomoUS_MobVidPage"/></div>
                     </div>     
                     <div class="mc-field-group input-group" style="margin-top: 5px;">
                         
                     </div>               
                     <div class="clear mail_box_btn invi" class="mailbox_submit" style="position: absolute;  top: 00px;  left: 185px;  width:100px;  height: 30px;  cursor: pointer;">
                     </div>
                   </div>
              </form> 
           </div>

          <div class="btn_go btn"></div>
          </div>
          <!-- TAG PART -->
					 <?php   include_once('vdo_descript.php');   ?>
          
         
           
				</div>
				 <div><?php echo $d300x250_2;?></div> 
       <!--Taboola-->
		<div id="disqus" style="background:#fff;padding-top:15px;">
		<!--<h1 class="comm_qa" style=""><?php  echo $comm_qa; ?></h1>-->
        <div class="fbc-title comm-title" >Facebook Conversation</div>
           <div class="fb-comments" data-href="<?php echo 'http://us.tomonews.com/m/'.$video_id;?>" data-width="320" data-numposts="5" data-colorscheme="light" style="padding: 0px 0px;">
           </div>		
				</div>
			<div id="vdo_otherlist">
				<?php 
                include_once('relativeVideos_api.php');
               // $num_t = 6;
				if ($tag_topic!=''/* && checkIfinArray($tag_topic , $tags_article)*/ )
			    {
                  insert_videorelated($tag_topic);
                  $num_t = 4; 
                }
			   
				?>
    
		</div>
	</div>

	
	<div id="dialog" title="">
  <p></p>
</div>
	<?php  include_once('footer.php'); ?>


<script data-anvp='{"accessKey": "X8POa4zYBLKbwUqmWLHOUZ9OlGAM9VN3","pInstance":"vdoplayer", "mcp":"next", "video":"<?php  echo $video_id; ?>"}' src='<?php  echo ANVATO_PLAYER_SRC;?>'></script>    
<script src="<?php echo THIS_SITE; ?>js/video.min.js?nochache=1111"></script>
<script type='text/javascript'>
_GLOBAL.base= '<?php echo THIS_SITE;?>'
      _GLOBAL.page = 'video';
      _GLOBAL.video_id = '<?php echo $video_id;?>';
      _GLOBAL.title= '<?php echo addslashes($title);?>';
      _GLOBAL.uid = '<?php  echo session_id(); ?>';
     /* var ua = new gigya.socialize.UserAction();
      ua.addActionLink('?‹æ??¥å ±',"http://staging.appledaily.com.tw/livechannel/subject/<?php echo $video_id ; ?>");*/
     <?php  $PC_SITE = 'http://tomonews.com/' ; ?>
     
      var commentParams ={
        categoryID: '<?php 
                 if($if_test2)
                 {echo "TomoNews US";}
                 else
                 {echo "TomoNews";} 
              ?>',
          streamID: "<?php echo $PC_SITE.$video_id ; ?>",
          version: 2,
          containerID: 'commentsBox',
          cid:"<?php echo $video_id;?>",
          enabledShareProviders: 'facebook,twitter,googleplus',
          moreEnabledProviders:'facebook,twitter,googleplus,linkedin,guest',
          minShareOptions: 3,
          deviceType:'mobile',  
          showLoginBar: false ,  
          hideShareButtons:true,    
          
          defaultRegScreenSet: 'Tomonews-web-login-m',
          defaultMobileRegScreenSet: 'Tomonews-web-login-m'
      }
     /* gigya.comments.showCommentsUI(commentParams);
      _cb();*/
      

      var _storypop, _storyp_view;
      var cnf_storypop={}; 
	  cnf_storypop.baseUrl = '<?php  echo THIS_SITE;  ?>';   
      cnf_storypop.callback = function(){  _storypop.init();}
	  
$(function() {
        var _mcp= new MCP();
        _mcp.init('.formbox' , $('#mc-embedded-subscribe-form3'));
     
        var _social1 = new SOCIAL_BTNS($('#scbar_top'))
        _social1.init();
       
       _storyp_view = new STORY_POP_VIEW();
       _storyp_view.init();
       _storypop =new STORY_POP(); 
      // _storypop.init();
       /*_storypop =new STORY_POP()
       _storypop.init();*/

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
        var theme_tag ='<?php echo $thmenName_title;?>';
        var cate_tag = '<?php echo remove_punc(remove_punc($CateName)); ?>';
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
        cnf_1X1.nxmObj={
        "region":"US",
        "prod":"TOMONEWS",
        "site":"<?php echo THIS_SITE;?>",
        "platform":"MOBWEB",  //WEB | MOBWEB | ANDROID | IPHONE | IPAD | TABLET 
        "section":section_tag, ////Site map
        "media":"TEXT",//Site map
        "content":"ARTICLE",  //Site map
        "issueid":cdate.replaceAll("/", ''),      //Aritcle Issue Date or send blank for homepage/index
        "title":"<?php  echo urlencode($title_cp); ?>",        //Article Title, Photo Title, etc or send Blank for home page/index page
        "cid":"<?php echo $video_id;?>",          //Article ID/Photo ID or send blank for Menu/Index pages
        "news":"TOMONEWS", //Site map
        "edm":cnf_1X1.edm_tag,          //Site map
        "action":"PAGEVIEW",  //Always send PAGEVIEW
        //"uid":"", //
        "subsect":"", //Site map
        "subsubsect":"",//Site map
        "menu":from,//Menu Title
        "auth":"",//"columnist name send blank if not available"
        "ch": channel_tag,//Site map
        "cat":category_tag//Site map
        };
    var _pxl = new PIXEL1x1();
    _pxl.init();
}
catch(err)
{
      console.log('out of siteMap!');
}

/*      if(tamplate!='Text and Picture')
      {
        VDO_INIT();
      }
*/
    $("img.lazy").lazyload({
		threshold : 700
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


});




     
    
//formbox
   
</script>
</body>

</html>
