<?
	$numer = mysql_query("select * from redes_stats");
	$numerl = mysql_num_rows($numer);
?>

<form action="busca.php" method="get">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="100%">
    <p align="center"><u>Busca por salas de bate-papo</u><br>
    (Existem <b><?=$numerl?></b> salas de chat em nosso banco de dados)<br>
    <br>
    <select size="1" name="redeirc" style="font-family: Verdana; font-size: 10 px">
    <option value="" selected>Todas as Redes</option>
    <option value=""> </option>

	<?
	$verrede = mysql_query("select * from redes where chkrede = '1'");
	while ($verredel = mysql_fetch_array($verrede)) {
	?>
    <option value="<?=$verredel[rede]?>" <?if ($redeirc == $verredel[rede]) echo "selected";?>>Rede <?=$verredel[rede]?></option>	
	<?
	}
	?>
    <option value=""> </option>
    </select>
    <input type="text" size="20" name="palavra" value="<?=$palavra?>" style="font-family: Verdana; font-size: 10 px">
    <input type="submit" value="Buscar" style="font-family: Verdana; font-size: 10 px"></td>
  </tr>
</table>
</form>

<hr color="#000000" size="1">
<br>