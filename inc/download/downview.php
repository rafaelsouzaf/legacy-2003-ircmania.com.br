<? include ("inc/download/downtop.php"); 

if ($cat) {

	if (!isset($x)) {
		$x = "1";
	}

$npag = 10;
$inicio = $x - 1;
$inicio = $inicio * $npag;
$qdef = "SELECT * FROM download where cat='$cat' and checkdown='1' order by data desc";
$sql = mysql_query("$qdef LIMIT $inicio,$npag");
$todos = mysql_query($qdef);

$tr = mysql_num_rows($todos);
$tp = ceil($tr / $npag);

while($lcat = mysql_fetch_array($sql)) {

	$sqld = "select count(tid) as vld from download_comentarios where id='$lcat[id]'";
	$qrys = mysql_query($sqld);
	$nartigoss = mysql_fetch_array($qrys);

	$imgsize = GetImageSize("$lcat[imagem]");
?>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%" colspan="2"><b>
    <img border="0" src="imagens/down.gif" width="9" height="9">&nbsp;</b><font color="#000000"><a href="download.php?get=<?=$lcat[id];?>" class="ircmania1"><b><u><?=$lcat[titulo];?></u></b></a> <? if ($lcat[imagem]) { echo "(<a href='javascript:;' onClick=\"MM_openBrWindow('$lcat[imagem]','','width=$imgsize[0],height=$imgsize[1]')\">Imagem</a>)";}?></font></td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><font color="#808080"><b>Descrição:</b></font> <?=$lcat[descricao];?></td>
  </tr>
  <tr>
    <td width="50%"><font color="#808080"><b>Tamanho:</b> <?=$lcat[tamanho];?></font></td>
    <td width="50%"><font color="#808080"><b>Versão:</b> <?=$lcat[versao];?></font></td>
  </tr>
  <tr>
    <td width="50%"><font color="#808080"><b>Data:</b> <? echo date("d/m/y - H:i", $lcat["data"]);?></font></td>
    <td width="50%"><font color="#808080"><b>Download:</b> <?=$lcat[ndown];?></font></td>
  </tr>
  <tr>
    <td width="50%"><font color="#808080"><a href="download.php?detalhes=<?=$lcat[id];?>" class="ircmania1">Comentar?</a> (<?=$nartigoss['vld']?>)</font></td>
    <td width="50%"><font color="#808080"><? $website = substr($lcat[website], 0, 30); if ($lcat[website]) { echo "<a href='$lcat[website]' target='_blank'>"; } ?><?=$website?></a></font></td>
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
	echo "<a href='$PHP_SELF?cat=$cat&x=$anterior'><u>Anterior</u></a> | "; 
	} 
	else {
	echo "<u>Anterior</u> | ";
	}

if ($tr > $npag) { 

for ($d=1;$d <= $tp; $d++) { 
if ($x == $d) { $pages = $pages . $d . " | "; } 
else { $pages = $pages . "<a href=\"$PHP_SELF?cat=$cat&x=$d\"><u>$d</u></a> |" . " "; } 
} 
echo $pages;

} 

	if ($x < $tp) {
	echo " <a href='$PHP_SELF?cat=$cat&x=$proximo'><u>Próxima</u></a>";
	}
	else {
	echo " <u>Próxima</u>";
	}

// fim da paginaçao

} else {

	$sqlb = "select count(id) as vl from download where checkdown='1'";
	$qryb = mysql_query($sqlb);
	$nartigosb = mysql_fetch_array($qryb);

?>

<p align="center">(Existem <?=$nartigosb['vl']?> arquivos em nosso banco de dados.)</p>
<table align="center" border="0" cellpadding="0" cellspacing="10" width="80%">

<?
	$query7 = mysql_query("select * from download_cat where nivel='0' order by nome asc");
	while ($ldown= mysql_fetch_array($query7)) {

	$sql = "select count(id) as vl from download where checkdown='1' and cat='$ldown[id]'";
	$qry = mysql_query($sql);
	$nartigos = mysql_fetch_array($qry);
?>

  <tr>
    <td width="100%">
    <img border="0" src="imagens/icon_folder.gif" width="15" height="13"> 
    <a href="download.php?cat=<?=$ldown[id];?>" class="ircmania1"><u><?=$ldown[nome];?></u></a> (<?=$nartigos['vl']?>)<br>
    <?=$ldown[descricao];?><br><br>
	</td>
  </tr>

<? } ?>

</table>

<? } ?>