<?
include("conexao.php");

if ((getenv("REQUEST_METHOD") == "POST") and ($logar)) {

	$query = mysql_query("select * from usuarios where login='$login' and senha='$senha' and chklog='1' and ban='0'");
	$l = mysql_fetch_array($query);

	if ($l[login]) {

		$ido = md5(uniqid(microtime(),1)).getmypid(); $sess = substr($ido, 0, 20);
		$updateen = "update usuarios set session='$sess' where login='$login'";
		mysql_query($updateen);

        setcookie ("session", $sess, time()+60*60*24*3);
		header("Location: user.php");

    } else {
		$erradologin = 1;
	}
}

if ($deslog) {
setcookie("session");
header("Location: index.php");
}

include ("inc/top.php");
include ("inc/header.php");

if ($erradologin) { ?>
<p align="center"><u><b>Opss!!! Login Errado!</b></u></p>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">Seu login ou senha est�o errados ou ainda n�o liberados. 
    Tentes novamente ou analise as op��es listadas abaixo:</p>
    <ul>
      <li>
      <p align="justify">Se voc� fez o registro de seu apelido e ainda n�o 
      liberou sua conta, verifique seu e-mail e siga as instru��es.<br>&nbsp;</li>
      <li>
      <p align="justify">Se voc� esqueceu a sua senha, acesse a p�gina de
      <a href="login.php?recupera=ok">recupera��o de senhas</a>.<br>&nbsp;</li>
      <li>
      <p align="justify">Se voc� ainda n�o � um usu�rio registrado,
      <a href="login.php?cadastro=ok">clique aqui</a> e registre-se.</li>
    </ul>
    <p align="justify">D�vidas?<br>
    Entre em <a href="outros.php?contato=ok">contato</a>.</td>
  </tr>
</table>
<?
}

if ($free) {
include ("inc/login/free.php");
}

if ($cadastro) {
include ("inc/login/caduser.php");
}

if (($recupera) and ($login)) {
$query = mysql_query("select * from usuarios where login='$login' and chklog='1' ");
$ll = mysql_fetch_array($query);

	if ($ll[login]) {

		mail("$ll[email]", "Recupera��o de senha", "Ol� $ll[login],\n\nVoc� ou alguma pessoa de IP $REMOTE_ADDR solicitou ao site www.IRCmania.com.br o envio da senha de acesso. Abaixo est�o os dados:\n\nLogin: $ll[login]\nSenha: $ll[senha]\n\nCaso voc� n�o tenha solicitado a senha de acesso ao site, por favor, ignore esse email.\n\nObrigado!\nAtt,\n\nEquipe IRCmania\nhttp://www.ircmania.com.br\n",
		"From: IRCmania <ircmania@ircmania.com.br>\r\n"
		."Reply-To: webmaster@ircmania.com.br\r\n"
		."X-Mailer: PHP/" . phpversion());
		?>
		<p align="center"><u><b>Recupera��o de Senha</b></u></p>
		<p align="justify">Pronto!<br>
		A senha do usu�rio <b><?=$login?></b> foi enviada com sucesso para seu e-mail cadastrado no 
		site. Verifique sua caixa postal.</p>
		<?

	}
	else { echo "<p align='center'><u><b>Opss!!! Login Inexistente!</b></u></p><p align='justify'>Usu�rio inexistente. O login <b>$login</b> n�o consta em nosso banco de dados ou ainda n�o desbloqueou sua conta no site. Por favor, verifique se o login foi digitado corretamente.</p>"; }

}

else if (($liberacao) and ($login)) {
$query = mysql_query("select * from usuarios where login='$login' and chklog='0'");
$ll = mysql_fetch_array($query);

	if ($ll[login]) {

	mail("$ll[email]", "Instru��o p/ libera��o de conta", "Ol� $login,\n\nVoc� ou alguma pessoa de nome $ll[nome_completo] (IP: $REMOTE_ADDR) se cadastrou nos sites www.IRCmania.com.br e www.ChatMania.com.br utilizando o e-mail $ll[email]. Caso queira confirmar seu registro e liberar sua conta para utiliza��o no site, por favor visite o endere�o abaixo:\n\nhttp://www.ircmania.com.br/login.php?free=$ll[free]&login=$ll[login]\n\nAten��o: A libera��o de sua conta s� � poss�vel visitando o link acima.\n\nObrigado!\nAtt,\n\nEquipe IRCmania/ChatMania",
	"From: IRCmania <ircmania@ircmania.com.br>\r\n"
	."Reply-To: webmaster@ircmania.com.br\r\n"
	."X-Mailer: PHP/" . phpversion());
	?>
	<p align="center"><u><b>Libera��o de Conta</b></u></p>
	<p align="justify">Pronto!<br>
	As instru��es para desbloqueio de sua conta foi enviada com sucesso para seu e-mail cadastrado no 
	site. Verifique sua caixa postal.</p>
	<?
	}
	else { echo "<p align='center'><u><b>Opss!!! </b></u></p><p align='justify'>io inexistente. O login <b>$login</b> n�o consta em nosso banco de dados. Por favor, verifique se o login foi digitado corretamente.</p>"; }

}

else if ($recupera) {
include ("inc/login/recupera.php");
}

include ("inc/header2.php");
include ("inc/footer.php");
?>