<?
$query = mysql_query("select * from aliases where id='$id'");
$l = mysql_fetch_array($query);

if ((getenv("REQUEST_METHOD") == "POST") and ($pronto)) {
mysql_query("delete from aliases where id='$id'");
?>
<p align="center"><u><b>Aliases Deletada!</b></u></p>
<br>
<p><font color='#FF0000'>### Alias deletado com sucesso.</font></p>

<?
} else{
?>

<p align="center"><u><b>Deletando Aliases!</b></u></p>
<p>Tem certeza que deseja deletar a Aliases &quot;<u><?=$l[id]?></u>&quot;?</p>
<form action="edit.php?aliases=deletar&id=<?=$id?>&pronto=ok" method="post">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<?
}
?>