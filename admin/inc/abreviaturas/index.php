<form action="edit.php?abreviaturas=editar" method="post">
<table align="center" border="0" cellpadding="0" cellspacing="3" width="40%">
  <tr>
    <td width="100%" align="center">Palavra:<br>
	<input type="text" name="palavra" value="" size="" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"><br>
	<input type="submit" value="Editar" name="req" style="font-family: Verdana; font-size: 10 px">
	</td>
  </tr>
</table>
</form>

<form action="edit.php?abreviaturas=deletar" method="post">
<table align="center" border="0" cellpadding="0" cellspacing="3" width="40%">
  <tr>
    <td width="100%" align="center">Palavra:<br>
	<input type="text" name="palavra" value="" size="" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"><br>
	<input type="submit" value="Deletar" name="req" style="font-family: Verdana; font-size: 10 px">
	</td>
  </tr>
</table>
</form>

<br><br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="50%">
  <tr>
    <td width="100%" colspan="2"><b>Abreviaturas</b></td>
  </tr>
  <?
  $artigosp = mysql_query("select * from dircionario_abreviaturas where checkdir = '1' order by data desc");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><?=$artigosl[palavra]?></a></td>
    <td width="31%" align="center"><a href="edit.php?abreviaturas=editar&palavra=<?=$artigosl[palavra]?>">Editar</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;<a href="edit.php?abreviaturas=deletar&palavra=<?=$artigosl[palavra]?>">Deletar</a></td>
  </tr>
  <? } ?>
</table>

<br>
<br>
<br>
<br>
<br>