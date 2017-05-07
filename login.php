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
    <p align="justify">Seu login ou senha estão errados ou ainda não liberados. 
    Tentes novamente ou analise as opções listadas abaixo:</p>
    <ul>
      <li>
      <p align="justify">Se você fez o registro de seu apelido e ainda não 
      liberou sua conta, verifique seu e-mail e siga as instruções.<br>&nbsp;</li>
      <li>
      <p align="justify">Se você esqueceu a sua senha, acesse a página de
      <a href="login.php?recupera=ok">recuperação de senhas</a>.<br>&nbsp;</li>
      <li>
      <p align="justify">Se você ainda não é um usuário registrado,
      <a href="login.php?cadastro=ok">clique aqui</a> e registre-se.</li>
    </ul>
    <p align="justify">Dúvidas?<br>
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

		mail("$ll[email]", "Recuperação de senha", "Olá $ll[login],\n\nVocê ou alguma pessoa de IP $REMOTE_ADDR solicitou ao site www.IRCmania.com.br o envio da senha de acesso. Abaixo estão os dados:\n\nLogin: $ll[login]\nSenha: $ll[senha]\n\nCaso você não tenha solicitado a senha de acesso ao site, por favor, ignore esse email.\n\nObrigado!\nAtt,\n\nEquipe IRCmania\nhttp://www.ircmania.com.br\n",
		"From: IRCmania <ircmania@ircmania.com.br>\r\n"
		."Reply-To: webmaster@ircmania.com.br\r\n"
		."X-Mailer: PHP/" . phpversion());
		?>
		<p align="center"><u><b>Recuperação de Senha</b></u></p>
		<p align="justify">Pronto!<br>
		A senha do usuário <b><?=$login?></b> foi enviada com sucesso para seu e-mail cadastrado no 
		site. Verifique sua caixa postal.</p>
		<?

	}
	else { echo "<p align='center'><u><b>Opss!!! Login Inexistente!</b></u></p><p align='justify'>Usuário inexistente. O login <b>$login</b> não consta em nosso banco de dados ou ainda não desbloqueou sua conta no site. Por favor, verifique se o login foi digitado corretamente.</p>"; }

}

else if (($liberacao) and ($login)) {
$query = mysql_query("select * from usuarios where login='$login' and chklog='0'");
$ll = mysql_fetch_array($query);

	if ($ll[login]) {

	mail("$ll[email]", "Instrução p/ liberação de conta", "Olá $login,\n\nVocê ou alguma pessoa de nome $ll[nome_completo] (IP: $REMOTE_ADDR) se cadastrou nos sites www.IRCmania.com.br e www.ChatMania.com.br utilizando o e-mail $ll[email]. Caso queira confirmar seu registro e liberar sua conta para utilização no site, por favor visite o endereço abaixo:\n\nhttp://www.ircmania.com.br/login.php?free=$ll[free]&login=$ll[login]\n\nAtenção: A liberação de sua conta só é possível visitando o link acima.\n\nObrigado!\nAtt,\n\nEquipe IRCmania/ChatMania",
	"From: IRCmania <ircmania@ircmania.com.br>\r\n"
	."Reply-To: webmaster@ircmania.com.br\r\n"
	."X-Mailer: PHP/" . phpversion());
	?>
	<p align="center"><u><b>Liberação de Conta</b></u></p>
	<p align="justify">Pronto!<br>
	As instruções para desbloqueio de sua conta foi enviada com sucesso para seu e-mail cadastrado no 
	site. Verifique sua caixa postal.</p>
	<?
	}
	else { echo "<p align='center'><u><b>Opss!!! </b></u></p><p align='justify'>io inexistente. O login <b>$login</b> não consta em nosso banco de dados. Por favor, verifique se o login foi digitado corretamente.</p>"; }

}

else if ($recupera) {
include ("inc/login/recupera.php");
}

include ("inc/header2.php");
include ("inc/footer.php");
?>