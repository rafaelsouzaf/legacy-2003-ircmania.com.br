<?
	$sqlc = "select count(id) as vl from download where cat='$cat' and checkdown='1'";
	$qryc = mysql_query($sqlc);
	$nartigosc = mysql_fetch_array($qryc);
?>

<form action="download.php" method="post">
<table border="0" cellpadding="7" cellspacing="0" width="100%">
  <tr>
    <td width="100%">
    <p align="center"><b><font size="3">+ Downloads +</font></b></td>
  </tr>
  <tr>
    <td width="100%">
    <p align="center">
    <input size="20" name="palavrachave" value="<? if ($palavrachave) { echo $palavrachave; }?>" style="font-family: Verdana; font-size: 10 px; height:16">
    <input type="submit" value="Procurar" style="font-family: Verdana; font-size: 10 px; height:17"></td>
  </tr>
  <tr>
    <td width="100%">
    <p align="center">[ <a href="download.php">Área Principal</a> |
    <a href="download.php?enviar=ok">Adicionar Download</a> | <a href="download.php?visit=top">Mais Baixados</a> ]</p>
    </td>
  </tr>
  <tr>
    <td width="100%"><br><p align="center"><u><?=$chavetitle;?></u><br><? if ($cat) { echo "(".$nartigosc['vl']." arquivos)"; } ?></td>
  </tr>
  <tr>
    <td width="100%"><hr color="#000000" width="90%" size="1"></td>
  </tr>
</table>
</form>