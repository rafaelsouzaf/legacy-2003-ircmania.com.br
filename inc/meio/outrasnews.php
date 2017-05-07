<?
	$where = "where chk='1' and nivel='0' and topic != '19' and topic != '18' and topic != '25'";
	$query = mysql_query("select * from artigos $where order by time desc limit 3,8");

	while ($outrasnews = mysql_fetch_array($query)) {
    $outrastitle = substr($outrasnews[title], 0, 38);

	$contar = mysql_query("select sid from comentarios where sid = '$outrasnews[sid]'");
	$conta = mysql_num_rows($contar);
?>

  <tr>
    <td><span class="style10"><img src="imagens/arrow_laranja.gif" width="5" height="7"> 
    <a href="view.php?sid=<?=$outrasnews[sid]?>" class="style10" title="Autor: <?=$outrasnews[informant]?> - Comentários: <?=$conta?>"><?=$outrastitle?> ...</a></span></td>
  </tr>


<? } ?>