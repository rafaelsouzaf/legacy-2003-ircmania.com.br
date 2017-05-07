<p align="center"><b><font face="Verdana" size="4">Estatísticas</font></b></p>

<br>
<hr color="#000000" width="40%" size="1">
<br>

<?
if (!$quando) {
?>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="50%" style="font-family: Verdana; font-size: 8 pt">
  <tr>
    <td width="33%" align="center"><b>Data</b></td>
    <td width="33%" align="center"><b>Conexões</b></td>
    <td width="34%" align="center"><b>Detalhes</b></td>
  </tr>
  <tr>
    <td width="33%" align="center">&nbsp;</td>
    <td width="33%" align="center" align="center">&nbsp;</td>
    <td width="34%">&nbsp;</td>
  </tr>

<?
$resultado = mysql_query("select distinct data, count(data) as vl from estatistica group by data order by data desc");
while ($ls = mysql_fetch_array($resultado)) {
if ($ls[data]) {
?>

  <tr>
    <td width="33%" align="center"><?=$ls[data]?></td>
    <td width="33%" align="center"><?=$ls[vl]?></td>
    <td width="34%" align="center"><a href="edit.php?estatistica=index&quando=<?=$ls[data]?>">Clique aqui</a></td>
  </tr>

<?
}
}
echo "</table>";

} else {

$query = mysql_query("select * from estatistica where data='$quando' order by hora desc limit 100");
$l = mysql_fetch_array($query);
?>

<p align="center"><font face="Verdana" size="2">(Últimas 100 conexões)</font></p>

<table align="center" border="0" cellpadding="1" cellspacing="0" width="60%" style="font-family: Verdana; font-size: 8 pt">
  <tr>
    <td width="50%"><b>Data</b></td>
    <td width="50%"><b>IP</b></td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%">&nbsp;</td>
  </tr>

<?
for ($i = 0; $l = mysql_fetch_array($query); $i++) {
$cor = ($i%2) ? 'white':'#f3f3f3';
?>

  <tr>
    <td width="50%" bgcolor="<?=$cor?>"><?=$l[data]?> - <?=$l[hora]?></td>
    <td width="50%" bgcolor="<?=$cor?>"><?=$l[ip]?></td>
  </tr>

<?
}
?>
</table>
<br><br>
<? } ?>


</body>
</html>

<br>
<br>
<br>
<br>
<br>
