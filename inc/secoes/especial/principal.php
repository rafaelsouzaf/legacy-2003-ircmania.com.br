<p><u><?=$partenome?></u></p>
<?
include ("inc/secoes/especial/top.php");
?>

<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
		<div style='height: 120px; overflow: auto; border: 1px solid'>
		<table bgColor="#ffffde" border="0" cellpadding="0" cellspacing="3" width="100%" style="border-collapse: collapse" bordercolor="#808000">
		  <tr>
		    <td width="100%">

	<?

	if (!isset($x)) {
		$x = "1";
	}

$npag = 10;
$inicio = $x - 1;
$inicio = $inicio * $npag;
$qdef = "select * from extra_novidades where usuario='$name' and nivel='$nivel' order by data desc";
$sql = mysql_query("$qdef LIMIT $inicio,$npag");
$todos = mysql_query($qdef);

$tr = mysql_num_rows($todos);
$tp = ceil($tr / $npag);

	while ($lver = mysql_fetch_array($sql)) {
	?>
	<p align="justify"><u><b><?=stripslashes($lver[assunto])?></b></u> <? echo date("d/m/y - H:i", $lver["data"]);?><br>
	<br>
	<?=stripslashes($lver[texto])?></p>
	<?
	}

echo "<center><br>";

$anterior = $x - 1; 
$proximo = $x + 1; 

	if ($x > 1) { 
	echo "<a href='$PHP_SELF?$parte=$name&x=$anterior'><u>Anterior</u></a> | "; 
	} 
	else {
	echo "<u>Anterior</u> | ";
	}

if ($tr > $npag) { 

for ($d=1;$d <= $tp; $d++) { 
if ($x == $d) { $pages = $pages . $d . " | "; } 
else { $pages = $pages . "<a href=\"$PHP_SELF?$parte=$name&x=$d\"><u>$d</u></a> |" . " "; } 
} 
echo $pages;

} 

	if ($x < $tp) {
	echo " <a href='$PHP_SELF?$parte=$name&x=$proximo'><u>Próxima</u></a>";
	}
	else {
	echo " <u>Próxima</u>";
	}
?>

	</td>
  </tr>
</table>
</div>
</td>
  </tr>
</table>
<br>

<? include ("inc/secoes/especial/categ.php"); ?>

<br><br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="92%"><b>Artigos</b>:<br>&nbsp;</td>
    <td width="8%"></td>
  </tr>
<?
$query = mysql_query("select * from artigos where chk='1' and informant='$name' order by time desc");

for ($i = 0; $l = mysql_fetch_array($query); $i++) {
$cor = ($i%2) ? 'white':'#f3f3f3';

	$sql = "select count(tid) as vl from comentarios where sid='$l[sid]'";
	$qry = mysql_query($sql);
	$nartigos = mysql_fetch_array($qry);

	if ($l[title]) {
?>

  <tr>
    <td width="92%" bgcolor="<?=$cor?>">- <a href="view.php?sid=<?=$l["sid"]?>" class="ircmania1"><u><?=stripslashes($l[title])?></u></a></td>
    <td width="8%" bgcolor="<?=$cor?>" align="right">(<?=$nartigos['vl']?>)</td>
  </tr>

<? }} ?>
</table>

<br><br>
<hr color="#000000" width="40%" size="1">

<p><u>Ültimos Arquivos:</u></p>
<table align="center" border="0" cellpadding="2" cellspacing="0" width="90%" style="border-collapse: collapse" bordercolor="#111111">

<?
	$querynov = mysql_query("select * from download where autor='$name' and nivel='$nivel' order by data desc limit 10");
	while ($nov = mysql_fetch_array($querynov)) {
?>
  <tr>
    <td width="49%"><b><font color="#ff0000">» </font></b><a href="especial.php?<?=$parte?>=<?=$name?>&detalhes=<?=$nov[id]?>"><?=$nov[titulo]?></a></td>
    <td width="36%"><? echo date("d/m/y - H:i", $nov[data]);?></td>
    <td width="15%"><?=$nov[cat]?></td>
  </tr>
<? } ?>
</table>

<br>
<br>

<p><u>Mais baixados:</u></p>
<table align="center" border="0" cellpadding="2" cellspacing="0" width="90%" style="border-collapse: collapse" bordercolor="#111111">
<?
	$querynov = mysql_query("select * from download where autor='$name' and nivel='$nivel' order by ndown desc limit 10");
	while ($nov = mysql_fetch_array($querynov)) {
?>
  <tr>
    <td width="49%"><b><font color="#ff0000">» </font></b><a href="especial.php?<?=$parte?>=<?=$name?>&detalhes=<?=$nov[id]?>"><?=$nov[titulo]?></a></td>
    <td width="36%"><? echo date("d/m/y - H:i", $nov[data]);?></td>
    <td width="15%"><?=$nov[cat]?></td>
  </tr>
<? } ?>
</table>