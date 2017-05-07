<?
include '../inc/aliases/aliasdecode.php';
$qualtexto = mysql_query("select * from aliases where id='$id'");
$qual = mysql_fetch_array($qualtexto);

if (($req == "Visualizar") and (getenv("REQUEST_METHOD") == "POST")) {

	$introdu = 1;

?>

	<p align="center"><b>Visualizando...</b></p>

	<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
	  <tr>
	    <td width="100%" colspan="2" align="center"><font color="#808080"><b>Autor:</b> <?=$autor?></font></td>
	  </tr>
	  <tr>
	    <td width="32%" align="right"><b>Aliases:</b></td>
	    <td width="68%"><?=mirc2html(stripslashes($alias))?></td>
	  </tr>
	  <tr>
	    <td width="100%" colspan="2" align="center"><font color="#808080"><b>Categoria:</b> <?=$categoria?></font></td>
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

	$update = "update aliases set categoria='$categoria', alias='$alias', autor='$autor', chkaliases='1' where id='$id'";
	mysql_query($update);

	$ok = "Publicado";

}

if ($ok) {
?>
<p align="center"><u><b>Enviar Aliases para publicação</b></u></p>
<br>
<p align="center">Aliases <b><?=$ok?></b> com sucesso. Obrigado!</p>



<? } else { ?>
<p align="center"><u><b>Enviar Arquivo para publicação</b></u></p>

<form action="edit.php?aliases=editar&id=<?=$id?>" method="post">

<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="32%" align="right"><b>Autor:</b></td>
    <td width="68%"><input type="text" name="autor" value="<? if ($autor) echo $autor; else echo $qual[autor]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Aliases:</b></td>
    <td width="68%"><textarea rows="10" cols="42" name="alias" style="font-family: Verdana; font-size: 10 px"><? if ($alias) echo stripslashes($alias); else echo stripslashes($qual[alias]); ?></textarea></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Categoria:</b></td>
    <td width="68%">
    <select size="1" name="categoria" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
    <option value="">Selecione:</option>
    <option value=""></option>
	<?
	$query44 = mysql_query("select distinct categoria from aliases");
	while ($lbb = mysql_fetch_array($query44)) {
	if (!$categoria) $categoria = $qual[categoria];
	?>
    <option value="<?=$lbb[categoria]?>" <? if ($lbb[categoria] == "$categoria") echo"selected";?>><?=$lbb[categoria]?></option>
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