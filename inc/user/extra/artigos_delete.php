<?
include ("inc/user/extra/top.php");

$query = mysql_query("select * from artigos where informant='$usuario' and sid='$delete' and nivel!='0'");
$l = mysql_fetch_array($query);
if (!$l[title]) die();

	if ((getenv("REQUEST_METHOD") == "POST") and ($delete)) {

	mysql_query("delete from artigos where informant='$usuario' and sid='$delete'");
	mysql_query("delete from comentarios where sid='$delete'");
?>
<p align="center"><u><b>Texto Deletado!</b></u></p>
<br>
<p><font color='#FF0000'>### Texto deletado com sucesso.</font></p>

<?
}

else if ($delete) {
?>

<p align="center"><u><b>Deletando Texto!</b></u></p>
<br>
<p>Tem certeza que deseja deletar o texto &quot;<u><?=stripslashes($l[title])?></u>&quot; e todos os seus comentários?</p>
<form action="user.php" method="post">
<input type="hidden" value="<?=$parte?>" name="edit">
<input type="hidden" value="delete" name="artigos">
<input type="hidden" value="<?=$delete?>" name="delete">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<? } ?>