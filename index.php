<html>
<head>
<title>Webradio-Statistiken</title>
<link rel="stylesheet" href="style.css">
<script src="jquery.js" type="text/javascript"></script>
	<script src="jquery.maskedinput.js" type="text/javascript"></script>
	<script language="javascript" src="calendar.js"></script>
	<script type="text/javascript" src="ui.core.js"></script>
	<!--  if you want iE6 not to poke select boxes thru your dropdowns, you need ... -->
	<script type="text/javascript" src="jquery.bgiframe.min.js"></script>
	
	<!-- Plugin source development location, distribution location: only 1 of 2 is there..	 -->
	<script type="text/javascript" src="jquery.ui.ufd.js"></script>    
	
	<!-- autosnippet -->
	<script type="text/javascript" src="jquery.autosnippet-1.0.js"></script>
	<script language="javascript" src="shCore.js"></script>
	<script language="javascript" src="shBrushXml.js"></script>
	<script language="javascript">
	var cal = new CalendarPopup();
	
	jQuery(function($){
	$("#begintime").mask("99:99");
	$("#endtime").mask("99:99");
	
	});
	</script>
</head>
<body>
<center><b>Webradio-Statistiken</b></center>
<br><br>
Bitte w&auml;hlen Sie einen Zeitraum:
<br><br>
<form action="stat.php" method="post" name="renderform">
<table border="0" cellspacing="1">
	<tr>
	<td>Von</td><td><input type="text" name="begindate" class="roinput" readonly>
	<a href="#"
   onClick="cal.select(document.forms['renderform'].begindate,'dateanchor','yyyy-MM-dd'); return false;"
   name="dateanchor" id="dateanchor">w&auml;hlen...</A></td><td><input type="text" id="begintime" name="begintime" class="formstyle" size="5"> Uhr</td>
   </tr><tr>
   <td>Bis</td><td><input type="text" name="enddate" class="roinput" readonly>
	<a href="#"
   onClick="cal.select(document.forms['renderform'].enddate,'dateanchor2','yyyy-MM-dd'); return false;"
   name="dateanchor2" id="dateanchor2">w&auml;hlen...</A></td><td><input type="text" id="endtime" name="endtime" class="formstyle" size="5"> Uhr</td>
   </tr></table>
<br><br>
<input type="submit" value="Weiter">
</form>
</body>
</html>
