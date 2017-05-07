<?
$query = mysql_query("select * from download where id='$id'");
$l = mysql_fetch_array($query);


if ((getenv("REQUEST_METHOD") == "POST") and ($pronto)) {
mysql_query("delete from download where id='$id'");
mysql_query("delete from download_comentarios where id='$id'");

if ($l[nivel] != '0') {
unlink ("../$l[link]");
}

if ($l[imagem]) {
unlink ("../$l[imagem]");
}

?>
<p align="center"><u><b>Arquivo Deletado!</b></u></p>
<br>
<p><font color='#FF0000'>### Arquivo (Banco de dados e Fisico) e comentários deletados com sucesso.</font></p>

<?
} else{
?>

<p align="center"><u><b>Deletando Arquivo!</b></u></p>
<p>Tem certeza que deseja deletar o arquivo &quot;<u><?=$l[titulo]?></u>&quot; e todos os seus comentários?</p>
<form action="edit.php?download=deletar&id=<?=$id?>&pronto=ok" method="post">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<?
}
?>