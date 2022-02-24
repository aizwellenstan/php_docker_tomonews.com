/**

COOKIE寫入未完成
check box 未完成

.POP_MCP   cookie: POP_MCP
出現次數
- If user clicks "x" or 按螢幕上任何不是pop-up的區塊，一個禮拜出現一次。
- If user clicks "Subscribe" or "I'm Already Subscribe", Pop-up永遠不要在出現。

#mcpBox    cookie: mcpBox
出現次數  
- If user clicks "x"，一個禮拜出現一次。
- If user clicks "Subscribe", Pop-up永遠不要在出現
*/
function MCP(){
    var PARENT
    var FORM
    var opened = 0;
    var ckhbox1 , chkbox2;
    this.get_opened = function(){return opened;}
    this.init=function(parent , form){
       PARENT = parent;
       FORM = form;
       FORM.unbind('submit');        
       if(  $('#vdo_otherlist .mail_box').length >0 )
       {
         $('.mcp_form .mc-field-group.input-group , .mcp_form2 .mc-field-group.input-group').css('left' , -19)
       }
       else
       {$('.mcp_form .mc-field-group.input-group , .mcp_form2 .mc-field-group.input-group').css('left' , -4)}
       
       
       var ele = document.querySelectorAll("input[name='group[17][1]']");
       for(var i=0;i<ele.length;i++){
           ele[i].checked = true;
       }
       ele = document.querySelectorAll("input[name='group[17][2]']");
       for(var i=0;i<ele.length;i++){
           ele[i].checked = true;
       }
       
       if(PARENT=='.POP_MCP')
       {
         /*  ckhbox1 =  document.getElementById("POP_MCP_chkbox1")//.checked = true;
           ckhbox2 =  document.getElementById("POP_MCP_chkbox2")//.checked = true;
           ckhbox1.checked = true;
           ckhbox2.checked = true;
            ///決定是否開啟
            if(getCookie('POP_MCP')!=1)
            {
              opened  =1;
              $(PARENT).show();
              Detect_scroll_mcp();
            }

           
            $(' .POP_MCP .btn_go').bind('click', function ( event ) {
               event.preventDefault();
               checkform();
            });

            ///CLOSE
           $('.POP_BG , .POP_MCP .btn_clsx').click(function(){
              $(PARENT).hide();
              Detect_scroll_mcp();

              if(getCookie('POP_MCP')!=1)
              SetCookie2( 'POP_MCP' , 1, 7)
              //關閉就去產生form 到   .mcp_form2
              
             if(_GLOBAL)
             { 
                if(_GLOBAL.page == "VDO")  
                {$("#vdoplayer").player("resume");}
             }
           })

          $('.POP_MCP .btn_cls').click(function(){
            $(PARENT).hide();
            Detect_scroll_mcp();
            ///寫入COOKIE  永遠不出現
             SetCookie2( 'POP_MCP' , 1, 30 *12)
              if(_GLOBAL)
              {
               if(_GLOBAL.page == "VDO")  
               $("#vdoplayer").player("resume");
              }
           })*/
       }
       else if(PARENT ==".formbox")
       {
           /////
            $(PARENT).find('.btn_go').bind('click', function ( event ) {
            event.preventDefault();
            console.log('clk')
            checkform();
            });
       }
       else
       {
           //mcpBox_chkbox1
           ckhbox1 =  document.getElementById("mcpBox_chkbox1")//.checked = true;
           ckhbox2 =  document.getElementById("mcpBox_chkbox2")//.checked = true;
           ckhbox1.checked = true;
           ckhbox2.checked = true;
            $('#mcpBox .btn_go').bind('click', function ( event ) {
                console.log('GO!!!')
                event.preventDefault();
                checkform();
            });
            $('#mcpBox .btn_cls').click(function(){
               SetCookie2( 'mcpBox' , 1, 7)
              $('#mcpBox').hide();
            })
       }
       $(parent).find('.mce-EMAIL').keypress(function (e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
            $(parent).find('.btn_go').click();
            return false;
        } else {
            return true;
        }
       });


      
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
               if(PARENT=='.POP_MCP')
               {
                 SetCookie2( 'POP_MCP' , 1, 30 * 12)
                 $(PARENT).find('form').hide();
                 update_img($(PARENT).find('img') , thisSite + 'img/pop_thk.png');
                 $(PARENT).find('img').addClass('btn');
                 $(PARENT).find('img').click(function(){$('.POP_MCP .btn_clsx').click(); })
                 return 
               }
               else if(PARENT=='#mcpBox')
               {
                 SetCookie2( 'mcpBox' , 1, 30 * 12)

                 $(PARENT).find('form').hide();
                 update_img($(PARENT).find('img') , thisSite + 'img/right_thk.png');
                 $(PARENT).find('img').addClass('btn')
                 $(PARENT).find('img').click(function(){$('#mcpBox .btn_cls').click(); })

                  return 
               }
               else if(PARENT=='.formbox')
               {
                   $(PARENT).html('<div class="txt_success">Thanks for subscribing!</div>');
                   $(PARENT).animate({height:80} , 500)
                   return;
               }
               else
               {
                 $( "#dialog > p" ).html('Thanks for Subscribing!');
                 $( "#dialog > p" ).css('color' , '#f00')
               }

              
            }
           else 
           {
              var str=data.msg ;
              $( "#dialog > p" ).html(str);

           }
            $( "#dialog" ).dialog();

            $(".ui-dialog-titlebar").css("background" , "none");
            $(".ui-dialog-titlebar").css("border", "0px solid #aaaaaa")
            $( "#dialog > p" ).css("font-size" , "14px");
            
            var sw = getBrowserWidth();
            var sh = getBrowserHeight();
            var ___x = sw - 50 - 300-18;
            var ___y = sh - 60 - 150-300 - 20;

            if(PARENT !="#mcpBox")
            {
              $('.ui-dialog').css({'position':'fixed' , 
                                 'top'     : 300,                                 
                                 'border'  : '1px solid #aaa',
                                 'background': '#fff url("images/ui-bg_flat_75_ffffff_40x100.png") 50% 50% repeat-x',
                                 'color': '#222',
                                 'z-index': '999999'
                               })
            }
            else
            { console.log('mcpBox')
              $('.ui-dialog').css({'position':'fixed' , 
                                 /*'top'     : 300,*/
                                 'top':___y,
                                 'left':___x,                                 
                                 'border'  : '1px solid #aaa',
                                 'background': '#fff url("images/ui-bg_flat_75_ffffff_40x100.png") 50% 50% repeat-x',
                                 'color': '#222',
                                 'z-index': '999999'
                               })
            }

            $('#dialog > p > a').css('color' , '#ff6600')
            $('#dialog > p > a').attr('target' , '_blank');
            $('.ui-button.ui-widget').html('<img src="'+ thisSite + 'img/ico_x.gif" style="width: 13px;    height: 13px;    position: absolute;    top: 3px;    left: 3px;">')
            $('.ui-button.ui-widget').css({
              'top': '13px'              
              
            })
                    
        }
    });
}

function Detect_scroll_mcp(){
              if($('.POP_MCP').css('display') !='none')
              {
                $('body').css('overflow-y' , 'hidden')
              }
              else
              $('body').css('overflow-y' , 'scroll')
}

function checkform() {   
     email = $(PARENT).find(".mce-EMAIL"); 

      if(PARENT !=".formbox")
      {
        daily = ckhbox1.checked;//$("#mce-group[17]-17-0").checked
        weekly= ckhbox2.checked;
      }
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
    console.log(daily  + ":" +weekly ) 
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




