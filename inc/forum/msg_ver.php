<?
$qforum = mysql_query("select * from forum_msg where id = '$ver' order by id");
$qforuml = mysql_fetch_array($qforum);

$queryd = mysql_query("select * from forum where id = '$qforuml[catid]'");
$querydl = mysql_fetch_array($queryd);

	$chavetitle = $qforuml[topico];

include ("inc/top.php");
include ("inc/header.php");
include ("inc/forum/top.php");

	$veradm = mysql_query("select login,admin from usuarios where login='$usuario'");
	$veradml = mysql_fetch_array($veradm);
?>

<table border="0" cellpadding="5" cellspacing="0" width="100%">
  <tr>
    <td width="100%"><b><?=$querydl[nome]?></b><br>
    <?=$querydl[descricao]?></td>
  </tr>
</table>

<br>
<a href="forum.php?responder=<?=$qforuml[id]?>">
<img border="0" src="imagens/forum/responder.gif" width="93" height="25"></a>
<br>

<br><a name="<?=$qforuml[id]?>"></a>
<table border="0" cellpadding="0" cellspacing="3" width="100%" bgcolor="#fdf7db">
  <tr>
    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b><?=ucfirst(stripslashes($qforuml[topico]))?></b></td>
  </tr>
  <tr>
    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b>Autor:</b> <?echo "<a href='user.php?nick=$qforuml[autor]' class='ircmania1'>$qforuml[autor]</a>";?>  <b>Data</b> <? echo date("d/m/y H:i:s", $qforuml[data]);?></td>
  </tr>
</table>

<table border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td width="100%"><p><font face="Verdana"><span style="font-size: 11px;">
	<?=nl2br(ucfirst(stripslashes($qforuml[mensagem])))?></td>
  </tr>
</table>
<br>
<? if ($veradml[admin]) echo "<center>[ <a href='forum.php?deletar=1&id=$qforuml[id]'>Deletar</a> ]</center><br>"; ?>

<?
$qforum = mysql_query("select * from forum_msg where reid = '$qforuml[id]?' order by id");
while ($qforuml = mysql_fetch_array($qforum)) {
?>

<br><a name="<?=$qforuml[id]?>"></a>
<table border="0" cellpadding="0" cellspacing="3" width="100%" bgcolor="#fdf7db">
  <tr>
    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b><?=ucfirst(stripslashes($qforuml[topico]))?></b></td>
  </tr>
  <tr>
    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b>Autor:</b> <?echo "<a href='user.php?nick=$qforuml[autor]' class='ircmania1'>$qforuml[autor]</a>";?>  <b>Data</b> <? echo date("d/m/y H:i:s", $qforuml[data]);?></td>
  </tr>
</table>

<table border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td width="100%"><p><font face="Verdana"><span style="font-size: 11px;">
	<?=nl2br(ucfirst(stripslashes($qforuml[mensagem])))?></td>
  </tr>
</table>
<br>
<? if ($veradml[admin]) echo "<center>[ <a href='forum.php?deletar=1&id=$qforuml[id]'>Deletar</a> ]</center><br>"; ?>

<?
}
include ("inc/header2.php");
include ("inc/footer.php");
?>