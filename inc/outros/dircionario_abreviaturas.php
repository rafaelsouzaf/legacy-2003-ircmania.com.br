<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Abreviaturas</u></font></strong></td>
  </tr>
</table>

<?
if (getenv("REQUEST_METHOD") == "POST") {

	$palavra = htmlentities("$palavra");
	$descricao = htmlentities("$descricao");

	$cadastrar = 1;

	$query = mysql_query("select * from dircionario_abreviaturas where palavra='$palavra'");
	if (mysql_num_rows($query)) {
	$palavra = $palavra."(2)";
	}

	if ($usuario) {
	$autor = $usuario;
	} else {
	$autor = "Anonymous";
	}

	if (!$palavra) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Palavra</u>.</font><br>";
	}

	else if (!$descricao) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Descri��o</u>.</font><br>";
	}

	else {
    $sql = "INSERT INTO dircionario_abreviaturas (palavra, descricao, autor) VALUES ('$palavra', '$descricao', '$autor')"; 
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
    <p align="justify">Formul�rio enviado com sucesso. Aguarde publica��o. Obrigado!</p>
	<p align="center"><a href="outros.php?dircionario_abreviaturas=ok" class="ircmania1"><u>Voltar</u></a></p></td>
  </tr>
</table>
<?
} else if ($cadastrar) { ?>

<br><br>
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">Enrique�a nosso dIRCion�rio. Adicione um termo preenchendo os 
    campos abaixo. Vale lembrar que aceitamos termos apenas diretamente 
    relacionados ao Chat ou IRC.</p>
    <hr color="#000000" size="1" width="70%"></td>
  </tr>
</table>

<br>

<form action="outros.php?dircionario_abreviaturas=ok" method="post">
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="45%"><b>Nome (autor):</b></td>
    <td width="55%">
    <input type="text" name="autor" size="33" value="<?if ($usuario) {echo $usuario;} else {echo "Anonymous";}?>" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1" disabled>
    </td>
  </tr>
  <tr>
    <td width="45%"><b>Palavra:</b></td>
    <td width="55%">
    <input type="text" name="palavra" size="33" value="<?=stripslashes($palavra)?>" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><b><br>
    Descri��o:<br>
    </b>
    <textarea rows="10" name="descricao" cols="62" style="font-family: Verdana; font-size: 10 px"><?=stripslashes($descricao)?></textarea></td>
  </tr>
  <tr>
    <td width="100%" valign="top" colspan="2"><br>
    <input type="submit" value="Enviar" style="font-family: Verdana; font-size: 10 px"></td>
  </tr>
</table>
</form>
<?
} else {

	$sql = "select count(palavra) as vl from dircionario_abreviaturas where checkdir='1' "; 
	$qry = mysql_query($sql); 
	$termos = mysql_fetch_array($qry); 
?>

<br><br>

<p align="center"><a href="outros.php?dircionario_abreviaturas=ok&cadastrar=1"><u>Inserir 
novo termo</u></a><br>(existem <?=$termos['vl']?> termos em nosso banco de dados)</p>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
<?
$query2 = mysql_query("select * from dircionario_abreviaturas where checkdir='1' order by palavra asc");

for ($i = 0; $l = mysql_fetch_array($query2); $i++) {
$cor = ($i%2) ? 'white':'#f3f3f3';
//$l[descricao] = substr($l[descricao], 0, 38);
?>

  <tr>
    <td width="25%" bgcolor="<?=$cor?>"><font size="2"><b><?=stripslashes($l[palavra])?></b></font></td>
    <td width="75%" bgcolor="<?=$cor?>"><?=stripslashes($l[descricao])?></td>
  </tr>

<? } ?>
</table>

<? } ?>