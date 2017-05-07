<?
include ("inc/user/extra/top.php");

	$query = mysql_query("select * from extra_dicas where usuario='$usuario' and id='$delete'");
	$l = mysql_fetch_array($query);
	if (!$l[assunto]) die();

if ((getenv("REQUEST_METHOD") == "POST") and ($delete)) {
mysql_query("delete from extra_dicas where usuario='$usuario' and id='$delete'");
?>
<p align="center"><u><b>Dica Deletada!</b></u></p>
<br>
<p><font color='#FF0000'>### Dica deletada com sucesso.</font></p>

<?
}
else if ($delete) {
?>

<p align="center"><u><b>Deletando Texto!</b></u></p>
<br>
<p>Tem certeza que deseja deletar a Dica &quot;<u><?=$l[assunto];?></u>&quot; ?</p>
<form action="user.php" method="post">
<input type="hidden" value="<?=$parte?>" name="edit">
<input type="hidden" value="delete" name="dicas">
<input type="hidden" value="<?=$delete?>" name="delete">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<? } ?>