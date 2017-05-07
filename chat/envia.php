<html>
<head>
<script>
<!--
function sf() { document.f.msg.focus(); }
// -->
</script>
</head>

<body onLoad="sf()" bgcolor="#FDFFDC">
<?

	if (getenv("REQUEST_METHOD") == "POST") {

		$out = fopen("logs/$id.txt", "a+");
		fputs($out, "$msg\n");
		fclose($out);

	}
?>

<center>
<form action="envia.php?id=<?=$id?>" method="POST" name="f">
<input type="text" name="msg" size="88" style="font-family: Verdana; font-size: 10 px">
<input type="submit" value=" Chat " style="font-size: 10 px; font-family: Verdana">
</form>
</center>