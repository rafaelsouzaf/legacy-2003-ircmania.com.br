<?
	$veradm = mysql_query("select login,admin from usuarios where login='$usuario'");
	$veradml = mysql_fetch_array($veradm);
	if (!$veradml[admin]) die();


if ((getenv("REQUEST_METHOD") == "POST") and ($pronto)) {

function raiz () {

	global $sid,$tid;

	$query = mysql_query("select * from comentarios where sid='$sid' and tid='$tid'");
	while ($l = mysql_fetch_array($query)) {

	echo $l[tid]." - Raiz<br>";
	mysql_query("delete from comentarios where tid = '$l[tid]'");
	replys($l[tid]);

	}
}

function replys ($id) {
$queryreply = mysql_query("select * from comentarios where pid='$id'");

	while ($lbre = mysql_fetch_array($queryreply)) {

	echo $lbre[tid]." - Resposta<br>";
	mysql_query("delete from comentarios where tid = '$lbre[tid]'");
	replys($lbre[tid]);

	}

}
raiz();

?>
<p align="center"><u><b>Deletado!</b></u></p>
<br>
<p align="center"><font color='#FF0000'># Comentários deletados com sucesso. #</font><br><br><a href="view.php?sid=<?=$sid?>">Voltar</a></p>

<?
} else{
?>

<p align="center"><u><b>Deletando Comentários!</b></u></p>
<p>Tem certeza que deseja deletar o Comentário e todas as suas respostas?</p>
<form action="comentarios.php?deletar=1&sid=<?=$sid?>&tid=<?=$tid?>&pronto=1" method="post">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<?
}
?>