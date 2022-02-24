function SetCookie(name,value)//两个参数，一个是cookie的名子，一个是值
{
    var Days = 3*30; //此 cookie 将被保存 30 天
    var exp  = new Date();    //new Date("December 31, 9998");

    exp.setTime(exp.getTime() + Days*24*60*60*1000);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+ ";path=/";
}
function SetCookie2(name,value , Days)//两个参数，一个是cookie的名子，一个是值
{
    //var Days = 3*30; 
    var exp  = new Date();    //new Date("December 31, 9998");

    exp.setTime(exp.getTime() + Days*24*60*60*1000);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString() + ";path=/";
    console.log('SetCookie2')
}
function getCookie(name)//取cookies函数        
{
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
     if(arr != null) return unescape(arr[2]); return null;

}
function delCookie(name)//删除cookie
{
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}

var _date = new Date()
if(!getCookie('date') )
{
      ///
      console.log(_date.getMonth()+":" +_date.getYear() )
      SetCookie('count' , 1);
}
else
{

    var last_date = getCookie('date');
     console.log( 'last_date'+ last_date)
    /////相同月份來  COUNT裡機

    if(_date.getYear()+":"+_date.getMonth() == last_date )
    {
        var last_count = getCookie('count');
        last_count++; 
        if(last_count ==3)
        {
            ///show
          //  alert(last_count);
        }
         SetCookie('count' , last_count);
        //SetCookie('date' ,  [ _date.getYear() ,_date.getMonth()]);
    }
    else //重新設定
    {
         SetCookie('count' , 1);
         //SetCookie('date' ,  [ _date.getYear() ,_date.getMonth()]);
    }
}
 //console.log( 'count'+ getCookie('count'))
 SetCookie('date' ,  _date.getYear()+":"+_date.getMonth());




 function _MCP_COOKIE(){
   

     function SetCookie(name,value)//两个参数，一个是cookie的名子，一个是值
     {
         var Days = 7; //此 cookie 将被保存 30 天
         var exp  = new Date();    //new Date("December 31, 9998");

         exp.setTime(exp.getTime() + Days*24*60*60*1000);
         document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
     }
 }
