<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:900,700' rel='stylesheet' type='text/css'>
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
  ga('send','event',category,action,label, 1);  
}
 var trackOutboundLink = function(category,action,label , url) {
  	console.log(category+':'+action+':'+label)
   ga('send', 'event', category,action,label, {'hitCallback':
     function () {
         location.href = url;
     }
   });
   }
$(function() {
    _detec_v.get_resize();
});

function _jellipsis(){
	$(".minfo").ellipsis({  row: 2,  char: '...'});
}
</script>
<script type="text/javascript">
    window._tfa = window._tfa || [];
    _tfa.push({notify:"action", name: 'page_view'});
</script>
<script src="//cdn.taboola.com/libtrc/tomonews-sc/tfa.js"></script>

<div id="header">
    <div style="width:100% ; background:#fff;height:auto;">
	<div class="content">
	        <div id="head_top">
	        <div id="menus1"><img src="<?php  echo THIS_SITE; ?>img/menu_j.gif" class='rwd_image'/></div>
			<!--<div id="menus1_o"></div>-->
			<div id="logo">
				<a href="<?php  echo THIS_SITE; ?>"><img src="<?php  echo THIS_SITE; ?>img/logo.gif" class='rwd_image'/></a>
			</div>
			</div>
			<div id="icons" align="right"> 
				FOLLOW US
				<a href="<?php  echo GPLUS_LINKS; ?>" target="_blank" ><div id="mico3" class="menu_icon"></div></a>
				<img src="<?php  echo THIS_SITE; ?>img/menu_line.gif" alt="">
				<a href="<?php  echo TWITTER_LINKS; ?>" target="_blank" ><div id="mico2" class="menu_icon"></div></a>
				<img src="<?php  echo THIS_SITE; ?>img/menu_line.gif" alt="">
				<a href="<?php  echo FB_LINKS; ?>" target="_blank"><div id="mico1" class="menu_icon"></div></a>
			</div>
			
			
			<div id="menus2">
			
				<img src="<?php  echo THIS_SITE; ?>img/menu2.png" width="598" height="540">
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
					<a href="<?php  echo FB_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_fb.gif"></a>
					<a href="<?php  echo TWITTER_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_twitter.gif"></a>
					<a href="<?php  echo GPLUS_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_gplus.gif"></a>
					<a href="<?php  echo YOUTUBE_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_youtube.gif"></a>
					<a href="<?php  echo INSTAGRAM_LINKS ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ins.gif"></a>
				</div>
				<div id="m24">
					<p><a href="<?php  echo THIS_SITE; ?><?php  echo ABOUT_PAGE_LINK ?>">About Us</a></p>
					<p><a href="<?php  echo THIS_SITE; ?><?php  echo MOBILE_PAGE_LINK ?>">Mobile</a></p> 
					<p><a href="<?php  echo THIS_SITE; ?><?php  echo GIVEAWAY_PAGE_LINK ?>">giveaway</a></p> 
				</div>
				<div id="m25">
					<a href="<?php  echo US_WEBSITE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/hd_fg_us.gif" width="57" height="22"></a><br><br>
					<a href="<?php  echo JP_WEBSITE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/hd_fg_jp.gif" width="69" height="22"></a>
				</div>

			</div>
			<div id="menu_mask"></div>
			<div id="menus3">
			    <div id="search_arr" style="position:absolute;top:-5px;left:18px;"><img src="<?php  echo THIS_SITE; ?>img/search_arrow.gif"></div>
	            <div id="mainmenus" class="mainmenus_1">
	            	<!-- <div class="mainmenus_1_scroller" style="width:100% ; height:100%"> -->
	            <div class="mainmenus_cont" style="position:relative;top:0px;left:0px;height:auto;width:100%;overflow:hidden;">

			    <form id="search_box_form1">
			        <div id="search1" style="position:relative;">                        
				       <input type="text" id="search_text" value="<?php  echo str_replace('+',' ',$kw);?>" placeholder="Search">				       
				        <div id="search_go" style="width:30px;height:30px;top:18px; left:85px"></div>
			        </div>
			    </form>
				<ul id="accordion" >
					<h1 class="accordion-toggle" data-id='0'><a>NEWSFEED</a></h1>
					<h1 class="accordion-toggle" data-id='1'><a>CATEGORIES</a></h1>
					
					<h1 class="accordion-toggle" data-id='2'><a>THEMES</a></h1>
					
					<h1 class="accordion-toggle" data-id='3'><a>SOCIAL MEDIA</a></h1>
					
					<h1 class="accordion-toggle" data-id='4'><a>SERVICES</a></h1>
					
					<h1 class="accordion-toggle" data-id='5'><a>EDITION</a></h1>
				    
					
				
				</ul>
			   </div><!-- mainmenus_cont -->
			   
                </div><!-- mainmenus_1_scroller -->
                
                <div class="submenu outer" >
                	<!-- <div class="submenu_scroller" style="width:100% ; height:100%"> -->
                	<div style="position:relative;top:0px;left:0px;height:auto;width:170px;overflow:hidden;">
                <li class="accordion-content db"  data-id='1'>	
                
						<ul>
						<!-- 	<a class="Ca" href="<?php  echo THIS_SITE; ?>newsfeed/"><li class="Citems w_newsfeed mu_def">NEWSFEED</li></a> -->
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


						?><a class="Ca" href="<?php  echo THIS_SITE; ?>category/<?php  echo strtolower($enTMV); ?>"><li class="Citems w<?php  echo $tmv[1]; ?> mu_def"><?php  echo $tmv[0]; ?></li></a><?php 
					}
					?>
						</ul>
					</li>

					<li class="accordion-content" data-id='2'>
						<ul>
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
						<a class="Ca" href="<?php  echo THIS_SITE; ?>theme/<?php  echo strtolower( $enTHV ); ?>"><li li class="Citems"><?php  echo $thv[0]; ?></li></a>
						<?php 
					}
					?>
						</ul>
					</li>
					
					<li class="accordion-content" data-id='3'>		
						<ul>
							<a class="Ca" href="<?php  echo FB_LINKS ?>" target="_blank"><li class="Citems">FACEBOOK</li></a>
							<a class="Ca" href="<?php  echo TWITTER_LINKS ?>" target="_blank"><li class="Citems">TWITTER</li></a>
							<a class="Ca" href="<?php  echo GPLUS_LINKS ?>" target="_blank"><li class="Citems">GOOGLE+</li></a>
							<a class="Ca" href="<?php  echo YOUTUBE_LINKS ?>" target="_blank"><li class="Citems">YOUTUBE</li></a>
							<a class="Ca" href="<?php  echo INSTAGRAM_LINKS ?>" target="_blank"><li class="Citems">INSTAGRAM</li></a>

							
						</ul>
					</li>
					
					<li class="accordion-content" data-id='4'>		
						<ul>
							<a class="Ca" href="<?php  echo THIS_SITE; ?><?php  echo ABOUT_PAGE_LINK ?>"><li class="Citems">About Us</li></a>
							<a class="Ca" href="<?php  echo THIS_SITE; ?><?php  echo MOBILE_PAGE_LINK ?>"><li class="Citems">Mobile</li></a>
							<a class="Ca" href="<?php  echo THIS_SITE; ?><?php  echo GIVEAWAY_PAGE_LINK ?>"><li class="Citems">giveaway</li></a>
							
							
						</ul>
					</li>
					
					<li class="accordion-content" data-id='5'>		
						<ul>
							<a class="Ca" href="<?php  echo US_WEBSITE; ?>" target="_blank"><li class="Citems">US</li></a>
							<a class="Ca" href="<?php  echo JP_WEBSITE; ?>" target="_blank"><li class="Citems">JP</li></a>
							<a class="Ca" href="<?php  echo FR_WEBSITE; ?>" target="_blank"><li class="Citems">FR</li></a>
							<a class="Ca" href="http://www.appledaily.com.tw/animation/topics/504" target="_blank"><li class="Citems">TW</li></a>
							<a class="Ca" href="<?php  echo HK_WEBSITE; ?>" target="_blank"><li class="Citems">HK</li></a>

							
						</ul>
					</li>
				</div>
				<!-- </div><div class="scrollbar2"></div>  -->
				</div>
			</div>
			
			<div id="header_flag">
				EDITION <br>
				<a class="us" href="<?php  echo US_WEBSITE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/hd_fg_us.gif" /></a>
				<a class="jp" href="<?php  echo JP_WEBSITE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/hd_fg_jp.gif" /></a>
				<a class="sub" href="<?php  echo SUBSCRIBE_TOP_LINKS; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/hd_subscribe.gif" width="115" height="22"></a>
			</div>

			<div id="appstore">
				<a href="<?php  echo APP_APPLE_STORE; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/hd_as.jpg" width="155" height="50" ></a>
				<a href="<?php  echo APP_GOOGLE_PLAY; ?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/hd_gp.jpg" width="155" height="50" ></a>
				<!-- <a href="<?php  echo MOBILE_PAGE_LINK; ?>" target="_blank"><img src="img/hd_dw.jpg" width="50" height="50"></a> -->
			</div>
			<div id="fl_icon_pos">
			    <div id="fl_icon">
			    	<a class="apple" href="<?php  echo APP_APPLE_STORE;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_apple_47x47.png"></a>
			    	<br>
			    	<a class="android" href="<?php  echo APP_GOOGLE_PLAY;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_android_47x47.png"></a>
			    </div>	
		    </div>
			
	</div>
	</div>
</div>
		 