<?php 
include_once('configA.php');
include_once('api_settingA.php');
include_once('device.php');
include_once('psv_preprocess.php');

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
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7365156/7009372/css/fonts.css" />
	<link rel="icon" href="<?php  echo THIS_SITE; ?>img/favicon.png?v=1" type="image/png" />
	<link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/style.min.css?nocache=0827">
  <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/passive.min.css?nocache=0127">
  <link rel="stylesheet" href="<?php  echo THIS_SITE; ?>stylesheets/jquery-ui.min.css">

   <!-- Facebook Header -->
<meta property="og:title" content="<?php  echo strip_tags($meta_tit); ?>"/>
<meta property="og:type" content="website"/>
<meta property="og:description" content="<?php  echo str_replace('"','',strip_tags($meta_desc)); ?>"/>
<meta property="og:url" content="<?php  echo THIS_SITE.urlencode(str_replace(' ', '-', remove_punc($meta_tit))).'-'.$meta_vid; ?>"/>
<meta property="og:image" content="<?php  echo $thumb; ?>" />
<meta property="og:site_name" content="<?php  echo strip_tags($meta_tit); ?>"/>

<!-- twttier Header -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@TomoNewsUS">
<meta name="twitter:title" content="<?php  echo strip_tags($meta_tit); ?>">
<meta name="twitter:description" content="<?php  echo str_replace('"','',strip_tags($meta_desc)); ?>">
<meta name="twitter:image:src" content="<?php  echo $thumb; ?>">
<meta name="twitter:image:width" content="480">

 <?php  include_once("head_scripts.php"); ?>
  <script src="<?php echo THIS_SITE; ?>js/all.min.js?nocache=0127"></script>      
  <script src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
  <script src="http://dev.imp.nextmedia.com/js/nxm_tr_v16_dev.js?t=1119" ></script>


<script type="application/ld+json"> 
	
	{ 
      "@context": "http://schema.org", 
      "@type": "VideoObject", 
      "name": "<?php echo $meta_tit;?>", 
	  "description": "<?php  echo str_replace('"','',strip_tags($meta_desc)); ?>", 
      "thumbnailUrl": "<?php  echo $thumb; ?>", 
      "uploadDate": "<?php  echo $cdate22.'.000Z';?>", 
	  "duration": "PT<?php echo (string)$parseDur[0];?>M<?php  echo (string)$parseDur[1];?>S",
	  "contentUrl": "http://video-pdu.us.tomonews.com/encoded-586/media/<?php  echo $meta_vid; ?>/819200-854x480.mp4",
	  "interactionCount": "<?php  echo number_format($counter) ?>"
    } 
	
</script>
<?php  include_once('ga.php'); ?>	
</head>
<style>
.styleSelect{  background: #e2e0e1 url("<?php echo THIS_SITE;?>img/select_ico.jpg") no-repeat 100% 50%;}
.social_top .sc_item{display: inline-block;width:34px;}
.social_top .sc_item.invi {display: none;}
.rwd_image {
    display: block;
    max-width: 100%;
    width: 100%;
    height: auto;
}
</style>
<script>
var Player_w = '626px';
var Player_h = '352px';
var Pageurl = encodeURIComponent(document.URL);
var mediaId = '<?php  echo $meta_vid?>';
var vastUrl = 'http://vast.bp3863315.btrll.com/vast/3863315?n={timestamp}&br_pageurl={pageurl}&br_conurl=http%3A%2F%2Fvideo-pdu.us.tomonews.net%2Fencoded-586%2Fmedia%2F{mediaId}%2F819200-854x480.mp4';

function preProcessorFunction(vastUrl) {
	var replaceData = {                                       
        Player_w: Player_w,
        Player_h: Player_h,
        pageurl: Pageurl,
        timestamp: new Date().getTime().toString(),
		mediaId: mediaId,
	};
 
	var output = replaceTokens(vastUrl, replaceData);
    return output;
}

function replaceTokens(str, data) {
    return str.replace(/{([^{}]*)}/g, function(a, b) {
        var r = data[b];
        return typeof r === "string" || typeof r === "number" ? r : a
    })
}

</script>
<body>
 
	<div class="wapper"> 
		<?php  
		$ad728x90=$ad_psv_728x90;
		include_once('header_passive.php'); 
		?>
	</div>

  <div id="vdo_wapper" style="display:table;position:relative;top:130px;padding-bottom:100px;">
			<div id="vdo_content" style="display:block;width:1000px; height:auto">
			<div id="ad_box728x90" ><?php echo $ad728x90;?></div> 
      <!-- heaeder  -->
      <div class="passive_header">  
		     <span class="playing">PLAYING NOW:</span>
        

         <div class="styleSelect btn">
             <label class="current_list"><?php echo $current_title;?></label>
          </div>
           <div class="option_list invi">
                 <div class="option_list_left">
                    <!--  <p class="title">Editor's Pick</p> -->
                     <?php 
                       foreach( $plTitles_arr as $key => $value)
                       {
                          echo '<p class="option_list_item btn" data-id="'.$playlists_arr[$key].'">'.$value.'</p>';
                       }
                     ?>                  
                 </div>
                 

           </div>
        </div>
     <!-- video player -->
	 
        <div id="vdoplayer"></div>
		<div id="vodx_playnext" class="vodxcls"><img src="<?php echo THIS_SITE;?>img/right_ico2.png"></div>
        <div id="vodx_playprev" class="vodxcls"><img src="<?php echo THIS_SITE;?>img/left_ico2.png"></div>
     
     
     <!-- current playlist -->
     <div class='thumbnails_container current'>
       <div class='thumbnails_container_box'>
       <div class="thumbnails_container_box_line">
         <div class="thumbnail_item">
            
         </div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
        </div>
      </div>
         <div class="btn_left btn"><img src="<?php echo THIS_SITE;?>img/left_ico.png"></div>
         <div class="btn_right btn"><img src="<?php echo THIS_SITE;?>img/right_ico.png"></div>

     </div>
     <!-- player info -->
     <div class="vdo_infobox">
         <div class="vdo_infobox_left"><div id="ad_box300x250"><?php echo $ad_psv_300x250;?></div></div>
         <div class="vdo_infobox_right">

             <div itemprop="name" id="vdo_title"></div>
             <div itemprop="description" id="vdo_sub"></div>
			 <div id="vdo_date" style="display:none;"></div>

             <!-- <a href="#" target="_blank" id="readmore_lnk"><div class="readmore">Read the Full Article Here</div></a> -->

             <div style="display:table">
           <div class="social_top" style="display:table-cell" id="scbar_top">			
						  <div class="sc_item fb "><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_fb_s.png"></div>
						  <div class="sc_item twr "><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_tw_s.png"></div>
						  <a href="whatsapp://send?text=<?php echo THIS_SITE. $video_id?> via @TomoNewsUS" data-action="share/whatsapp/share"> <div class="sc_item wapp " ><img img width="100%"  class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_wapp_s.png"></div></a>
						  <div class="sc_item email "><img img width="100%"  class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_email_s.png"></div>
						  <div class="sc_item btn_social" ><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_plus_s.png"></div>
						  <div class="sc_item url sc_item2 invi "><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_url_s.png"></div>
						  <div class="sc_item gplus sc_item2 invi"><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_gplus_s.png"></div>
						  <div class="sc_item stum sc_item2 invi"><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_stumble_s.png"></div>
						  <div class="sc_item reddit sc_item2 invi"><img img width="100%" class='rwd_image' src="<?php echo THIS_SITE;?>img/icon_reddit_s.png"></div>
					</div>
					<div style="display:table-cell;vertical-align:middle;width:150px;" align="right">
						<span>&nbsp;&nbsp;&nbsp;</span>
						<span style="font-size:12pt"></span>
							<!--<img src="img/icon_eye.gif">
							<span style="font-size:9.5pt"><?php  //echo number_format($counter) ?></span>-->
					</div>
            
          </div>
          </div><!-- vdo_infobox_right -->
          <div class="clr"></div>
     </div>
     <!-- basnner deco -->
     <div class='deco_banner'></div>

     <!--TRENDING NOW  -->
     <div class="thumbnails_container bottom b1">
       <a class="list_tit"href="<?php echo THIS_SITE.$playlistsBottom_arr[0];?>"> <div class="thumbnails_container_title"><?php echo $plTitles_arr[1];?></div></a>
         <div class='thumbnails_container_box'>
         <div class="bottom_loading"><img src="<?php echo THIS_SITE;?>img/loading11.gif"></div>
         <div class="thumbnails_container_box_line">
        <div class="thumbnail_item">
            
            <div class="thumbnail_title"></div>
         </div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
        </div></div>
     
         <div class="btn_left btn"><img src="<?php echo THIS_SITE;?>img/left_ico.png"></div>
         <div class="btn_right btn"><img src="<?php echo THIS_SITE;?>img/right_ico.png"></div>
     </div>

     <!--GET A ROOM -->
     <div class="thumbnails_container bottom b2">
        <a class="list_tit"href="<?php echo THIS_SITE.$playlistsBottom_arr[1];?>"><div class="thumbnails_container_title"><?php echo $plTitles_arr[2];?></div></a>
        <div class='thumbnails_container_box'>
         <div class="bottom_loading"><img src="<?php echo THIS_SITE;?>img/loading11.gif"></div>
         <div class="thumbnails_container_box_line">
        <div class="thumbnail_item">
            <div class="thumbnail_title"></div>
         </div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
       </div></div>
         <div class="btn_left btn"><img src="<?php echo THIS_SITE;?>img/left_ico.png"></div>
         <div class="btn_right btn"><img src="<?php echo THIS_SITE;?>img/right_ico.png"></div>
     </div>

     <!--POLICE SHOOTING  -->
     <div class="thumbnails_container bottom b3">
        <a class="list_tit"href="<?php echo THIS_SITE.$playlistsBottom_arr[2];?>"><div class="thumbnails_container_title"><?php echo $plTitles_arr[3];?></div></a>
        <div class='thumbnails_container_box'>
          <div class="bottom_loading"><img src="<?php echo THIS_SITE;?>img/loading11.gif"></div>
         <div class="thumbnails_container_box_line">
        <div class="thumbnail_item">

            <div class="thumbnail_title"></div>
         </div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
         </div></div>
         <div class="btn_left btn"><img src="<?php echo THIS_SITE;?>img/left_ico.png"></div>
         <div class="btn_right btn"><img src="<?php echo THIS_SITE;?>img/right_ico.png"></div>
     </div>

     <!--TRENDING NOW  -->
     <div class="thumbnails_container bottom b4">
        <a class="list_tit"href="<?php echo THIS_SITE.$playlistsBottom_arr[3];?>"><div class="thumbnails_container_title"><?php echo $plTitles_arr[4];?></div></a>
        <div class='thumbnails_container_box'>
          <div class="bottom_loading"><img src="<?php echo THIS_SITE;?>img/loading11.gif"></div>
         <div class="thumbnails_container_box_line">
        <div class="thumbnail_item">
            <div class="thumbnail_title"></div>
         </div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
         </div></div>
         <div class="btn_left btn"><img src="<?php echo THIS_SITE;?>img/left_ico.png"></div>
         <div class="btn_right btn"><img src="<?php echo THIS_SITE;?>img/right_ico.png"></div>
     </div>

      <div class="thumbnails_container bottom b5">
        <a class="list_tit"href="<?php echo THIS_SITE.$playlistsBottom_arr[4];?>"><div class="thumbnails_container_title"><?php echo $plTitles_arr[5];?></div></a>
        <div class='thumbnails_container_box'>
          <div class="bottom_loading"><img src="<?php echo THIS_SITE;?>img/loading11.gif"></div>
         <div class="thumbnails_container_box_line">
        <div class="thumbnail_item">
            <div class="thumbnail_title"></div>
         </div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
         </div></div>
         <div class="btn_left btn"><img src="<?php echo THIS_SITE;?>img/left_ico.png"></div>
         <div class="btn_right btn"><img src="<?php echo THIS_SITE;?>img/right_ico.png"></div>
     </div>
    
     <div class="thumbnails_container bottom b6">
       <a class="list_tit"href="<?php echo THIS_SITE.$playlistsBottom_arr[5];?>"> <div class="thumbnails_container_title"><?php echo $plTitles_arr[6];?></div></a>
        <div class='thumbnails_container_box'>

          <div class="bottom_loading"><img src="<?php echo THIS_SITE;?>img/loading11.gif"></div>
         <div class="thumbnails_container_box_line">
        <div class="thumbnail_item">
            <div class="thumbnail_title"></div>
         </div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
         <div class="thumbnail_item"></div>
         </div></div>
         <div class="btn_left btn"><img src="<?php echo THIS_SITE;?>img/left_ico.png"></div>
         <div class="btn_right btn"><img src="<?php echo THIS_SITE;?>img/right_ico.png"></div>
     </div>
		
	</div>
	
	
</div>

	
	<?php  include_once('footer.php'); ?>
	
  <script src="<?php  echo THIS_SITE; ?>js/passive.min.js?nocache=0127"></script>   
  
<script>

function response(result) {
	var $textA = $('textarea');
	$textA.html((result));
}

var _GLOBAL={};
  _GLOBAL.PAGE = "PASSIVE"
  _GLOBAL.base ='<?php  echo THIS_SITE; ?>';

  _GLOBAL.list_id = '<?php echo $PL;?>';
  _GLOBAL.list_page=<?php echo $page;?>;
  _GLOBAL.NSFW  =0;
  _GLOBAL.anvato_player  = '<?php  echo ANVATO_PLAYER_SRC;?>';

  
  var _tbns_pl;
$(function() {
      try{
        var from = (getCookie('track_menu')=="" || !getCookie('track_menu'))? "MAIN":getCookie('track_menu');
           var siteMap_index = 'TOMOPLAY';
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

     //change color of current option
     $('.option_list_item').each(function (){
       var id = $(this).data('id');
       if(id==_GLOBAL.list_id)
        {$(this).css('color' , '#999')}

     })
     _tbns_pl = new TBNS_PL() ;
     _tbns_pl.init( _GLOBAL.list_id , <?php echo $page;?> ,'<?php echo $video_id; ?>' ,'.thumbnails_container.current .thumbnails_container_box_line' , _callback);

     function _callback(){
         var _tbns_pl1=new TBNS_PL_BOTTOM();
         _tbns_pl1.init('<?php echo $playlists_arr[1];?>', 1 ,'' ,'.thumbnails_container.bottom.b1 .thumbnails_container_box_line','.thumbnails_container.bottom.b1');
         var _tbns_pl2=new TBNS_PL_BOTTOM();
         _tbns_pl2.init('<?php echo $playlists_arr[2];?>', 1 ,'' ,'.thumbnails_container.bottom.b2 .thumbnails_container_box_line' ,'.thumbnails_container.bottom.b2');
         var _tbns_pl3=new TBNS_PL_BOTTOM();
         _tbns_pl3.init('<?php echo $playlists_arr[3];?>', 1 ,'' ,'.thumbnails_container.bottom.b3 .thumbnails_container_box_line' ,'.thumbnails_container.bottom.b3');
         var _tbns_pl4=new TBNS_PL_BOTTOM();
         _tbns_pl4.init('<?php echo $playlists_arr[4];?>', 1 ,'' ,'.thumbnails_container.bottom.b4 .thumbnails_container_box_line','.thumbnails_container.bottom.b4');
         var _tbns_pl5=new TBNS_PL_BOTTOM();
         _tbns_pl5.init('<?php echo $playlists_arr[5];?>', 1 ,'' ,'.thumbnails_container.bottom.b5 .thumbnails_container_box_line' ,'.thumbnails_container.bottom.b5');
         var _tbns_pl6=new TBNS_PL_BOTTOM();
         _tbns_pl6.init('<?php echo $playlists_arr[6];?>', 1 ,'' ,'.thumbnails_container.bottom.b6 .thumbnails_container_box_line','.thumbnails_container.bottom.b6');
	 }
	 
     $(window).resize();

     $(".index .minfo ").ellipsis({
        row: 2,
        char: '...'
     });
      $("img").error(function(){  
     
        $(this).hide();
      });
      /*var _vsb = new VDO_SOCIAL_BOX();
      _vsb.init();*/
	  	var _social1 = new SOCIAL_BTNS($('#scbar_top'))
      _social1.init();
      var _sl_list= new SELECT_LIST();
      _sl_list.init()

      $('.option_list_item').click(function (){
         var id = $(this).data('id');
         location.href=_GLOBAL.base +"tomoplay/"+ id;
      })

});

/* OPTION SELECT */
function SELECT_LIST(){
  var status='close';

    this.init=function()
    {
       $('.styleSelect').click(function(){
          if(status=='close')
          {
            $('.option_list').fadeIn(100);
            status ='open' ;
               $('html').click(function() {
                if(!_GLOBAL.mouseover)
                {
                  $('.option_list').fadeOut(100);
                  status = 'close'
                  $('html').off('click')
                }
               
               });  
           }
           else 
           {
            $('.option_list').fadeOut(100);
            status ='close'
            $('html').off('click')
           }
       })
       $('.passive_header').hover(
      function (){_GLOBAL.mouseover=  true;},
      function(){_GLOBAL.mouseover=  false;})


       $('.selector_container').hover(
      function (){_GLOBAL.mouseover=  true;},
      function(){_GLOBAL.mouseover=  false;})


    }
}

</script>
</body>
</html>