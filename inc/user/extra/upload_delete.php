<?
include ("inc/user/extra/top.php");

$query = mysql_query("select * from download where autor='$usuario' and id='$delete' and nivel!='0'");
$l = mysql_fetch_array($query);
if (!$l[titulo]) die();

if ((getenv("REQUEST_METHOD") == "POST") and ($delete)) {

	if ($l[imagem]) {
	unlink("$l[imagem]");
	}

	unlink("$l[link]");
	mysql_query("delete from download where id='$delete'");
	mysql_query("delete from download_comentarios where id='$delete'");
	?>
	<p align="center"><u><b>Arquivo Deletado!</b></u></p>
	<br>
	<p><font color='#FF0000'>### Arquivo deletado com sucesso.</font></p>

<?
}
else if (($delete) and ($usuario)) {
?>

	<p align="center"><u><b>Deletando Arquivo!</b></u></p>
	<br>
	<p>Tem certeza que deseja deletar o arquivo &quot;<u><?=$l[titulo];?></u>&quot;?</p>
	<form action="user.php" method="post">
	<input type="hidden" value="<?=$parte?>" name="edit">
	<input type="hidden" value="ok" name="upload">
	<input type="hidden" value="<?=$delete?>" name="delete">
	<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
	</form>
	<p align="center"><a href="user.php?edit=<?=$parte?>&upload=ok" class="ircmania1"><u>Voltar</u></a></p>

<?
}
?>