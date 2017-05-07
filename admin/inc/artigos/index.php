<form action="edit.php?artigos=editar" method="post">
<table align="center" border="0" cellpadding="0" cellspacing="3" width="40%">
  <tr>
    <td width="100%" align="center">SID:<br>
	<input type="text" name="sid" value="" size="" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"><br>
	<input type="submit" value="Editar" name="req" style="font-family: Verdana; font-size: 10 px">
	</td>
  </tr>
</table>
</form>

<form action="edit.php?artigos=deletar" method="post">
<table align="center" border="0" cellpadding="0" cellspacing="3" width="40%">
  <tr>
    <td width="100%" align="center">SID:<br>
	<input type="text" name="sid" value="" size="" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"><br>
	<input type="submit" value="Deletar" name="req" style="font-family: Verdana; font-size: 10 px">
	</td>
  </tr>
</table>
</form>

<br><br>


<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="100%" colspan="2"><b>Artigos</b></td>
  </tr>
  <?
  $artigosp = mysql_query("select * from artigos where chk = '1' order by sid desc limit 30");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><a href="../view.php?sid=<?=$artigosl[sid]?>" target="_blank" class="ircmania1"><?=$artigosl[title]?></a></td>
    <td width="31%" align="center"><a href="edit.php?artigos=editar&sid=<?=$artigosl[sid]?>">Editar</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;<a href="edit.php?artigos=deletar&sid=<?=$artigosl[sid]?>">Deletar</a></td>
  </tr>
  <? } ?>
</table>

<br>
<br>
<br>
<br>
<br>
