<?php 

$d1='2013-01-01';

echo '@1:',strtotime($d1),'<br>';
echo '@2:',date('Y-m-d',(strtotime('+30 day',strtotime($d1)))),'<br>';
// echo '@3:',strtotime($d1),'<br>';
// echo '@4:',strtotime($d1),'<br>';

?>