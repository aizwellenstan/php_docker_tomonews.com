<?php 
include_once('configA.php');
include_once('api_settingA.php');
include_once('device.php');
include_once('tags_preprocess.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php  echo $topic_name; ?> | <?php  site_title() ?></title>
<meta name=viewport content="width=1200px">
	<meta name="apple-itunes-app" content="app-id=633875353">
	<meta name="google-play-app" content="app-id=com.nextmedia.gan">
	<meta name="description" content="TomoNews is your daily source for top animated news. We’ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?v=1" type="image/png" />
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7365156/7009372/css/fonts.css" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css">
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/jquery-ui.min.css">
    <?php  include_once("head_scripts.php"); ?>
	<script src="<?php echo THIS_SITE; ?>js/all.min.js"></script>     
  <script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script> 
  <script src="<?php echo THIS_SITE; ?>js/jquery-ui.min.js"></script>

 <script type="application/ld+json"> 
    { 
      "@context": "http://schema.org", 
      "@type": "Webpage", 
      "headline": "<?php site_title();?>", 
      "url": "<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>", 
      "thumbnailUrl": "", 
      <?php $cdate22=date("Y-m-d\TH:i:s") ;   $cdate22= $cdate22.'.000Z';?>
      "dateCreated": "<?php  echo $cdate22; ?>", 
      "articleSection": "<?php echo strtoupper($topic_name);?>", 
      "creator": "TOMONEWS", 
      "keywords": [<?php 
                 foreach($META_KW as $i => $value) 
                 {
                   if($i==0)
                   {echo '"'.$value.'"';}
                   else
                   {echo ' ,"'.$value.'"';} 
                 } 
                  ?>] 
    } 
</script>
<?php  include_once('ga.php'); ?>	
</head>
<style>
.ml3{width: auto;text-align:right;float:right;    padding-right: 5px;}
.ml2{ width: 100px;    float: right;    padding-right: 10px;}
.movlabel .ml1{float:left;}
.movlabel{width: 310px;}
.mov_list .mov{margin-left:0px;}
.minfo{padding:6px 0px ;font-size:17px;width: 100%;font-weight:500;}
.index.mov{height:300px;margin-top:25px;}

.index.mov > .minfo{height:85px;/*font-size:18px;*/;overflow:hidden;}

label {
    display: inline-block;
    cursor: pointer;
    position: relative;
   /* padding-left: 20px;*/
    margin-right: 15px;
    font-size: 13px;
    font-weight: bold;
    color:#333;
}/*li:nth-child(2)*/
.mce_inline_error:nth-child(2){

	position: absolute;
  top: -15px;
  font-size: 12px;
  color: #f00;
  width: 200px;
 /* left: -185px;*/
}
#fl_icon{top:75px;}
}
</style>
<script>

</script>
<body>
	<div class="wapper"> 
		<?php  
		//$ad728x90=$ad_category_728x90;
		include_once('header.php'); 
		?>
	</div>
	<div id="srh_lab" class="" align="center" >
			<?php  echo $cate_name ; ?>
	</div>
	<div id="vdo_wapper" style="display:table;position:relative;">
			<div id="vdo_content" style="width:665px; ">
		<?php 


      if($cate_name=="tomogirls" && $page==2)
      {
        $ad300x250_1='<img src="'.THIS_SITE.'img/ad/'.$AdImg_arr[rand(0 , count($AdImg_arr) - 1)].'">';
        $ad300x250_2='<img src="'.THIS_SITE.'img/ad/'.$AdImg_arr[rand(0 , count($AdImg_arr) - 1)].'">';
        $ad300x600_1='<img src="'.THIS_SITE.'img/ad/GIF_300x600.gif">';
      }
      else
			{
        $ad300x250_1=$ad_category_300x250_1;
        $ad300x250_2=$ad_category_300x250_2;
        $ad300x600_1=$ad_category_300x600;
      }
		?>
		<?php 
		$sdate='*';
		$edate=strtotime(date('Y-m-d h:i:sa'));
		if ( rawurlencode(trim($listTitle)) != trim($KW) ){
			$getUrls=trim(APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?start='.(($page - 1)* PAGE_LIMIT_CATEGORY).'&count='.PAGE_LIMIT_CATEGORY.'&filters[]=u_Topic_Tag_smv:"'.$KW.'"&c_ts_publish_l:['.$sdate.'%20TO%20'.$edate.']&sort=c_ts_publish_l+desc');
		}else{
			$getUrls=trim(APPLICATION_FEED_URL.'KSIWPX4ZPE3ARGAKBB?start='.(($page - 1)* PAGE_LIMIT_CATEGORY).'&count='.PAGE_LIMIT_CATEGORY.'&filters[]=c_ts_publish_l:['.$sdate.'%20TO%20'.$edate.']&sort=c_ts_publish_l+desc');
		}
		
	  if($debug_mode=='1'){ echo 'getUrls : <br>',$getUrls,'<hr>'; }  
        $data=curl_info($getUrls, null);
        if($debug_mode=='1'){ echo 'data : <br>',$data,'<hr>'; }
        $dAry=json_decode($data, true);

        $dAry_j=$dAry['docs'];
       
        
        /*if(   strlen($dAry_j["id"] ) ==0 )
        {       
            $dAryn = $dAry_j;
        }
        else
        {
            $dAryn = array(0 => $dAry_j) ;
        }*/

        $i=0;
        $dAryn = $dAry_j;
		
        $num_thnumbnail = count( $dAryn);
        $num_video=  $num_thnumbnail +1;
		
        foreach ($dAryn as $key => $value) {
            $NSFW_v = false;
			$thumbnail = $value['thumbnails'];
			$title = $value['c_title_s'];
		 if( isset($value['u_NSFW_Tag_s']) && $value['u_NSFW_Tag_s']=='NSFW' ){  $NSFW_v = true; }
		 
			foreach ($thumbnail as $key => $value1) {
							if ( $value1['role']=='poster' ) {  $thumb = $value1['url']; }
						}

						
			$CatIndex=$value['c_category_smv'][0];
            $cate_name=array_search( $CatIndex, $menuAry );
             if($cate_name=='NMA Originals')
                      {
                        $cate_id=$menuAry['Tomo Originals'];
                        $cate_name='Tomo Originals';
                      }
                      else
            $cate_id=$CatIndex; 
            
             show_SmallThumbnail($value['obj_id'],$cate_id,$cate_name,$title,$value['c_ts_publish_l'],$thumb,$i);
            $i++;
        }

        unset($dAryn);unset($i);unset($data);unset($getUrls);
        /// get totals for page counter

       // $totals=$dAry['ItemCounter']['totalItems'];
	    $totals=$dAry['numFound'];
        $thisPage=$page;
        $totalPage=ceil($totals/PAGE_LIMIT_CATEGORY);


        //echo 'totalPage',$totals,'<hr>';
        //echo 'page==>',$dAry['ItemCounter']['totalItems'];

        if($page<=1){ $prePage=1;}else{ $prePage=$page-1; }
        if($page>=$totalPage){ $nexPage=1; }else{ $nexPage=$page+1; }

        $showLimit=3;
        $showMax=$totalPage-2;
        
        $showStart=$page-2;
        $showEnd=$page+2;
        if($page<=$showLimit){
        	$showStart=1;
        	$showEnd=5;
        }
        if($page>=$showMax){
        	$showEnd=$totalPage;
        	$showStart=$totalPage-4;
        	if($showStart<=1)
            {$showStart=1;}
        }
		?>	
    <div class="pager" style="<?php if($totalPage==1){echo 'display:none;';}?>">
		<div class="pager_cnt"><a href="<?php  echo $thisURL; ?>"><span>&lt;&lt;First</span></a></div>
		<div class="pager_cnt"><a href="<?php  echo $thisURL; ?><?php  echo '&page='.$prePage; ?>"><span>&lt;Previous</span></a></div>
		<div class="pager_cnt">
			<?php 
			for($i=$showStart;$i<=$showEnd;$i++  ){
				?>
				<a href="<?php  echo $thisURL; ?><?php  echo '&page='.$i; ?>"><span class="pgcount <?php  if($i==$page){ ?>current<?php  } ?> "><?php  echo $i; ?></span></a>
				<?php 
			}
			?>
		</div>
		<div class="pager_cnt"><a href="<?php  echo $thisURL; ?><?php  echo '&page='.$nexPage; ?>"><span>Next&gt;</span></a></div>
		<div class="pager_cnt"><a href="<?php  echo $thisURL; ?><?php  echo '&page='.$totalPage; ?>"><span>Last&gt;&gt;</span></a></div>
	</div>
		
	</div>
	
	<div id="vdo_otherlist" >
		<!-- <div class="mov" style="width: 300px; height: 600px;display:block;background:#ccc;margin:0;margin-top:25px;"><?php  /*echo $ad300x600_1;*/?></div> -->
	    <div class="mail_box" style="width: 300px; height:auto;display:block;background:#ccc;margin:0;margin-top:25px;position:relative;font-family:Roboto, sans-serif;<?php if($num_video <=4) {echo 'display:none;';}?>">
	    	
	    	 <img class="img-full" src="<?php  echo THIS_SITE; ?>img/mail_us.png">
	    	 <a href="mailto:info@nma.com.tw" ><div class="mail_box_btn" ></div></a>
	    	 <a href="<?php  echo FB_LINKS;?>" target="_blank"><div class="mail_box_btn" style="left: 53px;"></div></a>
	    	  <a href="<?php  echo TWITTER_LINKS;?>" target="_blank"><div class="mail_box_btn" style="left: 86px;"></div></a>
	    	  <a href="<?php  echo GPLUS_LINKS;?>" target="_blank"><div class="mail_box_btn" style="left: 119px; "></div></a>
	    	  <a href="<?php  echo THIS_SITE; ?>rss_us/index.php" target="_blank"><div class="mail_box_btn" style="left: 155px;"></div></a>
	    	  <a href="<?php  echo THIS_SITE.MOBILE_PAGE_LINK;?>" target="_blank"><div class="mail_box_btn" style="left: 191px;"></div></a>
	    	 <form action="//tomonews.us2.list-manage.com/subscribe/post?u=28c2f2044f22c46a64747226f&amp;id=8254ba5d15" method="get" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	    	 	<div style="position:absolute;top:105px;left:17px;">  
	    	 	 <div class="mc-field-group" style="position:relative;top:0px;left:0px;">    
	    	     <input id="mce-EMAIL" class="required email"   type="email" name="EMAIL" placeholder="Enter your email" style="font-size:14px;"></input>
                 <div for="mce-EMAIL" class="mce_inline_error" id="mce_inline_error_msg"></div>
                </div>     
                <div class="mc-field-group input-group" style="margin-top: 5px;">
                    <ul>
                    	<input type="checkbox" value="1" name="group[17][1]" id="mce-group[17]-17-0"><label for="mce-group[17]-17-0">Daily</label>
                       <input type="checkbox" value="2" name="group[17][2]" id="mce-group[17]-17-1"><label for="mce-group[17]-17-1">Weekly</label>
                </ul>
                </div>
                <div class="clear mail_box_btn" id="mailbox_submit" style="position: absolute;  top: 00px;  left: 185px;  width:100px;  height: 30px;  cursor: pointer;">
                </div>
              </div>
          </form>
	    </div>
			<?php 
               /*側邊影片縮圖*/
               include_once('tags_sidethumbnail.php');
                ?>
        </div>	
</div>

	<div id="dialog" title="">
  <p></p>
</div>
	<?php  include_once('footer.php'); ?>
    
	<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
  <script type='text/javascript' src='<?php  echo THIS_SITE; ?>js/follow_signUp.js'></script>
<script type='text/javascript'>
$(function() {
     $(".index .minfo ").ellipsis({
        row: 2,
        char: '...'
     });
     
      $("img").error(function(){  
     
        $(this).hide();
      });

      $(".index.mov").each(function(){
          if($(this).data("id") == 0||$(this).data("id") == 3||$(this).data("id") == 5||$(this).data("id") == 7||$(this).data("id") == 9
            ||$(this).data("id") == 11||$(this).data("id") == 13||$(this).data("id") == 15||$(this).data("id") == 17||$(this).data("id") == 19)
          {$(this).css("float" , "left")}
      })
    
    var $form = $('#mc-embedded-subscribe-form');   
    $form.unbind('submit');   
    var __mcj = new NEW_MCJ();
    __mcj.init();

     try{
     var siteMap_index = 'TOPICS';
     var from = (getCookie('track_menu')=="" || !getCookie('track_menu'))? "MAIN":getCookie('track_menu');
         console.log('test:' + '<?php echo  $topic_name ;?>' );
          cnf_1X1.nxmObj={
        "region":"US",
        "prod":"TOMONEWS",
        "site":"<?php echo THIS_SITE;?>",
        "platform":"WEB",  //WEB | MOBWEB | ANDROID | IPHONE | IPAD | TABLET 
        "section":'<?php echo  $topic_name ;?>', ////Site map
        "media":"TEXT",//Site map
        "content":"INDEX",  //Site map
        "issueid":"",      //Aritcle Issue Date or send blank for homepage/index
        "title":"",        //Article Title, Photo Title, etc or send Blank for home page/index page
        "cid":"",          //Article ID/Photo ID or send blank for Menu/Index pages
        "news":"TOMONEWS", //Site map
        "edm":"",          //Site map
        "action":"PAGEVIEW",  //Always send PAGEVIEW
        //"uid":"", //
        "subsect":"", //Site map
        "subsubsect":"",//Site map
        "menu":from,//Menu Title
        "auth":"",//"columnist name send blank if not available"
        "ch":cnf_1X1.params[siteMap_index].ch,//Site map
        "cat":cnf_1X1.params[siteMap_index].cate//Site map
        };
 var _pxl = new PIXEL1x1();
    _pxl.init();
}
catch(err)
{
  console.log('out of siteMap!');
}
    
});





</script>
</body>
</html>