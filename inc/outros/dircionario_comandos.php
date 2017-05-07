<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Comandos</u></font></strong></td>
  </tr>
</table>

<?
if (getenv("REQUEST_METHOD") == "POST") {

	$comando = htmlentities("$comando");
	$descricao = htmlentities("$descricao");

	$cadastrar = 1;

	$query = mysql_query("select * from dircionario_comandos where comando='$comando'");
	if (mysql_num_rows($query)) {
	$comando = $comando."(2)";
	}

	if ($usuario) {
	$autor = $usuario;
	} else {
	$autor = "Anonymous";
	}

	if (!$comando) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Comando</u>.</font><br>";
	}

	else if (!$descricao) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Descrição</u>.</font><br>";
	}

	else {
    $sql = "INSERT INTO dircionario_comandos (comando, descricao, tipo, autor) VALUES ('$comando', '$descricao', '$categoria', '$autor')"; 
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
	<p align="center"><a href="outros.php?dircionario_comandos=ok" class="ircmania1"><u>Voltar</u></a></p></td>
  </tr>
</table>
<?
} else if ($cadastrar) { ?>

<br><br>
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">Enriqueça nosso dIRCionário. Adicione um <i>/comando</i> 
    preenchendo os campos abaixo.</p>
    <hr color="#000000" size="1" width="70%"></td>
  </tr>
</table>

<br>

<form action="outros.php?dircionario_comandos=ok" method="post">
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="45%"><b>Nome (autor):</b></td>
    <td width="55%">
    <input type="text" name="autor" size="33" value="<?if ($usuario) {echo $usuario;} else {echo "Anonymous";}?>" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1" disabled>
    </td>
  </tr>
  <tr>
    <td width="45%"><b>Comando:</b></td>
    <td width="55%">
    <input type="text" name="comando" size="33" value="<?=stripslashes($comando)?>" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
    </td>
  </tr>
  <tr>
    <td width="45%"><b>Categoria:</b></td>
    <td width="55%">
	<select size="1" name="categoria" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
	<option value="" selected>Selecione:</option>
	<option value=""> </option>
	<option value="Normal">Normal</option>
	<option value="NickServ">- NickServ</option>
	<option value="ChanServ">- ChanServ</option>
	<option value="MemoServ">- MemoServ</option>
	<option value="OperServ">- OperServ</option>
	<option value="Outros">- Outros</option>
	<option value=""> </option>
	</select>
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

	$sql = "select count(comando) as vl from dircionario_comandos where checkdir='1' "; 
	$qry = mysql_query($sql); 
	$termos = mysql_fetch_array($qry); 

	$query1 = mysql_query("select * from dircionario_comandos where id='$view' and checkdir='1'");
	$l = mysql_fetch_array($query1);
?>

<br><br>

<p align="center"><a href="outros.php?dircionario_comandos=ok&cadastrar=1"><u>Inserir 
novo /comando</u></a><br>(Existem <?=$termos['vl']?> comandos em nosso banco de dados)</p>

<table align="center" border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#C0C0C0" width="70%">
  <tr>
    <td width="100%"><b><?=stripslashes($l[comando])?></td>
  </tr>
  <tr>
    <td width="100%">
    <table align="center" border="0" cellpadding="7" cellspacing="0" width="85%">
      <tr>
        <td width="100%"><p align="justify"><?=nl2br(stripslashes($l[descricao]))?> <font color="#C0C0C0">(By: <?=$l[autor]?>)</font></p></td>
      </tr>
    </table>
    </td>
  </tr>
</table>

<br><br><br>

<table border="0" cellpadding="3" cellspacing="0" width="100%">
<?
$query2 = mysql_query("select * from dircionario_comandos where checkdir='1' order by comando asc");

for ($i = 0; $l = mysql_fetch_array($query2); $i++) {
$cor = ($i%2) ? 'white':'#f3f3f3';
?>


  <tr>
    <td width="80%" bgcolor="<?=$cor?>"><a href="outros.php?dircionario_comandos=ok&view=<?=$l[id]?>" class="ircmania1" title="<?=$l[descricao]?>"><u><?=$l[comando]?></u></a></td>
    <td width="20%" bgcolor="<?=$cor?>"><b><?=stripslashes($l[tipo])?></b></td>
  </tr>


<? } ?>
</table>



<?
} else {

	$sql = "select count(comando) as vl from dircionario_comandos where checkdir='1' "; 
	$qry = mysql_query($sql); 
	$termos = mysql_fetch_array($qry); 
?>

<br><br>

<p align="center"><a href="outros.php?dircionario_comandos=ok&cadastrar=1"><u>Inserir 
novo /comando</u></a><br>(existem <?=$termos['vl']?> comandos em nosso banco de dados)</p>

<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">Aqui constam os comandos de IRC mais utilizados. Pedimos 
    uma especial atenção ao fato de que cada rede tem suas características, o 
    que pode fazer com que alguns dos comandos aqui presentes não funcionem.</p>
    <hr color="#000000" size="1" width="70%"></td>
  </tr>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
<?
$query2 = mysql_query("select * from dircionario_comandos where checkdir='1' order by tipo desc");

for ($i = 0; $l = mysql_fetch_array($query2); $i++) {
$cor = ($i%2) ? 'white':'#f3f3f3';
?>

  <tr>
    <td width="80%" bgcolor="<?=$cor?>"><a href="outros.php?dircionario_comandos=ok&view=<?=$l["id"]?>" class="ircmania1" title="<?=$l["descricao"]?>"><u><?=$l["comando"]?></u></a></td>
    <td width="20%" bgcolor="<?=$cor?>"><b><?=$l["tipo"]?></b></td>
  </tr>

<? } ?>
</table>

<? } ?>