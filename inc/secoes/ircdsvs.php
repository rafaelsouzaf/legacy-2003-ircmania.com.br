<?
	$sql = "select count(sid) as vl from artigos where chk='1' and topic='22'"; 
	$qry = mysql_query($sql); 
	$nartigos = mysql_fetch_array($qry); 
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>w(IRCd) & w(Services)</u></font></strong></td>
  </tr>
</table>

<br><br>

<p align="center"><a href="outros.php?enviartexto=ok"><u>Enviar artigo para publicação.</u></a>
<br>(Existem <?=$nartigos['vl']?> artigos em nosso banco de dados)</p>

<br><br>

<table border="0" cellpadding="3" cellspacing="0" width="100%">
<?
$where = "where (topic='22' or nivel='2') and chk='1'";
$query = mysql_query("select * from artigos $where order by time desc limit 60");

for ($i = 0; $l = mysql_fetch_array($query); $i++) {
$cor = ($i%2) ? 'white':'#f3f3f3';

	$sql = "select count(tid) as vl from comentarios where sid='$l[sid]'"; 
	$qry = mysql_query($sql); 
	$nartigos = mysql_fetch_array($qry); 
?>

  <tr>
    <td width="92%" bgcolor="<?=$cor?>"><li><a href="view.php?sid=<?=$l["sid"]?>" class="ircmania1"><u><?=$l["title"]?></u></a></li></td>
    <td width="8%" bgcolor="<?=$cor?>" align="right">(<?=$nartigos['vl']?>)</td>
  </tr>

<? } ?>
  <tr>
    <td width="100%" align="right"><br><br><a href="outros.php?arquivo=ok" class="ircmania1"><u>Visite o Arquivo</u></a></td>
  </tr>
</table>