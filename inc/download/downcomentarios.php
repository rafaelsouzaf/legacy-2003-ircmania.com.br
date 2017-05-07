<?
function limitecharsb($texto) {
	unset($final);
	$bah = explode (" ", $texto);
	for ($bah3 = 0; $bah3 <= count($bah); $bah3++) {
		if (strlen($bah[$bah3]) > 39) { $bah2 = substr($bah[$bah3], 0, 39)."(...)"; }
		else { $bah2 = $bah[$bah3]; }
		$final .= $bah2 ." ";
	}
	return trim($final);
}

	$subject = limitecharsb($subject);
	$comment = limitecharsb($comment);
	$subject = htmlentities("$subject");
	$comment = htmlentities("$comment");

if (($post) and ($usuario)) {

	if (getenv("REQUEST_METHOD") == "POST") {

	$datamenos = time() - 90;
	$spamc = mysql_query("select name,data,tid from download_comentarios where name = '$usuario' order by tid desc limit 1");
	$spaml = mysql_fetch_array($spamc);

	if (!$subject) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Assunto</u>.</font><br>";
	}

	else if (!$comment) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Mensagem</u>.</font><br>";
	}

	else if ($datamenos < $spaml[data]) {
	echo "<font color='#FF0000'>* Opa! Você está tentando postar novas mensagens muito rapidamente. Por favor, aguarde alguns minutos e tente novamente.</font><br>";
	}

	else {
	$data = time();
    $sql = "INSERT INTO download_comentarios (id, name, ip, subject, comment, data) VALUES ('$post', '$usuario', '$REMOTE_ADDR', '$subject', '$comment', '$data')"; 
    mysql_query($sql);
	$formularioenviado = 1;
	}
	}

if ($formularioenviado) { ?>
<p align="center"><u><b>Postar comentário:</b></u></p>
<br>
<p align="justify">Comentário enviado com sucesso.</p>
<p align="center"><a href="download.php?detalhes=<?=$post;?>">Voltar.</a></p>
<? } else {?>


<p align="center"><u><b>Postar comentário:</b></u></p>
<br>
<form action="download.php" method="post">
<input type="hidden" name="post" value="<?=$post?>">
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
        <input type="text" maxlength="40" name="subject" value="<?=$subject?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
        </td>
      </tr>
      <tr>
        <td width="100%" colspan="2"><b><br>
        Mensagem: <br>
        </b>
        <textarea rows="10" name="comment" cols="62" style="font-family: Verdana; font-size: 10 px"><?=$comment;?></textarea></td>
      </tr>
      <tr>
        <td width="45%" valign="top"><br><input type="submit" value="Enviar" style="font-family: Verdana; font-size: 10 px"></td>
        <td width="55%">&nbsp;</td>
      </tr>
   </table>
</form>

<br>
<hr color="#000000" size="1" width="70%">
<br>

<?
	$query = mysql_query("select * from download where checkdown='1' and id='$post'");
	$lcat = mysql_fetch_array($query);
?>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%" colspan="2"><b>
    <img border="0" src="imagens/down.gif" width="9" height="9">&nbsp;</b><font color="#000000"><a href="<?=$lcat[link];?>" class="ircmania1"><b><u><?=$lcat[titulo];?></u></b></a></font></td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><font color="#808080"><b>Descrição:</b> <?=$lcat[descricao];?></font></td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><font color="#808080"><b>Desenvolvedor:</b> <? if ($lcat[website]) { echo "<a href='$lcat[website]' target='_blank'>"; } ?><?=$lcat[website];?></a></font></td>
  </tr>
  <tr>
    <td width="50%"><font color="#808080"><b>Tamanho:</b> <?=$lcat[tamanho];?></font></td>
    <td width="50%"><font color="#808080"><b>Versão:</b> <?=$lcat[versao];?></font></td>
  </tr>
  <tr>
    <td width="50%"><font color="#808080"><b>Data:</b> <?=$lcat[data];?></font></td>
    <td width="50%"><font color="#808080"><b>Download:</b> <?=$lcat[ndown];?></font></td>
  </tr>
</table>
<br><br>


<?
}
} else { ?>

<br>
<hr color="#C0C0C0" width="80%" size="1">

<?
	if (!$usuario) { ?>
	<p align="center"><b>Para comentar você deve se <a href="login.php?cadastro=ok">registrar</a> no site.</b></p>
	<? } else { ?>
	<p align="center"><b>Clique <a href="download.php?post=<?=$detalhes;?>">aqui</a> para postar um comentário.</b></p>
<? } ?>

<hr color="#C0C0C0" width="80%" size="1">
<br>

<?
	$veradm = mysql_query("select login,admin from usuarios where login='$usuario'");
	$veradml = mysql_fetch_array($veradm);

$query = mysql_query("select * from download_comentarios where id='$detalhes' order by id asc");
while($l = mysql_fetch_array($query)) { 
?>

<table border="0" bgcolor="#fdf7db" cellpadding="0" cellspacing="2" width="100%">
  <tr>
    <td width="100%" colspan="2"><span style="font-size: 11px;"><b><?=$l["subject"]?></b></span></td>
  </tr>
  <tr>
    <td width="50%"><span style="font-size: 11px;"><b>Autor:</b> <a href="user.php?nick=<?=$l["name"]?>" class="ircmania1"><?=$l["name"]?></a></span></td>
    <td width="50%"><span style="font-size: 11px;"><b>Data:</b> <? echo date("d/m/y H:i:s", $l["data"]);?></span></td>
  </tr>
</table>

<table border="0" cellpadding="0" cellspacing="2">
  <tr>
    <td width="100%"><p align="justify"><font face="Verdana"><span style="font-size: 11px;">
<?=nl2br($l[comment])?></td>
  </tr>
</table>
<br><br>
<? if ($veradml[admin]) echo "<center>[ <a href='download.php?deletar=1&id=$l[id]&tid=$l[tid]'>Deletar</a> ]</center><br>"; ?>

<?
}
}
?>