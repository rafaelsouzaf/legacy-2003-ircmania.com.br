<?
$query = mysql_query("select * from dircionario_abreviaturas where palavra='$palavra'");
$l = mysql_fetch_array($query);

if ((getenv("REQUEST_METHOD") == "POST") and ($pronto)) {
mysql_query("delete from dircionario_abreviaturas where palavra='$palavra'");
?>
<p align="center"><u><b>Palavra Deletada!</b></u></p>
<br>
<p><font color='#FF0000'>### Palavra deletada com sucesso.</font></p>

<?
} else{
?>

<p align="center"><u><b>Deletando Palavra!</b></u></p>
<p>Tem certeza que deseja deletar a Palavra &quot;<u><?=$l[palavra]?></u>&quot;?</p>
<form action="edit.php?abreviaturas=deletar&palavra=<?=$palavra?>&pronto=ok" method="post">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<?
}
?>