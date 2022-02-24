<?php 
                $PAGE = 'TopicTagPage';
                $thumaType = 'RR_MostViewedPage';
                $getUrls3=get_CategoryList('183755647860736',0,14);
                    $data3=curl_info($getUrls3);             
                $dAry3=json_decode($data3, true);
                  $dAryn3=$dAry3['list'][0]['media'];  
                $SHOW_AD = false;               
                 
                if(count($dAryn3) >1 && $num_video >6){

                echo '<div class="mov_list"  style="margin-top: 25px;">'; 
                $link_a = THIS_SITE.'mostviewed';
                //$link_gt ='trackOutboundLink(\''.$PAGE.'\' ,\'clk\' , \''.$PAGE.'_'.$thumaType.'\' ,\''.$link_a.'\')';
                echo '<a href="'. $link_a .'" style="position:relative;"><img src="'.THIS_SITE.'img/most_viewed.gif"><span id="more_mv">more >></span></a>'; 
                $i_init = rand(0,6);
                $i=0;
                $Max_nails=20;
                 $thumaType = 'RR_MostViewed_clk';
                if($num_video <=8)
                {
                   $Max_nails = 2;
                }
                else if($num_video <=10)
                {
                   $Max_nails = 4;
                }
                else if($num_video <=16)
                {
                   $Max_nails = 4;
                   $SHOW_AD = true;  
                }
                else 
                {
                    $Max_nails = 7;
                    $SHOW_AD = true; 
                }
                foreach ($dAryn3 as $key => $value) 
                {
                     if($i <= $i_init || $i > $i_init + 7 || ($i- $i_init) > $Max_nails)
                     {
                        $i++;
                        continue;
                     }                  
                     $dArynCat=$value['tags'][0]['tag'];
                     $NSFW_v = false; 
                         foreach ($dArynCat as $Catkey => $Catval) {
                         if($Catval['ns']=='category'){ $CatIndex=$Catkey; }
                         if($Catval['ns']=='mobile' && $Catval['predicate']=="headline"){$mobile_headline  = $Catval['value'];}
                         if($Catval['ns']=='NSFW' && $Catval['value']=='NSFW' )   {  $NSFW_v = true;}

                         }  
                             $cate_name=$value['tags'][0]['tag'][$CatIndex]['value'];
                              if($cate_name=='NMA Originals')
                              {
                                $cate_id=$menuAry['Tomo Originals'];
                                $cate_name='Tomo Originals';
                              }
                              else
                             $cate_id=$menuAry[$cate_name]; 
                             show_trend_content($value['id'], $cate_id, $cate_name ,$mobile_headline,$value['creationDate'],$value['mediaPlays']['total']);
                     
                     /*if($SHOW_AD && $Max_nails ==($i- $i_init) )
                     {
                       echo '<div class="mov" style="margin-left:0px;margin-bottom: 20px;">'.$ad300x250_2.'</div>';   
                     }*/
                     $i++;
                }

                 echo '</div>';
                }
                ////TREND
                $thumaType = 'RR_JoinTheDisc_clk';
                $getUrls3=get_CategoryList('183754037297152',0,7);//33169260716032
                    $data3=curl_info($getUrls3);    
                $dAry3=json_decode($data3, true);
                $dAryn3=$dAry3['list'][0]['media'];
                if(count($dAryn3) >1 && $num_video >12){
                    //echo count($dAryn3);
                echo '<div class="mov_list">'; 
                echo '<img src="'.THIS_SITE.'img/jtd.gif">'; 
                $i=0;  
                $Max_nails=20;
                if($num_video <=14)
                {  $Max_nails = 2; }
                else if($num_video <=18)
                {  $Max_nails = 4; }
                else 
                { $Max_nails = 7;}

                foreach ($dAryn3 as $key => $value) {
                     if( $i >= $Max_nails )
                     {
                        $i++;
                        continue;
                     }
                     $dArynCat=$value['tags'][0]['tag']; 
                     $NSFW_v = false;
                     foreach ($dArynCat as $Catkey => $Catval) {
                        if($Catval['ns']=='category')
                        { $CatIndex=$Catkey; }
                       if($Catval['ns']=='mobile' && $Catval['predicate']=="headline"){$mobile_headline  = $Catval['value'];}
                        if($Catval['ns']=='NSFW' && $Catval['value']=='NSFW' )   {  $NSFW_v = true;}
                     }  
                     $cate_name=$value['tags'][0]['tag'][$CatIndex]['value'];
                      if($cate_name=='NMA Originals')
                      {
                        $cate_id=$menuAry['Tomo Originals'];
                        $cate_name='Tomo Originals';
                      }
                      else
                     $cate_id=$menuAry[$cate_name]; 
                     $i++;
                     show_trend_content($value['id'], $cate_id, $cate_name ,$mobile_headline,$value['creationDate'],$value['mediaPlays']['total']);
                }
                 echo '</div>';
                }

?>