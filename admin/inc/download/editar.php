<?
$qualtexto = mysql_query("select * from download where id='$id'");
$qual = mysql_fetch_array($qualtexto);

if (($req == "Visualizar") and (getenv("REQUEST_METHOD") == "POST")) {

	$introdu = 1;

?>

	<p align="center"><b>Visualizando...</b></p>

	<table align="center" border="0" cellpadding="3" cellspacing="0" width="50%">
	  <tr>
	    <td width="100%"><font color="#808080"><b>Título:</b> <?=stripslashes($titulo)?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>Link:</b> <a href="<?=$link?>"><?=$link?></a></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>Descrição:</b> <?=stripslashes($descricao)?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>Imagem:</b> <a href="../<?=$imagem?>" target="_blank"><?=$imagem?></a></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>Tamanho:</b> <?=$tamanho?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>Versão:</b> <?=$versao?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>WebSite:</b> <?=$website?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>Ndown:</b> <?=$ndown?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>Categoria:</b> <?=$cat?></font></td>
	  </tr>
	</table>

<br>
<hr color="#000000" width="80%" size="1">
<br>

<?
}

if ((getenv("REQUEST_METHOD") == "POST") and ($req == "Publicar")) {

	$introdu = 1;
	$data = time();

	if (!$titulo) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Título</u>.</font><br>";
	}

	else if (!$link) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>LINK</u>.</font><br>";
	}

	else if (!$descricao) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Descriçao</u>.</font><br>";
	}

	else {

	$update = "update download set titulo='$titulo', link='$link', cat='$cat', data='$data', descricao='$descricao', imagem='$imagem', tamanho='$tamanho', versao='$versao', website='$website', ndown='$ndown', checkdown='1' where id='$id'";
	mysql_query($update);

	$ok = "Publicado";
	}

}

if ($ok) {
?>
<p align="center"><u><b>Enviar arquivo para publicação</b></u></p>
<br>
<p align="center">Arquivo <b><?=$ok?></b> com sucesso. Obrigado!</p>



<? } else { ?>
<p align="center"><u><b>Enviar Arquivo para publicação</b></u></p>

<form action="edit.php?download=editar&id=<?=$id?>" method="post">

<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="32%" align="right"><b>Título:</b></td>
    <td width="68%"><input type="text" name="titulo" value="<? if ($titulo) echo stripslashes($titulo); else echo stripslashes($qual[titulo]); ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Link:</b></td>
    <td width="68%"><input type="text" name="link" value="<? if ($link) echo $link; else echo $qual[link]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Descriçao:</b></td>
    <td width="68%"><textarea rows="10" cols="42" name="descricao" style="font-family: Verdana; font-size: 10 px"><? if ($descricao) echo stripslashes($descricao); else echo stripslashes($qual[descricao]); ?></textarea></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Imagem:</b></td>
    <td width="68%"><input type="text" name="imagem" value="<? if ($imagem) echo $imagem; else echo $qual[imagem]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Tamanho:</b></td>
    <td width="68%"><input type="text" name="tamanho" value="<? if ($tamanho) echo $tamanho; else echo $qual[tamanho]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Versão:</b></td>
    <td width="68%"><input type="text" name="versao" value="<? if ($versao) echo $versao; else echo $qual[versao]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>WebSite:</b></td>
    <td width="68%"><input type="text" name="website" value="<? if ($website) echo $website; else echo $qual[website]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Ndown:</b></td>
    <td width="68%"><input type="text" name="ndown" value="<? if ($ndown) echo $ndown; else echo $qual[ndown]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Categoria:</b></td>
    <td width="68%">
    <select size="1" name="cat" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
    <option value="">Selecione:</option>
    <option value=""></option>
	<?
	$query44 = mysql_query("select * from download_cat where nivel = '0'");
	while ($lbb = mysql_fetch_array($query44)) {
	if (!$cat) $cat = $qual[cat];
	?>
    <option value="<?=$lbb[id]?>" <? if ($lbb[id] == "$cat") echo"selected";?>><?=$lbb[nome]?></option>
	<? } ?>
    <option value=""></option>
    </select>
    </td>
  </tr>

  <tr>
    <td align="center" width="100%" valign="top" colspan="2"><br> 
    <input type="submit" name="req" value="Visualizar" style="font-family: Verdana; font-size: 10 px">
	<input type="submit" value="Publicar" name="req" style="font-family: Verdana; font-size: 10 px">
	</td>
  </tr>
</table>
</form>
<? } ?>