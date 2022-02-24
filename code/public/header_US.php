	
<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,400italic,900,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,800' rel='stylesheet' type='text/css'>
<style  type="text/css">
#header{top:10px;z-index:9999}#search1{background:url("<?php  echo THIS_SITE; ?>img/input.gif");background-repeat:no-repeat;top:40px;left:335px}#appstore{top:28px;left:676px}#main_menu{position:absolute;width:1019px;top:100px;left:65px}.btn_main_menu{width:145px;height:34px;display:inline-block;margin:0 2px;background:#f00;text-align:center;line-height:34px;color:#fff;font-family:'Roboto',sans-serif;font-style:normal;font-weight:bold;border-style:solid;border-width:1px}.NF_BTN{position:absolute;top:80px;left:26px;color:#f60;font-size:14px;font-weight:600}#nf{border-color:#f60;background:#fff;color:#f60}#us{background:#194a9e;color:#fff;border-color:#194a9e}#us:hover{background:#fff;color:#194a9e}#wrd{background:#f00;color:#fff;border-color:#f00}#wrd:hover{background:#fff;color:#f00}#asa{background:#ffc300;color:#fff;border-color:#ffc300}#asa:hover{background:#fff;color:#ffc300}#sci{background:#008d3f;color:#fff;border-color:#008d3f}#sci:hover{background:#fff;color:#008d3f}#soc{background:#a96124;color:#fff;border-color:#a96124}#soc:hover{background:#fff;color:#a96124}#spo{background:#7f1084;color:#fff;border-color:#7f1084}#spo:hover{background:#fff;color:#7f1084}#menus1{width:47px;top:100px;background:url("<?php  echo THIS_SITE; ?>img/menu1.gif")}#menus2{top:100px}#icons #mico1{background:url("<?php  echo THIS_SITE; ?>img/icon_fb_.gif")}#icons #mico2{background:url("<?php  echo THIS_SITE; ?>img/icon_twitter_.gif")}#icons #mico1:hover{background:url("<?php  echo THIS_SITE; ?>img/icon_fb.gif")}#icons #mico2:hover{background:url("<?php  echo THIS_SITE; ?>img/icon_twitter.gif")}.prelaod{position:absolute;top:-1px;left:-1px;overflow:hidden;width:1px;height:1px}
</style>
<!-- <div id="parsely-root" style="display: none">
  <span id="parsely-cfg" data-parsely-site=""></span>
</div> -->
<?php 
  include_once ('fb_component.php');
?>
<script type="text/javascript">
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
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-35663092-20', 'auto');
  ga('send', 'pageview');
  function GT(category,action,label){
  	console.log(category+':'+action+':'+label)
    ga('send','event',category,action,label, 1);  
  }//
  var trackOutboundLink = function(category,action,label , url) {
   ga('send', 'event', category,action,label, {'hitCallback':
     function () {
         location.href = url;
     }
   });
   }
</script>


<div class="prelaod"><img src="<?php  echo THIS_SITE; ?>img/search_1o.gif" width="532" height ="53"><img src="<?php  echo THIS_SITE; ?>img/input_o.gif"  width="322" height ="38"></div>
<div id="header">
			<div id="logo" >
				<a href="<?php  echo THIS_SITE; ?>"><img src="<?php  echo THIS_SITE; ?>img/logo.gif" width="255" height="67" ></a>
			</div>
			<div id="icons"> 
				<!--<a href="<?php  echo GPLUS_LINKS; ?>" target="_blank"><div id="mico3" class="menu_icon"></div></a>-->
				<!--<img src="<?php  echo THIS_SITE; ?>img/menu_line.gif" alt="">-->
				<a href="<?php  echo TWITTER_LINKS; ?>" target="_blank"><div id="mico2" class="menu_icon"></div></a>
				<!--<img src="<?php  echo THIS_SITE; ?>img/menu_line.gif" alt="">-->
				<a href="<?php  echo FB_LINKS; ?>" target="_blank"><div id="mico1" class="menu_icon"></div></a>
			</div>
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

			<div id="main_menu">
			  <a href="<?php  echo THIS_SITE; ?>newsfeed"><div class='btn_main_menu' id="nf">NEWSFEED</div></a>
			  <a href="<?php  echo THIS_SITE; ?>category/us"><div class='btn_main_menu' id="us">U.S.</div></a>
			  <a href="<?php  echo THIS_SITE; ?>category/world"><div class='btn_main_menu' id="wrd">WORLD</div></a>
			  <a href="<?php  echo THIS_SITE; ?>category/asia"><div class='btn_main_menu' id="asa">ASIA</div></a>
			<!--   <a href="<?php  echo THIS_SITE; ?>category/sci-tech"><div class='btn_main_menu' id="sci">SCI & TECH</div></a> -->
			  <a href="<?php  echo THIS_SITE; ?>category/society"><div class='btn_main_menu' id="soc">SOCIETY</div></a>
			  <a href="<?php  echo THIS_SITE; ?>category/sports"><div class='btn_main_menu' id="spo">SPORTS</div></a>
			</div>
			<div id="menus1" onmouseover="menus1_over();"></div>
			<div id="menu_mask" onmouseover= 'menus2_out();'></div>
			<div id="menus2" >

				<img src="<?php  echo THIS_SITE; ?>img/menu3_v2.png" width="598" height="650">
				<a href="<?php  echo THIS_SITE; ?>newsfeed"><div class="NF_BTN">NEWSFEED</div> </a>
				<div id="m21">
					<ul>
					<?php 
					foreach( $topmenu as $tmv ){
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

                        if(substr($enTMV , -1)=='-')
                        {  ///i是-1
                           $enTMV =	substr($enTMV , 0,-1);
                        }
                        if(substr($enTMV , 0 , 1)=='-'){ ///結尾是-1
                           $enTMV =	substr($enTMV, 1);
                        }


						?><a href="<?php  echo THIS_SITE; ?>category/<?php  echo strtolower($enTMV); ?>"><li class="w<?php  echo $tmv[1]; ?> mu_def"><?php  echo $tmv[0]; ?></li></a><?php 
					}
					?>
					</ul>
					
				</div>
				<div id="m22">
					<?php 
					
					foreach( $toptheme as $thk=>$thv ){

						
						$enTHV = str_replace('?', '', $thv[0]);
						$enTHV = str_replace(' ', '-', $enTHV);
						$enTHV = str_replace('  ', '-', $enTHV);
						$enTHV = str_replace(';', '', $enTHV);
						$enTHV = str_replace('?', '', $enTHV);
						$enTHV = str_replace('.', '', $enTHV);
						$enTHV = str_replace(',', '', $enTHV);
						$enTHV = str_replace('#', '', $enTHV);
						$enTHV = str_replace('$', '', $enTHV);
						$enTHV = str_replace('(', '', $enTHV);
						$enTHV = str_replace(')', '', $enTHV);
						$enTHV = str_replace('&', '', $enTHV);
						$enTHV = str_replace('%', '', $enTHV);
						$enTHV = str_replace('@', '', $enTHV);
						$enTHV = str_replace('=', '', $enTHV);
						$enTHV = str_replace('|', '', $enTHV);
						$enTHV = str_replace('/', '', $enTHV);
						$enTHV = str_replace('"', '', $enTHV);
						$enTHV = str_replace('!', '', $enTHV);
                        $enTHV = str_replace(':', '', $enTHV);
                        $enTHV = str_replace('’', '', $enTHV);
                        $enTHV = str_replace('‘', '', $enTHV);
                        $enTHV = str_replace('＆', '', $enTHV);
                        $enTHV = str_replace('　', '', $enTHV);
                        $enTHV = str_replace("'", '', $enTHV);
                        $enTHV = str_replace('--', '-', $enTHV);
                       

                        if(substr($enTHV, -1)=='-')
                        {  ///i是-1
                           $enTHV=	substr($enTHV, 0,-1);
                        }
                        if(substr($enTHV, 0 , 1)=='-'){ ///結尾是-1
                           $enTHV=	substr($enTHV, 1);
                        }


						?>
						<a href="<?php  echo THIS_SITE; ?>theme/<?php  echo strtolower( $enTHV ); ?>"><p><?php  echo $thv[0]; ?></p></a>
						<?php 
					}
					?>
					
				</div>
				<div id="m23">
					<a href="<?php  echo FB_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_fb.gif" width="26" height ="26"></a>
					<a href="<?php  echo TWITTER_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_twitter.gif"width="26" height ="26"></a>
					<a href="<?php  echo GPLUS_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_gplus.gif"width="26" height ="26"></a>
					<a href="<?php  echo YOUTUBE_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_youtube.gif"width="26" height ="26"></a>
					<a href="<?php  echo INSTAGRAM_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ins.gif"width="26" height ="26"></a>
				</div>
				<div id="m24">
					<p><a href="<?php  echo THIS_SITE; ?><?php  echo ABOUT_PAGE_LINK ?>">About Us</a></p>
					<p><a href="<?php  echo THIS_SITE; ?><?php  echo MOBILE_PAGE_LINK ?>">Mobile</a></p> 
					<p><a href="<?php  echo THIS_SITE; ?><?php  echo GIVEAWAY_LINK ?>">Giveaway</a></p> 
				</div>
				<div id="m25">
					
				    <a href="<?php  echo US_WEBSITE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/flag_us.gif" width="132" height="24"></a><br><br>
					<a href="<?php  echo JP_WEBSITE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/flag_jp.gif" width="132" height="24"></a><br><br>
					<a href="<?php  echo FR_WEBSITE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/flag_fr.gif" width="132" height="24"></a><br><br>
					<a href="http://www.appledaily.com.tw/animation/topics/504" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/flag_tw.gif" width="132" height="24"></a><br><br>
					<a href="<?php  echo HK_WEBSITE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/flag_hk.gif" width="132" height="24"></a><br><br><br>
					<a href="<?php  echo THIS_SITE; ?>rss_us/index.php" target="_blank"><div><img src="<?php  echo THIS_SITE; ?>img/rss.png" width="30" height="30" ><span style="position:relative;bottom:14px;;color:#333;font-size:13px;">  RSS</span></div></a>
				</div>

			</div>

			
			
			<!--<div id="ad1"><?php  echo $ad728x90; ?></div>-->
		</div>

		<div id="fl_icon_pos">
			<div id="fl_icon">
				<a href="<?php  echo APP_APPLE_STORE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_apple_47x47.png" width="47" height="47"></a>
				<br>
				<a href="<?php  echo APP_GOOGLE_PLAY; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_android_47x47.png" width="47" height="47"></a>
			</div>	
		</div>
		 
