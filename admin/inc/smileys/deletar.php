<?
$query = mysql_query("select * from dircionario_smileys where id='$id'");
$l = mysql_fetch_array($query);

if ((getenv("REQUEST_METHOD") == "POST") and ($pronto)) {
mysql_query("delete from dircionario_smileys where id='$id'");
?>
<p align="center"><u><b>Smileys Deletado!</b></u></p>
<br>
<p><font color='#FF0000'>### Smiley deletada com sucesso.</font></p>

<?
} else{
?>

<p align="center"><u><b>Deletando Smiley!</b></u></p>
<p>Tem certeza que deseja deletar o Smiley &quot;<u><?=$l[smiley]?></u>&quot;?</p>
<form action="edit.php?smileys=deletar&id=<?=$id?>&pronto=ok" method="post">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<?
}
?>