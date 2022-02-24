
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title>test</title>
		<meta name=viewport content="width=1200px">
		<meta name="apple-itunes-app" content="app-id=633875353">
		<meta name="google-play-app" content="app-id=com.nextmedia.gan">
		<meta name="description" content="TomoNews is your daily source for top animated news. We’ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
		<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
		
		<link rel="apple-touch-icon-precomposed" href=""/>
		
		<link rel="icon" href="img/favicon.ico" type="image/icon" />
		
		<link rel="stylesheet" href="stylesheets/style.min.css">
		<link href="https://www-video360-dev.kolorbox.com/sphereplayer/sphereplayer.css" rel="stylesheet">
		<script src="https://www-video360-dev.kolorbox.com/lib/underscore/underscore-min.js"></script>
		<script src="https://www-video360-dev.kolorbox.com/sphereplayer/threejs/three.min.js"></script>
		<script src="https://www-video360-dev.kolorbox.com/sphereplayer/threejs/StereoEffect.js"></script>
		<script src="https://www-video360-dev.kolorbox.com/sphereplayer/threejs/OrbitControls.js"></script>
		<script src="https://www-video360-dev.kolorbox.com/sphereplayer/threejs/DeviceOrientationController.js"></script>
		<script src="https://www-video360-dev.kolorbox.com/sphereplayer/sphereplayer.js"></script>
		<script src="js/all.min.js"></script>  
</head>
 <body ng-app="starter">
 	<!-- http://video-pdu.us.tomonews.com/encoded-302189906018304/media/320043550097408/5841000-2000x1000.mp4 -->
 	   <h1>GENERAL PLAYER</h1>
		<video width="100%" height="auto" controls>
		<source src="http://video-pdu.us.tomonews.com/encoded-302189906018304/media/320043550097408/5841000-2000x1000.mp4" type="video/mp4">
		Your browser does not support the video tag.
		</video>
<h1>KOLORBOX 360 PLAYER</h1>
     <div  id="sphereplayer"></div>
</body>
<script>
$(function(){
	 var spherePlayer = new SpherePlayer({
		containerID : "sphereplayer",
		hasNextVideo : false,
		hasPreviousVideo : false,
		videoEventCallback : function(event) {
			console.log("event : ", event);
		},
		videoProgressCallback : function(t, percent) {
		}

	});
	 
	 /*KOLORBOX get corssdomain video source from movideo*/  
	 spherePlayer.loadVideo ( "http://video-pdu.us.tomonews.com/encoded-302189906018304/media/320043550097408/5841000-2000x1000.mp4", '')
})
</script>
</html>