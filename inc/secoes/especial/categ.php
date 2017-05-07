<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="27%"><b>Arquivos:</b>:<br>&nbsp;</td>
    <td width="37%"></td>
  </tr>

<?
	$querysrc = mysql_query("select * from download_cat where nivel='$nivel'");
	while ($lsc = mysql_fetch_array($querysrc)) {

	$qry = mysql_query("select * from download where autor='$name' and cat='$lsc[nome]' and nivel='$nivel'");
	$arq = mysql_num_rows($qry);

if ($arq) {

	$i++;
	$tr = ($i%2) ? '':'<tr>';
	$tr2 = ($i%2) ? '':'</tr>';

	echo $tr2.$tr;

?>
    <td width="27%"><li><a href="especial.php?<?=$parte?>=<?=$name?>&cat=<?=$lsc[nome]?>" class="ircmania1"><u><?=$lsc[nome]?></u></a></li></td>
    <td width="37%">(<?=$arq?>)</td>

<?
}
}
?>
</table>