function YMAL(){
  var array_imgs , array_titles ,array_cate,array_vids

  this.init=function(){
    array_imgs=[];
    array_titles=[];
    array_cate=[];
    array_vids=[];

    _CALL_AJAX();
  }

    function isInArray(value, array) {
	return array.indexOf(value) > -1;
	}
	
  function _CALL_AJAX(){
	
	$.ajax({
		url: cnf_YMAL.getUrls5,
		//data: {mid : $kw, searchBy : 'category_id', page: i, pageSize: e}, 
		type: "POST",
        dataType: "json",
        success: function(xml) {
			var videos = xml.docs;
			NumOfJData = (videos.length > 0 )? videos.length :0 ;  


			var vids = cnf_YMAL.vids;
			
			var k = 0;
			for (var i = 0; i < NumOfJData; i++) 
			{
				vid = videos[i].obj_id;
				if( isInArray(vid, vids) == false  ){ 
				  
					vid = videos[i].obj_id;
					date = new Date(videos[i].c_ts_publish_l * 1000);
					date = $.datepicker.formatDate('yy/mm/dd', date);
					view = 1;
					NSFW_v = false;
					mobile_headline={};
					mobile_headline.tit = videos[i].c_title_s; 
					thumbnail = videos[i].thumbnails;

					// for(var j = 0 ; j<thumbnail.length  ; j++){
						
					// 	if( thumbnail[j]['role']=='poster' ){  thumb = thumbnail[j]['url']; break; 
					// 	} else if( thumbnail[j]['role'] == 'square 128x128' && thumbnail[j]['width'] == '1000'){  thumb = thumbnail[j]['url']; break; 
					// 	} else if( thumbnail[j]['role'] == 'thumbnail' ){  thumb = thumbnail[j]['url']; break; }
						
					// }
					// thumb=/^http(s)?:\/\/(.+)$/i.exec(thumb);

					// var thumbN = '//'+thumb[2];
					var thumbN = thumbnail['url'];

					//var thumbN = thumb;
					
					if( videos[i]['u_NSFW_Tag_s'] && videos[i]['u_NSFW_Tag_s']=='NSFW' ){  NSFW_v = true; }

					array_cate.push(   {/*'title' :cate_name , */'date': date , /*'view':view , */'nsfw':NSFW_v});              
					array_titles.push(mobile_headline);
					array_vids.push(vid);
					array_imgs.push(thumbN);
					k++;
					paging = (typeof cnf_YMAL.PAGING !== 'undefined')? 12 : 9;
					if (k == paging){ break; }
				}
				
			}
			 
			  if(NumOfJData>0) update_view();
			 
			 return
        } 
    }).done(function(){ 
      });
  }

  function update_view(){
       $PAGE =cnf_YMAL.PAGE;
       $thumaType = cnf_YMAL.thumaType;
       for(var i=0;i<array_imgs.length ;i++)
       {
           // var link_a = _GLOBAL.base+remove_punc(array_titles[i].tit) + '-'+ array_vids[i] + '#c='+$PAGE+'&a=clk&l='+$PAGE+'_'+$thumaType;
           var link_a = _GLOBAL.base+array_vids[i];
           var video_id  = array_vids[i];
           $cateID = array_cate[i].title;
		   $cateName = checkmenuAry($cateID);
		   
           if($cateName=='NMA Originals')
           {
             $cateID=checkmenuAry('Tomo Originals');
             $cateName='Tomo Originals';
           }
           else                
           

           $title = array_titles[i].tit;
/*  var ___path = 'http://media-ssl.nextmedia.com/media-images-586/media/'+ video_id
           var  _img_file=(array_cate[i].nsfw  &&  _GLOBAL.NSFW )?___path + _GLOBAL.NSSQ_CDN +'/cropped/128x128.jpg"':___path +'/square/cropped/128x128.jpg"';
                if(! _GLOBAL.NSFW && array_cate[i].nsfw) _img_file =  _GLOBAL.base +_GLOBAL.SQ_TEST//_GLOBAL.SQ_TEST +'/cropped/128x128.jpg"'*/
           var ___path = array_imgs[i];	   
		   var  _img_file=(array_cate[i].nsfw  &&  _GLOBAL.NSFW )? ___path : ___path;
           if(! _GLOBAL.NSFW && array_cate[i].nsfw) _img_file =  _GLOBAL.base + _GLOBAL.TB_TEST;
		   
          //var html_str='<a href="'+ link_a +'"  onclick="'+link_gt_en+';return false;">'
        var html_str='<a href="'+ link_a +'">'
       +  '<div class="mov" style="width:310px;height:170px;margin:10px auto;position:relative;">'
       +  '<div class="movlabel" style="width:300px;height:170px; margin-left:0px;">'
       +  '<div class="mov_thumb" data-id="'+video_id+'" style="position:relative;width:300px;height:170px;overflow:hidden;display:block;">'    

       +  '<img class="pic_128" src="'+_img_file +'" width="300" height="170" style="position:absolute;top:0px;left:0px;"></div>'

      // + '<div class="w'+$cateID+' ml1" style="display:block;width:125px;height:27px;color:#FFFFFF;text-transform:uppercase;font-weight:bolder;margin:0; padding:0px;font-size:12px;">'+$cateName+'</div>'
       +'</div>'
       +'<div class="minfo" style="display:inline-block;top: 0px;font-size: 18px;font-weight: bold; line-height:21px;padding-left: 0px;width: 300px;height: auto;padding: 10px 0;position: initial;"><p>'
       +$title
       +'</p></div></div></a>';

         $('#ymal_list').append(html_str);
         //console.log(html_str)
    
       }


        /*$('.mov_thumb').each(function (){
           _chk_ifImageExist($(this) , $(this).data('id'))
        }) */

  }
 function htmlentities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}



 function _chk_ifImageExist(parent , vdo_id){
  //'<img src="http://media-ssl.nextmedia.com/media-images-586/media/'.$video_id.'/400x225.jpg" width="228" height="128" style="position:absolute;top:0px;left:-50px;"></div>';
  var nImg = parent.find('.pic_128')//$('.pic_128')
  nImg.onerror = function() {
     parent.html('<img src="http://media-ssl.nextmedia.com/media-images-586/media/'+vdo_id+'/400x225.jpg" width="228" height="128" style="position:absolute;top:0px;left:-50px;">');
  }
 

 }
  function checkmenuAry(title){
      menuAry= [];
      menuAry['U.S.']='4476';
      menuAry['World']='4477';
      menuAry['Asia']='4478';
      menuAry['Sci & Tech']='4485';
      menuAry['Sports']='4479';
      menuAry['Entertainment']='4480';
      menuAry['Politics']='4481';
      menuAry['Geek']='4482';
      menuAry['TomoGirls']='4483';
      menuAry['Society']='4484';
      menuAry['Chinese']='4486';
      menuAry['No Comment']='4487';
      menuAry['Tomo Originals']='4489';
	var _key;
	
	for(var key in menuAry) {
		if (menuAry[key] == title){
			_key = key;
		}
	};

    return  _key;

  }
 }
