<?
	$veradm = mysql_query("select login,admin from usuarios where login='$usuario'");
	$veradml = mysql_fetch_array($veradm);
	if (!$veradml[admin]) die();


if ((getenv("REQUEST_METHOD") == "POST") and ($pronto)) {

mysql_query("delete from download_comentarios where tid = '$tid'");

?>
<p align="center"><u><b>Deletado!</b></u></p>
<br>
<p align="center"><font color='#FF0000'># Comentário deletado com sucesso. #</font><br><br><a href="download.php?detalhes=<?=$id?>">Voltar</a></p>

<?
} else{
?>

<p align="center"><u><b>Deletando Comentários!</b></u></p>
<p>Tem certeza que deseja deletar o Comentário?</p>
<form action="download.php?deletar=1&id=<?=$id?>&tid=<?=$tid?>&pronto=1" method="post">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<?
}
?>