<?php 
//306517355954176
//306517624389632
//
//GET MEDIA HIGHTLIGHT YEAR
$getUrls=APPLICATION_URL.'tagprofile/306517355954176?output=json&token='.$_SESSION['token2'].' ';
$data=curl_info($getUrls, null);
$dAry=json_decode($data, true);
$MEDIA_Ys = array();
$ASOT_Chs = array();

foreach($dAry['tagProfile']['tagOptions'][0]['tagOption'] as $Datakey => $Dataval )
{
   if ($Dataval['predicate'] == 'Year')
   { 
   	    foreach($Dataval['values'][0]['tagOptionValue'] as $key => $val)
   	    {
   	    	  array_push( $MEDIA_Ys , $val['value']);
   	    }
   	    break;
   }
} 
unset ($Datakey);unset ($Dataval); unset ($key); unset ($val); unset($data) ;unset($dAry);

$getUrls=APPLICATION_URL.'tagprofile/306517624389632?output=json&token='.$_SESSION['token2'].' ';
$data=curl_info($getUrls);
$dAry=json_decode($data, true);

foreach($dAry['tagProfile']['tagOptions'][0]['tagOption'] as $Datakey => $Dataval )
{
   if ($Dataval['ns'] == 'Channel')
   { 
   	    foreach($Dataval['values'][0]['tagOptionValue'] as $key => $val)
   	    {
   	    	  array_push( $ASOT_Chs , $val['value']);
   	    	 // echo $val['value'].':channel';
   	    }
   	    break;
   }
} 
unset ($Datakey);unset ($Dataval); unset ($key); unset ($val); unset($data) ;unset($dAry);

?>
