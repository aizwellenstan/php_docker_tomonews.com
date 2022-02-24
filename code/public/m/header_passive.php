	
<link href='http://fonts.googleapis.com/css?family=Roboto:300 ,400,500,500italic,400italic,900,700, 700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,800' rel='stylesheet' type='text/css'>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<style  type="text/css">
/*  fix for passive icon*/
#header{top:10px;z-index:9999;height:80px;width:1000px;}
#logo{display:inline-block;}
#search_box_form1{display:inline-block;}
#search1{background:url("<?php  echo THIS_SITE; ?>img/input.gif");background-repeat:no-repeat;position:static;}
#appstore{width:317px;display:inline-block;position:static;}
.passive_icon{display:inline-block;    margin-left: 10px;	}
.passive_icon img{    width: 55px;}
/*  fix for passive icon*/
#main_menu{position:absolute;width:1019px;top:100px;left:65px}.btn_main_menu{width:145px;height:34px;display:inline-block;margin:0 2px;background:#f00;text-align:center;line-height:34px;color:#fff;font-family:'Roboto',sans-serif;font-style:normal;font-weight:bold;border-style:solid;border-width:1px}.NF_BTN{position:absolute;top:80px;left:26px;color:#f60;font-size:14px;font-weight:600}#nf{border-color:#f60;background:#fff;color:#f60}#us{background:#194a9e;color:#fff;border-color:#194a9e}#us:hover{background:#fff;color:#194a9e}#wrd{background:#f00;color:#fff;border-color:#f00}#wrd:hover{background:#fff;color:#f00}#asa{background:#ffc300;color:#fff;border-color:#ffc300}#asa:hover{background:#fff;color:#ffc300}#sci{background:#008d3f;color:#fff;border-color:#008d3f}#sci:hover{background:#fff;color:#008d3f}#soc{background:#a96124;color:#fff;border-color:#a96124}#soc:hover{background:#fff;color:#a96124}#spo{background:#7f1084;color:#fff;border-color:#7f1084}#spo:hover{background:#fff;color:#7f1084}#menus1{width:47px;top:100px;background:url("<?php  echo THIS_SITE; ?>img/menu1.gif")}#menus2{top:100px}#icons #mico1{background:url("<?php  echo THIS_SITE; ?>img/icon_fb_.gif")}#icons #mico2{background:url("<?php  echo THIS_SITE; ?>img/icon_twitter_.gif")}#icons #mico1:hover{background:url("<?php  echo THIS_SITE; ?>img/icon_fb.gif")}#icons #mico2:hover{background:url("<?php  echo THIS_SITE; ?>img/icon_twitter.gif")}.prelaod{position:absolute;top:-1px;left:-1px;overflow:hidden;width:1px;height:1px}
.MV_BTN{position:absolute;top:112px;left:26px;color:#f60;font-size:14px;font-weight:600}
</style>
<div id="parsely-root" style="display: none">
  <span id="parsely-cfg" data-parsely-site="us.tomonews.net"></span>
</div>
<?php 
  include_once ('fb_component.php');
?>
<script type="text/javascript">
var googletag = googletag || {};
var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
(function() {
var gads = document.createElement('script');
gads.async = true;
gads.type = 'text/javascript';
var useSSL = 'https:' == document.location.protocol;
gads.src = (useSSL ? 'https:' : 'http:') + 
'//www.googletagservices.com/tag/js/gpt.js';
var node = document.getElementsByTagName('script')[0];
node.parentNode.insertBefore(gads, node);
})();
</script>


<div class="prelaod"><img src="<?php  echo THIS_SITE; ?>img/search_1o.gif" width="532" height ="53"><img src="<?php  echo THIS_SITE; ?>img/input_o.gif"  width="322" height ="38"></div>
<div id="header">
			<div id="logo" >
				<a href="<?php  echo THIS_SITE; ?>"><img src="<?php  echo THIS_SITE; ?>img/logo.gif" width="255" height="67" ></a>
			</div>
			<a href="<?php echo THIS_SITE;?>"><div class="passive_icon"><img src="<?php  echo THIS_SITE; ?>img/tv_off.png?nocache=1"></div></a>
			<form id="search_box_form1">
			<div id="search1" >
				
				<input type="text" id="search_text" value="<?php  echo str_replace('+',' ',$kw);?>">
				<div id="search_go"></div>
				<div style="width:1px;height:1px;overflow:hidden;"><img src="<?php  echo THIS_SITE; ?>img/input_o.gif"  width="322" height ="38"></div>
			</div>
			</form>
			<!--<div id="header_flag">
				EDITION <br>
				<a href="<?php  echo US_WEBSITE;  ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/hd_fg_us.gif" width="55" height="22"></a>
				<a href="<?php  echo JP_WEBSITE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/hd_fg_jp.gif" width="70" height="22"></a>
				<a href="<?php  echo SUBSCRIBE_TOP_LINKS; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/hd_subscribe.gif" width="115" height="22"></a>
			</div>-->

			<div id="appstore">
				<a href="<?php  echo APP_APPLE_STORE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/hd_as.jpg" width="155" height="50" ></a>
				<a href="<?php  echo APP_GOOGLE_PLAY; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/hd_gp.jpg" width="155" height="50" ></a>
				<!--<a href="rss_us/index.php" target="_blank"><img src="img/rss_icon.gif" width="46" height="46" ></a>-->
				
				<!-- <a href="<?php  echo MOBILE_PAGE_LINK; ?>" target="_blank"><img src="img/hd_dw.jpg" width="50" height="50"></a> -->
			</div>
			
		</div>
        
		<div id="fl_icon_pos">
			<div id="fl_icon">
				<a href="<?php  echo APP_APPLE_STORE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_apple_47x47.png" width="47" height="47"></a>
				<br>
				<a href="<?php  echo APP_GOOGLE_PLAY; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_android_47x47.png" width="47" height="47"></a>
			</div>	
		</div>
		 