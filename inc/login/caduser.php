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
	echo "<font color='#FF0000'>* Usu�rio <u><b>$login</b></u> j� existe. Por favor escolha outro.</font><br>";
	}

	else if ((mysql_num_rows($queryemail)) and (!$loginusuario)) {
	echo "<font color='#FF0000'>* Email <u><b>$email</b></u> j� est� cadastrado. Por favor digite outro.</font><br>";
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

	mail("$email", "Instru��o p/ libera��o de conta", "Ol� $login,\n\nVoc� ou alguma pessoa de nome $nomecompleto (IP: $REMOTE_ADDR) se cadastrou nos sites www.IRCmania.com.br e www.ChatMania.com.br utilizando o e-mail $email. Caso queira confirmar seu registro e liberar sua conta para utiliza��o no site, por favor visite o endere�o abaixo:\n\nhttp://www.ircmania.com.br/login.php?free=$free&login=$login\n\nAten��o: A libera��o de sua conta s� � poss�vel visitando o link acima.\n\nObrigado!\nAtt,\n\nEquipe IRCmania/ChatMania",
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
<p align="center"><u><b>Registro de novos usu�rios!</b></u></p>
<p align="justify">Ol� <?=$login?>,<br>
<br>
Sua conta ainda <b>n�o</b> est� ativada. Verifique seu e-mail (<u><?=$email;?></u>) 
e siga a instru��o que nele cont�m para liberar sua conta. � muito simples e 
r�pido! Veja:</p>
<ol>
  <li>
  <p align="justify">Verifique o e-mail que enviamos para voc�;</li>
  <li>
  <p align="justify">Clique no link que consta no e-mail.</li>
  <li>
  <p align="justify">Pronto, sua conta estar� ativada e voc� poder� se logar ao site.</li>
</ol>
<p align="justify">Obrigado!<br>
Att,<br>
<br>
Equipe IRCmania</p>
<script>alert("Registro de <?=$login?> aceito! Verifique seu email para libera��o da conta!");</script>
</td></tr></table>
<?
}
else { ?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
  <tr>
    <td width="100%">
<p align="center"><u><b>Registro de novos usu�rios!</b></u></p>
<p align="justify">O registro no site � importante para que tenhamos um maior 
controle sobre todo o sistema de intera��o que oferecemos, seja postagem de 
coment�rios ou acesso aos chats.<br>
<br>
Como usu�rio registrado, voc� pode:</p>
<ul>
  <li>Publicar coment�rios com seu nome;</li>
  <li>Publicar not�cias e artigos com seu nome;</li>
  <li>Acessar o webirc utilizando seu apelido;</li>
  <li>e muito, muito mais!</li>
</ul>
<p><b>Registre-se agora! � gr�tis!</b></p>
<p align="justify">Saiba mais sobre n�s lendo a se��o
<a href="outros.php?quemsomos=1">Quem Somos</a>. Conhe�a tamb�m as
<a href="outros.php?condicoes=1">Condi��es de Uso</a> de nossos servi�os. Voc� 
� o respons�vel pela sua conta e abusos ser�o punidos com suspens�o e bloqueio 
do nick. Chat � divers�o :-D</p>
<hr color="#000000" width="60%" size="1">

<br>

<form action="login.php" method="post">
<input type="hidden" name="cadastro" value="ok">
<table border="0" cellpadding="3" cellspacing="0" width="70%">
  <tr>
    <td width="50%">Nome de usu�rio:</td>
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
<i>* � obrigat�rio o preenchimento de todos os campos do formul�rio.</i>
</td></tr></table>
<? } ?>