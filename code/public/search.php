<?php 
include_once('configA.php');
include_once('api_settingA.php');
include_once('device.php');
include_once('xss_lib.php');
//ini_set('display_errors', 'On');
$kw=$_GET['kw'];
//$kw=str_replace(' ','+',$kw);
//$kw = rawurlencode($_GET['kw']);
//$kw=xss_clean($kw);
//$kw=transform_HTML($kw);

$page=isset($_GET['page']) ? (int)$_GET['page'] : '';
$debug_mode=isset($_GET['debug_mode']) ? $_GET['debug_mode'] : '';
if($page==0){ $page='1'; }
$dterm=isset($_GET['dterm']) ? $_GET['dterm'] : '';
$sdate=isset($_GET['sdate']) ? $_GET['sdate'] : '';
$edate=isset($_GET['edate']) ? $_GET['edate'] : '';

if($dterm!=''&&($dterm=='1'||$dterm=='2'||$dterm=='3')){
	if($dterm=='1'){
		$sdate=date("Y-m-d",strtotime("last day"));
		$edate=date('Y-m-d');
	}
	if($dterm=='2'){
		$sdate=date("Y-m-d",strtotime("last week"));
		$edate=date('Y-m-d');
	}
	if($dterm=='3'){
		$sdate=date("Y-m-d",strtotime("last year"));
		$edate=date('Y-m-d');
	}
}
$thisURL='search?kw='.urlencode($kw);
$range='';
if($sdate!=''&&$edate!=''){ $range = '&filters[]=c_ts_publish_l:['.strtotime('+0 day',strtotime($sdate)).'%20TO%20'.strtotime('+1 day',strtotime($edate)).']'; $thisURL=$thisURL.'&sdate='.$sdate.'&edate='.$edate;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php  site_title() ?></title>
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
    <script src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
   
 <script type="application/ld+json"> 
    { 
      "@context": "http://schema.org", 
      "@type": "Webpage", 
      "headline": "<?php site_title();?>", 
      "url": "<?php  echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>", 
      "thumbnailUrl": "", 
      <?php $cdate22=date("Y-m-d\TH:i:s") ;   $cdate22= $cdate22.'.000Z';?>
      "dateCreated": "<?php  echo $cdate22; ?>", 
      "articleSection": "SEARCH", 
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
<body>
	<div class="wapper"> 
		<?php  
		include_once('header.php'); 
		?>
	</div>
	
	<div id="srh_lab2" align="center" style="text-transform:uppercase; display: table;position: relative;top: 100px;">
			<div id="search_txt"> your search </div>
			<div id="search_sec">
				<form id="search_box_form2">
					<input type="text" id="search2" name="search2" value="<?php  echo urldecode($kw);?>">
				</form>
				<div id="search_btn2"></div>
			</div>
	</div>
	
	<?php  $ad728x90=$ad_search_728x90;?>
	<div id="lists" style="padding-top:30px;width:970px;top: 100px;margin-bottom: 100px;" class="srh_lis_bg">
		<div class="mov" style="width: 728px; height: 90px;background:#ccc;display: block;margin: auto;margin-bottom:20px;"><?php  echo $ad728x90;?></div>
		<div id="search_wapper">
			<div id="search_term">
				<div id="search_term_1">
					<span class="search_term_til">Date Range</span>
					<br><img src="<?php  echo THIS_SITE; ?>img/datepicker_line.gif"><br>
					<a href="<?php  echo THIS_SITE; ?>search?kw=<?php  echo $kw; ?>&dterm=1"><span>Past 24 Hours</span></a>
					<br><img src="<?php  echo THIS_SITE; ?>img/datepicker_line.gif"><br>
					<a href="<?php  echo THIS_SITE; ?>search?kw=<?php  echo $kw; ?>&dterm=2"><span>Past 7 Days</span></a>
					<br><img src="<?php  echo THIS_SITE; ?>img/datepicker_line.gif"><br>
					<a href="<?php  echo THIS_SITE; ?>search?kw=<?php  echo $kw; ?>&dterm=3"><span>Past 12 Months</span></a>
					<br><img src="<?php  echo THIS_SITE; ?>img/datepicker_line.gif"><br>
					<span>Specific Dates</span>
					<br><img src="<?php  echo THIS_SITE; ?>img/datepicker_line.gif"><br>
					<span class="search_term_til">From</span><br>
						<div class="dtpicker">
							<input type="text" id="sdate" name="sdate" value="<?php  echo $sdate; ?>">

						</div>
						<input type="hidden" id="kw" name="kw" value="<?php  echo $kw; ?>">
					<span class="search_term_til">to</span><br>
						<div class="dtpicker">
							<input type="text" id="edate" name="edate" value="<?php  echo $edate; ?>">

						</div>
					<div align="center"><br><img src="<?php  echo THIS_SITE; ?>img/datepick_btn.png" id="datepick_btn" ></div>
						</div>
						
			
				<?php  
				$ad300x250_1 = $ad_search_300x250;
				echo '<div class="mov" style="width: 300px; height:250px;margin:10px 0 0 0;">'.$ad300x250_1.'</div>';?>
			</div>
			<div id="search_result">
				<?php 
				/*$getUrls=get_searchList($kw,($page-1),10,$sdate,$edate);
				if($debug_mode=='1'){ echo 'getUrls : <br>',$getUrls,'<hr>'; }	
				$data=curl_info($getUrls);
				if($debug_mode=='1'){ echo 'data : <br>',$data,'<hr>'; }
				$dAry=json_decode($data, true);
				$dAryn=$dAry['pager']['list'][0]['media'];
				$totals=$dAry['pager']['totalItems'];
				*/
		// $getUrls= APPLICATION_FEED_URL.'KBJRKBD5PNUFPGRALF?start='.(($page - 1)* PAGE_LIMIT_CATEGORY).'&count='.PAGE_LIMIT_CATEGORY.$range.'&sort=c_ts_publish_l+desc&q="'.$kw.'"';
		$today = date('Y-m-d');
		$getUrls = "https://cms.nextanimation.com.tw/api/getProgramVideos?program=TomoNews%20US&published_date=$today&counts=20&page=$page&keyword=$kw";
		$data=curl_info($getUrls, null);
        $dAry=json_decode($data, true);		
		$dAryn=$dAry['docs'];
		$totals=$dAry['numFound'];		
		$i=0;
				if($totals=='0'){
					echo '<div style="font-size:20pt;padding:20pt" align="center">Sorry, no results found. Try something else!</div>';
				}else{
					foreach ($dAryn as $key => $value) {
						
						$NSFW_v = false;
                        $thumbnail = $value['thumbnails'];
                        $thumb = $thumbnail['url'];
		 if( isset($value['u_NSFW_Tag_s']) && $value['u_NSFW_Tag_s']=='NSFW' ){  $NSFW_v = true; }

			            show_search_content($value['obj_id'],substr(strip_tags ($value['c_description_s']),0,180),$value['c_title_s'],$value['c_ts_publish_l'], $thumb);
			        }
				}					
		        //////////////////////////////
		        //$totals=$dAry['pager']['totalItems'];
        if($debug_mode=='2'){ echo 'totals : <br>',$totals,'<hr>'; }
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
        	if($showStart<=1){$showStart=1;}
        }
				?>
							

				
				<div class="cb"><br><br><br></div>
				<?php  if( $totalPage>=1 ){ ?>
				<div class="pager">
					<div class="pager_cnt"><a href="<?php  echo $thisURL; ?>&page=1"><span>&lt;&lt;First</span></a></div>
					<div class="pager_cnt"><a href="<?php  echo $thisURL; ?>&page=<?php  echo $prePage; ?>"><span>&lt;Previous</span></a></div>
					<div class="pager_cnt">
						
						<?php 
						for($i=$showStart;$i<=$showEnd;$i++  ){
							?>
							<a href="<?php  echo $thisURL; ?>&page=<?php  echo $i; ?>"><span class="pgcount <?php  if($i==$page){ ?>current<?php  } ?> "><?php  echo $i; ?></span></a>
							<?php 
						}
						?>
					</div>
					<div class="pager_cnt"><a href="<?php  echo $thisURL; ?>&page=<?php  echo $nexPage; ?>"><span>Next&gt;</span></a></div>
					<div class="pager_cnt"><a href="<?php  echo $thisURL; ?>&page=<?php  echo $totalPage; ?>"><span>Last&gt;&gt;</span></a></div>
				</div>
				<?php  } ?>
			</div>
		</div>

	</div>
	
	<?php  include_once('footer.php'); ?>
	<script>
		// search datepicker 
		$('#sdate').datepicker({ dateFormat: "yy-mm-dd" });
		$('#edate').datepicker({ dateFormat: "yy-mm-dd" });
		 
		$('#datepick_btn').click(function(){
			var sdate=$('#sdate').val(),edate=$('#edate').val(),kw=$('#kw').val();
			if(kw!=''&&sdate!=''&&edate!=''){
				location.href='<?php  echo THIS_SITE; ?>search?kw='+encodeURI(kw)+'&edate='+edate+'&sdate='+sdate;
			}
		})
		var v1=$("#search_text").val();
		var v2=$("#search2").val();
		if(v1!=''){ $('#search1').css('background','url("<?php  echo THIS_SITE; ?>img/input_o.gif")') }
		if(v2!=''){ $('#search_sec').css('background','url("<?php  echo THIS_SITE; ?>img/search_1o.gif")') }
	</script>
</body>
<script>

$(function() {
	try{
		var from = (getCookie('track_menu')=="" || !getCookie('track_menu'))? "MAIN":getCookie('track_menu');
     var siteMap_index = 'SEARCH';
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
        /*"edm":"<?php echo ($cate_title=='us')? 'RECOMM':($cate_title=='world')?  'TOPIC': '';?>",          //Site map*/
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
})
 
</script>
</html>
