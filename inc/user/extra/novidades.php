<?
include ("inc/user/extra/top.php");

if (getenv("REQUEST_METHOD") == "POST") {

	$assunto = htmlentities("$assunto");
	$texto = htmlentities("$texto");

	if ((!$assunto) or (!$texto)) {
	echo "<font color='#FF0000'>* Preencha os campos <u>Assunto</u> ou <u>Texto</u>.</font><br>";
	}

	else {
	$data = time();
	$sql = "INSERT INTO extra_novidades (nivel, usuario, ip, data, assunto, texto) VALUES ('$nivel', '$usuario', '$REMOTE_ADDR', '$data', '$assunto', '$texto')"; 
	mysql_query($sql);
	echo "<font color='#FF0000'>Perfeito! NOVIDADE adicionada com sucesso!</font><br>";
}
}
?>

<p align="center"><u><b>Inserir texto de novidades e avisos!</b></u></p>

<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">As Novidades são os primeiros textos a aparecem em sua 
    página de colaborador. É através das Novidades que os visitantes da sua 
    seção saberão o que tem de novo ou qualquer outra mensagem que você queira 
    deixar.<br>
    <br>
    Para manter o layout parecido para todos os colaboradores, optamos por não 
    aceitar códigos HTML.</td>
  </tr>
</table>

<br>

<form action="user.php" method="post">
<input type="hidden" value="<?=$parte?>" name="edit">
<input type="hidden" value="ok" name="novidades">

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="100%">
  <tr>
    <td width="41%">Assunto:</td>
    <td width="59%"><input type="text" name="assunto" maxlength="50" size="42" style="font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="41%">Texto:</td>
    <td width="59%"><textarea rows="11" name="texto" cols="46" style="font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></textarea></td>
  </tr>
</table>
<br>
<input type="submit" value="Enviar Texto" style="font-family: Verdana; font-size: 10 px; float: right">
</form>

<br><br>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="100%">
	<?
	$query2 = mysql_query("select * from extra_novidades where usuario='$usuario' and nivel='$nivel' order by id desc");
	while($l = mysql_fetch_array($query2)) { 
	?>
  <tr>
    <td width="74%"><u><?=stripslashes($l[assunto])?></u></td>
    <td width="26%"><p align="center"><a href="user.php?edit=<?=$parte?>&novidades=edit&editing=<?=$l[id]?>">Editar</a>&nbsp; -&nbsp; <a href="user.php?edit=<?=$parte?>&novidades=delete&delete=<?=$l[id]?>">Deletar</a></td>
  </tr>
	<?
	} 
	?>
</table>