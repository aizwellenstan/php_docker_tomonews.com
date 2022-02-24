<?php 
              
    /*$content = nl2br(htmlspecialchars_decode($des));            
    echo  $content;
	if($tag_topic!='' ) 
	{
        echo '<div class="MORE_INFO">';


		if ( $tag_topic && $tag_topic!='' ){ echo '<div class="MOREON">MORE ON: <a href="'.THIS_SITE.'tags.php?kw='.urlencode($tag_topic).'"><span class="more_tags">'.htmlentities ($tag_topic).'</span></a> </div>'; }
        
		echo '</div>';
    }
 	echo '</div>';*/

              
    $content = nl2br(htmlspecialchars_decode($des));            
    //$turned = array( '&lt;a','&lt;/a&gt;' ,'&gt;' , '&quot;');
    // $turn_back = array( '<a', '</a>' , '>' , '"' );
    // $content = str_replace( $turned, $turn_back, $content );
    echo  $content;

	if($tag_topic!='' ) 
	{
        echo '<div class="MORE_INFO">';


		if ( $tag_topic && $tag_topic!='' ){ echo '<div class="MOREON">MORE ON: <a href="'.THIS_SITE.'tags.php?kw='.urlencode($tag_topic).'"><span class="more_tags">'.htmlentities ($tag_topic).'</span></a> </div>'; }
        
		echo '</div>';
    }
 	echo '</div>';
    
	$photos_array_Slide=array();
    
	$captions_array_Slide=array();
    
	$i=1;
                    /* if($TemplateName == "Text and Picture" || $TemplateName == "With Video")
                     {*/
    $Addtional_heads_len =count($Addtional_heads);
   
	 if (count($Addtional_heads) > 0 )
    for($key=2 ; $key<=3 ;$key++){
                      //       echo  $key;
		$ind_str = $key; //+ 2;
		
		if($Addtional_pics[$key] != '' ||  $Addtional_heads[$key]!='' ){

			echo '<div class="headline" data-id="'. $ind_str.'">';                        
								
			if($Addtional_pics[$key] != '' || $Addtional_heads[$key]!=''){
				
				if($Addtional_pics[$key] != '')
				{
					echo '<div class="headline_img btn"><div style="position:relative;"><img class="origin_img lazy" alt="'.$Addtional_heads[$key].'" data-original="'.$Addtional_pics[$key].'" ><div class="photo_icon" data-id="'.$i.'"><div class="txt"></div></div></div>';
					array_push( $photos_array_Slide , $Addtional_pics[$key]);
					array_push( $captions_array_Slide , $Addtional_heads[$key]);
					$i++;
				}
				else
				{ echo '<div class="headline_img" style="width:100%">'; }
									  
				echo '<div class="headline_tite">'.$Addtional_heads[$key].'</div>';
				
				echo '</div>';
			}
			
			echo '</div>';
		}
	}                 
                     //}
?>
