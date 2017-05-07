<?
include ("conexao.php");

	$query = mysql_query("select * from artigos where sid='$sid' and chk='1'");
	$l = mysql_fetch_array($query);
	
	$chavetitle = stripslashes($l[title]);
	$chavecanal = $l[chavecanal];
	$chaverede = $l[chaverede];

include ("inc/top.php");
include ("inc/header.php");

if ($l[nivel] != 0) {
?>
<p align="right">
<?
if ($l[nivel] == 1) { echo ":: Coders (Scripter) => <a href='especial.php?scripter=$l[informant]'>$l[informant]</a> <= ::";}
if ($l[nivel] == 2) { echo ":: Coders (IRCd) => <a href='especial.php?ircd=$l[informant]'>$l[informant]</a> <= ::";}
if ($l[nivel] == 3) { echo ":: Coders (Eggdrop) => <a href='especial.php?egg=$l[informant]'>$l[informant]</a> <= ::";}
if ($l[nivel] == 4) { echo ":: Coders (PHP) => <a href='especial.php?php=$l[informant]'>$l[informant]</a> <= ::";}
if ($l[nivel] == 5) { echo ":: Colunista => <a href='especial.php?colunista=$l[informant]'>$l[informant]</a> <= ::";}
echo "</p>";
}
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px">
    <p><strong><font size="2"><?=stripslashes($l[title])?></font></strong><br>
    <font color="#808080">Autor: </strong><a href="user.php?nick=<?=$l[informant]?>"><font color="#FF0000"><?=$l[informant]?></font></a> em <? echo date("d/m/y - H:i", $l[time])?></font></p>
	</td>
  </tr>
</table>

<br><br>

<table align="center" width="276" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px">
    <p align="justify"><?if ($l[nivel] == 0) { echo $l[hometext]; } else { echo nl2br(stripslashes($l[hometext])); }?></p>
	</td>
  </tr>
</table>

<? if ($l[bodytext]) { ?>

<br><br>
<table align="center" width="95%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" style="font-family: Verdana, Verdana, Helvetica, sans-serif; font-size: 11px">
    <p align="justify"><?if ($l[nivel] == 0) { echo $l[bodytext]; } else { echo nl2br(stripslashes($l[bodytext])); }?></p>
	</td>
  </tr>
</table>
<? } ?>
<br><br>


<?
if ($l[nivel] != 0) {
?>
<table align="center" width="95%" bgcolor="#FFFFDE" border="1" style="border-collapse: collapse" bordercolor="#F3F3F3" cellpadding="0" cellspacing="2" width="100%">
  <tr>
    <td width="100%">
    <p align="justify"><i>O texto acima é independente e não expressa necessariamente a posição do 
    portal. Dúvidas? Entre em <a href="outros.php?contato=ok" class="ircmania1"><u>contato</u></a> conosco.</i></td>
  </tr>
</table>
<br>
<?
}
?>


<? include ("comentarios.php"); ?>

<br>
<br>

<table border="0" cellpadding="4" cellspacing="0" width="100%">
  <tr>
    <td width="100%"><u>Outras matérias:</u></td>
  </tr>
  <tr>
    <td width="100%">
    <ul>

	<?
	$query = mysql_query("select * from artigos where chk='1' and nivel='0' order by rand() limit 4");
	while ($l = mysql_fetch_array($query)) {
	?>
      <li><a href="view.php?sid=<?=$l[sid]?>" class="ircmania1"><?=$l[title]?></a></li>
	<? } ?>

    </u>
	</td>
  </tr>
</table>

<?
include ("inc/header2.php");
include ("inc/footer.php");
?>