<?
if ($_COOKIE['session']) {

	$querydo = mysql_query("select * from usuarios where session='$_COOKIE[session]'");

	if ($lpvt = mysql_fetch_array($querydo)) {

	$usuario = $lpvt[login];
	global $usuario;
	
	} else {

	setcookie("session");
	$usuario = null;

	}
}
else {
$usuario = null;
}
?>