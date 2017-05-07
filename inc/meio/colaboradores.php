<?
	$where = "where chk='1' and nivel!='0'";
	$query = mysql_query("select * from artigos $where order by time desc limit 8");

	while ($outrasnews = mysql_fetch_array($query)) {

	$contar = mysql_query("select sid from comentarios where sid = '$outrasnews[sid]'");
	$conta = mysql_num_rows($contar);
?>

  <tr>
    <td><span class="style10"><img src="imagens/arrow_laranja.gif" width="5" height="7"> 
    <a href="view.php?sid=<?=$outrasnews[sid]?>" class="style10" title="Autor: <?=$outrasnews[informant]?> - Comentários: <?=$conta?>"><?=$outrasnews[title]?></a></span></td>
  </tr>


<? } ?>