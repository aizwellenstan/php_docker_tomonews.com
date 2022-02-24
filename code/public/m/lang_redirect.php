<?php  
    $languages = array('en','en-au','en-bz'	,'en-ca','en-cb','en-gb','en-ie','en-jm','en-nz','en-ph','en-tt','en-us','en-za','en-zw',
                       'ja' , 'ja-jp' ,
    	               'fr','fr-be','fr-ca','fr-ch','fr-fr','fr-lu','fr-mc',
    	               'zh-tw' , 'zh-hk');
    $header = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $REDIRECT_BY_LANG='0';
    $_SESSION['REDIRECT'] = $_SESSION['REDIRECT'] == 1? 1:0;
    foreach( $header as $lang) {
         if(in_array( strtolower($lang)  , $languages)) {
              
              if(false !== ($rst = strpos(strtolower($lang), 'ja')))
              {$REDIRECT_BY_LANG='jp';}
              elseif(false !== ($rst = strpos(strtolower($lang), 'fr')))
              {$REDIRECT_BY_LANG='fr';}
              elseif(false !== ($rst = strpos(strtolower($lang), 'zh-tw')))
              {$REDIRECT_BY_LANG='tw';}
              elseif(false !== ($rst = strpos(strtolower($lang), 'zh-hk')))
              {$REDIRECT_BY_LANG='hk';}
              else//if(false !== ($rst = strpos(strtolower($lang), 'en')))
              {$REDIRECT_BY_LANG='us';}  
             
         }
    }
 ?>