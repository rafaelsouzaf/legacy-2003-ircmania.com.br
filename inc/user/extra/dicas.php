<?
include ("inc/user/extra/top.php");

	$assunto = htmlentities("$assunto");
	$texto = htmlentities("$texto");
	$dica = htmlentities("$dica");

if (getenv("REQUEST_METHOD") == "POST") {

	if ((!$assunto) or (!$texto) or (!$dica)) {
	echo "<font color='#FF0000'>* Preencha os campos <u>Assunto</u>, <u>Dica</u> ou <u>Texto</u>.</font><br>";
	}

	else {
	$data = time();
	$sql = "INSERT INTO extra_dicas (nivel, usuario, ip, data, assunto, dica, texto) VALUES ('$nivel', '$usuario', '$REMOTE_ADDR', '$data', '$assunto', '$dica', '$texto')"; 
	mysql_query($sql);
	echo "<font color='#FF0000'>Perfeito!<b> Dica</b> adicionada com sucesso!</font><br>";
}
}
?>

<p align="center"><u><b>Inserir Dicas!</b></u></p>

<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">Dicas são rápidas explicações e sugestões para 
    implementar determinado recurso ou resolver algum problema. O texto será 
    visível através da sua seção de colaborador (em um bloco do lado direito do 
    site, abaixo do webchat) e não passará por nenhuma edição por parte da 
    administração do site.<br>
    <br>
    Apesar de recomendarmos a criação do bloco Dicas, ele é <u>opcional</u> 
    então só aparecerá no layout de sua página de colaborador se alguma dica for 
    publicada. <b>Não são aceitos códigos HTML</b>.</p></td>
  </tr>
</table>

<br>

<form action="user.php" method="post">
<input type="hidden" value="<?=$parte?>" name="edit">
<input type="hidden" value="ok" name="dicas">

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="100%">
  <tr>
    <td width="41%">Assunto:</td>
    <td width="59%"><input type="text" name="assunto" maxlength="50" size="42" style="font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="41%">Dica:<br>Coloque aqui apenas a dica inicial, que será direcionada para resposta da Dica.</td>
    <td width="59%"><textarea rows="7" name="dica" cols="30" style="font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></textarea></td>
  </tr>
  <tr>
    <td width="41%">Resposta da Dica:</td>
    <td width="59%"><textarea rows="11" name="texto" cols="46" style="font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></textarea></td>
  </tr>
</table>
<br>
<input type="submit" value="Enviar Dica" style="font-family: Verdana; font-size: 10 px; float: right">
</form>

<br><br>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="100%">
	<?
	$query2 = mysql_query("select * from extra_dicas where usuario='$usuario' and nivel='$nivel' order by id desc");
	while($l = mysql_fetch_array($query2)) { 
	?>
  <tr>
    <td width="74%"><u><?=stripslashes($l[assunto])?></u></td>
    <td width="26%"><p align="center"><a href="user.php?edit=<?=$parte?>&dicas=edit&editing=<?=$l[id]?>">Editar</a>&nbsp; -&nbsp; <a href="user.php?edit=<?=$parte?>&dicas=delete&delete=<?=$l[id]?>">Deletar</a></td>
  </tr>
	<?
	} 
	?>
</table>