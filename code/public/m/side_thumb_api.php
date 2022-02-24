<?php 
function insert_breakingNews($num){
       global $menuAry;
       global $thumaType ;
       global $PAGE ; 
       global $NSFW_v; 
         global $NSFW; 
        
       $getUrls3 = get_CategoryList('232699752988672',0,$num+1);//33169260716032
       $data3 = curl_info($getUrls3);  
       $dAry3 = json_decode($data3, true);
       $dAryn3 = $dAry3['list'][0]['media'];
       $Url_bk = get_TitleFromPlayList('232699752988672');
       $data_bk = curl_info($Url_bk);
       $dAryn_bk = json_decode($data_bk , ture);  
       $bk_title = strtoupper ($dAryn_bk['pager']['list'][0]['playlist']['title']);

       $kw = $dAryn_bk['pager']['list'][0]['playlist']['title'];
       $kw2 = urlencode($kw);

        $link_a = THIS_SITE."tags.php?kw=".$kw2;//"'".THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id."'";
        //$link_gt ='trackOutboundLink(\''.$PAGE.'\' ,\'clk\' , \''.$PAGE.'_'.$thumaType.'\' ,\''.$link_a.'\')';

         if(count($dAryn3) >1){
         echo '<div class="mov_list" >'; 
         echo '<a href="'. $link_a .'"><div id="bk_title"><div>'. $bk_title.'</div></div></a>'; 
         $i=0;               
           foreach ($dAryn3 as $key => $value) {
             if( $i>=$num)break;
             if($value['id'] == $_GET['video_id']) continue;
             $dArynCat=$value['tags'][0]['tag']; 
             $NSFW_v = false;
             foreach ($dArynCat as $Catkey => $Catval) {
                if($Catval['ns']=='category')
                {$CatIndex=$Catkey; }
                if($Catval['ns']=='mobile' && $Catval['predicate']=="headline")
                {$mobile_headline  = $Catval['value'];}
                if($Catval['ns']=='NSFW' && $Catval['value']=='NSFW' )
                {  $NSFW_v = true;}
                
                
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
}

function insert_Relatives($topic, $num){
   global $menuAry; 
   global $thumaType ;
   global $PAGE ; 
   global $NSFW_v; 
         global $NSFW; 
        
   $bk_title = strtoupper ($topic);
 
  $SUB_CATENAME= "topic:tag=".$topic;
  $kw2=urlencode($SUB_CATENAME);

   $sdate='';
   $edate='';
   $getUrls=get_searchListFromTags($kw2, 0, $num +1,$sdate,$edate);
   $data=curl_info($getUrls);   
   $dAry3 = json_decode($data, true);
   $dAryn3 = $dAry3['pager']['list'][0]['media'];
   $total = $dAry3['pager']['totalItems'];

   if( $total <= $num)
   {
     insert_breakingNews($num);
   }
    else {
     $kw2=urlencode($topic);
     $link_a = THIS_SITE."tags.php?kw=".$kw2;//"'".THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id."'";
     //$link_gt ='trackOutboundLink(\''.$PAGE.'\' ,\'clk\' , \''.$PAGE.'_'.$thumaType.'\' ,\''.$link_a.'\')';

     echo '<div class="mov_list" >'; 
     echo '<a href="'. $link_a .'"><div id="bk_title"><div>'. $bk_title.'</div></div></a>'; //tags.php?kw=MERS%2520Outbreak
     $i=0;               
       foreach ($dAryn3 as $key => $value) {
         if( $i>=$num)break;
         if($value['id'] == $_GET['video_id']) continue;
         $dArynCat=$value['tags'][0]['tag']; 
         $NSFW_v = false;
         foreach ($dArynCat as $Catkey => $Catval) {
            if($Catval['ns']=='category')
            {$CatIndex=$Catkey; }
            if($Catval['ns']=='mobile' && $Catval['predicate']=="headline")
            {$mobile_headline  = $Catval['value'];}

            if($Catval['ns']=='NSFW' && $Catval['value']=='NSFW' ){  $NSFW_v = true;}
            
            
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
}
?>