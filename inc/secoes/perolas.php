<?
	$sql = "select count(sid) as vl from artigos where chk='1' and topic='18'"; 
	$qry = mysql_query($sql); 
	$nartigos = mysql_fetch_array($qry); 
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Pérolas do Chat</u></font></strong></td>
  </tr>
</table>

<br><br>

<p align="center"><a href="outros.php?enviartexto=ok"><u>Enviar pérola para publicação.</u></a>
<br>(Existem <?=$nartigos['vl']?> pérolas em nosso banco de dados)</p>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
  <tr>
    <td width="100%">
    <p align="justify">Esta seção é destinada a publicação de pérolas do chat. A 
    intenção dessa seção é divertir respeitando os usuários iniciantes. Ahh, 
    quase todos os nicks envolvidos são fictícios.</td>
  </tr>
</table>

<br><br>
<hr color="#C0C0C0" width="80%" size="1">
<br>

<?
	$where = "where topic='18' and chk='1' and nivel='0'";
	$query = mysql_query("select * from artigos $where order by time desc limit 10");
	while ($lp = mysql_fetch_array($query)) {

	$sql = "select count(tid) as vl from comentarios where sid='$lp[sid]'"; 
	$qry = mysql_query($sql); 
	$nartigos = mysql_fetch_array($qry); 
?>


<table align="center" width="80%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px">
    <p><strong><font size="2"><?=$lp[title];?></font></strong><br>
    <font color="#808080">Autor: </strong><a href="user.php?nick=<?=$lp[informant];?>"><font color="#FF0000"><?=$lp[informant];?></font></a> em <? echo date("d/m/y - H:i", $lp["time"]);?></font></p>
	</td>
  </tr>
</table>

<br><br>

<table align="center" width="276" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px">
    <p align="justify"><?=$lp[hometext];?></p>
	</td>
  </tr>
</table>
<br>
<table align="center" width="276" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
		<? if ($lp[bodytext]) { ?>
		<p><a href="view.php?sid=<?=$lp["sid"]?>"><u>Leia mais...</u></a> (<?=$nartigos['vl']?>)</p>
		<? } else { ?>
		<p><a href="view.php?sid=<?=$lp["sid"]?>"><u>Comentar?</u></a> (<?=$nartigos['vl']?>)</p>
		<? } ?>
	</td>
  </tr>
</table>

<br>
<hr color="#C0C0C0" width="80%" size="1">
<br>
<?
}
?>

<table align="center" width="80%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right">
	<br><br><a href="outros.php?arquivo=ok" class="ircmania1"><u>Visite o Arquivo</u></a>
	</td>
  </tr>
</table>