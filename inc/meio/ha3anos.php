<?
	$umano = time() - 78840000;
	$where = "where chk='1' and nivel='0' and topic != '19' and topic != '25' and time <= '$umano'";
	$query1ano = mysql_query("select * from artigos $where order by time desc limit 5");

	while ($ha1ano = mysql_fetch_array($query1ano)) {
    $ha1anow = substr($ha1ano[title], 0, 39);

	$contar = mysql_query("select sid from comentarios where sid = '$ha1ano[sid]'");
	$conta = mysql_num_rows($contar);
?>
  <tr>
    <td width="100%">&nbsp;<img src="imagens/arrow_verde.gif" width="5" height="7">
    <span class="style9"><a href="view.php?sid=<?=$ha1ano[sid]?>" title="Autor: <?=$ha1ano[informant]?> - Comentários: <?=$conta?>"><?=$ha1anow?> ...</a></span></td>
  </tr>
<? } ?>