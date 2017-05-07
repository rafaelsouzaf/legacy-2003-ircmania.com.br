<?
$maiorsala = mysql_query("select * from redes_stats where rede='$redesinfo' order by users desc");
$lm = mysql_fetch_array($maiorsala);
$canal = str_replace("#","",$lm[canal]);

$query = mysql_query("select * from redes where rede='$redesinfo' and chkrede = '1'");
$l = mysql_fetch_array($query);

	$sql = "select count(canal) as vl from redes_stats where rede='$l[rede]'";
	$qry = mysql_query($sql);
	$nsalas = mysql_fetch_array($qry);

if (!$l[rede]) { die("Rede $redesinfo não consta em nosso banco de dados"); }
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Rede <?=ucfirst($l[rede])?> de IRC</u></font></strong></td>
  </tr>
</table>

<br>
<hr color="#000000" width="50%" size="1">
<br>

<table align="center" border="0" bordercolor="#000000" cellpadding="3" cellspacing="0" width="80%" style="border-style: dotted; border-width: 1">
  <tr>
    <td width="50%"><b>N</b>ome:</td>
    <td width="50%"><b><?=ucfirst($l[rede])?></b></td>
  </tr>
  <tr>
    <td width="50%"><b>S</b>ite Oficial:</td>
    <td width="50%"><a href="http://<?=$l[url]?>" target="_blank"><?=$l[url]?></a></td>
  </tr>
  <tr>
    <td width="50%"><b>E</b>ndereço IRC:</td>
    <td width="50%"><?=$l[irc]?></td>
  </tr>
  <tr>
    <td width="50%"><b>C</b>adastrada por:</td>
    <td width="50%"><a href="user.php?nick=<?=$l[admin]?>"><?=$l[admin]?></a></td>
  </tr>
  <tr>
    <td width="50%"><b>N</b>úmero de Salas:</td>
    <td width="50%"><?=$nsalas[vl]?> Salas</td>
  </tr>
  <tr>
    <td width="50%"><b>L</b>imite:</td>
    <td width="50%"><?=$l[iline]?> WebChats</td>
  </tr>
  <tr>
    <td width="50%"><b>Ú</b>ltima Atualização:</td>
    <td width="50%"><? echo date("d/m/y - H:i", $l[ultima])?></td>
  </tr>
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%">&nbsp;</td>
  </tr>
  <tr>
    <td width="50%"><span style="font-size: 11px;"><b>N</b>ickServ:</td>
    <td width="50%"><img border="0" src="imagens/<?if ($l[nickserv]) echo "sim.gif"; else echo "nao.gif";?>" width="11" height="10"></td>
  </tr>
  <tr>
    <td width="50%"><span style="font-size: 11px;"><b>C</b>hanServ:</td>
    <td width="50%"><img border="0" src="imagens/<?if ($l[chanserv]) echo "sim.gif"; else echo "nao.gif";?>" width="11" height="10"></td>
  </tr>
  <tr>
    <td width="50%"><span style="font-size: 11px;"><b>M</b>emoServ:</td>
    <td width="50%"><img border="0" src="imagens/<?if ($l[memoserv]) echo "sim.gif"; else echo "nao.gif";?>" width="11" height="10"></td>
  </tr>
  <tr>
    <td width="50%"><span style="font-size: 11px;"><b>B</b>otServ:</td>
    <td width="50%"><img border="0" src="imagens/<?if ($l[botserv]) echo "sim.gif"; else echo "nao.gif";?>" width="11" height="10"></td>
  </tr>
</table>

<br><br>

<table align="center" width="80%" border="0" cellpadding="3" cellspacing="0">
  <tr>
    <td><u>Maior Sala:</u></td>
  </tr>
</table>
<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="50%"><b><?=$lm[canal]?></b> (<?=$lm[users]?> usuários)</td>
    <td width="50%"><p align="right"><a href="javascript:;" onClick="MM_openBrWindow('chat?rede=<?=$l[rede]?>&canal=<?=$canal?>','chat','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=777,height=500')"><u>Entre no Chat</u></a></td>
  </tr>
</table>
<table align="center" border="0" cellpadding="9" cellspacing="0" width="70%">
  <tr>
    <td colspan="2" width="100%"><p align="justify"><?=$lm[topico]?></td>
  </tr>
</table>

<br><br>

<table align="center" width="80%" border="0" cellpadding="3" cellspacing="0">
  <tr>
    <td><b>Top 10</b></td>
  </tr>
</table>


<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="40%" bgcolor="<?=$cor?>" align="left"><u>Sala:</u></td>
    <td width="20%" bgcolor="<?=$cor?>" align="center"><u>Usuários:</u></td>
    <td width="40%" bgcolor="<?=$cor?>" align="right"><u>Chat:</u></td>
  </tr>

<?
$queryff = mysql_query("select * from redes_stats where rede='$l[rede]' order by users desc limit 10");

for ($i = 0; $ltop = mysql_fetch_array($queryff); $i++) {
$cor = ($i%2) ? 'white':'#f3f3f3';
$canal = str_replace("#","",$ltop[canal]);
?>

  <tr>
    <td width="40%" bgcolor="<?=$cor?>" align="left"><a href="busca.php?canal=<?=$canal?>&rede=<?=$ltop[rede]?>" class="ircmania1"><?=$ltop[canal]?></a></td>
    <td width="20%" bgcolor="<?=$cor?>" align="center"><?=$ltop[users]?></td>
    <td width="40%" bgcolor="<?=$cor?>" align="right"><a href="javascript:;" onClick="MM_openBrWindow('chat?rede=<?=$ltop[rede]?>&canal=<?=$canal?>','chat','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=777,height=500')" class="ircmania1"><u>Entre no Chat</u></a></td>
  </tr>

<? } ?>
</table>

<br><br>

<p align="center"><a href="busca.php?palavra=&redeirc=<?=$redesinfo?>" class="ircmania1"><u>Ver lista com todas as salas e tópicos</u></a></p>