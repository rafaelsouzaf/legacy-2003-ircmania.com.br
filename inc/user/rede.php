<?
$rqrqr = mysql_query("select * from redes where admin = '$usuario' and chkrede = '1'");
$afafaf = mysql_fetch_array($rqrqr);
if (!$afafaf[rede]) die();


if (getenv("REQUEST_METHOD") == "POST") {

	if ($atualizar) {
	$update = "update redes set irc1='$irc1', irc2='$irc2', irc3='$irc3', iline='$iline', chanserv='$chanserv', nickserv='$nickserv', memoserv='$memoserv', botserv='$botserv' where admin='$usuario'";
	mysql_query($update);
	echo "<font color='#FF0000'>* Ok. Informações <u>atualizadas</u> com sucesso!</font><br>";
	}

	if ($priorizar) {
	$update = "update redes set ultima='0' where admin='$usuario'";
	mysql_query($update);
	echo "<font color='#FF0000'>* Ok. A sua rede será a primeira a ter sua lista de canais atualizada a partir desse momento. Previsão para conclusão: 4 minutos.</font><br>";
	}

	if ($deletar) {
	mysql_query("delete from redes where admin='$usuario'");
	echo "<font color='#FF0000'>* Puff! A rede, suas informações e seus canais foram deletados com sucesso. Agradecemos pela participação.</font><br>";
	mail("ircmania@ircmania.com.br", "Rede $afafaf[rede] Deletada", "A rede $afafaf[rede] foi deletada do banco de dados pelo usuário $usuario",
	"From: IRCmania <ircmania@ircmania.com.br>\r\n"
	."X-Mailer: PHP/" . phpversion());
	die();
	}

}

$veradm = mysql_query("select * from redes where admin = '$usuario' and chkrede = '1'");
$veradml = mysql_fetch_array($veradm);
if (!$veradml[rede]) die();

$nsala = mysql_query("select * from redes_stats where rede = '$veradml[rede]'");
$nsalas = mysql_num_rows($nsala);
?>

<p align="center"><u><b>Rede <?=$veradml[rede]?> de IRC</b></u><br>Editando...</p>
<br>

<table align="center" border="0" bordercolor="#000000" cellpadding="3" cellspacing="0" width="80%" style="border-style: dotted; border-width: 1">
  <tr>
    <td width="50%"><b>N</b>ome:</td>
    <td width="50%"><b><?=ucfirst($veradml[rede])?></b></td>
  </tr>
  <tr>
    <td width="50%"><b>S</b>ite Oficial:</td>
    <td width="50%"><?=$veradml[url]?></td>
  </tr>
  <tr>
    <td width="50%"><b>E</b>ndereço IRC:</td>
    <td width="50%"><?=$veradml[irc]?></td>
  </tr>
  <tr>
    <td width="50%"><b>C</b>adastrada por:</td>
    <td width="50%"><?=$veradml[admin]?></td>
  </tr>
  <tr>
    <td width="50%"><b>N</b>úmero de Salas:</td>
    <td width="50%"><?=$nsalas?> Salas</td>
  </tr>
  <tr>
    <td width="50%"><b>Ú</b>ltima Atualização:</td>
    <td width="50%"><? echo date("d/m/y - H:i", $veradml[ultima])?></td>
  </tr>
</table>

<br><br>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
  <tr>
    <td width="100%">
    <ul>
      <li>
      <p align="justify">É importante manter cadastrados diferentes servidores 
      porque é através deles que o webchat e o robot de busca tentarão conectar.<br>&nbsp;</li>
      <li>
      <p align="justify">Os servidores aqui cadastrados <u>não estarão visíveis</u> 
      para os visitantes do site, apenas serão utilizados internamente.<br>&nbsp;</li>
      <li>
      <p align="justify">Os dados abaixo poderão ser editados pela administração 
      do site.</li>
    </ul>
    </td>
  </tr>
</table>

<form action="user.php?rede=editing" method="post">
<table align="center" border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="90%">
  <tr>
    <td width="50%">Servidor 1:</td>
    <td width="50%"><input type="text" name="irc1" value="<?=$veradml[irc1]?>" maxlength="50" size="30" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Servidor 2:</td>
    <td width="50%"><input type="text" name="irc2" value="<?=$veradml[irc2]?>" size="30" maxlength="32" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Servidor 3:</td>
    <td width="50%"><input type="text" name="irc3" value="<?=$veradml[irc3]?>" size="30" maxlength="50" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Limite WebChat (I-Line):</td>
    <td width="50%"><input type="text" name="iline" value="<?=$veradml[iline]?>" size="23" maxlength="30" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">NickServ:</td>
    <td width="50%"><input type="checkbox" value="1" name="nickserv" <?if ($veradml[nickserv]) echo "checked";?>></td>
  </tr>
  <tr>
    <td width="50%">ChanServ:</td>
    <td width="50%"><input type="checkbox" value="1" name="chanserv" <?if ($veradml[chanserv]) echo "checked";?>></td>
  </tr>
  <tr>
    <td width="50%">MemoServ:</td>
    <td width="50%"><input type="checkbox" value="1" name="memoserv" <?if ($veradml[memoserv]) echo "checked";?>></td>
  </tr>
  <tr>
    <td width="50%">BotServ:</td>
    <td width="50%"><input type="checkbox" value="1" name="botserv" <?if ($veradml[botserv]) echo "checked";?>></td>
  </tr>
  <tr>
    <td width="100%" colspan="2" align="right"><input type="submit" name="atualizar" value="Atualizar" style="font-family: Verdana; font-size: 10 px"></td>
  </tr>
</table
</form>

<br>
<hr width="80%" size="1">
<br>

<form action="user.php?rede=editing" method="post">
<table align="center" border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="90%" bgcolor="#F7F7F7">
  <tr>
    <td width="100%">
    <p align="center"><font color="#FF0000"><u>Atenção:</u></font></p>
    <ul>
      <li>
      <p align="justify"><font color="#FF0000">Clicando no botão abaixo a rede
      <?=$veradml[rede]?> será a próxima a ter sua lista de canais atualizada pelo nosso 
      sistema de busca.<br>&nbsp;</font></li>
      <li>
      <p align="justify"><font color="#FF0000">Utilize o recurso apenas se o 
      número de canais registrados no site for bem inferior ao número de canais 
      existentes na rede nesse momento.</font></li>
    </ul>
    <p align="center">
    <input type="submit" name="priorizar" value="Priorizar atualização da lista de canais" style="font-family: Verdana; font-size: 10 px"></td>
  </tr>
</table>
</form>

<br>
<hr width="80%" size="1">
<br>

<form action="user.php?rede=editing" method="post">
<table align="center" border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="90%" bgcolor="#F7F7F7">
  <tr>
    <td width="100%">
    <p align="center"><font color="#FF0000">*** <u>Cuidado:</u> ***</font></p>
    <ul>
      <li>
      <p align="justify"><font color="#FF0000">Clicando no botão abaixo a rede
      <?=$veradml[rede]?>, suas informações e seus canais serão <b>deletados</b> (apagados) 
      do nosso sistema. Não é necessário nenhum tipo de confirmação, portanto se 
      clicar no botão abaixo não haverá volta.<br>&nbsp;</font></li>
      <li>
      <p align="justify"><font color="#FF0000">A lista de canais da rede será 
      deletada em no máximo 12 horas.</font></li>
    </ul>
    <p align="center">
    <input type="submit" name="deletar" value="Sim, desejo DELETAR a rede <?=$veradml[rede]?>" style="font-family: Verdana; font-size: 10 px"></td>
  </tr>
</table>
</form>