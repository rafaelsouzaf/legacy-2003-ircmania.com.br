<?
	$query41 = mysql_query("select * from download where id='$get' and checkdown='1'");
	$lget = mysql_fetch_array($query41);

	$maisum = $lget[ndown] + 1;
	$update = "update download set ndown='$maisum' where id='$get'";
	mysql_query($update);

header ("Location: $lget[link]");
?>