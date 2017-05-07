<?
$query = mysql_query("select * from dircionario_conceitos where id='$id'");
$l = mysql_fetch_array($query);

if ((getenv("REQUEST_METHOD") == "POST") and ($pronto)) {
mysql_query("delete from dircionario_conceitos where id='$id'");
?>
<p align="center"><u><b>Conceito Deletado!</b></u></p>
<br>
<p><font color='#FF0000'>### Conceito deletada com sucesso.</font></p>

<?
} else{
?>

<p align="center"><u><b>Deletando Conceito!</b></u></p>
<p>Tem certeza que deseja deletar o Conceito &quot;<u><?=$l[palavra]?></u>&quot;?</p>
<form action="edit.php?conceitos=deletar&id=<?=$id?>&pronto=ok" method="post">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<?
}
?>