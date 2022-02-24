<?php include_once('config.php'); ?>
        <script>
         /* $( document ).ready(function() {
				console.log('aqui');
                var desktopFallback = "http://suggest.tomonews.com",
                mobileFallback = "http://suggest.tomonews.com",
                //app = "googlechrome-x-callback://x-callback-url/open/?x-source=MyApp&x-success=com.myapp.callback%3A%2F%2F&url=http%3A%2F%2Fsuggest.tomonews.com&create-new-tab";
				app = "googlechrome-x-callback://x-callback-url/open/?x-source=fb&url=http%3A%2F%2Fsuggest.tomonews.com"; 
                if( /iPhone|iPad|iPod/i.test(navigator.userAgent) ) {
                    window.location = app;
                    /*window.setTimeout(function() {
                        window.location = mobileFallback;
                    }, 25);
                }

           });*/
        </script>
  <meta id ="viewport" name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
  
	<meta property="fb:pages" content="148740698487405" />

	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.ico" type="image/icon" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css?nocache=1103">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:900,700' rel='stylesheet' type='text/css'>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/easing/EasePack.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<script src="<?php echo THIS_SITE;?>js/basic.min.js?nocache=1117"></script>

<script> 
	var thisSite = "<?php  echo THIS_SITE; ?>";
</script> 

<?php    include_once ('../fb_component.php'); ?>
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
</script>
<script type="text/javascript">
    window._tfa = window._tfa || [];
    _tfa.push({notify:"action", name: 'page_view'});
</script>

<style>


#header{height: 66px; }

#header .content { width: 100%; }

#menus1{width:9%;}
#logo{width:65%;height:auto;    margin-top: -15px;}
#logo img{position:relative;    top: 10px;}
.passive_icon{
    display: inline-block !important;
    float:right !important;
}
#accordion-content-child2{margin: 0 0 10px 0;}
#menus3.open-tomo-menu{ top: 70px; height: 420.667px; display: block !important; width: calc(100% - 180px); }
#search_arr.open-tomo-menu{ position: absolute; top: -5px; left: 18px; display: block !important; }
#search1.open-tomo-menu{ position: relative; width: 80%; height: 50px; line-height: 50px; display: block !important; }
#mainmenus.open-tomo-menu{ width: 70%; margin-top: 9px; display: block !important; }
div.mobile-nav.dark-bg.no-open-menu { width: 0; }
.mobile-nav-open1 .outer-wrapper .inner-wrapper { left: calc(100% - 150px); }

#accordion h1 a{     width: 125px;
    height: 50px;
    text-align: center;
    color: #fff;
    font-size: 4.5vw;
    font-weight: 900; }
</style>

<div id="header">
    <div style="width:100% ; background:#fff;height:auto;">
	<div class="content">
	        <div id="head_top">
	        <div id="menus1"><img src="<?php  echo THIS_SITE; ?>img/menu_j.png" class='rwd_image'/></div>
			<script>
				$('#menus1').click(function(){
					$('body').removeClass('mobile-nav-open');
					$('body').toggleClass('mobile-nav-open1');
					$('#menus3').toggleClass('open-tomo-menu');
					$('#search_arr').toggleClass('open-tomo-menu');
					$('#search1').toggleClass('open-tomo-menu');
					$('#mainmenus').toggleClass('open-tomo-menu');
					//$('div.mobile-nav.dark-bg').toggleClass('no-open-menu');
				});
				
				$('.mobile-menu-button').click(function(){
					$('body').removeClass('mobile-nav-open1');
					$('#menus3, #search_arr, #search1, #mainmenus').removeClass('open-tomo-menu');
				});
			</script>
			<div id="logo">
				<a href="<?php  echo THIS_SITE; ?>" onclick="track_menu('MAIN' ,'<?php  echo THIS_SITE; ?>');return false;"><img src="<?php  echo THIS_SITE; ?>img/logo.png" class='rwd_image'/></a>
			</div>
			<div class="passive_icon"><a href="<?php echo THIS_SITE;?>tomoplay/" onclick="track_menu('tomoplay' ,'<?php  echo THIS_SITE; ?>tomoplay/');return false;"><img  class='rwd_image' src="<?php  echo THIS_SITE; ?>img/tv_off.png"></a></div>
			</divtv_on
			
			<div id="menu_mask"></div>
			<div id="menus3">
			    <div id="search_arr" style="position:absolute;top:-5px;left:18px;"><img src="<?php  echo THIS_SITE; ?>img/search_arrow.png"></div>
	            <div id="mainmenus" class="mainmenus_1">
	            	<!-- <div class="mainmenus_1_scroller" style="width:100% ; height:100%"> -->
	            <div class="mainmenus_cont" style="position:relative;top:0px;left:0px;height:auto;width:100%;overflow:hidden;">

			    <form id="search_box_form1">
			        <div id="search1" style="position:relative;">                        
				       <input type="text" id="search_text" value="<?php  echo urldecode($kw);?>" placeholder="Search">				       
				        <div id="search_go" style="width:30px;height:30px;top:18px; left:85px"></div>
			        </div>
			    </form>
				<ul id="accordion" >
					<h1 class="accordion-toggle" data-id='0'><a>NEWSFEED</a></h1>
					<?php 
                    // MobileMenu_MostViewedPage
					?>
					<!--<h1 class="accordion-toggle" data-id='0.5'><a>MOST VIEWED</a></h1>-->
					<h1 class="accordion-toggle" data-id='1'><a>CATEGORIES</a></h1>
					
					<h1 class="accordion-toggle" data-id='2'><a>THEMES</a></h1>
					
					<h1 class="accordion-toggle" data-id='3'><a>SOCIAL MEDIA</a></h1>
					
					<h1 class="accordion-toggle" data-id='4'><a>SERVICES</a></h1>
					

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


						?><a class="Ca" href="<?php  echo THIS_SITE; ?>category/<?php  echo strtolower($enTMV); ?>" onclick="track_menu('<?php  echo $tmv[0]; ?>' ,'<?php  echo THIS_SITE; ?>category/<?php  echo strtolower($enTMV); ?>');return false;"><li class="Citems w<?php  echo $tmv[1]; ?> mu_def"><?php  echo $tmv[0]; ?></li></a><?php 
					}
					?>
						</ul>
					</li>

					<li class="accordion-content" data-id='2'>
						<ul id="accordion-content-child2">
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
						<a class="Ca" href="<?php  echo THIS_SITE; ?>theme/<?php  echo strtolower( $enTHV ); ?>" onclick="track_menu('<?php  echo $thv[0]; ?>' ,'<?php  echo THIS_SITE; ?>theme/<?php  echo strtolower( $enTHV ); ?>');return false;"><li li class="Citems theme"><?php  echo $thv[0]; ?></li></a>
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
							<a class="Ca" href="<?php  echo THIS_SITE; ?><?php  echo ABOUT_PAGE_LINK ?>" onclick="track_menu('ABOUT' ,'<?php  echo THIS_SITE; ?><?php  echo ABOUT_PAGE_LINK ?>');return false;"><li class="Citems">About Us</li></a>
							<a class="Ca" href="<?php  echo THIS_SITE; ?><?php  echo MOBILE_PAGE_LINK ?>"   onclick="track_menu('MOBILE' ,'<?php  echo THIS_SITE; ?><?php  echo MOBILE_PAGE_LINK ?>');return false;"><li class="Citems">Mobile</li></a>
							<a class="Ca" href="<?php  echo THIS_SITE; ?><?php  echo GIVEAWAY_PAGE_LINK ?>" onclick="track_menu('GIVEAWAY' ,'<?php  echo THIS_SITE; ?><?php  echo GIVEAWAY_LINK ?>'); return false;"><li class="Citems">giveaway</li></a>
							
							
						</ul>
					</li>
					
					<li class="accordion-content" data-id='5'>		
						<ul>
							<a class="Ca" href="<?php  echo US_WEBSITE; ?>" target="_blank"><li class="Citems">US</li></a>
							<a class="Ca" href="<?php  echo JP_WEBSITE; ?>" target="_blank"><li class="Citems">JP</li></a>

							
						</ul>
					</li>
				</div>
				<!-- </div><div class="scrollbar2"></div>  -->
				</div>
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