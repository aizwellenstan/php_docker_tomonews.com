<style>
#ft_menu3{top:145px;left:663px;}
#ft_menu3a{position: absolute;    top: 54px;    left: 666px;    width: 120px;    height: 200px;font-size: 12.6666679382324px;}
#ft_menu3a>div{padding:4px 0;width: 200px;}

</style>

<div id="footer">
		<div id="footer_content">
			<img src="<?php  echo THIS_SITE; ?>img/footer_1.gif?nocache=0907" width="1000" height="206">
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
						<a href="<?php  echo THIS_SITE; ?>category/<?php  echo strtolower($enTMV); ?>" style="text-decoration: none;" onclick="track_menu('<?php  echo $tmv[0]; ?>' ,'<?php  echo THIS_SITE; ?>category/<?php  echo strtolower($enTMV); ?>');return false;">
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
						<a href="<?php  echo THIS_SITE; ?>theme/<?php  echo strtolower($enTHV); ?>" style="text-decoration: none;"  onclick="track_menu('<?php  echo $thv[0]; ?>' ,'<?php  echo THIS_SITE; ?>theme/<?php  echo strtolower( $enTHV ); ?>');return false;"><li><?php  echo $thv[0]; ?></li></a>
						<?php 
					}
					?>
				</ul>
			</div>
			<div id="ft_menu3a" style="text-transform:uppercase;">
				<div><a href="<?php  echo THIS_SITE.'newsfeed'; ?>" style="text-decoration: none;color:white" target="_blank"><span>NEWSFEED</span></a></div>
				
			</div>
			<div id="ft_menu3" style="text-transform:uppercase;">
					<div><a href="<?php  echo FB_LINKS ?>" style="text-decoration: none;" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ft_fb.png" width="20" height ="20"> <span>Facebook</span></a></div>
					<div><a href="<?php  echo TWITTER_LINKS ?>" style="text-decoration: none;" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ft_tw.png"  width="20" height ="20"> <span>Twitter</span></a></div>
					<div><a href="<?php  echo GPLUS_LINKS ?>" style="text-decoration: none;" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ft_gp.png"  width="20" height ="20"> <span>Google+</span></a></div>
					<div><a href="<?php  echo YOUTUBE_LINKS ?>" style="text-decoration: none;" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ft_yt.png"  width="20" height ="20"> <span>Youtube</span></a></div>
					<div><a href="<?php  echo INSTAGRAM_LINKS ?>" style="text-decoration: none;" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ft_in.png"  width="20" height ="20"> <span>Instagram</span></a></div>
			</div>
			<div id="ft_menu4" style="text-transform:uppercase;">
				<p><a href="<?php  echo THIS_SITE; ?><?php  echo ABOUT_PAGE_LINK ?>" style="text-decoration: none;" onclick="track_menu('ABOUT' ,'<?php  echo THIS_SITE; ?><?php  echo ABOUT_PAGE_LINK ?>');return false;">About Us</a></p>
				<p><a href="<?php  echo THIS_SITE; ?><?php  echo MOBILE_PAGE_LINK ?>" style="text-decoration: none;" onclick="track_menu('MOBILE' ,'<?php  echo THIS_SITE; ?><?php  echo MOBILE_PAGE_LINK ?>');return false;">Mobile</a></p> 
				<p><a href="<?php  echo THIS_SITE; ?><?php  echo 'wall-of-thanks' ?>" style="text-decoration: none;">Wall of thanks</a></p> 

				<img src="<?php  echo THIS_SITE; ?>img/ft2.gif" width="46" height="21" style="padding-top:10px;"><br><br>
				
				<a href="<?php  echo US_WEBSITE; ?>" ><img class="edtion_link" src="<?php  echo THIS_SITE; ?>img/flag_us2.gif" width="126" height="19" style="text-decoration: none;"></a><br>
				<a href="<?php  echo JP_WEBSITE; ?>"><img  class="edtion_link" src="<?php  echo THIS_SITE; ?>img/flag_jp2.gif" width="126" height="19" style="text-decoration: none;"></a><br>	
			</div>
		</div>
		<div id="footer_copy"  style="text-transform:uppercase;">TOMONEWS © 2018   All rights reserved.<a href="http://tomonews.com/term_us.html" target="_blank" style="color:#7a7a7a;"><span style="float:right;">TERMS & CONDITIONS</span></a></div>
	</div>
  
	
  <script src="<?php echo THIS_SITE; ?>js/config.js?nocache=1112" defer></script>
  <script src="<?php echo THIS_SITE; ?>js/basic.min.js?nocache=1219" defer></script>    
	<script src="<?php echo THIS_SITE; ?>js/jquery-ui.min.js"></script>
  <script src="<?php echo THIS_SITE; ?>js/common.min.js" defer></script>  
  <script src="<?php echo THIS_SITE; ?>js/cookies.js" defer></script>
	<script src="<?php echo THIS_SITE; ?>js/mcp.js?nocache=1020" defer></script> 
  
  
<!--  fb like box Start  -->


<!-- MAILCHIMP POP -->
<style>
.POP_CONT{position:fixed; width:100%;height:100%;z-index:99999; top:0px;left:0px;background:none;}
.POP_MCP{display:none;}
.POP_BG, .POP_BG2{position:absolute;width:100%;height:100%;background:#fff;opacity:0.5;}
.POP_BG2{background:#000;}
.POP{width:auto ;position:absolute;top:50%;left:50%;}
.POP div{position:absolute;left: -361px;    top: -304px;}

.POP > .btn_go{cursor:pointer;width:270px;height:220px;position:absolute;top:-75px;left:0px;}
.POP > .btn_cls{cursor:pointer;width:307px;height:23px;position:absolute;    left: -30px;    top: 150px;}
.POP > .btn_clsx{cursor:pointer;position:absolute;width:20px;height:20px;    left: 285px;    top: -175px;}
.POP > .btn_go {
    cursor: pointer;
    width: 166px;
    height: 40px;
    position: absolute;
    top: 127px;
    left: 0px;
}
.POP > .btn_cls {
    cursor: pointer;
    width: 138px;
    height: 18px;
    position: absolute;
    top: 148px;
    left: 170px;
}
.POP > .btn_clsx{
    width: 24px;
    height: 28px;
    left: 328px;
    top: -175px;
    }
.POP > .mcp_form{
    position: absolute;
    top: -65px;
    left: -17px;
}
.mcp_form  .mce-EMAIL {
    width: 314px;
    height: 38px;
    font-size: 16px;
    color: #333;
    padding: 3px;
}

.mcp_form .mc-field-group.input-group{left: -4px;   top: 45px;}
.mcp_form .mc-field-group.input-group > ul > input[name="group[17][1]"]{display:none;}
.mcp_form .mce_inline_error{left: -1px;    top: -246px;    color: #f00;}
#mcpBox{
    position: fixed;
    background: url('<?php  echo THIS_SITE;?>img/mcp_box_bg.png') no-repeat;
    width: 411px;
    height: 323px;
    z-index: 9999999;
    right: 40px;
    bottom: 30px;    
}
#mcpBox > img {position:absolute;top:0px;left: :0px;}

.mcp_form2 {position:absolute;top:55px;left:42px;}
.mcp_form2  .mce-EMAIL {
    width: 302px;
    height: 30px;
    font-size: 16px;
    color: #333;
    padding: 3px;
}

.mcp_form2  .mc-field-group.input-group{left: -4px; top: 36px;position:absolute;}
.mcp_form2  .mc-field-group.input-group > ul > input[name="group[17][1]"]{display:none;}
.mcp_form2  .mce_inline_error{left: -1px;    top: -246px;    color: #f00;}
#mcpBox .btn_go{
    position:absolute;
    top: 240px;
    left: 124px;
    width: 176px;
    height: 41px;}
#mcpBox .btn_cls{position:absolute;top:3px;left:4px;width:30px;height:30px;}

</style>


<div class="POP_CONT POP_MCP">
  <div class='POP_BG'></div>
  <div class="POP" >        
    <div > <img src="<?php  echo THIS_SITE;?>img/mcp_popup.png"></div>
    
    <div class="mcp_form">
    	 <form action="//tomonews.us2.list-manage.com/subscribe/post?u=28c2f2044f22c46a64747226f&amp;id=8254ba5d15" method="get" id="mc-embedded-subscribe-form1" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	    	 	<div style="position:absolute;top:105px;left:17px;">  
	    	 	 <div class="mc-field-group" style="position:relative;top:0px;left:0px;">    
	    	     <input class="mce-EMAIL" class="required email"   type="email" name="EMAIL" placeholder="Enter your email" style="font-size:14px;"></input>
                 <div for="mce-EMAIL" class="mce_inline_error" id="mce_inline_error_msg"></div>
                 <div style="position: absolute; left: -5000px;display:none"><input type="text" name="b_28c2f2044f22c46a64747226f_8254ba5d15" tabindex="-1" value=""></div>
                 <div class="clear" style="position: absolute; left: -5000px;display:none"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"><input type="hidden" name="SIGNUP" id="SIGNUP" value="TomoUS_PCPopup"/></div>
                </div>     
                <div class="mc-field-group input-group" style="margin-top: 5px;">
                    <ul>
                      <input type="checkbox" value="1" name="group[17][1]" class="mce-group[17]-17-0" id='POP_MCP_chkbox1'><label for="mce-group[17]-17-0"></label>
                      <input type="checkbox" value="2" name="group[17][2]" class="mce-group[17]-17-1" id='POP_MCP_chkbox2'><label for="mce-group[17]-17-1"></label>
                    </ul>
                </div>               
                <div class="clear mail_box_btn invi" class="mailbox_submit" style="position: absolute;  top: 00px;  left: 185px;  width:100px;  height: 30px;  cursor: pointer;">
                </div>
              </div>
         </form>
    </div>
    <div class="btn_go"></div>
    <div class="btn_cls"></div>
    <div class="btn_clsx"></div>
  </div>
</div> 
  <!-- MAILCHIMP POP -->
<!--<div id="fbBox" style="border: 2px #ccc solid;">
	<a href="javascript:closefbbox()"><div id="fbBoxClose" ></div></a>
	<div class="fb-like-box" data-href="https://www.facebook.com/TomonewsUS" data-width="285" data-height="200" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
	
</div>-->
<div id="mcpBox" class="invi" style="">
      <img src="<?php  echo THIS_SITE;?>img/mcp_box_bg.png">
	  <div class="mcp_form2">
            <form action="//tomonews.us2.list-manage.com/subscribe/post?u=28c2f2044f22c46a64747226f&amp;id=8254ba5d15" method="get" id="mc-embedded-subscribe-form2" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	    	 	<div style="position:absolute;top:105px;left:17px;">  
	    	 	 <div class="mc-field-group" style="position:relative;top:0px;left:0px;">    
	    	     <input class="mce-EMAIL" class="required email"   type="email" name="EMAIL" placeholder="Enter your email" style="font-size:14px;"></input>
                 <div for="mce-EMAIL" class="mce_inline_error" id="mce_inline_error_msg2"></div>
           
                 <div style="position: absolute; left: -5000px;display:none"><input type="text" name="b_28c2f2044f22c46a64747226f_8254ba5d15" tabindex="-1" value=""></div>
                 <div class="clear" style="position: absolute; left: -5000px;display:none"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"><input type="hidden" name="SIGNUP" id="SIGNUP" value="TomoUS_PCWidget"/></div>

                </div>     
                <div class="mc-field-group input-group" style="margin-top: 5px;">
                    <ul>
                      <input type="checkbox" value="1" name="group[17][1]" class="mce-group[17]-17-0"  id='mcpBox_chkbox1'><label for="mce-group[17]-17-0"></label>
                      <input type="checkbox" value="2" name="group[17][2]" class="mce-group[17]-17-1"  id='mcpBox_chkbox2'><label for="mce-group[17]-17-1"></label>
                    </ul>
                </div>               
                <div class="clear mail_box_btn invi" class="mailbox_submit" style="position: absolute;  top: 00px;  left: 185px;  width:100px;  height: 30px;  cursor: pointer;">
                </div>
              </div>
         </form>
	  </div>
	  <div class="btn_cls btn"></div>
	  <div class="btn_go btn"></div>
</div>
<div id="nxm_iframeDiv" style = "display:none" ></div>
<div id="nxm_vtrk_iframeDiv" style = "display:none" ></div>
<script>

var _mcp,_mcp2
$(function() {
     _mcp= new MCP();
     _mcp.init('.POP_MCP' , $('#mc-embedded-subscribe-form1'));


     _mcp2= new MCP();
     _mcp2.init('#mcpBox' , $('#mc-embedded-subscribe-form2'));
     
});


</script>
<!--script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script-->

