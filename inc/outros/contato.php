<?
if (getenv("REQUEST_METHOD") == "POST") {

	if ($nomecontato == null) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Nome</u>.</font><br>";
	}

	else if ($emailcontato == null) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Email</u>.</font><br>";
	}

	else if ($assuntocontato == null) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Assunto</u>.</font><br>";
	}

	else if ($mensagemcontato == null) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Mensagem</u>.</font><br>";
	}

	else {
	mail("ircmania@ircmania.com.br", "Contato IRCmania: $assuntocontato", "Nome: $nomecontato\nE:mail: $emailcontato\nLogin: $usuario\nIP: $REMOTE_ADDR\n\n$mensagemcontato\n\n",
	"From: $nomecontato <$emailcontato>\r\n"
	."Reply-To: $emailcontato\r\n"
	."X-Mailer: PHP/" . phpversion());
	$formularioenviado = 1;
	}
}

if ($formularioenviado) { ?>
<p align="center"><u><b>Entre em Contato:</b></u></p>
<p align="center">&nbsp;</p>
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">Formulário enviado com sucesso. Em breve entraremos em 
    contato.<br>
    <br>
    Equipe IRCmania<br>
	www.IRCmania.com.br</td>
  </tr>
</table>
<?
}
else { ?>

<p align="center"><u><b>Entre em Contato:</b></u></p>
<p align="center">&nbsp;</p>
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">Estamos sempre a disposição para esclarecer qualquer 
    dúvida relacionada aos serviços do site. Pedimos a compreensão e o não envio 
    de questões técnicas relacionadas ao IRC. Este contato é apenas respondido 
    pelo administrador.</p>
    <hr color="#000000" size="1" width="70%"></td>
  </tr>
</table>

<p align="center"><b>ICQ 602704</b></p>

<form action="outros.php?contato=ok" method="post">
   <table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
      <tr>
        <td width="45%"><b>Nome:</b></td>
        <td width="55%">
        <input type="text" name="nomecontato" value="<?=$nomecontato;?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
        </td>
      </tr>
      <tr>
        <td width="45%"><b>E-mail:</b></td>
        <td width="55%">
        <input type="text" name="emailcontato" value="<?=$emailcontato;?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
        </td>
      </tr>
      <tr>
        <td width="45%"><b>Assunto:</b></td>
        <td width="55%">
        <input type="text" name="assuntocontato" value="<?=$assuntocontato;?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
        </td>
      </tr>
      <tr>
        <td width="100%" colspan="2"><b><br>
        Mensagem: <br>
        </b>
        <textarea rows="10" name="mensagemcontato" cols="62" style="font-family: Verdana; font-size: 10 px"><?=$mensagemcontato;?></textarea></td>
      </tr>
      <tr>
        <td width="45%" valign="top"><br><input type="submit" value="Enviar" style="font-family: Verdana; font-size: 10 px"></td>
        <td width="55%">&nbsp;</td>
      </tr>
   </table>
</form>

<?
}
?>