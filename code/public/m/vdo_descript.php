<?php 

               
               if(($tag_topic!='' /*&& checkIfinArray($tag_topic , $tags_article)*/ )) 
               {
                  echo '<br><div class="MORE_INFO">';

                   echo '<div class="MOREON">MORE ON: <a href="'.THIS_SITE.'tags.php?kw='.urlencode($tag_topic).'"><span class="more_tags">'.htmlentities($tag_topic).'</span></a> </div>';
                  echo '</div>';
               }
			   
			   $Addtional_heads_len =count($Addtional_heads);
                           for($key=2 ; $key<=3 ;$key++)
                          {
							  if ($key == 3){ ?><div class="headline_img" style="width:300px; margin-left:-2px"> <?php  echo $ad300x250_1 ?></div> <?php }
                             $ind_str = $key; //+ 2;
                              if($Addtional_pics[$key] != '' ||  $Addtional_heads[$key]!=''){
                                      echo '<div class="headline">';                          
                                      

                                      if($Addtional_pics[$key] != '' || $Addtional_heads[$key]!=''){
                                           if($Addtional_pics[$key] != '')
                                           {echo '<div class="headline_img"><img class="lazy" data-original="'.$Addtional_pics[$key].'" alt="'.$Addtional_heads[$key].'">';}
                                           else
                                           {echo '<div class="headline_img" style="width:100%">';}
         
                                         echo '<div class="headline_tite vdo_subT" style="padding:0px 0 5px 0;">'.$Addtional_heads[$key].'</div>';
                                         echo '</div>';
                                     }
                                   /* if(strlen ($Addtional_desc['description_'.$ind_str]) >0)
                                    {echo '<div class="descript vdo_subT" style="padding:5px 0px;">'.$Addtional_desc['description_'.$ind_str].'</div>';} //$Addtional_desc['description'.$ind_str]
                                    echo '</div>';*/
                            }


                          }

?>