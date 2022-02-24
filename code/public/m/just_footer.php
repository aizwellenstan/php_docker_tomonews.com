<?php include_once('config.php'); ?>
<div id="footer">
		<div id="footer_content">
			<img src="<?php  echo THIS_SITE; ?>img/footer_1.gif" width="1000" height="50">
			<div id="ft_menu1" style="text-transform:uppercase;">
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

						?>
						<a href="<?php  echo THIS_SITE; ?>category/<?php  echo strtolower($enTMV); ?>" style="text-decoration: none;">
							<li class="ft_def w<?php  echo $tmv[1]; ?>"><?php  echo $tmv[0]; ?></li>
						</a>
						<?php 
					}
					?>
				</ul>
			</div>
			<div id="ft_menu2" style="text-transform:uppercase;">
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
						<a href="<?php  echo THIS_SITE; ?>theme/<?php  echo strtolower($enTHV); ?>" style="text-decoration: none;"><li><?php  echo $thv[0]; ?></li></a>
						<?php 
					}
					?>
				</ul>
			</div>
			
			<div id="ft_menu3" style="text-transform:uppercase;">
					<div><a href="<?php  echo FB_LINKS ?>" style="text-decoration: none;" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ft_fb.png"> <span>Facebook</span></a></div>
					<div><a href="<?php  echo TWITTER_LINKS ?>" style="text-decoration: none;" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ft_tw.png"> <span>Twitter</span></a></div>
					<div><a href="<?php  echo GPLUS_LINKS ?>" style="text-decoration: none;" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ft_gp.png"> <span>Google+</span></a></div>
					<div><a href="<?php  echo YOUTUBE_LINKS ?>" style="text-decoration: none;" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ft_yt.png"> <span>Youtube</span></a></div>
					<div><a href="<?php  echo INSTAGRAM_LINKS ?>" style="text-decoration: none;" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ft_in.png"> <span>Instagram</span></a></div>
			</div>
			<div id="ft_menu4" style="text-transform:uppercase;">
				<p><a href="<?php  echo THIS_SITE; ?><?php  echo ABOUT_PAGE_LINK ?>" style="text-decoration: none;">About Us</a></p>
				<p><a href="<?php  echo THIS_SITE; ?><?php  echo MOBILE_PAGE_LINK ?>" style="text-decoration: none;">Mobile</a></p> 

				<img src="<?php  echo THIS_SITE; ?>img/ft2.gif" width="46" height="21" style="padding-top:10px;"><br><br>
				<a href="<?php  echo US_WEBSITE; ?>"><img src="<?php  echo THIS_SITE; ?>img/icon_flag_us.png" width="53" height="14" style="text-decoration: none;"></a><br>
				<a href="<?php  echo JP_WEBSITE; ?>"><img src="<?php  echo THIS_SITE; ?>img/icon_flag_jp.png" width="63" height="14" style="text-decoration: none;"></a>
			</div>



		</div>
		<div id="footer_copy"  style="text-transform:uppercase;">TOMONEWS © 2016 ALL RIGHTS RESERVED.</div>
	</div>
	<script src="<?php  echo THIS_SITE; ?>js/basic.min.js?nocache=1120"></script>
	
	 
<!--  fb like box Start  -->
<?php 
if($_SESSION['open_ad']!='1'){
?>
<!--div id="fbBox">
	<a href="javascript:closefbbox()"><div id="fbBoxClose"></div></a>
	<div class="fb-like-box" data-href="https://www.facebook.com/TomonewsUS" data-width="285" data-height="200" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&appId=474504956026808&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>	
</div>
<?php  } ?>
<?php  //echo 'open_ad : ',$_SESSION['open_ad']; ?>

<!--  fb like box End  -->


	<!--script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script-->