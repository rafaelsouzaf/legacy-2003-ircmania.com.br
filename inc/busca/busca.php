<?
$chavetitle = "Buscando por $palavra";

include ("inc/top.php");
include ("inc/header.php");
include ("inc/busca/top.php");

	if (!isset($x)) {
		$x = "1";
	}

$npag = 50;
$inicio = $x - 1; 
$inicio = $inicio * $npag;

	if ($redeirc) {
	$where = "where rede = '$redeirc' and canal like '%$palavra%'";
	}
	else {
	$where = "where canal like '%$palavra%'";
	}

$qdef = "select * from redes_stats $where order by users desc"; 
$sql = mysql_query("$qdef LIMIT $inicio,$npag"); 
$todos = mysql_query($qdef); 

$tr = mysql_num_rows($todos); 
$tp = ceil($tr / $npag);

	$buscares = mysql_num_rows($todos);

?>

<table cellSpacing="0" width="100%" border="0" cellpadding="0">
  <tr>
    <td width="100%"><font face="Courier New" size="2">Resultados encontrados: <b><?=$buscares?></b> salas</font></td>
  </tr>
</table>

<br><br>

<?
	while ($buscarl = mysql_fetch_array($sql)) {
	$canal = str_replace("#","",$buscarl[canal]);

	$ninfo = mysql_query("select canal,rede from livro where canal='$canal' and rede='$buscarl[rede]'");
	$ninfol = mysql_num_rows($ninfo);
?>

<table align="center" border="0" cellpadding="0" cellspacing="3" width="90%">
  <tr>
    <td width="70%"><span style="FONT-SIZE: 11px"><b><?=$buscarl[canal]?></b></td>
    <td width="30%" align="right"><span style="font-size: 11px"><a href="javascript:;" onClick="MM_openBrWindow('chat/?rede=<?=$buscarl[rede]?>&canal=<?=$canal?>','chat','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=777,height=500')"><b><u>Entrar no Chat</u></a></td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><p align="justify"><span style="font-size: 11px"><font color="#800000"><?=$buscarl[topico]?></td>
  </tr>
  <tr>
    <td width="100%" colspan="2">Rede <a href="secoes.php?redesinfo=<?=$buscarl[rede]?>" class="ircmania1"><u><?=$buscarl[rede]?></u></a></td>
  </tr>
  <tr>
    <td width="70%">Usuários: <?=$buscarl[users]?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data: <? echo date("d/m/y - H:i", $buscarl[data])?></td>
    <td width="30%" align="right"><a href="busca.php?canal=<?=$canal?>&rede=<?=$buscarl[rede]?>">(<?=$ninfol?>) + Info</a></td>
  </tr>
</table>
<br>
<br>

<?
}

echo "<br><br><center>";

$palavra = str_replace("#","%23",$palavra);

$anterior = $x - 1; 
$proximo = $x + 1; 

	if ($x > 1) { 
	echo "<a href='busca.php?x=$anterior&redeirc=$redeirc&palavra=$palavra'><u>Anterior</u></a> | "; 
	} 
	else {
	echo "<u>Anterior</u> | ";
	}

if ($tr > $npag) { 

for ($d=1;$d <= $tp; $d++) { 
if ($x == $d) { $pages = $pages . $d . " | "; } 
else { $pages = $pages . "<a href=\"busca.php?x=$d&redeirc=$redeirc&palavra=$palavra\"><u>$d</u></a> |" . " "; } 
} 
echo $pages;

} 

	if ($x < $tp) {
	echo " <a href='busca.php?x=$proximo&redeirc=$redeirc&palavra=$palavra'><u>Próxima</u></a>";
	}
	else {
	echo " <u>Próxima</u>";
	}
?>

<br><br><br>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="33%" align="center">
    <a href="http://www.linuxmall.com.br/index.php?product_id=1473&fil=ircmania.com.br" target="_blank">
    <img alt="Clique para + detalhes" src="imagens/produtos/ba1602654d174faeae10716febd2523e.jpg" border="0" width="100" height="120"></a></td>
    <td width="33%" align="center">
    <a href="http://www.linuxmall.com.br/index.php?product_id=1537&fil=ircmania.com.br" target="_blank">
    <img alt="Clique para + detalhes" src="imagens/produtos/0a881a188d43afd18a6c44f2f75884a0.jpg" border="0" width="100" height="120"></a></td>
    <td width="34%" align="center">
    <a href="http://www.linuxmall.com.br/index.php?product_id=1421&fil=ircmania.com.br" target="_blank">
    <img alt="Clique para + detalhes" src="imagens/produtos/6776fdc6da456b309732abcaccbd66d9.jpg" border="0" width="100" height="120"></a></td>
  </tr>
  <tr>
    <td width="33%" align="center"><a href="http://www.linuxmall.com.br/index.php?product_id=1473&fil=ircmania.com.br" target="_blank"><u>DVD Matrix Reloaded - Imperdível!</u></a></td>
    <td width="33%" align="center"><a href="http://www.linuxmall.com.br/index.php?product_id=1537&fil=ircmania.com.br" target="_blank"><u>DVD Homem-Aranha (Duplo)</u></a></td>
    <td width="34%" align="center"><a href="http://www.linuxmall.com.br/index.php?product_id=1421&fil=ircmania.com.br" target="_blank"><u>O Sr. dos Anéis - A Sociedade do Anel</u></a></td>
  </tr>
</table>

<?
include ("inc/header2.php");
include ("inc/footer.php");
?>