<?
$query = mysql_query("select * from redes where rede='$rede'");
$l = mysql_fetch_array($query);

if ((getenv("REQUEST_METHOD") == "POST") and ($rede)) {
mysql_query("delete from redes where rede='$rede'");
mysql_query("delete from redes_stats where rede='$rede'");
?>
<p align="center"><u><b>Rede Deletada!</b></u></p>
<br>
<p><font color='#FF0000'>### Rede (Rede e Canais) deletada com sucesso.</font></p>

<?
} else{
?>

<p align="center"><u><b>Deletando Rede!</b></u></p>
<p>Tem certeza que deseja deletar a REDE &quot;<u><?=$l[rede]?></u>&quot; e todos os seus CANAIS?</p>
<form action="edit.php?redes=deletar&rede=<?=$rede?>" method="post">
<input type="submit" value="Deletar" style="font-family: Verdana; font-size: 10 px">
</form>

<?
}
?>