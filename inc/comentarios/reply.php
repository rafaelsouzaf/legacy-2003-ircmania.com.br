<?

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

if (!$usuario) { ?>

<p align="center"><u><b>Postar comentário:</b></u></p>
<br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">Publicação de comentários disponível apenas para usuários 
    registrados do site. <a href="login.php?cadastro=1" class="ircmania1"><u>Clique aqui</u></a> e faça o 
    registro, é rápido e fácil. Registre-se!<br>
    <br>
    Se você já é registrado, faça o seu login utilizando o formulário no canto 
    superior direito dessa página.</td>
  </tr>
</table>

<?
} else {

	$query = mysql_query("select * from comentarios where tid='$pid'");
	$l = mysql_fetch_array($query);

	$subject = htmlentities("$subject");
	$comment = htmlentities("$comment");

if (($req == "Visualizar") and (getenv("REQUEST_METHOD") == "POST")) {

	if (!$subject) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Assunto</u>.</font><br>";
	}

	else if (!$comment) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Mensagem</u>.</font><br>";
	}

?>

	<p align="center"><u><b>Postar comentário:</b></u><br><b>Visualizando...</b><br></p>

	<table border="0" align="center" cellpadding="0" cellspacing="2" width="80%" bgcolor="#fdf7db">
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b><?=stripslashes($subject)?></b></td>
	  </tr>
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b>Autor: </b><?=$usuario?></td>
	  </tr>
	</table>
	
	<table align="center" width="80%" border="0" cellpadding="0" cellspacing="2">
	  <tr>
	    <td width="100%"><p align="justify"><font face="Verdana"><span style="font-size: 11px;">
		<?=nl2br(stripslashes($comment))?></td>
	  </tr>
	</table>
	<br>

<?
}

else if (($req == "Publicar") and (getenv("REQUEST_METHOD") == "POST")) {

$comment = limitechars($comment);
$subject = limitechars($subject);

	$datamenos = time() - 90;
	$spamc = mysql_query("select name,date,tid from comentarios where name = '$usuario' order by tid desc limit 1");
	$spaml = mysql_fetch_array($spamc);

	if (!$subject) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Assunto</u>.</font><br>";
	}

	else if (!$comment) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Mensagem</u>.</font><br>";
	}

	else if ($datamenos < $spaml[date]) {
	echo "<font color='#FF0000'>* Opa! Você está tentando postar novas mensagens muito rapidamente. Por favor, aguarde alguns minutos e tente novamente.</font><br>";
	}

	else {
	$data = time();
	$sql = "INSERT INTO comentarios (pid, sid, date, name, host_name, subject, comment) VALUES ('$l[tid]', '$l[sid]', '$data', '$usuario', '$REMOTE_ADDR', '$subject', '$comment')"; 
	mysql_query($sql);
	$formularioenviado = 1;
	}
}

if ($formularioenviado) { ?>

	<p align="center"><u><b>Publicado!</b></u></p><br>
	<p align="justify">Comentário enviado com sucesso.</p>
	<p align="center"><a href="view.php?sid=<?=$l[sid];?>">Voltar ao Texto.</a></p>

<? } else {?>


<p align="center"><u><b>Postar comentário:</b></u></p>
<br>
<form action="comentarios.php" method="post">
	<input type="hidden" value="<?=$l['sid'];?>" name="sid">
	<input type="hidden" value="<?=$l['tid'];?>" name="pid">
	<input type="hidden" value="7513" name="reply">
	<input type="hidden" value="1" name="lrp">

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
        <input type="text" maxlength="400" name="subject" value="<? if ($subject) { echo stripslashes($subject); } else { echo stripslashes($l[subject]); } ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
        </td>
      </tr>
      <tr>
        <td width="100%" colspan="2"><b><br>
        Mensagem: <br>
        </b>
        <textarea rows="10" name="comment" cols="62" style="font-family: Verdana; font-size: 10 px"><?=stripslashes($comment)?></textarea></td>
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

<p align="center"><u><b>Comentário raiz:</b></u></p>
<br>

	<table align="center" width="80%" border="0" cellpadding="0" cellspacing="2">
	  <tr>
	    <td width="100%"><p align="justify"><font face="Verdana"><span style="font-size: 11px;">
		<?=nl2br($l['comment'])?></td>
	  </tr>
	</table>



<? } } ?>