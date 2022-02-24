<?php 
//ini_set('display_errors', 'On');
include_once('configA.php');
include_once('api_settingA.php');
include_once('device.php');
include_once('mvp_preprocess.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php  echo $page_name; ?> | <?php  site_title() ?></title>
<meta name=viewport content="width=1200px">
	<meta name="apple-itunes-app" content="app-id=633875353">
	<meta name="google-play-app" content="app-id=com.nextmedia.gan">
	<meta name="description" content="TomoNews is your daily source for top animated news. We’ve combined animation and video footage with a snarky personality to bring you the biggest and best stories from around the world." />
	<meta name="keywords" content="news, news videos, funny news, animated news, funny videos, animation, next media animation" />
	<meta property="fb:pages" content="148740698487405" />
	<link rel="apple-touch-icon-precomposed" href=""/>
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.ico" type="image/icon" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css?nocache=0827">
  <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/jquery-ui.min.css">
   <?php  include_once("head_scripts.php"); ?>
  <script src="<?php echo THIS_SITE; ?>js/all.min.js"></script>      
  <script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>
  <script src="<?php echo THIS_SITE; ?>js/jquery-ui.min.js"></script>
 
   <script type="application/ld+json"> 
    { 
      "@context": "http://schema.org", 
      "@type": "Webpage", 
      "headline": "<?php echo $page_name; ?>", 
      "url": "<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>", 
      "thumbnailUrl": "", 
      <?php $cdate22=date("Y-m-d\TH:i:s") ;   $cdate22= $cdate22.'.000Z';?>
      "dateCreated": "<?php  echo $cdate22; ?>", 
      "articleSection": 'MOST VIEWED', 
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
</head>
<style>
.ml3{width: auto;text-align:right;float:right;    padding-right: 5px;}
.ml2{
    width: 100px;
    float: right;
    /*padding-right: 10px;*/
}
.movlabel .ml1{float:left;}
.movlabel{/*width: 310px;*/width:100%}
.mov_list .mov{margin-left:0px;}
.minfo{padding:6px 0px ;font-size:17px;width: 100%;font-weight:500;}
.index.mov{width:313px;height:300px;margin-top:25px;overflow:hidden;}
.index.mov.add{padding: 0 5px;}
.index.mov > img{width:310px;height:174px;}
.index.mov > .minfo{height:85px;/*font-size:18px;*/overflow:hidden;}

.POP_CONT{position:fixed; width:100%;height:100%;z-index:99999;background:none; }
.POP_BG, .POP_BG2{position:absolute;width:100%;height:100%;background:#fff;opacity:0.5;}
.POP{width:auto ;position:absolute;top:50%;left:50%;}
.POP#loading div{position:absolute;left:-18px;top:-18px;}

.POP > .btn_go{cursor:pointer;width:270px;height:220px;position:absolute;top:-75px;left:0px;}
.POP > .btn_cls{cursor:pointer;width:307px;height:23px;position:absolute;    left: -30px;    top: 150px;}
.POP > .btn_clsx{cursor:pointer;position:absolute;width:20px;height:20px;    left: 285px;    top: -175px;}

label {
    display: inline-block;
    cursor: pointer;
    position: relative;
    margin-right: 15px;
    font-size: 13px;
    font-weight: bold;
    color:#333;
}
.mce_inline_error:nth-child(2){
	position: absolute;
  top: -15px;
  font-size: 12px;
  color: #f00;
  width: 200px;
}
#fl_icon{top:75px;}
#mstvw_lab{text-transform:uppercase;background:#000;height: 40px;  font-size: 15pt; color: white;    font-weight: bold;    line-height: 30pt;}
.selector_container{}
.styleSelect{ 
  display:inline-block;position:absolute;right:10px;top: 7px;height: 25px;   line-height: 21px;
  border-radius: 3px; 
  background: #e2e0e1 url("<?php echo THIS_SITE;?>img/select_ico.jpg") no-repeat 100% 50%;
  border: 1px solid #e2e0e1;
  width: 150px;
  border-radius: 3px;
  overflow: hidden;
  background-color: #e2e0e1;
  text-align: left;
 
}
.current_list{ font-size:13px;font-weight:900;padding:0px 15px;text-align: left;}
.option_list
{
    position: absolute;
    min-width: 134px;
    min-height: 100px;
    background: #e2e0e1;
    border: 1px solid #e2e0e1;
    border-radius: 3px;
    z-index: 999;
    top: 30px;
    left: 838px;
    padding: 0px 0 3px 16px;
}
.option_list >.option_list_item 
{
    color:#333;
    font-size:12px;
    text-align: left;
    height: 28px;
}

</style>
<script>

</script>
<body>
   <div class="POP_CONT invi">
     <div class='POP_BG'></div>
  <div class="POP" id="loading" >        
    <div > <img src="<?php  echo THIS_SITE;?>img/loading11.png"></div>  
  </div></div>
	<div class="wapper"> 
		<?php  
		include_once('header.php'); 
		?>
	</div>
	<div id="mstvw_lab" class="" align="center">
     <div style="width:1000px;margin:0 auto;position:relative;">
       <span>Most Viewed Videos</span>
       <div class="selector_container">
       <div class="styleSelect btn" data-act="cls" id='option_title'>
          <label class="current_list"><?php echo $dtype_title[$dtype];?></label>
             <!--  <select id="mv_date" >
                <option value ="day" data-type="day">Past 24 Hours</option>
                <option value ="week" data-type="week">Past 7 Days</option>
                <option value ="month" data-type="month">Past 30 Days</option>
             </select> -->
       </div>
       <div class="option_list invi" id="options_list">
         <p class="option_list_item btn" value ="day" data-type="day">Past 24 Hours</p>
         <p class="option_list_item btn" value ="week" data-type="week">Past 7 Days</p>
         <p class="option_list_item btn" value ="month" data-type="month">Past 30 Days</p>

       </div>
       </div>

     </div>
	</div>
	<div id="vdo_wapper" style="display:table;position:relative;top:10px;">
			<div id="vdo_content" style="display:block;width:1000px; height:auto">
        <div style="display:block;width:100%; height:auto;margin-left: 13px;">
		<?php 
              //echo $dtype;
			switch ($dtype) {
				case 'day':
					$_timestamp = strtotime('-1 day',time());
					break;
				case 'week':
					$_timestamp = strtotime('-7 day',time());
					break;
				case 'month':
					$_timestamp = strtotime('-30 day',time());
					break;
			}

			$getUrls3 = APPLICATION_FEED_URL.'A5CWEWBLEVZRPS3TBD?start=0&count=50&filters[]=c_ts_publish_l:['.$_timestamp.'%20TO%20*]&sort=u_View_Count_s+desc';
			$data3 = curl_info($getUrls3, null);
			$dAry3 = json_decode($data3, true);
            $dAryn3=$dAry3['docs'];
            $totals=count($dAry3['docs']);    
			/*print_r($dAryn3);
			exit;*/
			if(count($dAryn3) >1 ){ 
				
				foreach ($dAryn3 as $key => $value) {
					
					$cate_name='';
					$cate_id='';
				   /* if($i==2){ echo '<div class="index mov" style="">'.$ad300x250_1.'</div>'; }
					if($i==6){ echo '<div class="index mov" style="">'.$ad300x250_2.'</div>'; }*/
					
				   $NSFW_v = false;
				  $mobile_headline=array('tit'=>$value ['c_title_s'], 'mb_tit'=> $value ['c_title_s']);
				  $mobile_headline['u_Mobile_Headline_s'] = $value ['c_title_s'];
					$thumbnail = $value['thumbnails'];
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
					
					 show_SmallThumbnail_lazy($value['obj_id'],$cate_id,$cate_name,$value['c_title_s'],$value['c_ts_publish_l'],$thumb,$i);
					 

					
					$i++;
				}
			}

		?>	
        </div>
   
		
	</div>
	
	
</div>

	<div id="dialog" title="">
  <p></p>
</div>
	<?php  include_once('footer.php'); ?>
<script type='text/javascript'>

 var _GLOBAL={};
 
  _GLOBAL.NSFW  =0;
 
_GLOBAL.base ='<?php  echo THIS_SITE; ?>';
_GLOBAL.dtype="<?php echo $dtype;?>";
$(function() {




     $("img.lazy").lazyload();
     $(window).resize();


     //console.log(   "TEST!!!"+ $('.current_list').html())
    
    
     $('.selector_container').hover(
      function (){_GLOBAL.mouseover=  true;},
      function(){_GLOBAL.mouseover=  false;})

     $('.styleSelect').click(function (){
         var status =   $(this).data('act');
         if(status=='cls')
         {
           $('.option_list').fadeIn(100);
           $(this).data('act' , 'op'); 
                    
               $('html').click(function() {
                if(!_GLOBAL.mouseover)
                {
                  $('.option_list').fadeOut(100);
                  $('.styleSelect').data('act' , 'cls');
                  $('html').off('click')
                }
               
               });  
         }
         else
         {
           $('.option_list').fadeOut(100);
           $('.styleSelect').data('act' , 'cls');
           $('html').off('click')
         }
     });

     $('.option_list_item').click(function (){
           var _typ =   $( this ).data('type');
           $('.POP_CONT').not('.POP_MCP , .POP_MSGSUCCESS').fadeIn(500);
           setTimeout(function (){location.href=_GLOBAL.base+'mostviewed/' + _typ ;} , 100) 
     })
     $('.option_list_item').each(function (){
         var type= $(this).data('type');
         if(type==_GLOBAL.dtype)
          {$(this).css('color' , '#888')}

     })

     $(".index .minfo ").ellipsis({
        row: 2,
        char: '...'
     });
      $("img").error(function(){  
     
        $(this).hide();
      });
      $(".index.mov").each(function(){
        /*  if($(this).data("id") == 0||$(this).data("id") == 3||$(this).data("id") == 5||$(this).data("id") == 7||$(this).data("id") == 9
            ||$(this).data("id") == 11||$(this).data("id") == 13||$(this).data("id") == 15||$(this).data("id") == 17||$(this).data("id") == 19)
          {$(this).css("float" , "left")}*/
      })

      ////////////////////
        try{
          var from = (getCookie('track_menu')=="" || !getCookie('track_menu'))? "MAIN":getCookie('track_menu');
          var siteMap_index = 'MOST-VIEWED';
          console.log('test:' + cnf_1X1.params[siteMap_index].sec );
          cnf_1X1.nxmObj={
        "region":"US",
        "prod":"TOMONEWS",
        "site":"<?php echo THIS_SITE;?>",
        "platform":"WEB",  //WEB | MOBWEB | ANDROID | IPHONE | IPAD | TABLET 
        "section":cnf_1X1.params[siteMap_index].sec, ////Site map
        "media":"TEXT",//Site map
        "content":"HOME",  //Site map
        "issueid":"",      //Aritcle Issue Date or send blank for homepage/index
        "title":"",        //Article Title, Photo Title, etc or send Blank for home page/index page
        "cid":"",          //Article ID/Photo ID or send blank for Menu/Index pages
        "news":"TOMONEWS", //Site map
        "edm":"<?php echo ($cate_title=='us')? 'RECOMM':($cate_title=='world')?  'TOPIC': '';?>",          //Site map
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