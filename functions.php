<?php

function getListenerData($host)
{
	$port = 8000;
	$url = "/index.html?sid=1";
 
	$timeout = 5;
 
	$fp = fsockopen($host, $port, $errno, $errstr, $timeout);
	if($fp)
	{
		$request = "GET ".$url." HTTP/1.1\r\n";
		$request.= "Host: ".$host."\r\n";
		$request.= "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; de-DE; 	rv:1.7.12) Gecko/20050919 Firefox/1.0.7\r\n";
		$request.= "Connection: Close\r\n\r\n";
 
		fwrite($fp, $request);
		while (!feof($fp))
		{
			$data .= fgets($fp, 128);
		}
		fclose($fp);
		
		$buffer1=explode('Stream is up at 96 kbps with ',$data);
		$buffer2=explode(' listeners',$buffer1[1]);
		$buffer3=explode(' of ',$buffer2[0]);
		$now=$buffer3[0];

		$buffer1=explode('<font class="default">Listener Peak: </font></td><td><font class="default"><b>',$data);
		$buffer2=explode('</b></td>',$buffer1[1]);
		$peak=$buffer2[0];
		return $now.'$'.$peak;
	}
	else
	{
		return '0$0';
	}
}

?>
