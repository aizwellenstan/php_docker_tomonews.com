<?php 
	//API key & alias
define('APPLICATION_URL','http://nextmedia-mcp.anvato.net/api?');
define('APPLICATION_FRONT_PAGE_URL','sa-mcp.storage.googleapis.com/playlists/feeds/js/233.js');
define('APPLICATION_FEED_URL','http://api.nm.anvato.net/v2/feed/');
define('APPLICATION_PRIVATE','3B80540E925B4BB6B5AE7A363AA551C8');
define('APPLICATION_PUBLIC','8353B77A240044B1BA565E0393C18E88');
define('HASHING_ALGORITHM','sha256');

define('ANVATO_PLAYER_SRC','//w3.cdn.anvato.net/player/prod/v3/scripts/anvload.js');
//define('ANVATO_PLAYER_SRC','//w3.cdn.anvato.net/player/prod/scripts/anvload.js');

//METHODS
define('LIST_VIDEOS','<?php xml version="1.0" ?><request><type>list_videos</type><params></params></request>');
define('LIST_VIDEO_IMAGES','<?php xml version="1.0" ?><request><type>list_video_images</type><params></params></request>');
define('LIST_CATEGORIES','<?php xml version="1.0" ?><request><type>list_categories</type><params></params></request>');
  
define('SESSION_LIFETIME',2400); 
define('PAGE_INDEX_MOV',50); 
define('PAGE_LIMIT_CATEGORY',25); 
define('PAGE_LIMIT_RELATED',8); 
define('PAGE_LIMIT_MOSTVIEWED',12); 
define('PAGE_LIMIT_NEWSFEED' , 25);

$if_test = strpos( strtolower( $_SERVER['SERVER_NAME'] )  ,'amazonaws');
$if_test2= strpos( strtolower( $_SERVER['SERVER_NAME'] )  ,'campaigns');
$if_test3= strpos( strtolower( $_SERVER['SERVER_NAME'] )  ,'tomoplace');
$if_test4= strpos( strtolower( $_SERVER['SERVER_NAME'] )  ,'tomonews.com');
$if_test5= strpos( strtolower( $_SERVER['SERVER_NAME'] )  ,'intranet01');

if( is_int($if_test5) ){
define('US_WEBSITE','http://intranet01/tomonews/tomo_us/m/'); 
define('JP_WEBSITE','http://jp.tomonews.com/'); 
define('THIS_SITE', 'http://intranet01/tomonews/tomo_us/m/' );
define('THIS_SITE_DESKTOP','http://us.tomonews.com/');
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);	
}
elseif( is_int($if_test4) )
{
define('US_WEBSITE','http://us.tomonews.com/m/'); 
define('JP_WEBSITE','http://jp.tomonews.com/'); 
define('THIS_SITE', 'http://us.tomonews.com/m/' );
define('ROBOT_INDEX', 'index, follow' );
define('THIS_SITE_DESKTOP','http://us.tomonews.com/');
}
elseif(is_int($if_test3))
{
define('US_WEBSITE','http://us.tomoplace.net/m/'); 
define('THIS_SITE', '//us.tomoplace.net/m/' ); 
define('ROBOT_INDEX', 'noindex' ); 
define('THIS_SITE_DESKTOP','http://us.tomonews.com/');
}

	// second level 
define('MOBILE_PAGE_LINK','mobileApp'); 
define('ABOUT_PAGE_LINK','about'); 
define('GIVEAWAY_LINK' , 'giveaway');

//APP_GOOGLE_PLAY APP_APPLE_STORE
define('APP_GOOGLE_PLAY','https://play.google.com/store/apps/details?id=com.nextmedia.gan'); 
define('APP_APPLE_STORE','https://itunes.apple.com/app/tomonews/id633875353');  


define("PIC_CDN" ,'http://media-ssl.nextmedia.com/media-images-586/media/' );
/*NSWFW CDN*/
define('IFNSFW_TEST' , 1);

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

		// social links
define('FB_LINKS','https://www.facebook.com/TomonewsUS'); 
define('TWITTER_LINKS','https://twitter.com/TomoNewsUS'); 
define('GPLUS_LINKS','https://plus.google.com/+TomoNewsUS/posts'); 
define('YOUTUBE_LINKS','https://www.youtube.com/user/TomoNewsUS'); 
define('INSTAGRAM_LINKS','http://instagram.com/tomonewsus'); 

define('SUBSCRIBE_TOP_LINKS','http://eepurl.com/0kOuz'); 

define('SITE_TITLE','TomoNews | Animated News, Weird News and Funny Videos'); 
define('SITE_TITLE_SHORT','TomoNews | '); 

/////META PARAMS
$META_KW = array("news", "news videos", "funny news","animated news","funny videos","animation","Next Animation Studio");



	 /*// site session start
session_set_cookie_params(SESSION_LIFETIME);
ini_set('session.gc_maxlifetime', SESSION_LIFETIME);
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
	14=>array(0=>'Maximum Suffrage')
	
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

// ==============================廣告==============================
$ad_index_300x50="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Mobile_US_Home_Banner_new', [320, 50], 'div-gpt-ad-1444202626360-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Mobile_US_Home_Banner_new -->
<div id='div-gpt-ad-1444202626360-0' style='height:50px; width:320px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1444202626360-0'); });
</script>
</div>";
	

$ad_index_300x250_1="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Mobile_US_Category_MedRect1', [300, 250], 'div-gpt-ad-1418683387388-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Mobile_US_Category_MedRect1 -->
<div id='div-gpt-ad-1418683387388-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418683387388-0'); });
</script>
</div>";
	
$ad_index_300x250_2="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Mobile_US_Category_MedRect2', [300, 250], 'div-gpt-ad-1418683419859-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Mobile_US_Category_MedRect2 -->
<div id='div-gpt-ad-1418683419859-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418683419859-0'); });
</script>
</div>";
	
$ad_category_300x50="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Mobile_US_Category_Banner', [320, 50], 'div-gpt-ad-1418700960464-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Mobile_US_Category_Banner -->
<div id='div-gpt-ad-1418700960464-0' style='width:320px; height:50px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418700960464-0'); });
</script>
</div>";
	
$ad_category_300x250_1="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Mobile_US_Category_MedRect1', [300, 250], 'div-gpt-ad-1418683387388-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Mobile_US_Category_MedRect1 -->
<div id='div-gpt-ad-1418683387388-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418683387388-0'); });
</script>
</div>";


$ad_category_300x250_2="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Mobile_US_Category_MedRect2', [300, 250], 'div-gpt-ad-1418683419859-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Mobile_US_Category_MedRect2 -->
<div id='div-gpt-ad-1418683419859-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418683419859-0'); });
</script>
</div>";

$ad_theme_300x50 = "
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Mobile_US_Theme_Banner', [320, 50], 'div-gpt-ad-1418701018400-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Mobile_US_Theme_Banner -->
<div id='div-gpt-ad-1418701018400-0' style='width:320px; height:50px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418701018400-0'); });
</script>
</div>";

$ad_theme_300x250_1 = "

<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Mobile_US_Theme_MedRect1', [300, 250], 'div-gpt-ad-1418683490013-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Mobile_US_Theme_MedRect1 -->
<div id='div-gpt-ad-1418683490013-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418683490013-0'); });
</script>
</div>";
$ad_theme_300x250_2 = "
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Mobile_US_Theme_MedRect2', [300, 250], 'div-gpt-ad-1418683522745-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Mobile_US_Theme_MedRect2 -->
<div id='div-gpt-ad-1418683522745-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418683522745-0'); });
</script>
</div>";

$ad_about_300x50="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Mobile_US_About_Banner1', [320, 50], 'div-gpt-ad-1418701215833-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Mobile_US_About_Banner1 -->
<div id='div-gpt-ad-1418701215833-0' style='width:320px; height:50px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418701215833-0'); });
</script>
</div>";



$ad_video_320x50="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Mobile_US_Video_Banner2', [320, 50], 'div-gpt-ad-1442562739367-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Mobile_US_Video_Banner2 -->
<div id='div-gpt-ad-1442562739367-0' style='height:50px; width:320px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1442562739367-0'); });
</script>
</div>";/*passback code*/

$ad_video_320x50_2="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Mobile_US_Video_Banner', [320, 50], 'div-gpt-ad-1442562701454-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Mobile_US_Video_Banner -->
<div id='div-gpt-ad-1442562701454-0' style='height:50px; width:320px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1442562701454-0'); });
</script>
</div>";/*passback code*/



$ad_video_300x250_1="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Mobile_US_Video_MedRect1', [300, 250], 'div-gpt-ad-1442562775203-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script>
</script><!-- /11454485/TomoNews_Mobile_US_Video_MedRect1 -->
<div id='div-gpt-ad-1442562775203-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1442562775203-0'); });
</script>
</div>";
/*
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Mobile_US_Video_MedRect1', [300, 250], 'div-gpt-ad-1418683607374-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Mobile_US_Video_MedRect1 -->
<div id='div-gpt-ad-1418683607374-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418683607374-0'); });
</script>
</div>
*/


$ad_passive_300x50="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Mobile_US_TomoPlay_Banner', [320, 50], 'div-gpt-ad-1445394712440-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Mobile_US_TomoPlay_Banner -->
<div id='div-gpt-ad-1445394712440-0' style='height:50px; width:320px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1445394712440-0'); });
</script>
</div>";

$ad_search_300x50="
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Mobile_US_Search_Banner', [320, 50], 'div-gpt-ad-1418701162466-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Mobile_US_Search_Banner -->
<div id='div-gpt-ad-1418701162466-0' style='width:320px; height:50px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418701162466-0'); });
</script>
</div>";
$ad_search_300x250_1="

<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Mobile_US_Search_MedRect1', [300, 250], 'div-gpt-ad-1418683685870-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Mobile_US_Search_MedRect1 -->
<div id='div-gpt-ad-1418683685870-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418683685870-0'); });
</script>
</div>";
$ad_search_300x250_2="

<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11454485/TomoNews_Mobile_US_Search_MedRect2', [300, 250], 'div-gpt-ad-1418683712207-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script><!-- TomoNews_Mobile_US_Search_MedRect2 -->
<div id='div-gpt-ad-1418683712207-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418683712207-0'); });
</script>
</div>";

$ad_mobile_300x50="<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script><!-- TomoNewsUS Category Leaderboard 300x50, created 20131021 --><ins class=\"adsbygoogle\" style=\"display:inline-block;width:300px;height:50px\" data-ad-client=\"ca-pub-9055363838018105\" data-ad-slot=\"7387873249\"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script>";
	/*"<script type='text/javascript'>
	googletag.cmd.push(function() {
	googletag.defineSlot('/7476/TomoNews_Website_US/mobile/leaderboard', [728, 90], 'div-gpt-ad-1407831197139-0').addService(googletag.pubads());
	googletag.pubads().enableSingleRequest();
	googletag.enableServices();
	});
	</script>
	<!-- TomoNews_Website_US/mobile/leaderboard -->
	<div id='div-gpt-ad-1407831197139-0' style='width:728px; height:90px;'>
	<script type='text/javascript'>
	googletag.cmd.push(function() { googletag.display('div-gpt-ad-1407831197139-0'); });
	</script>
	</div>";*/

$ad_nf_300x50="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Mobile_US_Newsfeed_Banner', [320, 50], 'div-gpt-ad-1430122322504-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Mobile_US_Newsfeed_Banner -->
<div id='div-gpt-ad-1430122322504-0' style='height:50px; width:320px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1430122322504-0'); });
</script>
</div>";

$ad_nf_300x250_1 = "
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Mobile_US_Newsfeed_MedRect1', [300, 250], 'div-gpt-ad-1433825574964-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Mobile_US_Newsfeed_MedRect1 -->
<div id='div-gpt-ad-1433825574964-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1433825574964-0'); });
</script>
</div>";
$ad_nf_300x250_2 = "
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Mobile_US_Newsfeed_MedRect2', [300, 250], 'div-gpt-ad-1433825640231-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Mobile_US_Newsfeed_MedRect2 -->
<div id='div-gpt-ad-1433825640231-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1433825640231-0'); });
</script>
</div>";

$ad_mv_320X501="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Mobile_US_MostViewedVideos_Banner', [320, 50], 'div-gpt-ad-1444286384841-0').addService(googletag.pubads());
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Mobile_US_MostViewedVideos_Banner -->
<div id='div-gpt-ad-1444286384841-0' style='height:50px; width:320px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1444286384841-0'); });
</script>
</div>";

$ad_mv_300X250_1="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Mobile_US_MostViewedVideos_MedRect', [300, 250], 'div-gpt-ad-1440493070948-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Mobile_US_MostViewedVideos_MedRect -->
<div id='div-gpt-ad-1440493070948-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1440493070948-0'); });
</script>
</div>";
$ad_mv_300X250_2="
<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineSlot('/11454485/TomoNews_Mobile_US_MostViewedVideos_MedRect2', [300, 250], 'div-gpt-ad-1440493089502-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script><!-- /11454485/TomoNews_Mobile_US_MostViewedVideos_MedRect2 -->
<div id='div-gpt-ad-1440493089502-0' style='height:250px; width:300px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1440493089502-0'); });
</script>
</div>";
?>