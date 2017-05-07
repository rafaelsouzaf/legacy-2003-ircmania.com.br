<?
if ((getenv("REQUEST_METHOD") == "POST") and ($pronto)) {



$verdown = mysql_query("select * from download where autor = '$nick' and nivel != '0'");
while ($verl = mysql_fetch_array($verdown)) {

echo $verl[id].$verl[titulo]."<br>";


}

//$verdown = mysql_query("select * from download_comentarios where autor = '$nick' and nivel != '0'");
//while ($verdownl = mysql_fetch_array) {
//echo $verdownl[id].$verdownl[titulo]."<br>";
//}










//mysql_query("delete from artigos where sid='$sid'");
//mysql_query("delete from comentarios where sid='$sid'");

?>
<p align="center"><u><b>Texto Deletado!</b></u></p>
<br>
<p><font color='#FF0000'>### Texto e comentários deletados com sucesso.</font></p>

<?
} else{
?>

<p align="center"><u><b>Deletando...</b></u></p>
<p>Tem certeza que deseja deletar o usuario <?=$usuarios?>?</p>
<form action="edit.php?usuarios=deletar&nick=<?=$usuarios?>&pronto=ok" method="post">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<?
}
?>