<?
$ipuser = explode(".", $REMOTE_ADDR);

	$verip = mysql_query("select * from banidos");
	while ($veripl = mysql_fetch_array($verip)) {

$ipbanido = explode(".", $veripl[ipban]);

	if ($ipbanido[3] == "%") {
		if (($ipbanido[0] == $ipuser[0]) and ($ipbanido[1] == $ipuser[1]) and ($ipbanido[2] == $ipuser[2])) {
		die();
		}
	} else {
		if (($ipbanido[0] == $ipuser[0]) and ($ipbanido[1] == $ipuser[1]) and ($ipbanido[2] == $ipuser[2]) and ($ipbanido[3] == $ipuser[3])) {
		die();
		}
	}

}
?>