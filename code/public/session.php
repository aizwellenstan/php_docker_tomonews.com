<?php 
start_session(7200);
//session_start();
ini_set('session.cookie_lifetime', 0);
ini_set('session.gc_maxlifetime', 3600);
$op=$_GET['op'];
if(!isset($_SESSION['open_ad'])){
	$_SESSION['open_ad']='0';
}

if($op=='1'){
	$_SESSION['open_ad']='1';
}
echo '{"rtn":"'.$_SESSION['open_ad'].'"}';



?>
<?php 
function start_session($expire = 0)
{
    if ($expire == 0) {
        $expire = ini_get('session.gc_maxlifetime');
    } else {
        ini_set('session.gc_maxlifetime', $expire);
    }

    if (empty($_COOKIE['PHPSESSID'])) {
        session_set_cookie_params($expire);
        session_start();
    } else {
        session_start();
        setcookie('PHPSESSID', session_id(), time() + $expire);
    }
}
?>