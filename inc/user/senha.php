<?
if (getenv("REQUEST_METHOD") == "POST") {
$query = mysql_query("select * from usuarios where login='$usuario'");
$l = mysql_fetch_array($query);

	if ((!$passen) or (!$passen1) or (!$passen2)) {
	echo "<font color='#FF0000'>* Por favor, preencha os 3 campos de <u>Senha</u>.</font><br>";
	}

	else if ($passen != $l[senha]) {
	echo "<font color='#FF0000'>* <u>Senha Atual</u> errada! Por favor, digite novamente.</font><br>";
	}

	else if ($passen1 != $passen2){
	echo "<font color='#FF0000'>* Por favor, repita a nova senha nos dois últimos campos.</font>";
	}

	else {
	$update = "update usuarios set senha='$passen1' where login='$usuario'";
	mysql_query($update);
	$senhatrocada = 1;
	}
}

if ($senhatrocada) {
?>
<p align="center"><u><b>Trocar senha!</b></u></p>
<br>
Senha trocada com sucesso!<br><a href="user.php" class="ircmania1"><u>Clique aqui</u></a> e retorne a sua página pessoal.
<?
} else {
?>
<p align="center"><u><b>Trocar senha!</b></u></p>
<br>

<form action="user.php?edit=senha" method="post">
<table border="0" cellpadding="3" cellspacing="0" width="70%">
  <tr>
    <td width="50%">Senha Atual:</td>
    <td width="50%"><input type="password" name="passen" size="20" maxlength="15" class="formwebirc">
	</td>
  </tr>
  <tr>
    <td width="50%">Digite Nova Senha: </td>
    <td width="50%"><input type="password" name="passen1" size="20" maxlength="15" class="formwebirc">
	</td>
  </tr>
  <tr>
    <td width="50%">Repita Nova Senha:</td>
    <td width="50%"><input type="password" name="passen2" size="20" maxlength="15" class="formwebirc">
	</td>
  </tr>
</table><br>
<input type="submit" value="Enviar" style="font-family: Verdana; font-size: 10 px">
</form>
<?
}
?>