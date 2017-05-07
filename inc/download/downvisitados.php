<?
include ("inc/download/downtop.php");
?>
<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
<?
	$query = mysql_query("select * from download where checkdown='1' order by ndown desc limit 30");
	for ($i = 1; $lcat = mysql_fetch_array($query); $i++) {
?>

  <tr>
    <td width="69%"><?=$i?> - <a href="download.php?detalhes=<?=$lcat[id];?>" class="ircmania1" title="<?=$lcat[descricao];?>"><u><?=$lcat[titulo];?></u></a></td>
    <td width="31%">(Download: <?=$lcat[ndown];?>)</td>
  </tr>

<?
}
?>
</table>