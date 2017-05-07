<a name="1234">
<?
	$query = mysql_query("select * from usuarios where login='$usuario'");
	$l = mysql_fetch_array($query);

if ($arquivo) {

	$id = md5(uniqid(microtime(),1)).getmypid(); $mais = substr($id, 0, 5);

	if ($arquivo_size > 102400) {
	echo "<font color='#FF0000'>* O tamanho do arquivo é maior que o limite permitido (100kb).</font><br>";
	}

	else if (($arquivo_type != "image/gif") and ($arquivo_type != "image/bmp") and ($arquivo_type != "image/pjpeg") and ($arquivo_type != "image/x-png") and ($arquivo_type != "image/jpeg")) {
	echo "<font color='#FF0000'>* Erro. Só é permitido o envio de imagens em formatos:<br><b>&nbsp;&nbsp;&nbsp;&nbsp;JPG, GIF, PNG ou BMP</b></font><br>";
	}

	else if (copy($arquivo,"imagens/user/fotos/$usuario.$mais.jpg")) {
	if ($l[foto]){
	unlink("imagens/user/fotos/$l[foto]");
	}
	$update = "update usuarios set foto='$usuario.$mais.jpg' where login='$usuario'";
	mysql_query($update);
	echo "<font color='#FF0000'>### Perfeito! A imagem foi ATUALIZADA com êxito.</font><br>";
	}

	else {
	echo "<font color='#FF0000'>* Ocorreu um erro ao tentar receber o arquivo!</font><br>";
	}
}

if ($deletarfoto) {

	unlink("imagens/user/fotos/$l[foto]");
	$update = "update usuarios set foto='0' where login='$usuario'";
	mysql_query($update);
	echo "<font color='#FF0000'>### Ok! A imagem foi APAGADA com êxito.</font><br>";
}

	$query = mysql_query("select * from usuarios where login='$usuario'");
	$l = mysql_fetch_array($query);
?> 

<form method="post" enctype="multipart/form-data" action="user.php?edit=pessoais#1234">
<table border="0" cellpadding="4" cellspacing="0" width="100%" style="border-collapse: collapse" bordercolor="#111111">
  <tr>
    <td width="100%">
    <p align="center">
	<?
	$nova_largura= 250;
	$nova_altura = "imagesY($l[foto])*$nova_largura/imagesX($l[foto])";
	if ($l[foto]) { echo "<img border='0' src='imagens/user/fotos/$l[foto]' width='$nova_largura' style='border: 3px solid #FF8000'>"; }
	else { echo "<img border='0' src='imagens/user/fotos/modelo.gif' style='border: 3px solid #FF8000' width='200'>";}?><br>&nbsp;</td>
  </tr>
  <tr>
    <td width="100%">
    <p align="center"><u>Adicione ou atualize sua foto:</u></td>
  </tr>
  <tr>
    <td width="100%">
    <p align="center">
    <input type="file" name="arquivo" size="20" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
    <input type="submit" name="submit" value="Atualizar" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
    <input type="submit" name="deletarfoto" value="Deletar?" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
</table>
</form>