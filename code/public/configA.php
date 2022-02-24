<?php 
	//API key & alias
define('APPLICATION_URL','https://nextmedia-mcp.anvato.net/api?');
define('APPLICATION_FRONT_PAGE_URL','sa-mcp.storage.googleapis.com/playlists/feeds/js/233.js');
define('APPLICATION_FEED_URL','https://api.nm.anvato.net/v2/feed/');
define('APPLICATION_PRIVATE','3B80540E925B4BB6B5AE7A363AA551C8');
define('APPLICATION_PUBLIC','8353B77A240044B1BA565E0393C18E88');
define('HASHING_ALGORITHM','sha256');

define('ANVATO_PLAYER_SRC','//w3.cdn.anvato.net/player/prod/v3/scripts/anvload.js');
//define('ANVATO_PLAYER_SRC','//w3.cdn.anvato.net/player/prod/scripts/anvload.js');

//METHODS
define('LIST_VIDEOS','<?php xml version="1.0" ?><request><type>list_videos</type><params></params></request>');
define('LIST_VIDEO_IMAGES','<?php xml version="1.0" ?><request><type>list_video_images</type><params></params></request>');
define('LIST_CATEGORIES','<?php xml version="1.0" ?><request><type>list_categories</type><params></params></request>');
define('LIST_PLAYER','<?php xml version="1.0" ?><request><type>list_playlists</type><params></params></request>');
 
define('SESSION_LIFETIME',2400); 
define('PAGE_INDEX_MOV',50); 
define('PAGE_LIMIT_CATEGORY',18); 
define('PAGE_LIMIT_RELATED',8); 
define('PAGE_LIMIT_MOSTVIEWED',15); 
define('PAGE_LIMIT_NEWSFEED' , 18);



define('US_WEBSITE','https://us.tomonews.com/'); 
define('JP_WEBSITE','https://jp.tomonews.com/'); 
define('THIS_SITE', 'https://tomonews.com/' );
define('ROBOT_INDEX', 'index, follow' ); 
define('THIS_SITE_DESKTOP','https://us.tomonews.com/');
		
		// second level 
define('MOBILE_PAGE_LINK','mobileApp'); 
define('ABOUT_PAGE_LINK','about'); 
define('GIVEAWAY_LINK' , 'giveaway');

//APP_GOOGLE_PLAY APP_APPLE_STORE
define('APP_GOOGLE_PLAY','https://play.google.com/store/apps/details?id=com.nextmedia.gan'); 
define('APP_APPLE_STORE','https://itunes.apple.com/app/tomonews/id633875353'); 



		// social links
define('FB_LINKS','https://www.facebook.com/tomonewsus'); 
define('TWITTER_LINKS','https://twitter.com/TomoNewsUS'); 
define('GPLUS_LINKS','https://plus.google.com/+TomoNewsUS/posts'); 
define('YOUTUBE_LINKS','https://www.youtube.com/user/TomoNewsUS/'); 
define('INSTAGRAM_LINKS','http://instagram.com/tomonewsus'); 

define('SUBSCRIBE_TOP_LINKS','http://eepurl.com/0kOuz'); 

define('SITE_TITLE','TomoNews | Animated News, Weird News and Funny Videos'); 
define('SITE_TITLE_SHORT','TomoNews | '); 
define("PIC_CDN" ,'http://media-ssl.nextmedia.com/media-images-586/media/' );

define('IFNSFW_TEST' , 1);

/////META PARAMS
$META_KW = array("news", "news videos", "funny news","animated news","funny videos","animation","Next Animation Studio");

/*NSWFW CDN*/
if(IFNSFW_TEST==1)
{
/*define('TB_TEST' , '/thumbtest');
define('SQ_TEST' , '/squaretest');
define('NSTB_CDN' , '/nsfwthumb');
define('NSSQ_CDN' , '/nsfwsquare');*/
define('TB_TEST' , 'img/thumb.jpg' );
define('SQ_TEST' , 'img/square.jpg');
define('NSTB_CDN' , ''             );
define('NSSQ_CDN' , '/square'             );
}
else
{
define('TB_TEST' , '');
define('SQ_TEST' , '');
define('NSTB_CDN' , '');
define('NSSQ_CDN' , '');
}



	 // site session start
/*session_set_cookie_params(SESSION_LIFETIME);
ini_set('session.gc_maxlifetime', SESSION_LIFETIME);
ini_set('session.cookie_domain', '.tomonews.com');
ini_set('session.cookie_domain', '.ec2-54-169-19-9.ap-southeast-1.compute.amazonaws.com');
session_start();*/

	// menu setting 


$topmenu = array( 
	0=>array(0=>'U.S.',1=>'4476',2=>'#37ded7'),
	1=>array(0=>'Asia',1=>'4478',2=>'#dde200'),
	2=>array(0=>'World',1=>'4477',2=>'#ff540f'),
	3=>array(0=>'Sci&Tech',1=>'4485',2=>'#00d400'),
	4=>array(0=>'Entertainment',1=>'4480',2=>'#ff8c7a'),
	5=>array(0=>'Sports',1=>'4479',2=>'#a257ee'),
	6=>array(0=>'Satire',1=>'4486',2=>'#f391f0'),
	//7=>array(0=>'Universiade',1=>'5130',2=>''),

);


 $menuAry['U.S.']='4476';
 $menuAry['Asia']='4478';
 $menuAry['World']='4477';
 $menuAry['Sci&Tech']='4485';
 $menuAry['Entertainment']='4480';
 $menuAry['Sports']='4479';
 $menuAry['Satire']='4486';
 //$menuAry['Sponsored']='5130';

 $cateRouteAry['us']='4476';
 $cateRouteAry['asia']='4478';
 $cateRouteAry['world']='4477';
 $cateRouteAry['scitech']='4485';
 $cateRouteAry['entertainment']='4480';
 $cateRouteAry['sports']='4479';
 $cateRouteAry['satire']='4486';
 //$cateRouteAry['universiade']='5130';
 
 $catLink['us']='LEDFKXUWEZ4ATGZHKF';
 $catLink['world']='AMDAPWBQE2TAPT3UAG';
 $catLink['asia']='ARBFABSIEI2WKGAHLC';
 $catLink['sports']='KNIRIAL9PFUWEH3YAF';
 $catLink['entertainment']='KSLFMW4ZPZ3RIUREAG';
 $catLink['scitech']='AVDAMX2JE2TRRUKRBE';
 $catLink['satire']='AWJAAWBJPJSRPGTSKD';
 //$catLink['universiade']='A5BAIV2LEJURAGZLAJJA';
 
	// menu - theme setting 

 if(IFNSFW_TEST==1)
 {
 	$toptheme = array( 
	#0=>array(0=>'Nasty or Niiiice'),
	1=>array(0=>'What the Freak?'),
	2=>array(0=>'Good Cop'),
	3=>array(0=>'Bad Cop'),
	4=>array(0=>'Celebrity Shorts'),
	5=>array(0=>'What the Foul?'),
	6=>array(0=>'Aww! Animals!'),
	7=>array(0=>'Defying Death'),
	8=>array(0=>'Gun Crazy'),
	9=>array(0=>'Everyday Heroes'),
	10=>array(0=>'Justice is Served'),
	11=>array(0=>'You Idiot!'),
	12=>array(0=>'Police State'),
	13=>array(0=>'PC Police'),
	14=>array(0=>'Maximum Suffrage'),
    15=>array(0=>'NSFW')
    );
    #$themeRouteAry['nasty-or-niiiice']='0';
    $themeRouteAry['what-the-freak']='1';
    $themeRouteAry['good-cop']='2';
    $themeRouteAry['bad-cop']='3';
    $themeRouteAry['celebrity-shorts']='4';
    $themeRouteAry['what-the-foul']='5';
    $themeRouteAry['aww-animals']='6';
    $themeRouteAry['defying-death']='7';
    $themeRouteAry['gun-crazy']='8';
    $themeRouteAry['everyday-heroes']='9';
    $themeRouteAry['justice-is-served']='10';
    $themeRouteAry['you-idiot']='11';
    $themeRouteAry['police-state']='12';
    $themeRouteAry['pc-police']='13';
    $themeRouteAry['maximum-suffrage']='14';
    $themeRouteAry['nsfw']='15';
	
	$themeLink[0]='KSIWPX4ZPE3ARGAKBB';
	$themeLink[1]='K2JFCWL3PI2AMUAEAF';
	$themeLink[2]='ASJWPWSIPM3AKSRCBE';
	$themeLink[3]='AWLRCV2JP6SAAUZDAC';
	$themeLink[4]='A5DRMWJLE6TRMUTXAD';
	$themeLink[5]='KBIAXV45PBVAAU3WLC';
	$themeLink[6]='KWIWMBU2PE3WKHZGAG';
	$themeLink[7]='KADRMAD5E6TWGTKWKA';
	$themeLink[8]='KNKAXXU9PSVATUIAKE';
	$themeLink[9]='KJNFAXU7QI2RTUCVAF';
	$themeLink[10]='ABNFEB2MQIZWIGCXBG';
	$themeLink[11]='KECWAWU6EV2RKSZNKD';
	$themeLink[12]='KWJRKVL2PNUAEGREAH';
	$themeLink[13]='ASLWMVSIP53RCHAFKF';
	$themeLink[14]='ASIFCVJIPA2AEGTRLE';
	$themeLink[15]='ARAAAABIEBSWGSZHKH';
   
 }
 else
 {
 	$toptheme = array( 
	0=>array(0=>'Nasty or Niiiice'),
	1=>array(0=>'What the Freak?'),
	2=>array(0=>'Good Cop'),
	3=>array(0=>'Bad Cop'),
	4=>array(0=>'Celebrity Shorts'),
	5=>array(0=>'What the Foul?'),
	6=>array(0=>'Aww! Animals!'),
	7=>array(0=>'Defying Death'),
	8=>array(0=>'Gun Crazy'),
	9=>array(0=>'Everyday Heroes'),
	10=>array(0=>'Justice is Served'),
	11=>array(0=>'You Idiot!'),
	12=>array(0=>'Police State'),
	13=>array(0=>'PC Police'),
	14=>array(0=>'Maximum Suffrage'),
	15=>array(0=>'NSFW')
    );
    $themeRouteAry['nasty-or-niiiice']='0';
    $themeRouteAry['what-the-freak']='1';
    $themeRouteAry['good-cop']='2';
    $themeRouteAry['bad-cop']='3';
    $themeRouteAry['celebrity-shorts']='4';
    $themeRouteAry['what-the-foul']='5';
    $themeRouteAry['aww-animals']='6';
    $themeRouteAry['defying-death']='7';
    $themeRouteAry['gun-crazy']='8';
    $themeRouteAry['everyday-heroes']='9';
    $themeRouteAry['justice-is-served']='10';
    $themeRouteAry['you-idiot']='11';
    $themeRouteAry['police-state']='12';
    $themeRouteAry['pc-police']='13';
    $themeRouteAry['maximum-suffrage']='14';
	$themeRouteAry['nsfw']='15';
	
	$themeLink[0]='KSIWPX4ZPE3ARGAKBB';
	$themeLink[1]='K2JFCWL3PI2AMUAEAF';
	$themeLink[2]='ASJWPWSIPM3AKSRCBE';
	$themeLink[3]='AWLRCV2JP6SAAUZDAC';
	$themeLink[4]='A5DRMWJLE6TRMUTXAD';
	$themeLink[5]='KBIAXV45PBVAAU3WLC';
	$themeLink[6]='KWIWMBU2PE3WKHZGAG';
	$themeLink[7]='KADRMAD5E6TWGTKWKA';
	$themeLink[8]='KNKAXXU9PSVATUIAKE';
	$themeLink[9]='KJNFAXU7QI2RTUCVAF';
	$themeLink[10]='ABNFEB2MQIZWIGCXBG';
	$themeLink[11]='KECWAWU6EV2RKSZNKD';
	$themeLink[12]='KWJRKVL2PNUAEGREAH';
	$themeLink[13]='ASLWMVSIP53RCHAFKF';
	$themeLink[14]='ASIFCVJIPA2AEGTRLE';
	$themeLink[15]='ARAAAABIEBSWGSZHKH';
   
 }


 



// ==============================撱����==============================
$ad_index_728x90="<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script> 
 <script type='text/javascript'>
 googletag.cmd.push(function() {
 googletag.defineSlot('/11454485/TomoNews_Website_US_Index_Leaderboard', [728, 90], 'div-gpt-ad-1415247581993-0').addService(googletag.pubads());
 googletag.pubads().enableSingleRequest();
 googletag.enableServices();
 });
 </script><!-- TomoNews_Website_US_Index_Leaderboard --> <div id='div-gpt-ad-1415247581993-0' style='width:728px; height:90px;'> <script type='text/javascript'> googletag.cmd.push(function() { googletag.display('div-gpt-ad-1415247581993-0'); }); </script> </div>";

$ad_index_300x250_1="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_Index_MedRect1', [300, 250], 'div-gpt-ad-1444286146375-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_Index_MedRect1 -->
<div id='div-gpt-ad-1444286146375-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1444286146375-0'); });
</script>
</div>";
	
$ad_index_300x250_2="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_Index_MedRect2', [300, 250], 'div-gpt-ad-1444201320158-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_Index_MedRect2 -->
<div id='div-gpt-ad-1444201320158-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1444201320158-0'); });
</script>
</div>";

$ad_index_300x250_3="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_Index_MedRect3', [300, 250], 'div-gpt-ad-1444201375402-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_Index_MedRect3 -->
<div id='div-gpt-ad-1444201375402-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1444201375402-0'); });
</script>
</div>";
	
$ad_category_300x600="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_Category_HalfPageAd', [300, 600], 'div-gpt-ad-1444201488066-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_Category_HalfPageAd -->
<div id='div-gpt-ad-1444201488066-0' style='height:600px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1444201488066-0'); });
</script>
</div>";
	
$ad_category_300x250_1="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_Category_MedRect1', [300, 250], 'div-gpt-ad-1444201542381-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_Category_MedRect1 -->
<div id='div-gpt-ad-1444201542381-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1444201542381-0'); });
</script>
</div>";

	
$ad_category_300x250_2="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_Category_MedRect2', [300, 250], 'div-gpt-ad-1444286323068-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_Category_MedRect2 -->
<div id='div-gpt-ad-1444286323068-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1444286323068-0'); });
</script>
</div>";

	

$ad_about_728x90="<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Website_US_About_Leaderboard', [728, 90], 'div-gpt-ad-1416350088882-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script>
<!-- TomoNews_Website_US_About_Leaderboard -->
<div id='div-gpt-ad-1416350611259-0' style='width:728px; height:90px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1416350611259-0'); });
</script>
</div>";
	
$ad_video_728x90="<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Website_US_Video_Leaderboard', [728, 90], 'div-gpt-ad-1416350381909-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script>
<!-- TomoNews_Website_US_Video_Leaderboard -->
<div id='div-gpt-ad-1416350478877-0' style='width:728px; height:90px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1416350478877-0'); });
</script>
</div>";

$ad_video_300x250_1="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_Video_MedRect1', [300, 250], 'div-gpt-ad-1442562569151-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_Video_MedRect1 -->
<div id='div-gpt-ad-1442562569151-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1442562569151-0'); });
</script>
</div>";/*passback code*/

$ad_video_300x250_2="<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_Video_MedRect2', [300, 250], 'div-gpt-ad-1442562598686-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_Video_MedRect2 -->
<div id='div-gpt-ad-1442562598686-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1442562598686-0'); });
</script>
</div>";/*passback code*/
	
$ad_video_300x600 ="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_Video_HalfPageAd', [300, 600], 'div-gpt-ad-1442562628097-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_Video_HalfPageAd -->
<div id='div-gpt-ad-1442562628097-0' style='height:600px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1442562628097-0'); });
</script>
</div>";/*passback code*/

/*$ad_search_728x90="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Website_US_Search_Leaderboard', [728, 90], 'div-gpt-ad-1416350238162-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script>
<!-- TomoNews_Website_US_Search_Leaderboard -->
<div id='div-gpt-ad-1416350575807-0' style='width:728px; height:90px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1416350575807-0'); });
</script>
</div>";*/

$ad_search_728x90="
<script>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_Search_Leaderboard', [728, 90], 'div-gpt-ad-1486707042181-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script>
<!-- /11454485/TomoNews_Website_US_Search_Leaderboard -->
<div id='div-gpt-ad-1486707042181-0' style='height:90px; width:728px;'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1486707042181-0'); });
</script>
</div>";

$ad_search_300x250="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_Search_MedRect', [300, 250], 'div-gpt-ad-1437022102193-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_Search_MedRect -->
<div id='div-gpt-ad-1437022102193-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1437022102193-0'); });
</script>
</div>";
	
$ad_mobile_728x90="<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Website_US_Mobile_Leaderboard', [728, 90], 'div-gpt-ad-1416350218229-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script>
<!-- TomoNews_Website_US_Mobile_Leaderboard -->
<div id='div-gpt-ad-1416350588556-0' style='width:728px; height:90px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1416350588556-0'); });
</script>
</div>";
	

$ad_theme_300x600="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Website_US_Newsfeed_HalfPageAd', [300, 600], 'div-gpt-ad-1426839850459-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Website_US_Newsfeed_HalfPageAd -->
<div id='div-gpt-ad-1426839850459-0' style='width:300px; height:600px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1426839850459-0'); });
</script>
</div>";

$ad_theme_300x250_1="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Website_US_Newsfeed_MedRect', [300, 250], 'div-gpt-ad-1426843195448-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Website_US_Newsfeed_MedRect -->
<div id='div-gpt-ad-1426843195448-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1426843195448-0'); });
</script>
</div>";


$ad_theme_300x250_2="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Website_US_Newsfeed_MedRect2', [300, 250], 'div-gpt-ad-1426843283544-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Website_US_Newsfeed_MedRect2 -->
<div id='div-gpt-ad-1426843283544-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1426843283544-0'); });
</script>
</div>";

$ad_video_970x90= "
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_Video_Large_Leaderboard', [970, 90], 'div-gpt-ad-1442562506386-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_Video_Large_Leaderboard -->
<div id='div-gpt-ad-1442562506386-0' style='height:90px; width:970px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1442562506386-0'); });
</script>
</div>";




$ad_nf_300x600="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Website_US_Newsfeed_HalfPageAd', [300, 600], 'div-gpt-ad-1426839850459-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Website_US_Newsfeed_HalfPageAd -->
<div id='div-gpt-ad-1426839850459-0' style='width:300px; height:600px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1426839850459-0'); });
</script>
</div>";

$ad_nf_300x250_1="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Website_US_Newsfeed_MedRect', [300, 250], 'div-gpt-ad-1426843195448-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Website_US_Newsfeed_MedRect -->
<div id='div-gpt-ad-1426843195448-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1426843195448-0'); });
</script>
</div>";

$ad_nf_300x250_2="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Website_US_Newsfeed_MedRect2', [300, 250], 'div-gpt-ad-1426843283544-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Website_US_Newsfeed_MedRect2 -->
<div id='div-gpt-ad-1426843283544-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1426843283544-0'); });
</script>
</div>";

$ad_mv_300x250_1="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_MostViewedVideos_MedRect1', [300, 250], 'div-gpt-ad-1437043239049-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_MostViewedVideos_MedRect1 -->
<div id='div-gpt-ad-1437043239049-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1437043239049-0'); });
</script>
</div>";

$ad_mv_300x250_2="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_MostViewedVideos_MedRect2', [300, 250], 'div-gpt-ad-1437043265338-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_MostViewedVideos_MedRect2 -->
<div id='div-gpt-ad-1437043265338-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1437043265338-0'); });
</script>
</div>";

$ad_mv_300x250_3="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_MostViewedVideos_MedRect3', [300, 250], 'div-gpt-ad-1437043286732-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_MostViewedVideos_MedRect3 -->
<div id='div-gpt-ad-1437043286732-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1437043286732-0'); });
</script>
</div>";

$ad_psv_300x250="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_LeanBackPage_MedRect1', [300, 250], 'div-gpt-ad-1439196972565-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_LeanBackPage_MedRect1 -->
<div id='div-gpt-ad-1439196972565-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1439196972565-0'); });
</script>
</div>";
$ad_psv_728x90 ="

<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Website_US_LeanBackPage_Leaderboard1', [728, 90], 'div-gpt-ad-1439197004764-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Website_US_LeanBackPage_Leaderboard1 -->
<div id='div-gpt-ad-1439197004764-0' style='height:90px; width:728px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1439197004764-0'); });
</script>
</div>";

$ad_video_970x90 ="
<script>
googletag.cmd.push(function() { 
googletag.defineSlot('/11454485/TomoNews_Website_US_Video_Banner', [468, 60], 'div-gpt-ad-1531814029952-0').addService(googletag.pubads()); 
googletag.pubads().enableSingleRequest(); 
googletag.enableServices(); 
}); 
</script><!-- /11454485/TomoNews_Website_US_Video_Banner --> 
<div id='div-gpt-ad-1531814029952-0' style='height:60px; width:468px;'> 
<script> 
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1531814029952-0'); }); 
</script> 
</div>";/*passback code*/ 

?>
