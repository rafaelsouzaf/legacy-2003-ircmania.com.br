<?
$query = mysql_query("select * from usuarios where login='$usuario'");
$l = mysql_fetch_array($query);

if (getenv("REQUEST_METHOD") == "POST") {

	if ($config_email != $l[config_email]) {
	$update = "update usuarios set config_email='$config_email' where login='$usuario'";
	mysql_query($update);
	$l[config_email] = $config_email;
	}

	if ($config_forum != $l[config_forum]) {
	$update2 = "update usuarios set config_forum='$config_forum' where login='$usuario'";
	mysql_query($update2);
	$l[config_forum] = $config_forum;
	}

	if ($config_newsletter != $l[config_newsletter]) {
	$update3 = "update usuarios set config_newsletter='$config_newsletter' where login='$usuario'";
	mysql_query($update3);
	$l[config_newsletter] = $config_newsletter;
	}

}
?>

<p align="center"><u><b>Configuração!</b></u></p>
<br>

<form action="user.php?edit=opcoes" method="post">
<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%" colspan="2">
    <p align="center">1) Mostrar endereço de e-mail na página de informações pessoais, nos comentários e em outras seções?</td>
  </tr>
  <tr>
    <td width="50%" align="center"><input type="radio" value="1" name="config_email" <?if($l[config_email]==1){echo"checked";} else{$check=1;}?>> 
    Sim.</td>
    <td width="50%" align="center"><input type="radio" value="0" name="config_email" <?if($check){echo"checked";}?>> 
    Não.</td>
  </tr>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%" colspan="2">
    <p align="center">2) Enviar um email avisando sempre que alguém responder seus tópicos no fórum de discussão?</td>
  </tr>
  <tr>
    <td width="50%" align="center"><input type="radio" value="1" name="config_forum" <?if ($l[config_forum] == 1) echo "checked"; ?>> 
    Sim.</td>
    <td width="50%" align="center"><input type="radio" value="0" name="config_forum" <?if (!$l[config_forum]) echo "checked"; ?>> 
    Não.</td>
  </tr>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%" colspan="2">
    <p align="center">3) Deseja receber um boletim semanal com o resumo das publicações (artigos e downloads) ?</td>
  </tr>
  <tr>
    <td width="50%" align="center"><input type="radio" value="1" name="config_newsletter" <?if ($l[config_newsletter] == 1) echo "checked"; ?>> 
    Sim.</td>
    <td width="50%" align="center"><input type="radio" value="0" name="config_newsletter" <?if (!$l[config_newsletter]) echo "checked"; ?>> 
    Não.</td>
  </tr>
</table>

<br>
<hr color="#C0C0C0" width="60%" size="1">
<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%">
    <p align="right"><input type="submit" value="Atualizar Dados" style="font-family: Verdana; font-size: 10 px; float: right"></td>
  </tr>
</table>
</form>