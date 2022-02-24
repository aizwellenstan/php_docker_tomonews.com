<?php 
function insert_MostViewed($num){
            global $menuAry;
	          global $ad_video_300x250_1;

	          $getUrls3=get_CategoryList('183755647860736',0,$num+1);//33168992280576
		      $data3=curl_info($getUrls3);		     
              $dAry3=json_decode($data3, true);
              $dAryn3=$dAry3['list'][0]['media'];
             	if(count($dAryn3) >1 ){
             	$i=0;
                foreach ($dAryn3 as $key => $value) {
                  if( $i>=$num)break;
                  if($value['id'] == $_GET['video_id']) continue;


                	 $cate_name=''; $cate_id='';$CatIndex='';
                	 
                	 if($i==0)
                	 { 
                        if($num ==6)
                	 	{echo '<div class="srh_result aaa" style="width:300px;height:250px;">',$ad_video_300x250_1,'</div>'; }
                        echo '<div class="srh_block title">MOST VIEWED</div>';
                	 }
                     $dArynCat=$value['tags'][0]['tag']; 
			       foreach ($dArynCat as $Catkey => $Catval) {
			            if($Catval['ns']=='category')
			            { $CatIndex=$Catkey; }
                        if($Catval['ns']=='mobile' && $Catval['predicate']=="headline")
                        	{$mobile_headline  = $Catval['value'];}
			         }  
                   //  $temp_str='';
                     $cate_name=$value['tags'][0]['tag'][$CatIndex]['value'];
				     $cate_id=$menuAry[$cate_name]; 
            if($i==$num-1){ $if_last  =1;}
             else {$if_last = 0;}
				     show_relates_content($value['id'],$cate_id,$cate_name,$value['title'],$value['creationDate'],$value['mediaPlays']['total'] ,$if_last );
                   //  $side_thumbnail_code = $side_thumbnail_code.$temp_str;
                     $i++;
                }
            }
}
function insert_videorelated($topic){	
            global $menuAry;
	          global $ad_video_300x250_1;
             $bk_title = strtoupper ($topic);
             $kw = str_replace(' ','+',$topic);
	           $sdate='';
              $edate='';
              $num =2;
              $getUrls=get_searchListFromTags($kw,0,$num+1,$sdate,$edate);

              $data=curl_info($getUrls);   
              $dAry3 = json_decode($data, true);
              $dAryn3 = $dAry3['pager']['list'][0]['media'];

               $total = $dAry3['pager']['totalItems'];


             	if($total >1 ){
             	$i=0;
                foreach ($dAryn3 as $key => $value) {
                    if( $i>=$num)break;
                    if($value['id'] == $_GET['video_id']) continue;

                	 $cate_name=''; $cate_id='';$CatIndex='';
                	 if($i==0)
                	 { 
                	 	echo '<div class="srh_result aaa" style="width:300px;height:250px;">',$ad_video_300x250_1,'</div>'; 
                        echo '<div class="srh_block title">'.$bk_title.'</div>';
                	 }
                     $dArynCat=$value['tags'][0]['tag']; 
			            foreach ($dArynCat as $Catkey => $Catval) {
			            if($Catval['ns']=='category')
			            { $CatIndex=$Catkey; }
                        if($Catval['ns']=='mobile' && $Catval['predicate']=="headline")
                        	{$mobile_headline  = $Catval['value'];}
			         }  
                     $cate_name=$value['tags'][0]['tag'][$CatIndex]['value'];
				     $cate_id=$menuAry[$cate_name]; 
             if($i==$num-1){ $if_last  =2;}
             else {$if_last = 0;}
				     show_relates_content($value['id'],$cate_id,$cate_name,$value['title'],$value['creationDate'],$value['mediaPlays']['total'],$if_last );
                     $i++;
                }
            }
             
               
}
function show_relates_content($video_id,$cateID,$cateName,$title,$cdate,$viewer , $if_last){

	  $url=urlencode(str_replace(' ', '-', remove_punc($title)));
		$url=$url.'-'.$video_id;
		$video_box='';
		$video_box.='<a href="'.THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id.'">';
		$video_box.='<div class="srh_result srh_v" data-id="'.$if_last.'"><div  id="srhmov_v" class="srhmov">';
    $video_box.='<img id="relativeSQ_img" src="'.PIC_CDN.$video_id.'/205x115.jpg" >';
		$video_box.='<img src="'.PIC_CDN.$video_id.'/square/cropped/128x128.jpg" width="100" ></div>';

		$video_box.='<div id="srh_label_v" class="srh_label" >';
		$video_box.='<div class="w'.$cateID.' mls" style="color:#FFFFFF;text-transform:uppercase;font-weight:bolder"><div>'.$cateName.'</div></div>';
		$video_box.='</div><div id="srhinfo_v" class="srhinfo">';
		$video_box.='<div id="srhinfo_title_v" class="srhinfo_title">'.$title.'</div>';		
		$video_box.='</div></div>';
		$video_box.='</a>';
		
		echo $video_box;
		unset($video_box);
}
?>