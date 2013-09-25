<center>
<?php
$raw_begin_date=explode('-',$_POST['begindate']);
$raw_end_date=explode('-',$_POST['enddate']);
$raw_begin_time=explode(':',$_POST['begintime']);
$raw_end_time=explode(':',$_POST['endtime']);
	
$begin=mktime($raw_begin_time[0],$raw_begin_time[1],0,$raw_begin_date[1],$raw_begin_date[2],$raw_begin_date[0]);
$end=mktime($raw_end_time[0],$raw_end_time[1],0,$raw_end_date[1],$raw_end_date[2],$raw_end_date[0]);

include('graph_functions.php');

$images=array();
$sql='SELECT id FROM servers';
$sql_q=mysql_query($sql);
while($row=mysql_fetch_array($sql_q))
{
	MakeListenersGraph($row['id'],$begin,$end);
	$images[]='srv_'.$row['id'].'.png';
}

echo '<b>Statistiken von '.date('d.m.Y H:i',$begin).' bis '.date('d.m.Y H:i',$end).'</b><br><br>';

foreach($images as $image)
{
	echo '<img src="'.$image.'"><br><br>';
}

?>
</center>
