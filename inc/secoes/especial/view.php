<p><u><?=$partenome?></u>: <a href="especial.php?<?=$parte?>=<?=$name?>" class="ircmania1"><?=$name?></a></p>
<?
include ("inc/secoes/especial/categ.php");

if ($cat) {

	if (!isset($x)) {
		$x = "1";
	}

$npag = 10;
$inicio = $x - 1;
$inicio = $inicio * $npag;
$qdef = "SELECT * FROM download where cat='$cat' and nivel='$nivel' and autor='$name' order by titulo asc";
$sql = mysql_query("$qdef LIMIT $inicio,$npag");
$todos = mysql_query($qdef);

$tr = mysql_num_rows($todos);
$tp = ceil($tr / $npag);

echo "<br><hr color='#000000' width='80%' size='1'><br>";
echo "<u>".$cat."</u><br><br><br>";

while($lcat = mysql_fetch_array($sql)) {

	$sqld = "select count(tid) as vld from download_comentarios where id='$lcat[id]'";
	$qrys = mysql_query($sqld);
	$nartigoss = mysql_fetch_array($qrys);
?>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%" colspan="2"><b>
    <img border="0" src="imagens/down.gif" width="9" height="9">&nbsp;</b><font color="#000000"><a href="download.php?get=<?=$lcat[id];?>" class="ircmania1"><b><u><?=$lcat[titulo];?></u></b></a> <?if ($lcat[imagem]) { echo "<a href='$lcat[imagem]' target='_blank'>Imagem</a>"; } ?></font></td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><font color="#808080"><b>Descrição:</b></font> <?=$lcat[descricao];?></td>
  </tr>
  <tr>
    <td width="50%"><font color="#808080"><b>Data:</b> <? echo date("d/m/y - H:i", $lcat["data"]);?></font></td>
    <td width="50%"><font color="#808080"><b>Tamanho:</b> <? $tamanho = $lcat[tamanho] / 1024; echo substr($tamanho, 0, 5);?> Kb</font></td>
  </tr>
  <tr>
    <td width="50%"><font color="#808080"><a href="especial.php?<?=$parte?>=<?=$name?>&detalhes=<?=$lcat[id]?>" class="ircmania1">Comentar?</a> (<?=$nartigoss['vld']?>)</font></td>
    <td width="50%"><font color="#808080"><b>Download:</b> <?=$lcat[ndown];?></font></td>
  </tr>
</table>
<br><br>

<p align="center">
<?
}

echo "<center>";

$anterior = $x - 1; 
$proximo = $x + 1; 

	if ($x > 1) { 
	echo "<a href='$PHP_SELF?$parte=$name&cat=$cat&x=$anterior'><u>Anterior</u></a> | "; 
	} 
	else {
	echo "<u>Anterior</u> | ";
	}

if ($tr > $npag) { 

for ($d=1;$d <= $tp; $d++) { 
if ($x == $d) { $pages = $pages . $d . " | "; } 
else { $pages = $pages . "<a href=\"$PHP_SELF?$parte=$name&cat=$cat&x=$d\"><u>$d</u></a> |" . " "; } 
} 
echo $pages;

} 

	if ($x < $tp) {
	echo " <a href='$PHP_SELF?$parte=$name&cat=$cat&x=$proximo'><u>Próxima</u></a>";
	}
	else {
	echo " <u>Próxima</u>";
	}

// fim da paginaçao

} else if ($detalhes) {
	$query = mysql_query("select * from download where checkdown='1' and id='$detalhes'");
	$lcat = mysql_fetch_array($query);
?>
<br>
<hr color='#000000' width='40%' size='1'>
<br>
<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%" colspan="2"><b>
    <img border="0" src="imagens/down.gif" width="9" height="9">&nbsp;</b><font color="#000000"><a href="download.php?get=<?=$lcat[id];?>" class="ircmania1"><b><u><?=$lcat[titulo];?></u></b></a> <?if ($lcat[imagem]) { echo "(<a href='$lcat[imagem]' target='_blank'>Imagem</a>)"; } ?></font></td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><font color="#808080"><b>Descrição:</b> <?=$lcat[descricao];?></font></td>
  </tr>
  <tr>
    <td width="50%"><font color="#808080"><b>Data:</b> <? echo date("d/m/y - H:i", $lcat["data"]);?></font></td>
    <td width="50%"><font color="#808080"><b>Download:</b> <?=$lcat[ndown];?></font></td>
  </tr>
</table>
<br><br>
<?
include ("inc/download/downcomentarios.php");
}
?>