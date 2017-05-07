<?
if (getenv("REQUEST_METHOD") == "POST") {

	include ("../../conexao.php");
	$query3fi = mysql_query("select login,email from usuarios where login='$name'");
	$lsi = mysql_fetch_array($query3fi);

	if (($mensagem) and ($nome != "Nome:") and ($email != "E-mail:") and ($assunto)) {
	mail("$lsi[email]", "Contato IRCmania: $assunto", "Nome: $nome\nE:mail: $email\nLogin: $usuario\nIP: $REMOTE_ADDR\n\n$mensagem\n\n",
	"From: $nome <$email>\r\n"
	."Reply-To: $email\r\n"
	."X-Mailer: PHP/" . phpversion());
	$formularioenviado = 1;
	}
	else {
	$erro = "<p><font face='Verdana' size='1'>Ops!<br><br>Para você entrar em contato com $name é necessário preencher seu <u>nome</u>, <u>e-mail</u>, <u>assunto</u> e <u>mensagem</u>.</font></p>";
	die($erro);
	}
}

if ($formularioenviado) {
?>
<html>

<head>
<title>:: Contato ::</title>
</head>

<body topmargin="0" leftmargin="0">

<p align="center"><font face="Verdana" size="1"><u><b><br>
Contato:</b></u></font></p>
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify"><font face="Verdana" size="1">Formulário enviado com 
    sucesso. Assim que possível entrarei em contato.<br>
    <br>
    Obrigado!<br>
    Att.,<br>
    <br>
    <u><?=$lsi[login]?></u></font></td>
  </tr>
</table>


</body>
</html>
<?
}

else { ?>

  <tr>
    <td><img src="imagens/direita_contato.gif" width="160" height="23"></td>
  </tr>

  <tr>
    <td height="117" align="center" valign="middle">



		<script TYPE="text/javascript">
		<!--
		function popupform(myform, windowname)
		{
		if (! window.focus)return true;
		window.open('', windowname, 'height=160,width=270,scrollbars=nos,status=no,resizable=no');
		myform.target=windowname;
		return true;
		}
		//-->
		</script>

		<form onsubmit="popupform(this, 'join')" action="inc/menudireita/contato.php" method="post">
		<input type="hidden" name="name" value="<?=$name?>">
		<?=$name?>
		<table width="154" border="0" cellpadding="0" cellspacing="0">
		  <tr>
		    <td height="26" align="center" valign="middle"><br>
		    <input name="nome" type="text" class="formwebirc" value="Nome:" onFocus="this.value=''" size="20"></td>
		  </tr>
		  <tr>
		    <td height="26" align="center" valign="middle">
		    <input name="email" type="text" class="formwebirc" value="E-mail:" size="20" onFocus="this.value=''"></td>
		  </tr>
		  <tr>
		    <td height="26" align="center" valign="middle">
		    <input name="assunto" type="text" class="formwebirc" value="Assunto:" size="20" onFocus="this.value=''"></td>
		  </tr>
		  <tr>
		    <td height="26" align="center" valign="middle">
		    <textarea rows="6" name="mensagem" cols="22" style="font-family: Verdana; font-size: 10 px" onFocus="this.value=''">Mensagem:
		</textarea></td>
		  </tr>
		  <tr>
		    <td height="30" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <input type="submit" name="Submit" value="Enviar" style="font-family: Verdana; font-size: 10 px"></td>
		  </tr>
		</table>
		</form>

    </td>
  </tr>
<?
}
?>