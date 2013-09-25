<?php
set_time_limit(0);

include("mysql.php");
include("jpgraph.php");
include("jpgraph_line.php");
require_once ('jpgraph_bar.php');


function MakeLineGraph($width,$height,$title,$x_text,$y_text,$data,$data2,$tofile,$x_labels,$hide_x_labels=false,$graphcolor1='',$graphcolor2='')
{
	$graph=new Graph($width,$height);
	$graph->SetScale('textint');
	$graph->title->Set($title);
	$graph->xaxis->title->Set($x_text);
	$graph->yaxis->title->Set($y_text);
	
	if($x_labels!='')
	{
		$graph->xaxis->SetTickLabels($x_labels);
	}
	if($hide_x_labels)
	{
		$graph->xaxis->HideLabels();
	}
	
	if($graphcolor1=='')
	{
		$graphcolor1='blue';
	}
	
	$lineplot=new LinePlot($data);
	$lineplot->SetFillColor($graphcolor1.'@0.5',true);

	$graph->Add($lineplot);
	$lineplot->SetColor($graphcolor1);
	$lineplot->SetWeight(1);

	if($data2!='')
	{
		if($graphcolor2=='')
		{
			$graphcolor2='blue';
		}
	
		$lineplot2=new LinePlot($data2);
		$lineplot2->SetFillColor($graphcolor2.'@0.5',false);
		$graph->Add($lineplot2);
		$lineplot2->SetColor($graphcolor2);
		$lineplot2->SetWeight(1);
	}
	
	$gdImgHandler = $graph->Stroke(_IMG_HANDLER);
	$graph->img->Stream($tofile);
	//$graph->Stroke();
}

function MakeListenersGraph($server_id,$begin,$end)
{
	$sql='SELECT servername,color1,color2 FROM servers WHERE id='.$server_id;
	$sql_q=mysql_query($sql);
	$serverdata=mysql_fetch_array($sql_q);

	$data=array();
	$data2=array();

	$sql='SELECT listeners,peak FROM plot WHERE server_id='.$server_id.' AND time BETWEEN '.$begin.' AND '.$end;
	$sql_q=mysql_query($sql);
	while($row=mysql_fetch_array($sql_q))
	{
		$data[]=$row['listeners'];
		$data2[]=$row['peak'];
	}
	MakeLineGraph(650,250,'Zuhörer für Server '.$serverdata['servername'],'Verlauf','Zuhörer und Peak',$data,$data2,'srv_'.$server_id.'.png','',true,$serverdata['color1'],$serverdata['color2']);
}

?>
