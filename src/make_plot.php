<?php
if($_SERVER['REMOTE_ADDR']!='') die('Script darf nur über Bash aufgerufen werden!');

include('functions.php');
include('mysql.php');

$sql='SELECT id,addr FROM servers';
$sql_q=mysql_query($sql);
while($row=mysql_fetch_array($sql_q))
{
	$readbuffer=getListenerData($row['addr']);
	$data=explode('$',$readbuffer);
	$sql='INSERT INTO plot (time,server_id,listeners,peak) VALUES 
	('.time().','.$row['id'].','.$data[0].','.$data[1].')';
	mysql_query($sql);
}
?>
