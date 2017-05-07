
<table align="center" border="0" cellpadding="3" cellspacing="0" width="50%">
  <tr>
    <td width="100%" colspan="2"><b>Redes</b></td>
  </tr>
  <?
  $artigosp = mysql_query("select * from redes where chkrede = '1' order by rede desc limit 30");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><?=$artigosl[rede]?></a></td>
    <td width="31%" align="center"><a href="edit.php?redes=editar&rede=<?=$artigosl[rede]?>">Editar</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;<a href="edit.php?redes=deletar&rede=<?=$artigosl[rede]?>">Deletar</a></td>
  </tr>
  <? } ?>
</table>

<br>
<br>
<br>
<br>
<br>
