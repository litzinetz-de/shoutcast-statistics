<?php
if($_SERVER['REMOTE_ADDR']!='') die('Script darf nur über Bash aufgerufen werden!');

include('functions.php');
include('mysql.php');

$sql='SELECT id,addr FROM servers';
$sql_q=mysql_query($sql);
$listeners=0;
while($row=mysql_fetch_array($sql_q))
{
	$readbuffer=getListenerData($row['addr']);
	$data=explode('$',$readbuffer);
	$listeners=$listeners+$data[0];
}
$sql='INSERT INTO plot (time,server_id,listeners) VALUES 
('.time().',0,'.$data[0].')';
mysql_query($sql);
?>
