<?php 
include_once('config.php');
include_once('api_setting.php');
include_once('device.php');
$page=(int)$_GET['page'];
$debug_mode=$_GET['debug_mode'];

if(!is_int($page)||$page==''||$page==0  ){ $page=1; }
$thisURL='index.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>$500 Giveaway</title>
    <meta id="viewport" name="viewport" content="width=device-width, user-scalable=0;">
	
	<meta name="description" content="TomoNews is your daily source for top animated news. We’ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.ico" type="image/icon" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css">
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/giveaway.min.css">
	 <?php  include_once("../head_scripts.php"); ?> 
	<script src="<?php echo THIS_SITE;?>js/all.min.js"></script>
	<script src="<?php echo THIS_SITE;?>/js/movideo.min.latest.js" type="text/javascript"></script>
	
    <style>
      #aboutc{	    	background:#ffb400 url("<?php  echo THIS_SITE; ?>img/kv_giveaway2.gif"	) no-repeat ;background-size: contain;height:1480px;}
	</style>

<script type="application/ld+json"> 
    { 
      "@context": "http://schema.org", 
      "@type": "Webpage", 
      "headline": "$500 Giveaway", 
      "url": "<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>", 
      "thumbnailUrl": "", 
      <?php $cdate22=date("Y-m-d\TH:i:s") ;   $cdate22= $cdate22.'.000Z';?>
      "dateCreated": "<?php  echo $cdate22; ?>", 
      "articleSection": "GIVEAWAY", 
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
</head>
<body>
		<?php  $ad300x50 = $ad_about_300x50;		
		include_once('header.php'); 
		?>	
	<div class="wapper"> 
</div>
	
	<div id="lists">

    <div id="aboutc">
    	<div id="keymoviex">
          

          <div id="keymovie2" ></div>
    	<script>
				$("#keymovie2").player({ apiKey: "movideoNM-Tomo-US", appAlias: {flash:"NMTomoUS-universal-flash",android:"NMTomoUS-universal-android",ipad:"NMTomoUS-universal-iPad",iphone:"NMTomoUS-universal-iPhone"}, mediaId: 259009648902144 ,autoPlay: true, bitrate: 1200000,
		           localeURL: 'player/localization.txt',posterHeight: 280 , posterWidth: 320});
		  </script>

          <div class="btn-toolbar" role="toolbar">  
               <div class="btn-default" data-id=1 ><span>OVERVIEW</span></div>  
               <div class="btn-default" data-id=2 ><span>WINNERS</span></div> 
               <div class="btn-default" data-id=3><span>T&C</span></div>  
          </div>
          <div class="aboutc2" data-id="1" style="height:910px;">
          	<div class="prev_giveaway up">THIS GIVEAWAY HAS ENDED</div>
          	<div class="title_line">HOW IT WORKS</div>
          	<p>- Leave witty comments, spark discussions and engage with the TomoNews community! TomoNews editors will select 5 comments each month based on how much they make us laugh or how insightful they are.</p>
          	<p>- The top comment will receive USD$500, and four runner-up comments will each receive USD$100*</p>
          	<p>- Winners will be announced every month in a TomoNews video and on this event page. The TomoNews team will contact you personally via email.</p>
          	<br><div class="title_line">HOW TO COMMENT</div>
          	<p>- Register to our comments system using Facebook, Twitter, G+, or your personal email and leave a comment, or use the Facebook comments box to leave a Facebook comment under a TomoNews video.</p>
          	<p>- The more you make us laugh or go 'hmmmm', the bigger your chance of winning.</p>
          	<br><div class="title_line">CLAIM YOUR PRIZE</div>
          	<p>- TomoNews will reach out to winners via email or Facebook message within 30 days of the announcement. Winners must provide a full name and valid mailing address to claim the prize.</p>
          	<br><div class="title_line">QUESTIONS?</div>
          	<p>Email us at <a href="mailto:info-us@tomonews.com">info-us@tomonews.com</a></p>
          	<div id="treasure"><img src="<?php  echo THIS_SITE; ?>img/event_deco.png"></div>


             <br><p>*All terms and conditions apply</p><br><br><br><br><br><br><div class="prev_giveaway">See our previous Giveaway <a href="<?php echo THIS_SITE;?>giveaway_old.php"  target="_blank">here!</a></div>
          	<div class='social_bar'>
          		<a href="<?php echo FB_LINKS;?> " target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_fb.png"></a>
          		<a href="<?php echo TWITTER_LINKS;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_twitt.png"></a>
          		<a href="<?php echo GPLUS_LINKS;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_gp.png"></a>
          		<a href="<?php echo YOUTUBE_LINKS;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_yt.png"></a>
          		<a href="<?php echo INSTAGRAM_LINKS;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ig.png"></a>
          	</div>
		  </div>
		  <div class="aboutc2" data-id="2" style="height:690px;">
		  	<div class="prev_giveaway up">THIS GIVEAWAY HAS ENDED</div>
		  	<div class="winner_columns">
		  		<span>JULY</span>
		  		<div class="title_line">Top Commenter</div>
		  		<p>Chadow AngeLs</p><br>
		  		<div class="title_line">Runner Ups</div>
		  		<p>Dippity Doo</p>
		  		<p>Sherri Fox</p>
                <p>Frank Rios</p>
                <p>LOCO TOMO</p>
		  	</div>	
          <div class="winner_columns ">
		  	<span>JUNE</span>
		  		<div class="title_line">Top Commenter</div>
		  		<p>RedRed Robin</p><br>
		  		<div class="title_line">Runner Ups</div>
		  		<p>Aaron Ellis</p>
		  		<p>El Tapatio</p>
                <p>Chiraq Gaming HQ</p>
                <p>Sandra McDonald</p>
		  </div>
		  <div class="winner_columns ">
		  	<span>MAY</span>
		  		<div class="title_line">Top Commenter</div>
		  		<p>Trae Mayberry</p><br>
		  		<div class="title_line">Runner Ups</div>
		  		<p>Earth Laohasereekul </p>
		  		<p>Amber Bandicoot </p>
		  		<p>SummersTime Entertainment </p>
		  		<p>Jonathan_1946</p>
		  </div>  	
            
            <div class="prev_giveaway" style="margin-top: 697px;">

            	<span>See our previous Giveaway <a href="<?php echo THIS_SITE;?>giveaway_old.php"  target="_blank">here!</a></span>
            </div>
          	<div class='social_bar' style="margin:25px auto">
          		<a href="<?php echo FB_LINKS;?> " target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_fb.png"></a>
          		<a href="<?php echo TWITTER_LINKS;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_twitt.png"></a>
          		<a href="<?php echo GPLUS_LINKS;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_gp.png"></a>
          		<a href="<?php echo YOUTUBE_LINKS;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_yt.png"></a>
          		<a href="<?php echo INSTAGRAM_LINKS;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ig.png"></a>
          	</div>
		  </div> 
		  <div class="aboutc2" data-id="3" style="height:1995px;">
		  	<div class="prev_giveaway up">THIS GIVEAWAY HAS ENDED</div>			
		  	<div class="title_line">Terms and Conditions*</div>
		  	<p>Your participation in TomoNews Giveaway (“The Giveaway ” or “Promotion”) shall be deemed to be your complete acceptance of the Terms and Conditions herein. The following are the Terms and Conditions of The Giveaway, which is sponsored by the operator of the Internet site www.tomonews.com ("TomoNews" ).</p><br>
		  	<ol>
		  		<li>Only persons over the age of 18 are eligible for entry to The Giveaway.</li>
		  		<li>To enter, leave a comment under any TomoNews video on <a href="http://www.tomonews.com">www.tomonews.com</a> by signing into Facebook, Twitter, G+ or as a guest with a valid email. Comments left on Youtube, Facebook, Twitter or other sources will be considered ineligible and will not be included. Each entrant are entitled to make multiple entries into The Giveaway but are only eligible to win the prize once.</li>		  		
		  		<li>Entries (comments) must be received by TomoNews during the entry periods stated on the event site (<a href="http://www.tomonews.com/giveaway">www.tomonews.com/giveaway</a>).</li>
		  		<li>1 top commenter and 4 runner-up commenters will be selected within 14 days after the stated promotional date. All winners will be determined by the TomoNews editorial team.</li>
		  		<li>US residents that are selected as top commenter are eligible to the promotional prize of USD$500 (electronic check). For other residents, the promotional prize for winning "The Giveaway" as top commenter shall be an Amazon Gift Card valued at USD$500.</li>
		  		<li>US residents that are selected as runner-up commenters are each eligible to the promotional prize of USD$100 (electronic check). For other residents, the promotional prize for winning "The Giveaway" as runner-up commenter shall be an Amazon Gift Card valued at USD$100.</li>
		  		<li>The Promotional Prize will be mailed out to the winner after providing their full name, valid mailing address, and email.</li>
		  		<li>TomoNews shall notify the winner via E-mail or Facebook messages within thirty (30) days of The Giveaway. The winner shall receive the Promotional Prize within sixty (60) days of confirmation.</li>
		  		<li>Notwithstanding Section 7 above, in the event that, for any reason whatsoever, the Promotional Prize winner fails to respond, within thirty (30) days, to the E-mail notification or Facebook message of his/her winning, such winning entrant shall be deemed to have forfeited his / her claim to the prize and TomoNews shall not have any obligation whatsoever to compensate the winning entrant in any way.</li>
		  		<li>TomoNews decision is final with respect to all matters relating to awarding of the Promotional Prize and shall not be subject to review or appeal by any entrant or by any third party.</li>
		  		<li>Your participation in The Giveaway is considered your agreement that TomoNews may contact you.</li>
		  		<li>By entering the Giveaway each entrant unreservedly agrees to these terms and conditions which govern the Giveaway and the awarding of the Prize.</li>
		  		<li>By entering the Giveaway each entrant agrees to release, discharge and hold harmless TomoNews, its legal representatives, affiliates, subsidiaries, agencies and their respective officers, directors, employees and agents from any damages whatsoever suffered or sustained in connection The Giveaway or the acceptance of the Prize.</li>
		  		<li>The winning entrant shall be solely responsible for any taxes levied in relation to the delivery or receipt of the Promotional Prize.</li>
                <li>TomoNews reserves the right to alter these Terms and Conditions at any time and in its sole discretion.</li>
                <li>TomoNews reserves the right to disclose winner’s name.</li>

		  	</ol>
		  	 <br><br><br><div class="prev_giveaway">See our previous Giveaway <a href="<?php echo THIS_SITE;?>giveaway_old.php"  target="_blank">here!</a></div>
		  	<div class='social_bar' >
          		<a href="<?php echo FB_LINKS;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_fb.png"></a>
          		<a href="<?php echo TWITTER_LINKS;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_twitt.png"></a>
          		<a href="<?php echo GPLUS_LINKS;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_gp.png"></a>
          		<a href="<?php echo YOUTUBE_LINKS;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_yt.png"></a>
          		<a href="<?php echo INSTAGRAM_LINKS;?>" target="_blank"><img src="<?php  echo THIS_SITE; ?>img/icon_ig.png"></a>
          	</div>
		  </div>
		</div>

		
		
	</div>    
 		<div class="cb"></div>
	</div>
	
	<?php  include_once('footer.php'); ?>

</body>
<script>
 


 var  btns_bar={}
	btns_bar.curr=0;
	btns_bar.init = function init(){
		

		$('.btn-default').click(
			function (){ 
			  

				$('.btn-default').removeClass('active');
				$(this).addClass ('active');
				curr = $(this).attr('data-id');       				
				btns_bar.chg_cont(curr);
				var  _hs=[1460 , 1190, 2520];
				var _hsb=[1460+100 , 1160+120, 2490+100]
				$("#aboutc").css('height' , _hs[curr-1]);				
				$("body").css("height" ,  _hsb[curr-1])
			})
		

		$('.btn-default.disable').unbind('click');

		
		$('.btn-default').each(function(){
			if($(this).attr('data-id')==1)
			$(this).addClass ('active');	
		})
		btns_bar.curr=1;
		btns_bar.chg_cont(btns_bar.curr)
	}
	btns_bar.chg_cont = function chg_cont(id){
		$('.aboutc2').each(function(){
			if($(this).attr('data-id')==id)
				{$(this).css('display' , "block");}
			else
				{$(this).css('display' , "none");}
		})
	}
	btns_bar.init();


</script>
</html>