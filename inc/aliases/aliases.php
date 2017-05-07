<?
include ("aliasdecode.php");

	$sql = "select count(id) as vl from aliases where chkaliases='1' and categoria='$categoria'"; 
	$qry = mysql_query($sql); 
	$nartigos = mysql_fetch_array($qry); 

 ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Aliases: <?=$categoria?></u></font></strong></td>
  </tr>
</table>

<br><br>

<p align="center"><a href="aliases.php?enviar=ok"><u>Enviar Aliases para publicação.</u></a>
<br>(Existem <?=$nartigos['vl']?> alíases nesta categoria)</p>

<br>
<hr color="#C0C0C0" size="1" width="90%">
<br>

<?
	if (!isset($x)) {
		$x = "1";
	}

$npag = 10;
$inicio = $x - 1; 
$inicio = $inicio * $npag; 
$where = "where chkaliases='1' and categoria='$categoria'";
$qdef = "select * from aliases $where order by id desc"; 
$sql = mysql_query("$qdef LIMIT $inicio,$npag"); 
$todos = mysql_query($qdef); 

$tr = mysql_num_rows($todos); 
$tp = ceil($tr / $npag); 

while ($l = mysql_fetch_array($sql)) { 
?>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%">Por: Anonymous<br><u>Alías:</u></td>
  </tr>
</table>
<br>
<table align="center" border="1" cellpadding="3" cellspacing="0" width="74%">
  <tr>
    <td width="100%"><?=mirc2html($l[alias])?></td>
  </tr>
</table>
<br>
<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%"><u>Código:</u></td>
  </tr>
  <tr>
    <td width="100%" align="center"><textarea rows="5" name="S1" cols="37"><?=$l[alias]?></textarea></td>
  </tr>
</table>

<br>
<hr color="#C0C0C0" size="1" width="90%">
<br>


<?
}

echo "<center>";

$anterior = $x - 1; 
$proximo = $x + 1; 

	if ($x > 1) { 
	echo "<a href='aliases.php?categoria=$categoria&x=$anterior'><u>Anterior</u></a> | "; 
	} 
	else {
	echo "<u>Anterior</u> | ";
	}

if ($tr > $npag) { 

for ($d=1;$d <= $tp; $d++) { 
if ($x == $d) { $pages = $pages . $d . " | "; } 
else { $pages = $pages . "<a href=\"aliases.php?categoria=$categoria&x=$d\"><u>$d</u></a> |" . " "; } 
} 
echo $pages;

} 

	if ($x < $tp) {
	echo " <a href='aliases.php?categoria=$categoria&x=$proximo'><u>Próxima</u></a>";
	}
	else {
	echo " <u>Próxima</u>";
	}
?>