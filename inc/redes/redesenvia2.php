<?

	if (!$usuario) {
	echo "Você precisa estar registrado e logado no site para cadastrar uma nova rede de IRC.";
	die();
	}

$quser = mysql_query("select login,email,nome_completo from usuarios where login='$usuario'");
$quserl = mysql_fetch_array($quser);

$verrede = mysql_query("select * from redes where admin='$usuario'");
$verredel = mysql_fetch_array($verrede);

if (getenv("REQUEST_METHOD") == "POST") {

	$qrede = mysql_query("select * from redes where rede='$rede' and chkrede = 1");

	if (mysql_fetch_array($qrede)) {
	echo "<font color='#FF0000'>* A rede <b>$rede</b> já está cadastrada em nosso banco de dados.</font><br><br>";
	}

	else if ((!$cpf) or (!$rede) or (!$endirc) or (!$endweb) or (!$iline)) {
	echo "<font color='#FF0000'>* É necessário o preenchimento de todos os campos.</font><br><br>";
	}

	else if ($verredel[rede]) {
	echo "<font color='#FF0000'>* Você não pode cadastrar uma nova rede de IRC porque já possui cadastrada a rede $verredel[rede] de IRC.</font><br><br>";
	}

	else {
    $sql = "INSERT INTO redes (rede, url, irc, iline, admin, cpf) VALUES ('$rede', '$endweb', '$endirc', '$iline', '$usuario', '$cpf')"; 
    mysql_query($sql);

	mail("$quserl[email]", "Cadastro da Rede $rede", "Olá $usuario,\n\nVocê ou alguma pessoa de IP $REMOTE_ADDR solicitou o cadastro da rede $rede de IRC. O painel de controle da rede $rede estará disponível quando a rede for aprovada. Abaixo estão os dados:\n\nNome: $quserl[nome_completo]\nNick: $usuario\nE-mail: $quserl[email]\nCPF: $cpf\nNome da Rede: $rede\nEndereço IRC: $endirc\nEndereço Web: $endweb\nI-Line liberadas: $iline\n\n* RESPONDA esse email para confirmar a veracidade das informações e a requisição de cadastro da rede $rede.\n\nObrigado!\nAtt,\n\nEquipe IRCmania\nhttp://www.ircmania.com.br\n",
	"From: IRCmania <ircmania@ircmania.com.br>\r\n"
	."Reply-To: ircmania@ircmania.com.br\r\n"
	."X-Mailer: PHP/" . phpversion());

	$feito = 1;
	}

}
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Redes de IRC: Cadastrando.</u></font></strong></td>
  </tr>
</table>

<br><br>

<?
if ($feito) {
?>

<table align="center" border="0" cellpadding="2" bordercolor="#E0E0E0" width="70%">
  <tr>
    <td width="100%">
    <p align="justify"><?=$usuario?>,<br>
    <br>
    A requisição de cadastro da rede <b><?=$rede?></b> foi enviada com sucesso. <br>
    <br>
    Um e-mail foi enviado para <?=$quserl[email]?> com os dados aqui cadastrados. <b>
    Verifique sua caixa postal</b> e responda o e-mail confirmando ou não o 
    cadastro da rede.<br>
    <br>
    Obrigado!</td>
  </tr>
</table>

<?
} else {
?>

<table align="center" border="0" cellpadding="2" bordercolor="#E0E0E0" width="70%">
  <tr>
    <td width="100%">
	<p align="justify"><?=$usuario?>,<br>
	<br>
	<b>Atenção</b>: Continue apenas se for administrador da rede de IRC que pretende 
	cadastrar.<br><br>Verifique nas suas <a href="user.php?edit=pessoais" class="ircmania1"><u>informações pessoais</u></a> se o e-mail cadastrado no 
	site é do tipo <b>@suarede.com,</b> é imprescindível que seja pois é através 
	dele que enviaremos a confirmação do pedido de inclusão da rede.<br><br>O seu CPF será verificado junto ao site:<br>http://www.receita.fazenda.gov.br.</p>
  </tr>
</table>


<p align="center"><u><b>Preencha todos os campos!</b></u></p>
<br>

<form action="secoes.php?redesenvia2=ok" method="post">
<table align="center" border="0" cellpadding="2" bordercolor="#E0E0E0" width="80%">
  <tr>
    <td width="50%">Nome:</td>
    <td width="50%" align="right">
    <input type="text" name="nome" value="<?=$quserl[nome_completo]?>" maxlength="50" size="25" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999" disabled></td>
  </tr>
  <tr>
    <td width="50%">Nick:</td>
    <td width="50%" align="right">
    <input type="text" name="nick" value="<?=$usuario?>" maxlength="50" size="25" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999" disabled></td>
  </tr>
  <tr>
    <td width="50%">E-mail:</td>
    <td width="50%" align="right">
    <input type="text" name="email" value="<?=$quserl[email]?>" maxlength="50" size="25" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999" disabled></td>
  </tr>
  <tr>
    <td width="50%">CPF (obrigatório):</td>
    <td width="50%" align="right">
    <input type="text" name="cpf" value="<? if ($cpf) { echo $cpf; } else { echo "xxx.xxx.xxx-xx"; } ?>" size="25" maxlength="20" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Nome da Rede:</td>
    <td width="50%" align="right">
    <input type="text" name="rede" value="<? if ($rede) { echo $rede; } ?>" size="25" maxlength="40" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Endereço IRC:</td>
    <td width="50%" align="right">
    <input type="text" name="endirc" value="<? if ($endirc) { echo $endirc; } else { echo "irc.suarede.com"; } ?>" size="25" maxlength="30" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Endereço Web:</td>
    <td width="50%" align="right">
    <input type="text" name="endweb" value="<? if ($endweb) { echo $endweb; } else { echo "http://www.suarede.com"; } ?>" size="25" maxlength="50" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Quantas I-Line para o IP
    <?null?>foram liberadas?</td>
    <td width="50%" align="right">
    <input type="text" name="iline" value="<? if ($iline) { echo $iline; } else { echo "30"; } ?>" size="25" maxlength="15" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%"></td>
    <td width="50%">
	<input type="submit" value="Enviar" style="font-family: Verdana; font-size: 10 px; float: right">
  </tr>
</table>
</form>
<? } ?>