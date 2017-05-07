<?
if (getenv("REQUEST_METHOD") == "POST") {

	$login = htmlentities("$login");
	$nomecompleto = htmlentities("$nomecompleto");
	$email = htmlentities("$email");

	$login = str_replace("'","",$login);
	$login = str_replace("`","",$login);
	$nomecompleto = str_replace("'","",$nomecompleto);
	$email = str_replace("'","",$email);

$query = mysql_query("select * from usuarios where login='$login'");
$queryemail = mysql_query("select * from usuarios where email='$email'");

	if (mysql_num_rows($query)) {
	echo "<font color='#FF0000'>* Usuário <u><b>$login</b></u> já existe. Por favor escolha outro.</font><br>";
	}

	else if ((mysql_num_rows($queryemail)) and (!$loginusuario)) {
	echo "<font color='#FF0000'>* Email <u><b>$email</b></u> já está cadastrado. Por favor digite outro.</font><br>";
	}

	else if (!$login) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Login</u>.</font><br>";
	}

	else if (!$nomecompleto) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Nome Completo</u>.</font><br>";
	}

	else if (!$email) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Email</u>.</font><br>";
	}

	else if (($passen != $passen2) or ($passen == null) or ($passen2 == null)) {
	echo "<font color='#FF0000'>* Por favor, repita a mesma senha nos dois campos.</font>";
	}

	else {
	$data = time();
	$id = md5(uniqid(microtime(),1)).getmypid(); $free = substr($id, 0, 7);
    $sql = "INSERT INTO usuarios (login, senha, email, nome_completo, ip, dataregistro, free) VALUES ('$login', '$passen', '$email', '$nomecompleto', '$REMOTE_ADDR', '$data', '$free')"; 
    mysql_query($sql);

	mail("$email", "Instrução p/ liberação de conta", "Olá $login,\n\nVocê ou alguma pessoa de nome $nomecompleto (IP: $REMOTE_ADDR) se cadastrou nos sites www.IRCmania.com.br e www.ChatMania.com.br utilizando o e-mail $email. Caso queira confirmar seu registro e liberar sua conta para utilização no site, por favor visite o endereço abaixo:\n\nhttp://www.ircmania.com.br/login.php?free=$free&login=$login\n\nAtenção: A liberação de sua conta só é possível visitando o link acima.\n\nObrigado!\nAtt,\n\nEquipe IRCmania/ChatMania",
	"From: IRCmania <ircmania@ircmania.com.br>\r\n"
	."Reply-To: webmaster@ircmania.com.br\r\n"
	."X-Mailer: PHP/" . phpversion());

	$ok = 1;

	}
}
?>

<?
if ($ok) { ?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
  <tr>
    <td width="100%">
<p align="center"><u><b>Registro de novos usuários!</b></u></p>
<p align="justify">Olá <?=$login?>,<br>
<br>
Sua conta ainda <b>não</b> está ativada. Verifique seu e-mail (<u><?=$email;?></u>) 
e siga a instrução que nele contém para liberar sua conta. É muito simples e 
rápido! Veja:</p>
<ol>
  <li>
  <p align="justify">Verifique o e-mail que enviamos para você;</li>
  <li>
  <p align="justify">Clique no link que consta no e-mail.</li>
  <li>
  <p align="justify">Pronto, sua conta estará ativada e você poderá se logar ao site.</li>
</ol>
<p align="justify">Obrigado!<br>
Att,<br>
<br>
Equipe IRCmania</p>
<script>alert("Registro de <?=$login?> aceito! Verifique seu email para liberação da conta!");</script>
</td></tr></table>
<?
}
else { ?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
  <tr>
    <td width="100%">
<p align="center"><u><b>Registro de novos usuários!</b></u></p>
<p align="justify">O registro no site é importante para que tenhamos um maior 
controle sobre todo o sistema de interação que oferecemos, seja postagem de 
comentários ou acesso aos chats.<br>
<br>
Como usuário registrado, você pode:</p>
<ul>
  <li>Publicar comentários com seu nome;</li>
  <li>Publicar notícias e artigos com seu nome;</li>
  <li>Acessar o webirc utilizando seu apelido;</li>
  <li>e muito, muito mais!</li>
</ul>
<p><b>Registre-se agora! É grátis!</b></p>
<p align="justify">Saiba mais sobre nós lendo a seção
<a href="outros.php?quemsomos=1">Quem Somos</a>. Conheça também as
<a href="outros.php?condicoes=1">Condições de Uso</a> de nossos serviços. Você 
é o responsável pela sua conta e abusos serão punidos com suspensão e bloqueio 
do nick. Chat é diversão :-D</p>
<hr color="#000000" width="60%" size="1">

<br>

<form action="login.php" method="post">
<input type="hidden" name="cadastro" value="ok">
<table border="0" cellpadding="3" cellspacing="0" width="70%">
  <tr>
    <td width="50%">Nome de usuário:</td>
    <td width="50%">
    <input type="text" name="login" size="30" maxlength="20" class="form" value="<?=$login?>">
	</td>
  </tr>
  <tr>
    <td width="50%">Nome completo:</td>
    <td width="50%">
    <input type="text" name="nomecompleto" size="30" maxlength="50" class="form" value="<?=$nomecompleto?>">
	</td>
  </tr>
  <tr>
    <td width="50%">Email:</td>
    <td width="50%">
    <input type="text" name="email" size="20" maxlength="32" class="form" value="<?=$email?>">
	</td>
  </tr>
  <tr>
    <td width="50%">Digite Senha: </td>
    <td width="50%"><input type="password" name="passen" size="15" maxlength="250" class="formwebirc">
	</td>
  </tr>
  <tr>
    <td width="50%">Repita Senha:</td>
    <td width="50%"><input type="password" name="passen2" size="15" maxlength="250" class="formwebirc"></td>
  </tr>
</table><br>
<input type="submit" value="Enviar" style="font-family: Verdana; font-size: 10 px">
</form>

<br>
<i>* É obrigatório o preenchimento de todos os campos do formulário.</i>
</td></tr></table>
<? } ?>