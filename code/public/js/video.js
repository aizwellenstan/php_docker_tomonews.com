 function IMG_LOAD(){
        var imagesN = $("body img").length;      
        var $imgs = $('body img'), count = 0;
        $imgs.imagesLoaded().progress(function(instance, image){
            count ++;
            percent = Math.round(count/$imgs.length*100);
            if(count == $imgs.length){
                  $(".headline_img").each(function (){
                     var _ww= parseInt($(this).find(".origin_img").css('width'));      
                     var _hh= parseInt($(this).find(".origin_img").css('height'));  
                     var _r = 600/680;
                     var target_w ;
                     if(_ww/_hh > _r)
                     {
                        $(this).find(".origin_img").animate({width:"600px"} ,500);
                        target_w = 600
                     }
                     else
                     {
                        $(this).find(".origin_img").animate({height:"680px"} ,500);
                        target_w =Math.round( _ww/_hh * 680);
                     }
                       $(this).find(".headline_tite").css('width' , target_w);
                  })
                  _img_slider=new SLIDER_POP();
                  _img_slider.initialize();
            }
        });
	}

function set_listen(){
           $('#shre_icon3').click(function(){
             $("#share_box2").appendTo("#social_top");
             $('#share_box3').css('left' ,65)
             $('#share_box3').show();
          })
          $('#shre_icon4').click(function(){
            $("#share_box2").appendTo("#social_bottom");
            $('#share_box3').css('left' ,205)
            $('#share_box3').show();
          })
       
          $('#sb_close').click(function(){
            $('#share_box3').fadeOut('fast');
          })
          $('.nxt_vdo_item').click(function (){
            var link = $(this).data('link');
            //GT("video" , "clk" ,"NextOnTomo_clk")
            setTimeout(function(){location.href=link;} , 200);

          })
           $(".pmc").on('click', function(e) {
             e.preventDefault()
             //GT("video" , "clk" ,"Video_NewsletterSignup_clk");
             var self = this;
             $('#mc-embedded-subscribe-form').submit();
         });
     }
	 
	
	    function copyToClipboard() {
        $('#sb_copy').zclip({
          path:_GLOBAL.base+'js/ZeroClipboard.swf',
          copy:$('#sb_copy_rtn').val()
    });
    }
    function copyToClipboard2() {
        $('#sb6').zclip({
          path:_GLOBAL.base+'js/ZeroClipboard.swf',
          copy:$('#sb_copy_rtn2').val()
        });
    }
	
	function SOCIAL_BTNS(t) {
    function e() {
        window.prompt("Select all and press 'Copy'", location.href)
    }
    var i = 0,
        n = t.find(".btn_social"),
        o = t.find(".sc_item2");
    this.init = function() {
        n.click(function() {
            i ? ($(this).fadeIn("fast").css("display", "inline-block"), o.hide(), i = 0) : ($(this).hide(), o.fadeIn("fast").css("display", "inline-block"), i = 1)
        }), t.find(".sc_item.fb").click(function() {
            window.open("http://www.facebook.com/share.php?u=".concat(encodeURIComponent(location.href)))
        }), t.find(".sc_item.twr").click(function() {
            window.open("https://twitter.com/share?url=" + encodeURIComponent(location.href) + "&via=TomoNewsUS&text=" + _GLOBAL.tempstr)
        }), t.find(".sc_item.email").click(function() {
            window.location.href = "mailto:?subject=" + _GLOBAL.tempstr + "&body=" + encodeURIComponent(location.href)
        }), t.find(".sc_item.url").click(function() {
            e()
        }), t.find(".sc_item.gplus").click(function() {
            window.open("https://plus.google.com/share?url=" + encodeURIComponent(location.href))
        }), t.find(".sc_item.stum").click(function() {
            window.open("http://www.stumbleupon.com/submit?url=" + encodeURIComponent(location.href) + "&title=" + _GLOBAL.tempstr)
        }), t.find(".sc_item.reddit").click(function() {
            window.open("http://reddit.com/submit?url=" + encodeURIComponent(location.href) + "&title=" + _GLOBAL.tempstr)
        })
    }
}