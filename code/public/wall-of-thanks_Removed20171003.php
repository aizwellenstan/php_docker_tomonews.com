<?php 
///////////////////////////////
///  #3.0測試  
///  Program Log .Taboola update.......
///  
//////////////////////////////
include_once('configA.php');
include_once('api_settingA.php');
include_once('device.php');
//include_once('lang_redirect.php');

$thisURL=THIS_SITE;
?>

<!DOCTYPE html>
<html>
  <head>
	
	<title><?php  site_title() ?></title>
	<meta name="google-site-verification" content="LNkk7F3gMpWHgnHPEz5vsFDYBjONRopvjCGwaypBy6c" />
  <meta name=viewport content="width=1200px">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="apple-itunes-app" content="app-id=633875353">
	<meta name="google-play-app" content="app-id=com.nextmedia.gan">
	<meta name="description" content="TomoNews is your daily source for top animated news. We’ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<meta property="fb:pages" content="148740698487405" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?v=1" type="image/png" />
	<link rel="stylesheet" type="text/css" href="//cloud.typography.com/7365156/7009372/css/fonts.css" />
	<link href="//fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet">
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css?nocache=0901">
  <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/jquery-ui.min.css">
  <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/index.min.css?nocache=1203" type="text/css" media="screen">
  <?php  include_once("head_scripts.php"); ?>
	<script src="<?php echo THIS_SITE; ?>js/all.min.js?nocache=2"></script>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
   <link rel="canonical" href="<?php  echo THIS_SITE; ?>" />
  <link rel="alternate" media="only screen and (max-width: 640px)" href="<?php  echo THIS_SITE.'m/'; ?>" />
  <script>
  var controlWOT = true;
 // $(document).ready(function () {
	jQuery(window).on("scroll", function(e) {
	  if ($(this).scrollTop() > 10) {

		document.getElementById("header").classList.add("fix-search");
	  } else {
		document.getElementById("header").classList.remove("fix-search");
	  }
	});
//});
</script>
<style>
html { overflow: scroll;overflow-x: hidden; }
::-webkit-scrollbar {
    width: 0px;  /* remove scrollbar space */
    background: transparent;  /* optional: just make scrollbar invisible */
}
/* optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: transparent;
}
#vdo_content { top: 120px;width:100%;width: 970px;padding: 0px 15px 15px 25px;position: relative;display: table;margin: 0 auto; }
h1#vdo_title { text-align: center;border-bottom: 0px solid #c4c6c9;font-size: 35pt; }
div#vdo_inf{ font-size:17px;font-weight: 600; }
#vdo_inf p { color: gray;font-weight: normal; }
.div-table{
  display:table;         
  width:100%;                         
  border-spacing:5px;/*cellspacing:poor IE support for  this*/
}
.div-table-row{
  display:table-row;
  width:100%;
  clear:both;
}
.div-table-col{
  float:left;/*fix for  buggy browsers*/
  display:table-column;         
  width:20%;  
  font-weight:normal;
}
</style>
</head>

<body>

	<div id ="wapper" class="wapper"> 
		<?php  include_once('header.php'); ?>	
	</div>

    <div id="vdo_wapper" style="top:50px;">
		<div id="vdo_content">
			<h1 id="vdo_title" style="font-family: 'Droid Serif', serif;">WALL OF THANKS</h1>
			<div id="vdo_inf">
				<iframe width="970" height="557" src="https://www.youtube.com/embed/45rlSixTn4I" frameborder="0" allowfullscreen></iframe></iframe><br>
				<br><br><p>The individuals below have helped out tremendously in the creation of TomoNews content.</p><br>
				<p>If you'd like to see your name here check out our <a href="https://www.patreon.com/tomonews" target="_blank">Patreon page</a>. We'd also like to give a big thank you to everyone else — you know who you are.</p></br>
				<p>Thank you again for supporting TomoNews!</p></br></br>
				<h2>Directors</h2>
				<div class="div-table">
					<div class="div-table-row">
						<div class="div-table-col">Kris Simpson</div>
						<div class="div-table-col">Winston Newton</div>
						<div class="div-table-col">Vincent Millage</div>
						<div class="div-table-col">David Innes</div>
						<div class="div-table-col">Matt Floto</div>
					</div>
					<div class="div-table-row">
						<div class="div-table-col">Lance B</div>
						<div class="div-table-col">Cheeki Breeki</div>
					</div>
				</div>
				<br><br><h2>Producer</h2>
				<div class="div-table">
					<div class="div-table-row">
						<div class="div-table-col">Jake Kitchen</div>	
						<div class="div-table-col">Daniel Smirnou</div>
						<div class="div-table-col">Goatse</div>
						<div class="div-table-col">Ivan Lagunes</div>
					</div>
					<div class="div-table-row">
						<div class="div-table-col">Gary Des Roches</div>	
						<div class="div-table-col">Chip Chapin</div>
						<div class="div-table-col">Silang Sang</div>
						<div class="div-table-col">Kizzume Fowler</div>
					</div>
				</div>
				<br><br><h2>Key Grip</h2>
					<div class="div-table">
						<div class="div-table-row">	
							<div class="div-table-col">Stephen Kwong</div>
							<div class="div-table-col">Juan Camilo Rodriguez</div>		
							<div class="div-table-col">Jackie</div>
							<div class="div-table-col">Felipe Rivera</div>	
							<div class="div-table-col">repsycl3d</div>							
						</div>
						<div class="div-table-row">
							<div class="div-table-col">Harry from YouTube</div>
							<div class="div-table-col">Andrew Wang</div>
							<div class="div-table-col">CaseAgainstFaith1</div>
							<div class="div-table-col">Grant Ross</div>
							<div class="div-table-col">Andrew Wang</div>
						</div>
						<div class="div-table-row">
							<div class="div-table-col">Nipz Keem</div>
							<div class="div-table-col">Chanon Lophanitchakun</div>
							<div class="div-table-col">Nicole Pardon</div>
							<div class="div-table-col">Kyubi_max</div>
							<div class="div-table-col">Billyds123</div>
						</div>
						<div class="div-table-row">
							<div class="div-table-col">Jackie</div>
							<div class="div-table-col">Joey Fiorentino</div>
							<div class="div-table-col">SkyBoxEye</div>
						</div>
					</div>
			</div>
			
		</div>
	</div>


  <script src="<?php echo THIS_SITE; ?>js/config.js?nocache=1112" defer></script>
  <script src="<?php echo THIS_SITE; ?>js/basic.min.js?nocache=1219" defer></script>    
	<script src="<?php echo THIS_SITE; ?>js/jquery-ui.min.js"></script>
  <script src="<?php echo THIS_SITE; ?>js/common.min.js" defer></script>  
  <script src="<?php echo THIS_SITE; ?>js/cookies.js" defer></script>
<script>

  $(document).ready(function() {

    function getPageScrollPercent()
    {
      var bottom = $(window).height()  + $(window).scrollTop() -300;
      var height = $(document).height();
      return Math.round(100*bottom/height);
    }

  });
</script>
<?php  //include_once('footer.php'); ?>

</body>
</html>



