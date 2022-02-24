/**

COOKIE寫入未完成
check box 未完成
*/
function MCP(){
    var PARENT
    var FORM
    
    this.init=function(parent , form){
       PARENT = parent;
       FORM = form//$('#mc-embedded-subscribe-formx');   
       FORM.unbind('submit');   
       
       var ele = document.querySelectorAll("input[name='group[17][1]']");
       for(var i=0;i<ele.length;i++){
           ele[i].checked = true;
       }
       ele = document.querySelectorAll("input[name='group[17][2]']");
       for(var i=0;i<ele.length;i++){
           ele[i].checked = true;
       }
        $( ".mce-EMAIL" ).focus(function() {
            _GLOBAL.mailchimpFocus = true; 
   
        }).focusout(function(){
          _GLOBAL.mailchimpFocus = false;
        }); 
         /////
            $(PARENT).find('.btn_go').bind('click', function ( event ) {
            event.preventDefault();
            console.log('clk')
            checkform();
            });

          $('.mce-EMAIL').keypress(function (e) {
            if (e.keyCode == 13) {
                event.preventDefault();
                console.log('clk')
                checkform();
            } else {
              // your code here...
            }
          });     
      
    }


    function calcRoute(e) {
     alert('form submitted');
     e.preventDefault();
   }

function register() {
     //GT('register' , 'clk' ,'Categories_NewsletterSignup');
     $(PARENT).find('.mce_inline_error').html('')
    $.ajax({
        type: 'get',
        url: '//tomonews.us2.list-manage.com/subscribe/post-json?u=28c2f2044f22c46a64747226f&amp;id=8254ba5d15&c=?',
        data: FORM.serialize(),
        cache       : false,
        dataType    : 'json',
        crossDomain: true,
        contentType: "application/json; charset=utf-8",
        error       : function(err) { alert("Could not connect to the registration server. Please try again later."); },
        success     : function(data) {

           if(data.result =="success")
            {
               
                   $(PARENT).html('<div class="txt_success">Thanks for subscribing!</div>');
                   $(PARENT).animate({height:80} , 500)
                   return;
            }           
           else 
           {

              var str=data.msg ;// 'Oops! Looks like you are already subscribed to our newsletter. Check your spam folder or <a href="http://tomonews.us2.list-manage.com/subscribe/post?u=28c2f2044f22c46a64747226f&id=8254ba5d15" target="_blank" style="color:#ff6600">click here</a> to update your subscription preferences';
              $( "#dialog > p" ).html(str)
           }
            $( "#dialog" ).dialog();

            $(".ui-dialog-titlebar").css("background" , "none");
            $(".ui-dialog-titlebar").css("border", "0px solid #aaaaaa")
            $("#dialog > p" ).css("font-size" , "14px");
            $('#dialog > p > a').css('color' , '#ff6600');
            $('#dialog > p > a').attr('target' , '_blank');
            $('.ui-dialog').css({'position':'fixed' , 
                                 'top'     : 300,
                                 'border'  : '1px solid #aaa',
                                 'background': '#fff url("images/ui-bg_flat_75_ffffff_40x100.png") 50% 50% repeat-x',
                                 'color': '#222',
                                 'z-index': '999999'
                               })
            $('.ui-button.ui-widget').html('<img src="'+ thisSite + 'img/ico_x.gif" style="width: 13px;    height: 13px;    position: absolute;    top: 3px;    left: 3px;">')
            $('.ui-button.ui-widget').css({
              'top': '13px'              
              
            })
           
        }
    });
}

function checkform() {    //alert('subimit');
     email = $(PARENT).find(".mce-EMAIL"); 

      if(PARENT !=".formbox")
       {daily=document.getElementsByName("group[17][1]")[0].checked;//$("#mce-group[17]-17-0").checked
        weekly=document.getElementsByName("group[17][2]")[0].checked;}
      else
      {daily = true ; weekly=true;}   
    var str='';
  // console.log(daily)
    if(email.val() == "") {
        str="Please enter a valid email address.";
        $(PARENT).find('.mce_inline_error').html(str);$(PARENT).find('.mce_inline_error').css("display" ,'block');
        return
    }else if(!checkEmail( email.val())) {
        str="Please enter a valid email address.";
        $(PARENT).find('.mce_inline_error').html(str);$(PARENT).find('.mce_inline_error').css("display" ,'block');
        return
    }
    //console.log(daily  + ":" +weekly ) 
    if(!daily && !weekly)
    {
     str="Please choose daily or weekly!"; 
     $(PARENT).find('.mce_inline_error').html(str);  $(PARENT).find('.mce_inline_error').css("display" ,'block');
     return 
    }    
    register(FORM);
}
function checkEmail(email) {
    EmailCheck = new RegExp(/^([a-zA-Z0-9]+)([\.\-\_]?[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(\.[a-zA-Z0-9\_\-]+)+$/)
    if (EmailCheck.test(email)) {
        return true;
    }
    else {
        return false;
    }
}

function ValidEmail(emailtoCheck) {
   
    var regExp = /^[^@^\s^,]+@[^\.@^\s^,]+(\.[^\.@^\s^,]+)+$/;
    if (emailtoCheck.match(regExp))
        return true;
    else
        return false;
}
function update_img(obj, _src){
    obj.attr("src",_src)
}

}




