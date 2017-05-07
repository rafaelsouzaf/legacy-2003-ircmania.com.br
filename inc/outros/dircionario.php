<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>dIRCionário</u></font></strong></td>
  </tr>
</table>

<br><br>

<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">dIRCionário é um trocadilho formado pelas palavras 
    dicionário e IRC. Aqui estão os termos técnicos mais utilizados nas redes de 
    IRC, as abreviaturas mais conhecidas, os comandos mais utilizados e inúmeros smileys dos mais variados 
    tipos.</p>
    <hr color="#000000" size="1" width="70%"></td>
  </tr>
</table>
<?
	$sql = "select count(smiley) as vl from dircionario_smileys where checkdir='1'";
	$qry1 = mysql_query($sql);
	$termos1 = mysql_fetch_array($qry1);

	$sql = "select count(palavra) as vl from dircionario_conceitos where checkdir='1'";
	$qry2 = mysql_query($sql);
	$termos2 = mysql_fetch_array($qry2);

	$sql = "select count(palavra) as vl from dircionario_abreviaturas where checkdir='1'";
	$qry3 = mysql_query($sql);
	$termos3 = mysql_fetch_array($qry3);

	$sql = "select count(comando) as vl from dircionario_comandos where checkdir='1'";
	$qry4 = mysql_query($sql);
	$termos4 = mysql_fetch_array($qry4);
?>

<table align="center" border="0" cellpadding="0" cellspacing="3" width="50%">
  <tr>
    <td width="100%">
    <ul>
      <li><a href="outros.php?dircionario_conceitos=ok" class="ircmania1"><u>Conceitos</u></a> (<?=$termos2['vl']?> termos)<br>
		&nbsp;</li>
      <li><a href="outros.php?dircionario_abreviaturas=ok" class="ircmania1"><u>Abreviaturas</u></a> (<?=$termos3['vl']?> palavras)<br>
		&nbsp;</li>
      <li><a href="outros.php?dircionario_comandos=ok" class="ircmania1"><u>Comandos</u></a> (<?=$termos4['vl']?> comandos)<br>
		&nbsp;</li>
      <li><a href="outros.php?dircionario_smileys=ok" class="ircmania1"><u>Smiley</u></a> (<?=$termos1['vl']?> símbolos)</li>
    </ul>
    <p align="justify">&nbsp;</td>
  </tr>
</table>



<table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
  <tr>
    <td width="100%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Últimas Adições</b></td>
  </tr>
  <tr>
    <td width="100%">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%">

<table border="0" cellpadding="2" cellspacing="0" width="50%" align="left">
	<?
	$query99 = mysql_query("select * from dircionario_conceitos where checkdir='1' order by data desc limit 7");
	for ($i = 0; $lf = mysql_fetch_array($query99); $i++) {
	$cor = ($i%2) ? 'white':'#f3f3f3';
	?>
  <tr>
    <td width="100%" bgcolor="<?=$cor?>">- <?=$lf[palavra];?></td>
  </tr>
<? } ?>
</table>

<table border="0" cellpadding="2" cellspacing="0" width="50%" align="right">
	<?
	$query99 = mysql_query("select * from dircionario_abreviaturas where checkdir='1' order by data desc limit 7");
	for ($i = 0; $lf = mysql_fetch_array($query99); $i++) {
	$cor = ($i%2) ? 'white':'#f3f3f3';
	?>
  <tr>
    <td width="100%" bgcolor="<?=$cor?>">- <?=$lf[palavra];?></td>
  </tr>
<? } ?>
</table>

</td>
  </tr>
</table>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>