(function($) {
  window.fnames = new Array(); 
  window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';
  fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';
  fnames[3]='SIGNUP';ftypes[3]='text';
}(jQuery));

var $mcj = jQuery.noConflict(true);

function NEW_MCJ(){
 var parent
 this.init = function (){
    document.getElementById('mce-group[17]-17-0').checked = true;
    document.getElementById('mce-group[17]-17-1').checked = true;
    $('#mailbox_submit').bind('click', function ( event ) {
        event.preventDefault();
        checkform();
    });
    PARENT = '.mail_box'
    $(PARENT).find('#mce-EMAIL').keypress(function (e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            $(PARENT).find('#mailbox_submit').click();
            return false;
        } else {
            return true;
        }
     });
 }
}

function register($form) {
    $(PARENT).find('.mce_inline_error').html('')
    $.ajax({
        type: 'get',
        url: '//tomonews.us2.list-manage.com/subscribe/post-json?u=28c2f2044f22c46a64747226f&amp;id=8254ba5d15&c=?',
        data: $form.serialize(),
        cache       : false,
        dataType    : 'json',
        crossDomain: true,
        contentType: "application/json; charset=utf-8",
        error       : function(err) { alert("Could not connect to the registration server. Please try again later."); },
        success     : function(data) {
           if(data.result =="success")
            {
               $( "#dialog > p" ).html(data.msg)
            }
           else 
           {
              var str=data.msg;
              $( "#dialog > p" ).html(str)
           }
              $( "#dialog" ).dialog(); 


            $(".ui-dialog-titlebar").css("background" , "none");
            $(".ui-dialog-titlebar").css("border", "0px solid #aaaaaa")
            $( "#dialog > p" ).css("font-size" , "14px");
            $('.ui-dialog').css({'position':'fixed' , 
                                 'top'     : 300,
                                 'border'  : '1px solid #aaa',
                                 'background': '#fff url("images/ui-bg_flat_75_ffffff_40x100.png") 50% 50% repeat-x',
                                 'color': '#222',
                                 'z-index': '999999'
                               });
            $('#dialog > p > a').css('color' , '#ff6600');
            $('#dialog > p > a').attr('target' , '_blank');
            $('.ui-button.ui-widget').html('<img src="'+ thisSite + 'img/ico_x.gif" width="14" height="14">');
            $('.ui-button.ui-widget').css({
              'top': '13px'              
              
            })


        }
    });
}

function checkform() {   
    email = $("#mce-EMAIL");    
    daily= document.getElementById('mce-group[17]-17-0').checked;//$("#mce-group[17]-17-0").checked
    weekly=document.getElementById('mce-group[17]-17-1').checked;

    var str='';
    if(email.val() == "") {
        str="Please enter a valid email address.";
        $('#mce_inline_error_msg').html(str);$('#mce_inline_error_msg').css("display" ,'block');
        return
    }else if(!checkEmail( email.val())) {
        str="Please enter a valid email address.";
        $('#mce_inline_error_msg').html(str);$('#mce_inline_error_msg').css("display" ,'block');
        return
    }
    if(!daily && !weekly)
    {
     str="Please choose daily or weekly!"; 
     $('#mce_inline_error_msg').html(str);  $('#mce_inline_error_msg').css("display" ,'block');
     return 
    }    
    register($('#mc-embedded-subscribe-form'));
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