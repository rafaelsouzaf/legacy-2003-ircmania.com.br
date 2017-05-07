<?
	$query3 = mysql_query("select login,colunista from usuarios where login='$name' and colunista='1' ");
	if (!$lbbg = mysql_fetch_array($query3)) {
	die();
	}

	$query3f = mysql_query("select * from usuarios where login='$name'");
	$ls = mysql_fetch_array($query3f);

	$chavetitle = $name." - Colunista";
	$chaverede = $ls[rede];
	if ($ls[canal] == "#") 	$chavecanal = null; else $chavecanal = $ls[canal];

	$sql = "select count(sid) as vl from artigos where chk='1' and informant='$name'"; 
	$qry = mysql_query($sql); 
	$nartigos = mysql_fetch_array($qry);

		$totalq = mysql_query("select * from artigos where informant='$name'");
		$totalcoments = 0;
		while ($ll = mysql_fetch_array($totalq)) {
		$sql = "select count(tid) as vl from comentarios where sid='$ll[sid]'"; 
		$qry = mysql_query($sql); 
		$nar = mysql_fetch_array($qry);
		$totalcoments = $totalcoments + $nar['vl'];
		}

include ("inc/top.php");
include ("inc/header.php");
?>
<p><b><u><?=$name?></u></b></p>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="80%">
  <tr>
    <td width="50%" valign="top"><p align="center">

		<? if ($ls[foto]) {
		$nova_largura= 110;
		$nova_altura = "imagesY($ls[foto])*$nova_largura/imagesX($ls[foto])";
		echo "<a href='user.php?nick=$name'><img border='0' src='imagens/user/fotos/$ls[foto]' width='$nova_largura' style='border: 1px solid #FF8000'></a>";
		}
		else { echo "<img border='0' src='imagens/user/fotos/modelo.gif' style='border: 1px solid #FF8000' width='110'>";}?></p>

	</td>
    <td width="50%" valign="top"><p align="justify">

<table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber3" cellspacing="0">
  <tr>
    <td width="50%"><b>Nick:</b></td>
    <td width="50%"><a href="user.php?nick=<?=$ls[login]?>" class="ircmania1"><?=$ls[login]?></a></td>
  </tr>
  <tr>
    <td width="50%"><b>Registro:</b></td>
    <td width="50%"><? echo date("d/m/y", $ls[dataregistro]);?></td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><hr color="#C0C0C0" size="1"></td>
  </tr>
  <tr>
    <td width="100%" colspan="2">Número de artigos publicados: <b><?=$nartigos[vl]?></b></td>
  </tr>
  <tr>
    <td width="100%" colspan="2">-<br>Número total de comentários gerados pelos 
    artigos: <b><?=$totalcoments?></b></td>
  </tr>
</table>


</td>
  </tr>
</table>

<br>

<table align="center" bgcolor="#FFFFDE" border="1" style="border-collapse: collapse" bordercolor="#F3F3F3" cellpadding="0" cellspacing="2" width="60%">
  <tr>
    <td width="100%"><p align="justify"><?=nl2br($ls[descricao])?></td>
  </tr>
</table>

<br><br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
<?
$where = "where informant='$name'";
$query = mysql_query("select * from artigos $where order by time desc");

$totalcoments = 0;
for ($i = 0; $l = mysql_fetch_array($query); $i++) {

	$sql = "select count(tid) as vl from comentarios where sid='$l[sid]'"; 
	$qry = mysql_query($sql); 
	$nartigos = mysql_fetch_array($qry);

$totalcoments = $totalcoments + $nartigos['vl'];
$cor = ($i%2) ? 'white':'#f3f3f3';
?>
  <tr>
    <td width="92%" bgcolor="<?=$cor?>"><li><a href="view.php?sid=<?=$l[sid]?>" class="ircmania1"><u><?=$l[title]?></u></a></li></td>
    <td width="8%" bgcolor="<?=$cor?>" align="right">(<?=$nartigos[vl]?>)</td>
  </tr>
<? } ?>
</table>
<br><br>

<?
include ("inc/header2.php");
include ("inc/footer.php");
?>