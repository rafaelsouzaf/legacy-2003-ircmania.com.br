<?
$alias = htmlentities($alias);

if (getenv("REQUEST_METHOD") == "POST") {
$query4 = mysql_query("select * from aliases where alias='$alias'");

	if (mysql_num_rows($query4)) {
	echo "<font color='#FF0000'>* Este <u><b>Alías</b></u> já existe em nosso banco de dados.</font><br>";
	}

	else if (!$cat) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Categoria</u>.</font><br>";
	}

	else if (!$alias) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Alías</u> incluíndo os códigos (cor, sublinhado, negrito, etc).</font><br>";
	}

	if ($usuario) {
	$autor = $usuario;
	} else {
	$autor = "Anonymous";
	}

    $sql = "INSERT INTO aliases (categoria, alias, autor, ip) VALUES ('$cat', '$alias', '$autor', '$REMOTE_ADDR')"; 
    mysql_query($sql);

	$ok = 1;
	}


if ($ok) {
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Aliases: Enviar</u></font></strong></td>
  </tr>
</table>

<br><br>

<p align="center">Obrigado! Seu Alias foi adicionado com sucesso. Ele será 
revisado em breve. Por favor, aguarde publicação.<br>
<br>
<br>
<a href="aliases.php?categoria=<?=$cat?>" class="ircmania1"><u>Voltar</u></a></p>

<? } else { ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Aliases: Enviar</u></font></strong></td>
  </tr>
</table>

<br><br>

<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">Preencha os campos abaixo para enviar seu Alias. Não 
    esqueça de enviá-lo em forma de código, com negrito, sublinhado, colorido ou 
    qualquer outra característica que ele conter. Agradecemos a colaboração.</p>
    <hr color="#000000" size="1" width="70%"></td>
  </tr>
</table>


<br><br>

<form action="aliases.php" method="post">
<input type="hidden" name="enviar" value="ok">
<table align="center" border="0" cellpadding="0" cellspacing="3" width="90%">
  <tr>
    <td width="50%">Categoria:</td>
	<td width="50%"><select size="1" name="cat" style="font-family: Verdana; font-size: 10 px">
    <option value="" selected>Selecione:</option>
    <option value=""></option>
    <option value="Frases">Frases</option>
    <option value="Piadas">Piadas</option>
    <option value="Risadas">Risadas</option>
    <option value="Amor_Ódio">Amor e Ódio</option>
    <option value="Cumprimentos">Cumprimentos</option>
    <option value="Músicas">Músicas</option>
    <option value="Diversos">Diversos</option>
    <option value=""></option>
    </select></td>
  </tr>
  <tr>
    <td width="50%">Autor:</td>
    <td width="50%">
    <input type="text" name="autor" value="<?if ($usuario) { echo $usuario;} else { echo "Anonymous";}?>" maxlength="50" size="30" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999" disabled></td>
  </tr>
  <tr>
    <td width="50%">Alías (com código):</td>
    <td width="50%"><textarea rows="7" name="alias" cols="25"><?=$alias?></textarea></td>
  </tr>
  <tr>
    <td width="50%"></td>
    <td width="50">
    <input type="submit" value="Enviar Alias" style="font-family: Verdana; font-size: 10 px; float: right"></td>
  </tr>
</table>
</form>
<? } ?>