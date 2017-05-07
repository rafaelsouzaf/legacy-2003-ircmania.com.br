<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Smileys :-D</u></font></strong></td>
  </tr>
</table>

<?
if (getenv("REQUEST_METHOD") == "POST") {

	$emoticon = htmlentities("$emoticon");
	$descricao = htmlentities("$descricao");

	$cadastrar = 1;

	$query = mysql_query("select * from dircionario_smileys where smiley='$emoticon'");
	if (mysql_num_rows($query)) {
	echo "<font color='#FF0000'>* O Smiley <u>$emoticon</u> já consta em nosso banco de dados.</font><br>";
	}

	if ($usuario) {
	$autor = $usuario;
	} else {
	$autor = "Anonymous";
	}

	if (!$emoticon) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Smiley</u>.</font><br>";
	}

	else if (!$descricao) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Descrição</u>.</font><br>";
	}

	else {
    $sql = "INSERT INTO dircionario_smileys (smiley, descricao, categoria, autor) VALUES ('$emoticon', '$descricao', '$categoria', '$autor')"; 
    mysql_query($sql);
	$palavraenviada = 1;
	}
}

if ($palavraenviada) { ?>
<br>
<hr color="#000000" size="1" width="70%">
<br>
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">Formulário enviado com sucesso. Aguarde publicação. Obrigado!</p>
	<p align="center"><a href="outros.php?dircionario_smileys=ok" class="ircmania1"><u>Voltar</u></a></p></td>
  </tr>
</table>
<?
} else if ($cadastrar) { ?>

<br><br>
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">Um novo e criativo Smiley é sempre bem vindo. Adicione um preenchendo os 
    campos abaixo.</p>
    <hr color="#000000" size="1" width="70%"></td>
  </tr>
</table>

<br>

<form action="outros.php?dircionario_smileys=ok" method="post">
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="45%"><b>Nome (autor):</b></td>
    <td width="55%">
    <input type="text" name="autor" size="33" value="<?if ($usuario) {echo $usuario;} else {echo "Anonymous";}?>" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1" disabled>
    </td>
  </tr>
  <tr>
    <td width="45%"><b>Smiley:</b></td>
    <td width="55%">
    <input type="text" name="emoticon" size="33" value="<?=$emoticon?>" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
    </td>
  </tr>
  <tr>
    <td width="45%"><b>Categoria:</b></td>
    <td width="55%">
	<select size="1" name="categoria" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
	<option value="" selected>Selecione:</option>
	<option value=""> </option>
	<option value="Caricaturas">Caricaturas</option>
	<option value="Emotivos">Emotivos</option>
	<option value="Beijos">Beijos</option>
	<option value="Disposição">Disposição</option>
	<option value="Animais">Animais</option>
	<option value="Outros">Outros</option>
	<option value=""> </option>
	</select>
	</td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><b><br>
    Descrição:<br>
    </b>
    <textarea rows="10" name="descricao" cols="62" style="font-family: Verdana; font-size: 10 px"><?=$descricao?></textarea></td>
  </tr>
  <tr>
    <td width="100%" valign="top" colspan="2"><br>
    <input type="submit" value="Enviar" style="font-family: Verdana; font-size: 10 px"></td>
  </tr>
</table>
</form>
<?
} else {

	$sql = "select count(smiley) as vl from dircionario_smileys where checkdir='1'"; 
	$qry = mysql_query($sql); 
	$termos = mysql_fetch_array($qry); 
?>

<br><br>

<p align="center"><a href="outros.php?dircionario_smileys=ok&cadastrar=1"><u>Inserir 
novo smiley</u></a><br>(existem <?=$termos['vl']?> emoticons em nosso banco de dados)</p>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">A palavra escrita nem sempre passa a emoção ou o tom 
    desejado da conversa. Para isso, são usados os smileys (ou emoticons), ou 
    seja, sinais de acentuação que, se vistos de lado, formam &quot;carinhas&quot; :-D</td>
  </tr>
</table>

<br><br>

<table align="center" border="0" cellpadding="5" cellspacing="0" width="90%">
<?
$query2 = mysql_query("select * from dircionario_smileys where checkdir='1' order by categoria asc");

for ($i = 0; $l = mysql_fetch_array($query2); $i++) {
$cor = ($i%2) ? 'white':'#f3f3f3';
?>

  <tr>

    <td width="33%" bgcolor="<?=$cor?>"><font size="4"><b><?=$l["smiley"]?></b></font></td>
    <td width="47%" bgcolor="<?=$cor?>"><?=$l["descricao"]?></td>
    <td width="20%" bgcolor="<?=$cor?>"><b><?=$l["categoria"]?></b></td>
  </tr>

<? } ?>
</table>

<? } ?>