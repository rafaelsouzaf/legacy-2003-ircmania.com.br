<?

	$chavetitle = "Fórum dos sites IRCmania e ChatMania";

include ("inc/top.php");
include ("inc/header.php");

$qforum = mysql_query("select * from forum_msg where id = '$responder' order by id");
$qforuml = mysql_fetch_array($qforum);
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><a href="forum.php" class="ircmania1"><u>Fórum</u></a></font></strong></td>
  </tr>
</table>

<br><br>

<?
if (!$usuario) {
echo "É necessário estar registrado e logado no site para postar uma nova mensagem.";
die();
}


function limitechars ($texto) {
	unset($final);
	$bah = explode (" ", $texto);
	for ($bah3 = 0; $bah3 <= count($bah); $bah3++) {
		if (strlen($bah[$bah3]) > 45) { $bah2 = substr($bah[$bah3], 0, 45)."<br>".substr($bah[$bah3], 45, 45); }
		else { $bah2 = $bah[$bah3]; }
		$final .= $bah2 ." ";
	}
	return trim($final);
}

	$assunto = htmlspecialchars("$assunto");
	$mensagem = htmlspecialchars("$mensagem");

if (($req == "Visualizar") and (getenv("REQUEST_METHOD") == "POST")) {

	if (!$assunto) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Assunto</u>.</font><br>";
	}

	else if (!$mensagem) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Mensagem</u>.</font><br>";
	}

	$lrp = 1
?>

	<p align="center"><u><b>Responder Mensagem:</b></u><br><b>Visualizando...</b><br></p>

	<table border="0" align="center" cellpadding="0" cellspacing="2" width="80%" bgcolor="#fdf7db">
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b><?=stripslashes($assunto)?></b></td>
	  </tr>
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b>Autor: </b><?=$usuario?></td>
	  </tr>
	</table>
	
	<table align="center" width="80%" border="0" cellpadding="0" cellspacing="2">
	  <tr>
	    <td width="100%"><p align="justify"><font face="Verdana"><span style="font-size: 11px;">
		<?=stripslashes(nl2br($mensagem))?></td>
	  </tr>
	</table>
	<br>

<?
}

else if (($req == "Publicar") and (getenv("REQUEST_METHOD") == "POST")) {

$assunto = limitechars($assunto);
$mensagem = limitechars($mensagem);

	$datamenos = time() - 60;
	$spamc = mysql_query("select autor,data,id from forum_msg where autor = '$usuario' order by id desc limit 1");
	$spaml = mysql_fetch_array($spamc);

	if (!$assunto) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Assunto</u>.</font><br>";
	}

	else if (!$mensagem) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Mensagem</u>.</font><br>";
	}

	else if ($datamenos < $spaml[data]) {
	echo "<font color='#FF0000'>* Opa! Você está tentando postar novas mensagens muito rapidamente. Por favor, aguarde alguns minutos e tente novamente.</font><br>";
	}

	else {

	$data = time();
	$sql = "INSERT INTO forum_msg (reid, catid, autor, topico, mensagem, data) VALUES ('$qforuml[id]', '$qforuml[catid]', '$usuario', '$assunto', '$mensagem', '$data')"; 
	mysql_query($sql);
	$formularioenviado = 1;

	$sendemail = mysql_query("select login,config_forum,email from usuarios where login='$qforuml[autor]'");
	$sendemaill = mysql_fetch_array($sendemail);

		if ($sendemaill[config_forum]) {
		mail("$sendemaill[email]", "Sua mensagem no fórum foi respondida", "Olá $sendemaill[login],\n\nAlguém respondeu sua mensagem postada no fórum do site www.IRCmania.com.br. Visite o link abaixo para ver a resposta:\n\nhttp://ircmania.com.br/forum.php?ver=$responder\n\nAtenção: Para deixar de receber este aviso, desabilite a opção correspondente no seu painel de usuário do site.",
		"From: IRCmania <ircmania@ircmania.com.br>\r\n"
		."Reply-To: webmaster@ircmania.com.br\r\n"
		."X-Mailer: PHP/" . phpversion());
		}

	}
}

if ($formularioenviado) { ?>

	<p align="center"><u><b>Publicado!</b></u></p><br>
	<p align="justify">Mensagem enviada com sucesso.</p>
	<p align="center"><a href="forum.php?id=<?=$qforuml[catid]?>">Voltar ao Fórum.</a> <?=$resposta?></p>

<? } else {?>


<p align="center"><u><b>Responder Mensagem:</b></u></p>
<br>
<form action="forum.php" method="post">
<input type="hidden" value="<?=$responder?>" name="responder">

   <table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
      <tr>
        <td width="45%"><b>Nome:</b></td>
        <td width="55%">
        <input type="text" name="name" value="<?=$usuario?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1" disabled>
        </td>
      </tr>
      <tr>
        <td width="45%"><b>Assunto:</b></td>
        <td width="55%">
        <input type="text" maxlength="40" name="assunto" value="<? if ($assunto) echo stripslashes($assunto); else echo "Re: $qforuml[topico]";?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
        </td>
      </tr>
      <tr>
        <td width="100%" colspan="2"><b><br>
        Mensagem: <br>
        </b>
        <textarea rows="10" name="mensagem" cols="62" style="font-family: Verdana; font-size: 10 px"><?=stripslashes($mensagem)?></textarea></td>
      </tr>
      <tr>
        <td width="100%" valign="top" colspan="2"><br>
		<input type="submit" value="Visualizar" name="req" style="font-family: Verdana; font-size: 10 px"> <?if ($lrp) { ?><input type="submit" value="Publicar" name="req" style="font-family: Verdana; font-size: 10 px"><?}?></td>
      </tr>
   </table>
</form>

<br>
<hr color="#000000" size="1" width="70%">
<br>

<br><a name="<?=$qforuml[id]?>"></a>
<table border="0" cellpadding="0" cellspacing="5" width="100%" bgcolor="#fdf7db">
  <tr>
    <td width="100%"><font face="Verdana"><span style="font-size: 10px;"><b><?=ucfirst($qforuml[topico])?></b></td>
  </tr>
  <tr>
    <td width="100%"><font face="Verdana"><span style="font-size: 10px;"><b>Autor:</b> <?echo "<a href='user.php?nick=$qforuml[autor]' class='ircmania1'>$qforuml[autor]</a>";?>  <b>Data</b> <? echo date("d/m/y H:i:s", $qforuml[data]);?></td>
  </tr>
</table>

<table border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td width="100%"><p><font face="Verdana"><span style="font-size: 10px;">
	<?=nl2br(ucfirst($qforuml[mensagem]))?></td>
  </tr>
</table>
<br>

<?
}
include ("inc/header2.php");
include ("inc/footer.php");
?>