<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Conceitos</u></font></strong></td>
  </tr>
</table>

<?
if (getenv("REQUEST_METHOD") == "POST") {

	$palavra = htmlentities("$palavra");
	$descricao = htmlentities("$descricao");

	$cadastrar = 1;

	$query = mysql_query("select * from dircionario_conceitos where palavra='$palavra'");
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
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Descrição</u>.</font><br>";
	}

	else {
    $sql = "INSERT INTO dircionario_conceitos (palavra, descricao, autor) VALUES ('$palavra', '$descricao', '$autor')"; 
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
	<p align="center"><a href="outros.php?dircionario_conceitos=ok" class="ircmania1"><u>Voltar</u></a></p></td>
  </tr>
</table>
<?
} else if ($cadastrar) { ?>

<br><br>
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">Enriqueça nosso dIRCionário. Adicione um termo preenchendo os 
    campos abaixo. Vale lembrar que aceitamos termos apenas diretamente 
    relacionados ao IRC.</p>
    <hr color="#000000" size="1" width="70%"></td>
  </tr>
</table>

<br>

<form action="outros.php?dircionario_conceitos=ok" method="post">
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="45%"><b>Nome (autor):</b></td>
    <td width="55%">
    <input type="text" name="autor" size="33" value="<?if ($usuario) {echo $usuario;} else {echo 'Anonymous';}?>" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1" disabled>
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
    Descrição:<br>
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
} else if ($view) { 

	$sql = "select count(palavra) as vl from dircionario_conceitos where checkdir=1 "; 
	$qry = mysql_query($sql); 
	$termos = mysql_fetch_array($qry); 

	$query1 = mysql_query("select * from dircionario_conceitos where id='$view' and checkdir='1'");
	$l = mysql_fetch_array($query1);
?>

<br><br>

<p align="center"><a href="outros.php?dircionario_conceitos=ok&cadastrar=1"><u>Inserir 
novo termo</u></a><br>(Existem <?=$termos['vl']?> termos em nosso banco de dados)</p>



<table align="center" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#C0C0C0" width="70%">
  <tr>
    <td width="100%"><b><?=stripslashes($l[palavra])?></td>
  </tr>
  <tr>
    <td width="100%">
    <table align="center" border="0" cellpadding="7" cellspacing="0" width="85%">
      <tr>
        <td width="100%"><p align="justify"><?=stripslashes($l[descricao])?> <font color="#C0C0C0">(By: <?=$l[autor]?>)</font></p></td>
      </tr>
    </table>
    </td>
  </tr>
</table>

<br><br><br>

<table border="0" cellpadding="3" cellspacing="0" width="100%">
<?
$query2 = mysql_query("select * from dircionario_conceitos where checkdir='1' order by palavra asc");

for ($i = 0; $l = mysql_fetch_array($query2); $i++) {
$cor = ($i%2) ? 'white':'#f3f3f3';
$l[descricao] = substr($l[descricao], 0, 40);
?>


  <tr>
    <td width="30%" bgcolor="<?=$cor?>"><a href="outros.php?dircionario_conceitos=ok&view=<?=$l["id"]?>" class="ircmania1"><u><?=stripslashes($l[palavra])?></u></a></td>
    <td width="70%" bgcolor="<?=$cor?>"><?=stripslashes($l[descricao])?> (...)</td>
  </tr>


<? } ?>
</table>



<?
} else {

	$sql = "select count(palavra) as vl from dircionario_conceitos where checkdir='1'"; 
	$qry = mysql_query($sql); 
	$termos = mysql_fetch_array($qry); 
?>

<br><br>

<p align="center"><a href="outros.php?dircionario_conceitos=ok&cadastrar=1"><u>Inserir 
novo termo</u></a><br>(existem <?=$termos['vl']?> termos em nosso banco de dados)</p>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
<?
$query2 = mysql_query("select * from dircionario_conceitos where checkdir='1' order by palavra asc");

for ($i = 0; $l = mysql_fetch_array($query2); $i++) {
$cor = ($i%2) ? 'white':'#f3f3f3';
$l[descricao] = substr($l[descricao], 0, 38);
?>

  <tr>
    <td width="25%" bgcolor="<?=$cor?>"><a href="outros.php?dircionario_conceitos=ok&view=<?=$l["id"]?>" class="ircmania1"><u><?=stripslashes($l[palavra])?></u></a></td>
    <td width="75%" bgcolor="<?=$cor?>"><?=stripslashes($l[descricao])?> (...)</td>
  </tr>

<? } ?>
</table>

<? } ?>