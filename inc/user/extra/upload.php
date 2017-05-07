<script language=javascript>
<!--
function validar() {

	if (document.form.titulo.value == "") {
	alert("Por favor, preencha o campo Título.");
	return false;
	}

	else if (document.form.tipo.value == "") {
	alert("Por favor, preencha o campo Categoria.");
	return false;
	}

	else if (document.form.arquivo.value == "") {
	alert("Por favor, selecione um arquivo para ser enviado.");
	return false;
	}

	else if (document.form.descricao.value == "") {
	alert("Por favor, preencha o campo Descrição.");
	return false;
	}

}
-->
</script>

<?
include ("inc/user/extra/top.php");

	$titulo = htmlentities("$titulo");
	$descricao = htmlentities("$descricao");

if ((getenv("REQUEST_METHOD") == "POST") and ($arquivo)) {

$arquivo_name = "[$usuario]$arquivo_name"; 

	$query3 = mysql_query("select * from download where titulo='$titulo'");
	if (mysql_num_rows($query3)) { 
	echo "<font color='#FF0000'>* Erro! O arquivo <u>$titulo</u> ($arquivo_name) já existe em nosso banco de dados (talvez na conta de outro colaborador).</font><br>";
	}

	else if (($arquivo_type != "application/x-zip-compressed") and ($arquivo_type != "application/octet-stream") and ($arquivo_type != "application/x-gzip-compressed")) {
	echo "<font color='#FF0000'>* Erro! Só é permitido o envio de arquivos em formatos:<br><b>&nbsp;&nbsp;&nbsp;&nbsp;ZIP, RAR, EXE, TTF ou TAR.GZ</b></font><br>";
	}

	else if ((!$titulo) or (!$tipo) or (!$descricao)) {
	echo "<font color='#FF0000'>* Erro! É obrigatório o preenchimento dos campos <u>Título</u>, <u>Categoria</u> e <u>Descrição</u>.</font><br>";
	}

	else if ($arquivo_size > 2048000) {
	echo "<font color='#FF0000'>* Erro! O tamanho do arquivo é maior que o limite permitido (2MB).</font><br>";
	}

	else if (($screen) and ($screen_size > 102400)) {
	echo "<font color='#FF0000'>* Erro! O tamanho da Imagem é maior que o limite permitido (100kb).</font><br>";
	}

	else if (($screen) and ($screen_type != "image/gif") and ($screen_type != "image/bmp") and ($screen_type != "image/pjpeg") and ($screen_type != "image/x-png") and ($screen_type != "image/jpeg")) {
	echo "<font color='#FF0000'>* Erro. Só é permitido o envio de imagens em formatos:<br><b>&nbsp;&nbsp;&nbsp;&nbsp;JPG, GIF, PNG ou BMP</b></font><br>";
	}

	else if (copy($arquivo,"download/extra/$parte/$tipo/$arquivo_name")) {

		if ($screen) {
		$imagem_name = "download/extra/$parte/$tipo/".$arquivo_name.".jpg";
		copy($screen,"$imagem_name");
		}

	$data = time();
	$sql = "INSERT INTO download (titulo, link, cat, nivel, autor, ip, data, descricao, imagem, tamanho, checkdown) VALUES ('$titulo', 'download/extra/$parte/$tipo/$arquivo_name', '$tipo', '$nivel', '$usuario', '$REMOTE_ADDR', '$data', '$descricao', '$imagem_name', '$arquivo_size', '1')"; 
	mysql_query($sql);
	echo "<font color='#FF0000'>### Perfeito!<br>O arquivo <u>$arquivo_name</u> foi enviado com êxito.</font><br>";
	}

	else {
	echo "<font color='#FF0000'>* Erro! Ocorreu um erro ao tentar receber o arquivo!</font><br>";
	}
}
?> 

<form method="post" name="form" enctype="multipart/form-data" action="user.php" onSubmit="return validar()">
<input type="hidden" value="<?=$parte?>" name="edit">
<input type="hidden" value="ok" name="upload">

<table border="0" cellpadding="3" cellspacing="0" width="100%">
  <tr>
    <td width="100%" colspan="2">
    <p align="center"><u>Adicione Arquivos: (Max. 2MB)</u><br>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="50%">Título & Versão</td>
    <td width="50%">
	<input type="text" size="35" name="titulo" style="font-family: Verdana; font-size: 10 px">
	</td>
  </tr>
  <tr>
    <td width="50%">Categoria:</td>
    <td width="50%">
    <select size="1" name="tipo" style="font-family: Verdana; font-size: 10 px">
    <option value="">Escolha o Tipo:</option>
    <option value=""></option>
	<?
	$query7 = mysql_query("select * from download_cat where nivel='$nivel' order by nome asc");
	while ($ldown= mysql_fetch_array($query7)) {
	?>
    <option value="<?=$ldown[nome]?>" <?if($cat==$ldown[id]){echo"selected";}?>><?=$ldown[nome];?></option>
	<? } ?>
    <option value=""></option>
    </select></td>
  </tr>
  <tr>
    <td width="50%">Arquivo (max 2mb):</td>
    <td width="50%">
    <input type="file" name="arquivo" size="20" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="50%">Imagem (opcional, max 100kb):</td>
    <td width="50%">
    <input type="file" name="screen" size="20" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="50%">Descrição:</td>
    <td width="50%">
    <textarea rows="6" name="descricao" cols="34" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"><?=$descricao?></textarea></td>
  </tr>
  <tr>
    <td width="50%">
    <input type="submit" name="submit" value="Enviar" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
    <td width="50%">&nbsp;</td>
  </tr>
</table>

</form>

<br><br>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="100%">
	<?	
	$query2 = mysql_query("select * from download where autor='$usuario' and nivel='$nivel' order by id desc");
	while($l = mysql_fetch_array($query2)) {
	?>
  <tr>
    <td width="74%">(<u><?=$l[cat]?>)</u> - <?=$l[titulo]?></td>
    <td width="26%"><p align="center"><a href="user.php?edit=<?=$parte?>&upload=ok&delete=<?=$l[id]?>">Delete</a></td>
  </tr>
	<?
	} 
	?>
</table>