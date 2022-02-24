<?php 
                $PAGE = 'TopicTagPage';
                ////TREND
                $thumaType = 'RR_JoinTheDisc_clk';
               $getUrls3 = APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?start=0&count=10&filters[]=c_ts_publish_l:['.$sdate.'%20TO%20'.$edate.']&sort=c_ts_publish_l+desc';
				$data3 = curl_info($getUrls3, null);
				$dAry3 = json_decode($data3, true);
               	$dAryn3=$dAry3['docs']; 
                if(count($dAryn3) >1 && $num_video >1){
                    //echo count($dAryn3);
                echo '<div class="mov_list">'; 
                 echo '<div class="right-side-title">JOIN THE DISCUSSION</div>';
               /* $i=0;  
                $Max_nails=20;
                if($num_video <=14)
                {  $Max_nails = 2; }
                else if($num_video <=18)
                {  $Max_nails = 4; }
                else 
                { $Max_nails = 7;}*/

                foreach ($dAryn3 as $key => $value) 
                {
                    /* if($i <= $i_init || $i > $i_init + 15 || ($i- $i_init) > $Max_nails)
                     {
                        $i++;
                        continue;
                     } */                 
                     $headline=array('tit'=>$value ['c_title_s']);
						//$dArynCat=$value['custom_fields']['field']; 
						$NSFW_v = false;
						/*$cate_id=$value['c_category_smv'][0];
						$cate_name=array_search( $cate_id, $menuAry ); */

						$NSFW_v = false;
						
						$thumbnail = $value['thumbnails'];
						//print_r($thumbnail);
						if( isset($value['u_NSFW_Tag_s']) && $value['u_NSFW_Tag_s']=='NSFW' ){  $NSFW_v = true; }

						foreach ($thumbnail as $key => $value1) {
				
						if ( isset($value1['role']) && $value1['role']=='poster' ) {  $thumb = $value1['url']; break; }
						else if( isset($value1['role']) && $value1['role']=='square' && $value1['width'] == '1000' ){  $thumb = $value1['url']; break; }
					}
						show_trend_contentO($value['obj_id']/*, $cate_id, $cate_name*/ ,$headline,$value['c_ts_publish_l'],$thumb);
						$i++;
                     
                     /*if($SHOW_AD && $Max_nails ==($i- $i_init) )
                     {
                       echo '<div class="mov" style="margin-left:0px;margin-bottom: 20px;">'.$ad300x250_2.'</div>';   
                     }*/
                }
                 echo '</div>';
                }

?>