<p>Olá <?=$usuario;?>,<br>
<br>
Esta é sua página pessoal.</p>

<br>

<table border="0" cellpadding="5" cellspacing="0" width="100%">
  <tr>
    <td width="33%" align="center" valign="top">
    <a href="user.php?edit=pessoais">
    <img alt="Alterar seus dados pessoais." src="imagens/user/pessoais.gif" border="0" width="32" height="32"></a></td>
    <td width="33%" align="center" valign="top">
    <a href="user.php?edit=opcoes">
    <img alt="Configurar opções do website." src="imagens/user/opcoes.gif" border="0" width="32" height="32"></a></td>
    <td width="34%" align="center" valign="top">
    <a href="user.php?edit=senha">
    <img alt="Trocar senha de acesso ao site." src="imagens/user/senha.gif" border="0" width="32" height="32"></a></td>
  </tr>
  <tr>
    <td width="33%">
    <p align="center"><a href="user.php?edit=pessoais" class="ircmania1"><u>Alterar seus dados pessoais.</u></a></td>
    <td width="33%">
    <p align="center"><a href="user.php?edit=opcoes" class="ircmania1"><u>Configurar opções do website.</u></a></td>
    <td width="34%">
    <p align="center"><a href="user.php?edit=senha" class="ircmania1"><u>Trocar senha de acesso ao site.</u></a></td>
  </tr>


  <tr>
    <td width="100%" align="center" valign="top" colspan="3">
    <a href="user.php?edit=cancelar">
    <img alt="Cancelar sua conta no site." src="imagens/user/php.gif" border="0" width="32" height="32"></a></td>
  </tr>
  <tr>
    <td width="100%" colspan="3">
    <p align="center"><a href="user.php?edit=cancelar" class="ircmania1"><u>Cancelar sua conta no site.</u></a></td>
  </tr>
</table>

<br>
<?
$query = mysql_query("select * from usuarios where login='$usuario'");
$l = mysql_fetch_array($query);

$veradm = mysql_query("select * from redes where admin = '$usuario'");
$veradml = mysql_fetch_array($veradm);
?>

<table border="0" cellpadding="5" cellspacing="0" width="100%">
  <tr>
	<? if ($l[scripter]) { ?>
    <td width="33%" align="center" valign="top">
    <a href="user.php?edit=scripter">
    <img alt="Acesso a seção Scripter." src="imagens/user/scripter.gif" border="0" width="32" height="32"></a><br>
    <a href="user.php?edit=scripter" class="ircmania1"><u>Seção Scripter</u></a></td>
	<? } if ($l[ircd]) { ?>
    <td width="33%" align="center" valign="top"><a href="user.php?edit=ircd">
    <img alt="Acesso a seção IRCd." src="imagens/user/ircd.gif" border="0" width="32" height="32"></a><br>
    <a href="user.php?edit=ircd" class="ircmania1"><u>Seção IRCd</u></a></td>
	<? } if ($l[egg]) { ?>
    <td width="33%" align="center" valign="top"><a href="user.php?edit=egg">
    <img alt="Acesso a seção Eggdrop." src="imagens/user/eggdrop.gif" border="0" width="32" height="32"></a><br>
    <a href="user.php?edit=egg" class="ircmania1"><u>Seção Eggdrop</u></a></td>
	<? } ?>
  </tr>
</table>

<br>

<table border="0" cellpadding="5" cellspacing="0" width="100%">
  <tr>
<? if ($l[php]) { ?>
    <td width="33%" align="center" valign="top">
    <a href="user.php?edit=php">
    <img alt="Acesso a seção PHP." src="imagens/user/php.gif" border="0" width="32" height="32"></a><br>
    <a href="user.php?edit=php" class="ircmania1"><u>Seção PHP</u></a></td>
<? } ?>
<? if ($l[colunista]) { ?>
    <td width="34%" align="center" valign="top">
    <a href="user.php?edit=colunista">
    <img alt="Acesso a seção PHP." src="imagens/user/colunista.gif" border="0" width="32" height="32"></a><br>
    <a href="user.php?edit=colunista" class="ircmania1"><u>Seção Colunista</u></a></td>
<? } ?>
<? if ($veradml[rede]) { ?>
    <td width="33%" align="center" valign="top">
    <a href="user.php?rede=editing">
    <img alt="Acesso a Rede <?=$veradml[rede]?>." src="imagens/user/ircd.gif" border="0" width="32" height="32"></a><br>
    <a href="user.php?rede=editing" class="ircmania1"><u>Rede <?=$veradml[rede]?></u></a></td>
<? } ?>
  </tr>
</table>