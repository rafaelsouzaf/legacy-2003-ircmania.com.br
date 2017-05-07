<?
$qualtexto = mysql_query("select * from dircionario_conceitos where id='$id'");
$qual = mysql_fetch_array($qualtexto);

	$conceito = htmlentities("$conceito");
	$descricao = htmlentities("$descricao");

if (($req == "Visualizar") and (getenv("REQUEST_METHOD") == "POST")) {

	$introdu = 1;

?>

	<p align="center"><b>Visualizando...</b></p>

	<table align="center" border="0" cellpadding="3" cellspacing="0" width="50%">
	  <tr>
	    <td width="100%"><font color="#808080"><b>Autor:</b> <?=$autor?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>Conceito:</b> <?=stripslashes($conceito)?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>Descrição:</b> <?=stripslashes($descricao)?></font></td>
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

	$update = "update dircionario_conceitos set palavra='$conceito', descricao='$descricao', autor='$autor', checkdir='1', data='$data' where id='$id'";
	mysql_query($update);

	$ok = "Publicado";

}

if ($ok) {
?>
<p align="center"><u><b>Adicionar Conceito</b></u></p>
<br>
<p align="center">Conceito <b><?=$ok?></b> com sucesso. Obrigado!</p>



<? } else { ?>
<p align="center"><u><b>Enviar Conceito para publicação</b></u></p>

<form action="edit.php?conceitos=editar&id=<?=$id?>" method="post">

<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="32%" align="right"><b>Autor:</b></td>
    <td width="68%"><input type="text" name="autor" value="<? if ($autor) echo $autor; else echo $qual[autor]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Conceito:</b></td>
    <td width="68%"><input type="text" name="conceito" value="<? if ($conceito) echo stripslashes($conceito); else echo stripslashes($qual[palavra]); ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Descrição:</b></td>
    <td width="68%"><input type="text" name="descricao" value="<? if ($descricao) echo stripslashes($descricao); else echo stripslashes($qual[descricao]); ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
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