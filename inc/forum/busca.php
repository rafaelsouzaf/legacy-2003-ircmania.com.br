<?
	$chavetitle = "Busca - Fórum dos sites IRCmania e ChatMania";

include ("inc/top.php");
include ("inc/header.php");
include ("inc/forum/top.php");
?>


<form action="forum.php?busca=ok" method="post">
<table border="0" cellpadding="7" cellspacing="0" width="100%">
  <tr>
    <td width="100%">
    <p align="center"><b><font size="3">+ Busca +</font></b></td>
  </tr>
  <tr>
    <td width="100%">
    <p align="center">
    <input size="20" name="palavrachave" value="<?=$palavrachave?>" style="font-family: Verdana; font-size: 10 px; height:16">
    <input type="submit" value="Procurar" style="font-family: Verdana; font-size: 10 px; height:17"></td>
  </tr>
  <tr>
    <td width="100%"><hr color="#000000" width="90%" size="1"></td>
  </tr>
</table>
</form>

<?
if ((getenv("REQUEST_METHOD") == "POST") and ($palavrachave)) {
?>
<b>Tópicos:</b><br><br>
<table align="center" border="0" cellpadding="2" cellspacing="0" width="90%">
<?
	$buscamateria = mysql_query("select * from forum_msg where topico like '%$palavrachave%' or mensagem like '%$palavrachave%' order by data desc");
	if (mysql_num_rows($buscamateria)) {
	while($bmate = mysql_fetch_array($buscamateria)) {
?>
  <tr>
    <td width="80%"><img border="0" src="imagens/down.gif" width="9" height="9">&nbsp;<font color="#000000"><a href="forum.php?ver=<? if ($bmate[reid]) echo $bmate[reid]; else echo $bmate[id]; ?>#<?=$bmate[id]?>" class="ircmania1"><u><?=$bmate[topico]?></u></a></font></td>
    <td width="20%"><?=date("d/m/y", $bmate[data]);?></td>
  </tr>
<?
	}
} else { echo "<tr><td width='100%'><p align='center'>Nenhum resultado encontrado.<br>(<u>$palavrachave</u>)</p></td></tr>";}
?>
</table>

<?
}
include ("inc/header2.php");
include ("inc/footer.php");
?>