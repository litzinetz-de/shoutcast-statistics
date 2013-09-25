<?php
if($_SERVER['REMOTE_ADDR']!='') die('Script may only be run via console');

include('functions.php');
include('mysql.php');

$age=10368000; // 120 days
$timestamp=time()-$age;

$sql='DELETE FROM plot WHERE time < '.$timestamp;

@mysql_query($sql);
?>
