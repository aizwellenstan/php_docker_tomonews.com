<?php 
include_once('config.php');
include_once('api_setting.php');
//  //ini_set('display_errors', true) ;
 $video_id=$_GET['identifier'];
// $debug_mode=$_GET['debug_mode'];

 //$getUrls=get_videoshow($video_id);
 //$data2=curl_info($getUrls);

// $dAry=json_decode($data2, true);


 $title=$_GET['identifier'];
// $des=$dAry['media']['description'];
// $cdate=date('Y/m/d',strtotime($dAry['media']['creationDate'])) ;
// $counter=$dAry['media']['mediaPlays']['total'];
// $mobDes='';

// $dArynCat=$dAry['media']['tags'][0]['tag']; 
//     foreach ($dArynCat as $Catkey => $Catval) {
//         $pos = strpos($Catval['tag'],'mobile:description=');
//         //echo $pos,'<br>',$Catval['tag'],'<hr>';
//         if(gettype($pos)=='integer'){  $mobDes= str_replace('mobile:description=','',$Catval['tag']) ; }

//         $pos2 = strpos($Catval['tag'],'theme:name');
//         if(gettype($pos2)=='integer'){  $thmenName= str_replace('theme:name=','',$Catval['tag']) ; }
//     }
//http://us.tomoplace.net/disqus/mobile.html?
//shortname=tomonews-us&url=http%3A%2F%2Fus.tomoplace.net%2FBoy-has-232-teeth-removed-from-his-lower-jaw-114902758703104&title=Boy+has+232+teeth+removed+from+his+lower+jaw&identifier=114902758703104
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php  site_title_name() ?> <?php  echo $title; ?></title>
<link rel="stylesheet" href="stylesheets/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://static.nmhk.movideo.com/js/movideo.min.latest.js"></script>
	<script src="<?php  echo THIS_SITE; ?>js/jquery.zclip.min.js"></script>
<body>
<div id="disqus">
					<div id="disqus_thread"></div>
					<script type="text/javascript">
					    var disqus_shortname = 'tomonews-us'; 		    
		    		    var disqus_url = '<?php  echo THIS_SITE; ?>disqus/mobile.html?shortname=tomonews-us&url=<?php  echo urlencode(THIS_SITE.remove_punc($title).'-'.$video_id) ?>&identifier=<?php  echo $video_id; ?>'; 
		
					    (function() {
					        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
					        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
					        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
					    })();
					</script>
					<style>
						#disqus_thread {
							color: black;
						}
						#disqus_thread a {
							color: #FF6600;
						}
					</style>
				</div>
</body>
</html>