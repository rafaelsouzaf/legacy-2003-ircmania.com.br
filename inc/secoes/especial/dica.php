<p><u><?=$partenome?></u> » <u>Dicas</u></p>
<?
	$query = mysql_query("select * from extra_dicas where id='$dica' and usuario='$name' and nivel='$nivel'");
	$l = mysql_fetch_array($query);
?>

<table align="center" width="90%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px">
    <p><strong><font size="2">Dica: <?=$l[assunto];?></font></strong><br>
    <font color="#808080">Autor: </strong><a href="especial.php?<?=$parte?>=<?=$l[usuario]?>"><font color="#FF0000"><?=$l[usuario];?></font></a> em <? echo date("d/m/y - H:i", $l["data"]);?></font></p>
	</td>
  </tr>
</table>

<br><br>

<table align="center" width="276" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px">
    <p align="justify"><?=nl2br($l[dica])?></p>
	</td>
  </tr>
</table>

<? if ($l[texto]) { ?>

<br><br>
<table align="center" width="90%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" style="font-family: Verdana, Verdana, Helvetica, sans-serif; font-size: 11px">
    <p align="justify"><?=nl2br($l[texto])?></p>
	</td>
  </tr>
</table>
<? } ?>
<br>