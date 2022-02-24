	
<link href='http://fonts.googleapis.com/css?family=Roboto:300 ,400,500,500italic,400italic,900,700, 700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,800' rel='stylesheet' type='text/css'>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<style  type="text/css">

#logo img{ content:url("<?php  echo THIS_SITE; ?>img/logo.png"); width: 500px;}
#header.fix-search #logo img{ content:url("<?php  echo THIS_SITE; ?>img/logo2.png"); width: 60px;padding: 1px 5px 3px 0px;}
#icons #mico1{background:url("<?php  echo THIS_SITE; ?>img/icon_fb_.gif")}#icons #mico2{background:url("<?php  echo THIS_SITE; ?>img/icon_twitter_.gif")}#icons #mico1:hover{background:url("<?php  echo THIS_SITE; ?>img/icon_fb.gif")}#icons #mico2:hover{background:url("<?php  echo THIS_SITE; ?>img/icon_twitter.gif")}
#menus1{background:url("<?php  echo THIS_SITE; ?>img/menu1.png") no-repeat;}
</style>
 <div id="parsely-root" style="display: none">
  <span id="parsely-cfg" data-parsely-site="us.tomonews.net"></span>
</div> 
<?php 
  include_once ('fb_component.php');
?>
<script type="text/javascript">
var page_url = '';
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
<script>
jQuery(window).on("scroll", function(e) {
  if ($(this).scrollTop() > 150) {

    document.getElementById("header").classList.add("fix-search");
  } else {
    document.getElementById("header").classList.remove("fix-search");
  }
  
});
</script>
<?php  
function str_replaceF($tmv){
	$enTMV  = str_replace('?', '', $tmv[0]);
	$enTMV  = str_replace(' ', '-', $enTMV );
	$enTMV  = str_replace('  ', '-', $enTMV );
	$enTMV  = str_replace(';', '', $enTMV );
	$enTMV  = str_replace('?', '', $enTMV );
	$enTMV  = str_replace('.', '', $enTMV );
	$enTMV  = str_replace(',', '', $enTMV );
	$enTMV  = str_replace('#', '', $enTMV );
	$enTMV  = str_replace('$', '', $enTMV );
	$enTMV  = str_replace('(', '', $enTMV );
	$enTMV  = str_replace(')', '', $enTMV );
	$enTMV  = str_replace('&', '', $enTMV );
	$enTMV  = str_replace('%', '', $enTMV );
	$enTMV  = str_replace('@', '', $enTMV );
	$enTMV  = str_replace('=', '', $enTMV );
	$enTMV  = str_replace('|', '', $enTMV );
	$enTMV  = str_replace('/', '', $enTMV );
	$enTMV  = str_replace('"', '', $enTMV );
	$enTMV  = str_replace('!', '', $enTMV );
	$enTMV  = str_replace(':', '', $enTMV );
	$enTMV  = str_replace('’', '', $enTMV );
	$enTMV  = str_replace('‘', '', $enTMV );
	$enTMV  = str_replace('＆', '', $enTMV );
	$enTMV  = str_replace('　', '', $enTMV );
	$enTMV  = str_replace("'", '', $enTMV );
	$enTMV  = str_replace('--', '-', $enTMV );                       

	if(substr($enTMV , -1)=='-'){ $enTMV =	substr($enTMV , 0,-1); }
	if(substr($enTMV , 0 , 1)=='-'){ $enTMV =	substr($enTMV, 1); }
	return $enTMV;
}?>
<script src="<?php echo THIS_SITE ?>js/searchdropdown.js"></script>
<div class="prelaod"><img src="<?php  echo THIS_SITE; ?>img/search_1o.gif" width="532" height ="53"><img src="<?php  echo THIS_SITE; ?>img/input_o.gif"  width="322" height ="38"></div>

<div id="top-menu">
	<div class="top-menu-content" style="">
		
		<div style="top:10px;position: relative;float:right;" id="menus1" onclick="menus1_over();"></div>
		<div  id="menu_mask" onclick= 'menus2_out();'></div>
		<div  style="" id="menus2" >
			<img src="<?php  echo THIS_SITE; ?>img/menu3_v2.png" width="598">
			
			<div id="m21">
				<ul>
				<li><div class="NF_BTN">Categories</div></li>
				<a href="<?php  echo THIS_SITE; ?>newsfeed" onclick="track_menu('NEWSFEED' ,'<?php  echo THIS_SITE; ?>newsfeed');return false;"><li class="mu_def">Newsfeed</li></a>
				<?php 
				foreach( $topmenu as $tmv ){
					$enTMV = str_replaceF($tmv);
					?>
					<a href="<?php  echo THIS_SITE; ?>category/<?php  echo strtolower($enTMV); ?>" onclick="track_menu('<?php  echo $tmv[0]; ?>' ,'<?php  echo THIS_SITE; ?>category/<?php  echo strtolower($enTMV); ?>');return false;"><li class="mu_def"><?php  echo $tmv[0]; ?></li></a><?php 
				} ?>
				</ul>
						
			</div>
			
			<div id="m22">
				<div class="NF_BTN">Themes</div>
				<ul>
			<?php 
			foreach( $toptheme as $thk=>$thv ){
				$enTMV = str_replaceF($thv);
			?>
				<a href="<?php  echo THIS_SITE; ?>theme/<?php  echo strtolower( $enTMV ); ?>"  onclick="track_menu('<?php  echo $thv[0]; ?>' ,'<?php  echo THIS_SITE; ?>theme/<?php  echo strtolower( $enTMV ); ?>');return false;"><li class="mu_def"><?php  echo $thv[0]; ?></li></a>
			<?php  } ?>
				</ul>		
			</div>
			
			<div id="mDivider"><img src="<?php  echo THIS_SITE; ?>img/menu-divider.png"></div>
			
			<div id="m23">
				<div class="NF_BTN">Services / Events</div><br>
				<p><a href="<?php  echo THIS_SITE; ?><?php  echo ABOUT_PAGE_LINK ?>" onclick="track_menu('ABOUT' ,'<?php  echo THIS_SITE; ?><?php  echo ABOUT_PAGE_LINK ?>');return false;">About Us</a></p>
				<p><a href="<?php  echo THIS_SITE; ?><?php  echo MOBILE_PAGE_LINK ?>" onclick="track_menu('MOBILE' ,'<?php  echo THIS_SITE; ?><?php  echo MOBILE_PAGE_LINK ?>');return false;">Mobile</a></p> 
				<p><a href="<?php  echo THIS_SITE; ?><?php  echo GIVEAWAY_LINK ?>" onclick="track_menu('GIVEAWAY' ,'<?php  echo THIS_SITE; ?><?php  echo GIVEAWAY_LINK ?>');return false;">Giveaway</a></p>
			</div>
			
			<div id="m24">
				<div class="NF_BTN">Editions</div><br>
				<p><a href="<?php  echo US_WEBSITE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/flag_us.png"><span>English (US)</span></a></p>
				<p><a href="<?php  echo JP_WEBSITE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/flag_jp.png"><span>English (US)</span></a></p>
			</div>
			
			<div id="m25">
				<div class="NF_BTN">Social Media</div><br><br>
				<a href="<?php  echo FB_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_fb.png" width="28" height ="28"></a>
				<a href="<?php  echo TWITTER_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_twitter.png"width="28" height ="28"></a>
				<a href="<?php  echo GPLUS_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_gplus.png"width="28" height ="28"></a>
				<a href="<?php  echo YOUTUBE_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_youtube.png"width="28" height ="28"></a>
				<a href="<?php  echo INSTAGRAM_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ins.png"width="28" height ="28"></a>
			</div>
			
		</div>
		
		<div class="header-search-wrap">
			<div class="dropdown header-search">
				<div class="td-drop-down-search" aria-labelledby="td-header-search-button">
					<form class="td-search-form" role="search" id="search_box_form1">
						<div class="td-head-form-search-wrap">
							<input id="search_text" type="text" required value="<?php  echo urldecode($kw);?>" name="s" autocomplete="off">
							<input class="wpb_button wpb_btn-inverse btn" type="submit" id="td-header-search-top" value="Search">
						</div>
					</form>
					<div id="td-aj-search"></div>
				</div>
			</div>
		</div>	
		<div class="td-search-wrapper">
			<div id="td-top-search">
				<!-- Search -->
				<div class="header-search-wrap">
					<div class="dropdown header-search">
						<a id="td-header-search-button" href="#" role="button" class="dropdown-toggle " data-toggle="dropdown">
							<img class="td-icon-search" src="<?php  echo THIS_SITE; ?>img/magnifying glass.png">
						</a>
					</div>
				</div>
			</div>
		</div>
		<!--<div id="suggest-icon">
			<a href="http://suggest.tomonews.com">
				<img class="lightbulb" src="<?php  echo THIS_SITE; ?>img/TomoSuggest.png"></a>
		</div>-->
		<div id="tomoplay-icon" >
				<a href="<?php echo THIS_SITE;?>tomoplay" title="Stream Endless Videos" onclick="track_menu('tomoplay' ,'<?php  echo THIS_SITE; ?>tomoplay');return false;"><div class="passive_icon"><img class="lightbulb" src="<?php  echo THIS_SITE; ?>img/tv_off.png?nocache=1"></div></a>
		</div>
	</div>	
</div>

			
<div id="header" style="height: 100px;">		
	<div id="logo" >
		<a href="<?php  echo THIS_SITE; ?>" onclick="track_menu('MAIN' ,'<?php  echo THIS_SITE; ?>');return false;"><img></a>
	</div>
	<div id="main_menu">
		<a href="<?php  echo THIS_SITE; ?>newsfeed" onclick="track_menu('NEWSFEED' ,'<?php  echo THIS_SITE; ?>newsfeed');return false;"><div class='btn_main_menu <?php  if (isset($cate_name) && (strtolower($cate_name) == 'newsfeed')){ echo 'cate_newsfeed'; } ?>' id="nf">Newsfeed</div></a>
		<?php  $i = 0;
			foreach( $topmenu as $tmv ){
			$i=$i+1;
			if ($i == 8){ break; }
			$enTMV = str_replaceF($tmv);?>
			<a href="<?php  echo THIS_SITE; ?>category/<?php  echo strtolower( $enTMV ); ?>"  onclick="track_menu('<?php  echo $tmv[0]; ?>'' ,'<?php  echo THIS_SITE; ?>category/<?php  echo strtolower( $enTMV ); ?>');return false;"><div class='btn_main_menu' <?php  if (isset($cate_title) && ($cate_title== strtolower( $enTMV ))){ ?> style="border-bottom: 5px solid <?php  echo $tmv[2];  } ?>"><?php  echo $tmv[0]; ?></div></a>
		<?php  } ?>	
	</div>
</div>

		 