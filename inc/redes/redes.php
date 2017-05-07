<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Redes de IRC</u></font></strong></td>
  </tr>
</table>

<br><br>

<p align="center"><a href="secoes.php?redesenvia=ok"><u>Acrescente sua rede de IRC.</u></a>
<br>(Somente para IRC Admin's.)</p>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
  <tr>
    <td width="100%">
    <p align="justify">Redes de IRC consistem em grupos de servidores de IRC ligados 
    entre si. Aqui se encontram as principais redes de IRC de idioma português.</td>
  </tr>
</table>

<br>
<hr color="#000000" width="50%" size="1">
<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="40%" bgcolor="<?=$cor?>" align="left"><u>Rede:</u></td>
    <td width="20%" bgcolor="<?=$cor?>" align="center"><u>Salas:</u></td>
    <td width="40%" bgcolor="<?=$cor?>" align="right"><u>+ Info:</u></td>
  </tr>
  <tr>
    <td width="40%" bgcolor="<?=$cor?>" align="left">&nbsp;</td>
    <td width="20%" bgcolor="<?=$cor?>" align="center">&nbsp;</td>
    <td width="40%" bgcolor="<?=$cor?>" align="right">&nbsp;</td>
  </tr>

<?
$query = mysql_query("select * from redes where chkrede = 1 order by rede");

for ($i = 0; $l = mysql_fetch_array($query); $i++) {
$cor = ($i%2) ? 'white':'#f3f3f3';

	$sql = "select count(canal) as vl from redes_stats where rede='$l[rede]'"; 
	$qry = mysql_query($sql); 
	$nsalas = mysql_fetch_array($qry); 
?>

  <tr>
    <td width="40%" bgcolor="<?=$cor?>" align="left"><?=$l[rede]?></td>
    <td width="20%" bgcolor="<?=$cor?>" align="center"><?=$nsalas[vl]?></td>
    <td width="40%" bgcolor="<?=$cor?>" align="right"><a href="secoes.php?redesinfo=<?=$l[rede]?>" class="ircmania1">Leia mais</a></td>
  </tr>

<? } ?>
</table>