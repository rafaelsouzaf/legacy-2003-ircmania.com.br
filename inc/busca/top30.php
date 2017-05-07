<?
$chavetitle = "As 30 salas de chat mais frequentadas";

include ("inc/top.php");
include ("inc/header.php");
include ("inc/busca/top.php");
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Top 30</u></font></strong></td>
  </tr>
</table>

<br><br>

<script language="JavaScript">
		<!--
			function MM_jumpMenu(targ,selObj,restore){ //v3.0
			eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
			if (restore) selObj.selectedIndex=0;
			}
		//-->
</script>

<table align="center" border="0" cellpadding="10" cellspacing="0" width="70%">
  <tr>
    <td width="100%" align="center">
	<select name="rede" onChange="MM_jumpMenu('parent',this,0)" style="font-family: Verdana; font-size: 10 px">
	<option selected value="">Todas as Redes</option>
	<option value="busca.php?top30=ok"></option>
	<option value="busca.php?top30=ok">Todas</option>
	<option value="busca.php?top30=ok"></option>
	<?
	$resultado = mysql_query("select distinct rede from redes_stats");
	while ($l = mysql_fetch_array($resultado)) {
	?>
	<option value="busca.php?top30=ok&redeirc=<?=$l[rede]?>">Rede <?=$l[rede]?></option>
	<?
	}
	?>
	<option value="busca.php?top30=ok"></option>
	</select>
	</span>
	</td>
  </tr>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="7%">&nbsp;</td>
    <td width="30%"><u>Sala</u></td>
    <td width="28%"><u>Rede</u></td>
    <td width="10%"><u>Usuários</u></td>
    <td width="25%" align="center"><u>Entre</u></td>
  </tr>
  <tr>
    <td width="7%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
    <td width="28%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
  </tr>

	<?
	$where = "where rede='$redeirc'";

	if (!$redeirc) {
	$where = "where users > 1";
	}

	$query_ultimas = mysql_query("select * from redes_stats $where order by users desc limit 30");
	for ($a = 1 ; $l = mysql_fetch_array($query_ultimas); $a++) {
	$canal = str_replace("#","",$l[canal]);
	?>

  <tr>
    <td width="7%"><?=$a?>.</td>
    <td width="30%"><a href="busca.php?canal=<?=$canal?>&rede=<?=$l[rede]?>" class="ircmania1"><?=$l[canal]?></a></td>
    <td width="28%"><a href="secoes.php?redesinfo=<?=$l[rede]?>" class="ircmania1"><?=$l[rede]?></a></td>
    <td width="10%"><?=$l[users]?></td>
    <td width="25%" align="right"><a href="javascript:;" onClick="MM_openBrWindow('chat?rede=<?=$l[rede]?>&canal=<?=$canal?>','chat','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=777,height=500')"><u>Entre no Chat</u></a></td>
  </tr>

<? } ?>
</table>

<br>
<hr width="50%" size="1">
<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="70%">
  <tr>
    <td width="100%">
    <p align="center"><em><strong>*</strong> Todas as salas/canais de chat 
    contidos neste site tem seus dados atualizados a cada 60 minutos.</em></td>
  </tr>
</table>

<?
include ("inc/header2.php");
include ("inc/footer.php");
?>