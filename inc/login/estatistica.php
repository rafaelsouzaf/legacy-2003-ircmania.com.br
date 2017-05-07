<?
$date = time();
$data = date("d-m", $date);
$hora = date("H:i", $date);

$estati = mysql_query("select * from estatistica where ip='$REMOTE_ADDR' and data='$data'");
$lest = mysql_fetch_array($estati);

	if ($lest[id]) {
	$update = "update estatistica set hora='$hora' where id='$lest[id])'";
	mysql_query($update);
	}
	else {
    $sqls = "INSERT INTO estatistica (ip, data, hora) VALUES ('$REMOTE_ADDR', '$data', '$hora')"; 
    mysql_query($sqls);
	}

?>