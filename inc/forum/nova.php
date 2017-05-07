<?

	$chavetitle = "Fórum dos sites IRCmania e ChatMania";

include ("inc/top.php");
include ("inc/header.php");
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
echo "É necessário estar registrado e logado no site para postar um novo tópico.";
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

	else if (!$categoria) {
	echo "<font color='#FF0000'>* Por favor, selecione uma opção do campo <u>Categoria</u>.</font><br>";
	}

	$lrp = 1
?>

	<p align="center"><u><b>Postar Mensagem:</b></u><br><b>Visualizando...</b><br></p>

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

	else if (!$categoria) {
	echo "<font color='#FF0000'>* Por favor, selecione uma opção do campo <u>Categoria</u>.</font><br>";
	}

	else if ($datamenos < $spaml[data]) {
	echo "<font color='#FF0000'>* Opa! Você está tentando postar novas mensagens muito rapidamente. Por favor, aguarde alguns minutos e tente novamente.</font><br>";
	}

	else {
	$data = time();
	$sql = "INSERT INTO forum_msg (catid, autor, topico, mensagem, data) VALUES ('$categoria', '$usuario', '$assunto', '$mensagem', '$data')"; 
	mysql_query($sql);
	$formularioenviado = 1;
	}
}

if ($formularioenviado) { ?>

	<p align="center"><u><b>Publicado!</b></u></p><br>
	<p align="justify">Mensagem enviada com sucesso.</p>
	<p align="center"><a href="forum.php?id=<?=$categoria?>">Voltar ao Fórum.</a></p>

<? } else {?>


<p align="center"><u><b>Postar Mensagem:</b></u></p>
<br>
<form action="forum.php" method="post">
<input type="hidden" value="1" name="novamsg">

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
        <input type="text" maxlength="40" name="assunto" value="<?=stripslashes($assunto)?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
        </td>
      </tr>
      <tr>
        <td width="45%"><b>Categoria:</b></td>
        <td width="55%">
		<select size="1" name="categoria" style="font-family: Verdana; font-size: 10 px">
		<option value="">Selecione:</option>
		<option value="">---</option>
		<?
		$qcate = mysql_query("select * from forum order by nome");
		while ($qcatel = mysql_fetch_array($qcate)) {
		?>
		<option value="<?=$qcatel[id]?>" <? if ($categoria == $qcatel[id]) echo "selected"; ?>><?=$qcatel[nome]?></option>
		<? } ?>
		</select>
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

<?
}
include ("inc/header2.php");
include ("inc/footer.php");
?>