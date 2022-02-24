<?php 
	if ( isset($removeAdd) && $removeAdd == true ){
		$ad300x250 = '<img src="'.THIS_SITE.'img/GIF_300x250-Baby-Panda.gif">';
	}else{
		$ad300x250 = $ad_video_300x250_2;
	}	    

    $PAGE = "Video";
    $thumaType = "RR_topicthumbs_clk";   
              if ($tag_topic!='')
             {
                  insert_Relatives($tag_topic ,3);
             }
             else
             {
                  insert_breakingNews(3);
              }
                
                
?>