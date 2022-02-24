<?php 

function insert_MostViewed($num){
    global $menuAry;
	global $ad_video_300x250_1;
    global $NSFW_v;
    global $NSFW;

	$sdate='*';
	$edate=strtotime(date('Y-m-d h:i:sa'));
	$getUrls3=APPLICATION_FEED_URL.'A5CWEWBLEVZRPS3TBD?sort=u_View_Count_s+desc&start=0&count='.($num+1).'&filters[]=c_ts_publish_l:['.$sdate.'%20TO%20'.$edate.']';//get_CategoryList($menuAry[$CateName],1,$num+1);//33168992280576
	$data3=curl_info($getUrls,null);  
	$dAry3 = json_decode($data, true);
	$dAryn3=$dAry3['docs'];
    if(count($dAryn3) >1 ){
       	$i=0;

        foreach ($dAryn3 as $key => $value) {
            if( $i>=$num)break;
            if($value['obj_id'] == $_GET['video_id']) continue;

            $cate_name=''; $cate_id='';$CatIndex='';
                	 
            if($i==0)
            { 
                if($num ==6)
				{echo '<div class="srh_result aaa" style="width:300px;height:250px;">',$ad_video_300x250_1,'</div>'; }

                $link_a = THIS_SITE.'mostviewed';//"'".THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id."'";
                //$link_gt ='trackOutboundLink(\'m_video\' ,\'clk\' , \'DownpageStories_Mobile_MostViewedPage)\' ,\''.$link_a.'\')';
                echo '<a href="'. $link_a .'"><div class="srh_block title" style="color:#000;">MOST VIEWED<span id="more_mv">more>></span></div></a>';
                	  
            }
            
			$NSFW_v = false;
            $headline=array('tit'=>$value ['c_title_s']);
			$thumbnail = $value['thumbnails'];
			
			foreach ($thumbnail as $key => $value1) {
				if ( isset($value1['role']) && $value1['role']=='poster' ) {  $headline['thumb'] = $value1['url']; break;}
				else if( isset($value1['role']) && $value1['role']=='square' && $value1['width'] == '1000' ){  $headline['thumb'] = $value1['url']; break;}
			}
			
			if( isset($value['u_NSFW_Tag_s']) && $value['u_NSFW_Tag_s']=='NSFW' ){  $NSFW_v = true; }
					 
			$temp_str='';
					
			$cate_id=$value['c_category_smv'][0];
			$cate_name = array_keys($menuAry, $cate_id);
			
			if($cate_name=='NMA Originals')
            {
                $cate_id=$menuAry['Tomo Originals'];
                $cate_name='Tomo Originals';
            }
            
			if($i==$num-1)
            { $if_last  =1;}
            else 
            {$if_last = 0;}
				show_relates_content($value['obj_id'],$headline,$value['creationDate'],$if_last );
                $i++;
        }
    }

    unset($link_a);unset($link_gt);unset($getUrls3);unset($data3);unset($dAry3);
		
}

function insert_videorelated($topic){	
    global $NSFW_v;
    global $NSFW;
    global $menuAry;
	global $ad_video_300x250_1;
    $bk_title = strtoupper ($topic);
    $kw=rawurlencode($topic);

	$sdate='*';
	$edate=strtotime(date('Y-m-d h:i:sa'));
    $num =10;
    
	$getUrls=trim(APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?start=0&count='.($num+1).'&filters[]=c_ts_publish_l:['.$sdate.'%20TO%20'.$edate.']&filters[]=u_Topic_Tag_smv:"'.$kw.'"&sort=c_ts_publish_l+desc');//get_searchListFromTags($topic,1,$num+1,$sdate,$edate);

	$data=curl_info($getUrls,null);   
    $dAry3 = json_decode($data, true);
    $dAryn3 = $dAry3['docs'];

    $total = count($dAryn3);  
    $link_a = THIS_SITE."tags.php?kw=".$kw;//"'".THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id."'";
             // $link_gt ='trackOutboundLink(\''.$PAGE.'\' ,\'clk\' , \''.$PAGE.'_'.$thumaType.'\' ,\''.$link_a.'\')';

    if($total >1 ){
        $i=0;
        foreach ($dAryn3 as $key => $value) {
            if( $i>=$num)break;
            if($value['obj_id'] == $_GET['video_id']) continue;


                	 
            if($i==0)
            { 
                	    	//echo '<div class="srh_result aaa" style="width:300px;height:250px;">',$ad_video_300x250_1,'</div>'; 
				echo '<a href="'. $link_a .'" "><div class="srh_block title">'.$bk_title.'</div></a>';
            } 
            $NSFW_v = false;

            $headline=array('tit'=>$value ['c_title_s']);
			$thumbnail = $value['thumbnails'];
			
			foreach ($thumbnail as $key => $value1) {
				if ( isset($value1['role']) && $value1['role']=='poster' ) {  $headline['thumb'] = $value1['url']; break;}
				else if( isset($value1['role']) && $value1['role']=='square' && $value1['width'] == '1000' ){  $headline['thumb'] = $value1['url']; break;}
			}
			
			if( isset($value['u_NSFW_Tag_s']) && $value['u_NSFW_Tag_s']=='NSFW' ){  $NSFW_v = true; }
					 
			$temp_str='';
					
				 
            if($i==$num-1){ $if_last  =2;}
            else {$if_last = 0;}
			    show_relates_content($value['obj_id'],$headline,strtotime($value['c_ts_publish_l']),$if_last );
                $i++;
        }
    }
            
    unset($link_a);unset($getUrls);unset($data);unset($dAry3);unset($dAryn3) ;
               
}

function show_relates_content($video_id,$title,$cdate, $if_last){    
    global $NSFW_v;
    global $NSFW;
	
	  $url=urlencode(str_replace(' ', '-', remove_punc($title['tit'])));
		$url=$url.'-'.$video_id;
    $link_a = THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title['tit']))).'-'.$video_id.'#c=m_video&a=clk&l=DownpageStories_Mobile_clk';//"'".THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($title))).'-'.$video_id."'";
   // $link_gt ='trackOutboundLink(\'m_video\' ,\'clk\' , \'DownpageStories_Mobile_clk\' ,\''.$link_a.'\')';
		$video_box='';
		//$video_box.='<a href="'.$link_a.'" onclick="'.htmlentities($link_gt , ENT_QUOTES ).';return false;">';
    $video_box.='<a href="'.$link_a.'" >';
		$video_box.='<div class="" data-id="'.$if_last.'"><div  id="srhmov_v" class="mov">';
    
    $path = $title['thumb'];

    if(!$NSFW_v || !$NSFW)
    {
       if($NSFW_v)
       {
        
        $video_box.='<img id="" class="lazy" data-original="'.THIS_SITE.TB_TEST.'" >';
       
       }
       else
     
       $video_box.='<img class="lazy" data-original="'.$path.'" width="100" >';
	}
       
    else
    {
        $video_box.='<img class="lazy" data-original="'.$path.'" width="100" >';
    }

		$video_box.='<div id="srhinfo_v" class="minfo">';
		$video_box.='<div id="srhinfo_title_v">'.$title['tit'].'</div>';		
		$video_box.='</div></div>';
		$video_box.='</a>';
		
		echo $video_box;
		unset($video_box);unset($path);unset($url);unset($link_a);unset($link_gt);
}

?>