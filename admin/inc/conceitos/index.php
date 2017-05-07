<form action="edit.php?conceitos=editar" method="post">
<table align="center" border="0" cellpadding="0" cellspacing="3" width="40%">
  <tr>
    <td width="100%" align="center">ID:<br>
	<input type="text" name="id" value="" size="" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"><br>
	<input type="submit" value="Editar" name="req" style="font-family: Verdana; font-size: 10 px">
	</td>
  </tr>
</table>
</form>

<form action="edit.php?conceitos=deletar" method="post">
<table align="center" border="0" cellpadding="0" cellspacing="3" width="40%">
  <tr>
    <td width="100%" align="center">ID:<br>
	<input type="text" name="id" value="" size="" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"><br>
	<input type="submit" value="Deletar" name="req" style="font-family: Verdana; font-size: 10 px">
	</td>
  </tr>
</table>
</form>

<br><br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="50%">
  <tr>
    <td width="100%" colspan="2"><b>Conceitos</b></td>
  </tr>
  <?
  $artigosp = mysql_query("select * from dircionario_conceitos where checkdir = '1' order by data desc limit 30");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><?=$artigosl[palavra]?></a></td>
    <td width="31%" align="center"><a href="edit.php?conceitos=editar&id=<?=$artigosl[id]?>">Editar</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;<a href="edit.php?conceitos=deletar&id=<?=$artigosl[id]?>">Deletar</a></td>
  </tr>
  <? } ?>
</table>

<br>
<br>
<br>
<br>
<br>