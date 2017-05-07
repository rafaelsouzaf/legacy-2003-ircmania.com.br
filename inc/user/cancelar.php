<?
$query = mysql_query("select * from usuarios where login='$usuario'");
$l = mysql_fetch_array($query);

if (getenv("REQUEST_METHOD") == "POST") {
mysql_query("delete from usuarios where login='$usuario'");
$feito = 1;
}
?>

<p align="center"><u><b>Cancelar sua conta!</b></u></p>
<br>

<? if ($feito) { ?>
<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%">
    <p align="center"><font color="#FF0000"><u>Sua conta foi cancelada com 
    sucesso!</u></font></td>
  </tr>
</table>
<? } else { ?>
<form action="user.php?edit=cancelar" method="post">
<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%"><font color="#FF0000"><u>Atenção</u>:</font><ul>
      <li>
      <p align="justify">Se você cancelar sua conta, o seu nick (apelido) estará 
      imediatamente disponível para registro.<br> &nbsp;
	  </li>
      <li>
      <p align="justify">Textos, comentários, downloads e quaisquer outras 
      participações registradas com seu nick no site <u>não serão deletadas</u>.</li>
    </ul>
    </td>
  </tr>
</table>

<hr color="#C0C0C0" width="60%" size="1">
<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%" align="center">
    <input type="submit" value="Sim, desejo cancelar minha conta!" style="font-family: Verdana; font-size: 10 px"></td>
  </tr>
</table>
</form>
<? } ?>