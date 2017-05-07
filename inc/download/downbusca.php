<?
include ("inc/download/downtop.php");
$queryfff = mysql_query("select * from download where titulo like '%$palavrachave%' or descricao like '%$palavrachave%'");

if (mysql_num_rows($queryfff)) {
while($lcat = mysql_fetch_array($queryfff)) {
?>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="90%">
  <tr>
    <td width="100%" colspan="2">
    <img border="0" src="imagens/down.gif" width="9" height="9">&nbsp;<font color="#000000"><a href="download.php?detalhes=<?=$lcat[id];?>" class="ircmania1"><b><u><?=$lcat[titulo]?></u></b></a></font></td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><p align="justify">
    <font color="#000000"><?=$lcat[descricao]?></font></td>
  </tr>
</table>
<br>

<?
}
} else { echo "<p align='center'><b>Nenhum resultado encontrado.</b><br>(<u>$palavrachave</u>)</p>";}
?>