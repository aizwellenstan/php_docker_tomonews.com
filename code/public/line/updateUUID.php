<?php 

try {
	$category = $_GET['cate'];
	if(file_exists("uuid/$category")){
    	$file = fopen("uuid/$category","w");
		fwrite($file,substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,5));
		fclose($file);
    	echo "Success.\n";
	}
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>