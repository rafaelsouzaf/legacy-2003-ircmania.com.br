<?
$query = mysql_query("select * from dircionario_comandos where id='$id'");
$l = mysql_fetch_array($query);

if ((getenv("REQUEST_METHOD") == "POST") and ($pronto)) {
mysql_query("delete from dircionario_comandos where id='$id'");
?>
<p align="center"><u><b>Comando Deletado!</b></u></p>
<br>
<p><font color='#FF0000'>### Comando deletada com sucesso.</font></p>

<?
} else{
?>

<p align="center"><u><b>Deletando Comando!</b></u></p>
<p>Tem certeza que deseja deletar o Comando &quot;<u><?=$l[comando]?></u>&quot;?</p>
<form action="edit.php?comandos=deletar&id=<?=$id?>&pronto=ok" method="post">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<?
}
?>