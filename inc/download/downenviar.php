<?
include ("inc/download/downtop.php");

	$titulo = htmlentities("$titulo");
	$descricao = htmlentities("$descricao");

if (getenv("REQUEST_METHOD") == "POST") {
$query4 = mysql_query("select * from download where titulo='$titulo' or link='$link'");

	if (mysql_num_rows($query4)) {
	echo "<font color='#FF0000'>* Arquivo <u><b>$titulo</b></u> já existe em nosso banco de dados.</font><br>";
	}

	else if (!$titulo) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Título</u>.</font><br>";
	}

	else if ($link == "http://") {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Link</u>.</font><br>";
	}

	else if (!$tamanho) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Tamanho</u>.</font><br>";
	}

	else if (($arquivo) and ($arquivo_size > 20480)) {
	echo "<font color='#FF0000'>* O tamanho do arquivo é maior que o limite permitido (15kb). Escolha outra imagem e envie novamente.</font><br>";
	}

	else if (($arquivo) and ($arquivo_type != "image/gif") and ($arquivo_type != "image/bmp") and ($arquivo_type != "image/pjpeg") and ($arquivo_type != "image/x-png") and ($arquivo_type != "image/jpeg")) {
	echo "<font color='#FF0000'>* Erro. Só é permitido o envio de imagens em formatos:<br><b>&nbsp;&nbsp;&nbsp;&nbsp;JPG, GIF, PNG ou BMP</b></font><br>";
	}

	else if (!$descricao) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Descrição</u>.</font><br>";
	}

	else {

		if ($arquivo) {
			$imagem = "imagens/upload/$titulo.jpg";
			copy($arquivo,"$imagem");
		}

	$sql = "INSERT INTO download (titulo, link, cat, descricao, imagem, tamanho, versao, website) VALUES ('$titulo', '$link', '$categ', '$descricao', '$imagem', '$tamanho', '$versao', '$siteoficial')"; 
    mysql_query($sql);

	$ok = 1;
	}

}

if ($ok) {
?>

<p align="center">Obrigado! Seu download foi adicionado com sucesso. Ele será 
revisado em breve. Por favor, aguarde publicação</p>

<? } else { ?>

<form action="download.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="enviar" value="ok">
<table align="center" border="0" cellpadding="0" cellspacing="3" width="90%">
  <tr>
    <td width="50%">Título do Download:</td>
    <td width="50%">
    <input type="text" name="titulo" value="<?=$titulo;?>" maxlength="50" size="30" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Link:</td>
    <td width="50%">
    <input type="text" name="link" value="<? if ($link) { echo $link; } else { echo "http://";}?>" maxlength="100" size="30" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Categoria:</td>
	<td width="50%"><select size="1" name="categ" style="font-family: Verdana; font-size: 10 px">
    <option value="" selected>Selecione:</option>
    <option value=""></option>
	<?
	$query7 = mysql_query("select * from download_cat where nivel='0' order by nome asc");
	while ($ldown= mysql_fetch_array($query7)) {
	?>
    <option value="<?=$ldown[id];?>" <?if($cat==$ldown[id]){echo"selected";}?>><?=$ldown[nome];?></option>
	<? } ?>
    <option value=""></option>
    </select></td>
  </tr>
  <tr>
    <td width="50%">Tamanho (em MB):</td>
    <td width="50%">
    <input type="text" name="tamanho" value="<?=$tamanho?>" maxlength="50" size="30" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Versão:</td>
    <td width="50%">
    <input type="text" name="versao" value="<?=$versao?>" maxlength="50" size="30" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Site Oficial:</td>
    <td width="50%">
    <input type="text" name="siteoficial" value="<?=$siteoficial?>"="http://" maxlength="50" size="30" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Imagem (opcional, máximo 15k):</td>
    <td width="50%">
    <input type="file" name="arquivo" size="20" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
  </tr>
  <tr>
    <td width="50%">Descrição:</td>
    <td width="50%"><textarea rows="7" name="descricao" cols="25"><?=$descricao;?></textarea></td>
  </tr>
  <tr>
    <td width="50%"></td>
    <td width="50">
    <input type="submit" value="Enviar Download" style="font-family: Verdana; font-size: 10 px; float: right"></td>
  </tr>
</table>
</form>
<? } ?>