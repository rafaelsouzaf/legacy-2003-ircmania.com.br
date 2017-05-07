<?
$querydic = mysql_query("select * from extra_dicas where usuario='$name' and nivel='$nivel' order by rand()");
$ldica = mysql_fetch_array($querydic);

if ($ldica[texto]) {
?>

  <tr>
    <td><img src="imagens/direita_dicas.gif" width="160" height="23"></td>
  </tr>

  <tr>
    <td height="117" align="center" valign="middle">
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
		  <tr>

		    <td width="100%">Dica:<br><? echo "<a href='especial.php?$parte=$name&dica=$ldica[id]' class='ircmania1'>";?><?=stripslashes($ldica[dica])?></a></td>
		  </tr>
		</table>

    </td>
  </tr>

<? } ?>