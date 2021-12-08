<?php
try {
    if(isset($_REQUEST['createzip']) and $_REQUEST['createzip']!=""){
        extract($_REQUEST);
        
        $filename	=	'photos.zip';
        $myfile = fopen("/var/www/html/public/_files/log/log.txt", "a") or die("Unable to open file!");
        $txt = "zip"+$fileId;
        fwrite($myfile, "\n". $txt);
        
        // $zip = new ZipArchive;
        // if ($zip->open($filename,  ZipArchive::CREATE)){
        //     $myfile = fopen("/var/www/html/public/_files/log/log.txt", "a") or die("Unable to open file!");
        //     $txt = "zip";
        //     fwrite($myfile, "\n". $txt);
            
            
        //     $zip->close();
            
        //     header("Content-type: application/zip"); 
        //     header("Content-Disposition: attachment; filename=$filename");
        //     header("Content-length: " . filesize($filename));
        //     header("Pragma: no-cache"); 
        //     header("Expires: 0"); 
        //     readfile("$filename");
        //     unlink($filename);
        // }else{
        // echo 'Failed!';
        // }
    }
} catch ( Exception $e ) {
    $myfile = fopen("/var/www/html/public/_files/log/log.txt", "a") or die("Unable to open file!");
    $txt = "zip";
    fwrite($myfile, "\n". $txt);
}
?>