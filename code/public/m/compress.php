<?php 
/*$dir = '/var/www/html/tomo_us/m/img';
$files1 = scandir($dir);
print_r($files1);
foreach ($files1 as $file) 
{
    system('python compressimages.py --perc 60 '.$file);

}*/
$im = new Imagick("sign_up_now2.gif");

/* optimize the image layers */
$im->optimizeImageLayers();

/* write the image back */
$im->writeImages("test_optimized.gif", true);

?>