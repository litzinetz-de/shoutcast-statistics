<?php
if($_SERVER['REMOTE_ADDR']!='') die('Script darf nur ueber Bash aufgerufen werden!');

include('functions.php');
include('mysql.php');

// 120 Tage
$age=10368000;
$timestamp=time()-$age;

$sql='DELETE FROM plot WHERE time < '.$timestamp;

@mysql_query($sql);
?>
