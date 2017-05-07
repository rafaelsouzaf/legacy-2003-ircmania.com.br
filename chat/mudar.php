<html>
<head>
<title>:: ChatMania ::</title>
<script type="text/javascript">
<!--
function abrindo(myform, windowname)
{
if (! window.focus)return true;
window.open('', 'chatmania', 'height=100,width=300,scrollbars=nos,status=no,resizable=no');
myform.target='chatmania';
return true;
}
//-->
</script>
</head>
<body bgcolor="#FDFFDC">



<?
if ($digitar) {

	if ((getenv("REQUEST_METHOD") == "POST") and ($outronick)) {

		$out = fopen("logs/$id.txt", "a+");
		fputs($out, "/nick $outronick\n");
		fclose($out);
		echo "<script>javascript:window.close()</script>";

	}
?>
<center>
<font face="Tahoma" size="2">Digite seu novo Apelido:</font>
<form action="mudar.php?id=<?=$id?>&digitar=1" method="POST">
<input type="text" size="20" name="outronick" style="font-family: Verdana; font-size: 10 px">
<input type="submit" value="Mudar" style="font-family: Verdana; font-size: 10 px; width: 100"></td>
</form>
</center>

<?
} else {
?>

<center>
<form onsubmit="abrindo(this, 'join')" action="mudar.php?id=<?=$id?>&digitar=1" method="POST">
<input type="submit" value="Mudar Apelido" style="font-family: Verdana; font-size: 10 px; width: 140"></td>
</form>
</center>
<? } ?>