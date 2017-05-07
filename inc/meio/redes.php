<table width="95%" border="0" cellpadding="0" cellspacing="2">
  <tr>
    <td width="52" valign="top"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rede</b></td>
    <td width="1" rowspan="20" valign="top" bgcolor="#CCCCCC"></td>
    <td width="36" valign="top" align="right"><b>Salas</b></td>
  </tr>
  <tr>
    <td height="1" valign="top" bgcolor="#CCCCCC"></td>
    <td height="1" valign="top" bgcolor="#CCCCCC"></td>
    <td height="1" valign="top" bgcolor="#CCCCCC"></td>
  </tr>

<?
$resultado = mysql_query("select distinct rede, count(rede) as vl from redes_stats group by rede order by vl desc");
while ($l = mysql_fetch_array($resultado)) {
if ($l[rede]) {
?>
<tr> 
	<td valign="top"><a href="secoes.php?redesinfo=<?=$l[rede]?>" class="ircmania1"><?=$l[rede]?></a></td>
	<td valign="top" align="right"><?=$l[vl]?></td>
</tr>
<?
}
}
?>
</table>