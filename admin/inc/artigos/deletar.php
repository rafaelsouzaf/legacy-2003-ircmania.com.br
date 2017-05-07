<?
$query = mysql_query("select * from artigos where sid='$sid'");
$l = mysql_fetch_array($query);


if ((getenv("REQUEST_METHOD") == "POST") and ($pronto)) {
mysql_query("delete from artigos where sid='$sid'");
mysql_query("delete from comentarios where sid='$sid'");

?>
<p align="center"><u><b>Texto Deletado!</b></u></p>
<br>
<p><font color='#FF0000'>### Texto e comentários deletados com sucesso.</font></p>

<?
} else{
?>

<p align="center"><u><b>Deletando Texto!</b></u></p>
<p>Tem certeza que deseja deletar o texto &quot;<u><?=$l[title];?></u>&quot; e todos os seus comentários?</p>
<form action="edit.php?artigos=deletar&sid=<?=$sid?>&pronto=ok" method="post">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<?
}
?>