<?
include ("inc/top.php");
include ("inc/header.php");

	$veradm = mysql_query("select login,admin from usuarios where login='$usuario'");
	$veradml = mysql_fetch_array($veradm);
	if (!$veradml[admin]) die();

if ((getenv("REQUEST_METHOD") == "POST") and ($pronto)) {

mysql_query("delete from forum_msg where id = '$id'");
mysql_query("delete from forum_msg where reid = '$id'");

?>
<p align="center"><u><b>Deletado!</b></u></p>
<br>
<p align="center"><font color='#FF0000'># Mensagem deletada com sucesso. #</font><br><br></p>

<?
} else{
?>

<p align="center"><u><b>Deletando Mensagem do Fórum!</b></u></p>
<p>Tem certeza que deseja deletar a Mensagem (e suas respostas)?</p>
<form action="forum.php?deletar=1&id=<?=$id?>&pronto=1" method="post">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<?
}
include ("inc/header2.php");
include ("inc/footer.php");
?>