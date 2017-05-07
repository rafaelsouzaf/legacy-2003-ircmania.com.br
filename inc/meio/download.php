<?
	$querydown = mysql_query("select * from download where checkdown='1' order by data desc limit 10");

	while ($hadown = mysql_fetch_array($querydown)) {
	$titulo = substr($hadown['titulo'], 0, 25);

	if ($hadown[nivel] != 0) {
	$categoria = $hadown[cat];
	$querydown1 = mysql_query("select * from download_cat where nivel='$hadown[nivel]'");
	$hadown1 = mysql_fetch_array($querydown1);
	$link = "especial.php?$hadown1[descricao]=$hadown[autor]&detalhes=$hadown[id]";
	}
	else {
	$querydown2 = mysql_query("select * from download_cat where id='$hadown[cat]'");
	$hadown2 = mysql_fetch_array($querydown2);
	$categoria = $hadown2[nome];
	$link = "download.php?detalhes=$hadown[id]";
	}

?>
  <tr>
    <td width="72%">&nbsp;<img src="imagens/arrow_verde.gif" width="5" height="7"> <a href="<?=$link?>" class="ircmania3"><?=$titulo?></a></td>
    <td width="28%">(<?=$categoria?>)</td>
  </tr>
<? } ?>