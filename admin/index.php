<?
include ("top.php");
?>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="100%" colspan="2"><b><a href="edit.php?estatistica=index" class="ircmania1">Estatística</a></b></td>
  </tr>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="100%" colspan="2"><b><a href="edit.php?usuarios=index" class="ircmania1">Usuários</a></b></td>
  </tr>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="100%" colspan="2"><b><a href="edit.php?artigos=index" class="ircmania1">Artigos</a></b></td>
  </tr>
  <?
  $artigosp = mysql_query("select * from artigos where nivel = '0' and chk = '0' order by sid desc");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><font color="#FF8040"><?=stripslashes($artigosl[title])?></font></td>
    <td width="31%" align="center"><a href="edit.php?artigos=editar&sid=<?=$artigosl[sid]?>">Editar</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;<a href="edit.php?artigos=deletar&sid=<?=$artigosl[sid]?>">Deletar</a></td>
  </tr>
  <? } ?>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="100%" colspan="2"><b><a href="edit.php?download=index" class="ircmania1">Downloads</a></b></td>
  </tr>
  <?
  $artigosp = mysql_query("select * from download where nivel = '0' and checkdown = '0' order by id desc");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><font color="#FF8040"><?=stripslashes($artigosl[titulo])?></td>
    <td width="31%" align="center"><a href="edit.php?download=editar&id=<?=$artigosl[id]?>">Editar</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;<a href="edit.php?download=deletar&id=<?=$artigosl[id]?>">Deletar</a></td>
  </tr>
  <? } ?>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="100%" colspan="2"><b><a href="edit.php?redes=index" class="ircmania1">Redes</a></b></td>
  </tr>
  <?
  $artigosp = mysql_query("select * from redes where chkrede = '0'");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><?=$artigosl[rede]?></td>
    <td width="31%" align="center"><a href="edit.php?redes=editar&rede=<?=$artigosl[rede]?>">Editar</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;<a href="edit.php?redes=deletar&rede=<?=$artigosl[rede]?>">Deletar</a></td>
  </tr>
  <? } ?>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="100%" colspan="2"><b><a href="edit.php?aliases=index" class="ircmania1">Aliases</a></b></td>
  </tr>
  <?
  include '../inc/aliases/aliasdecode.php';
  $artigosp = mysql_query("select * from aliases where chkaliases = '0'");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><?=mirc2html($artigosl[alias])?></td>
    <td width="31%" align="center"><a href="edit.php?aliases=editar&id=<?=$artigosl[id]?>">Editar</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;<a href="edit.php?aliases=deletar&id=<?=$artigosl[id]?>">Deletar</a></td>
  </tr>
  <? } ?>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="100%" colspan="2"><b><a href="edit.php?abreviaturas=index" class="ircmania1">Abreviaturas</a></b></td>
  </tr>
  <?
  $artigosp = mysql_query("select * from dircionario_abreviaturas where checkdir = '0'");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><?=$artigosl[palavra]?></td>
    <td width="31%" align="center"><a href="edit.php?abreviaturas=editar&palavra=<?=$artigosl[palavra]?>">Editar</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;<a href="edit.php?abreviaturas=deletar&palavra=<?=$artigosl[palavra]?>">Deletar</a></td>
  </tr>
  <? } ?>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="100%" colspan="2"><b><a href="edit.php?comandos=index" class="ircmania1">Comandos</a></b></td>
  </tr>
  <?
  $artigosp = mysql_query("select * from dircionario_comandos where checkdir = '0'");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><?=$artigosl[comando]?></td>
    <td width="31%" align="center"><a href="edit.php?comandos=editar&id=<?=$artigosl[id]?>">Editar</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;<a href="edit.php?comandos=deletar&id=<?=$artigosl[id]?>">Deletar</a></td>
  </tr>
  <? } ?>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="100%" colspan="2"><b><a href="edit.php?conceitos=index" class="ircmania1">Conceitos</a></b></td>
  </tr>
  <?
  $artigosp = mysql_query("select * from dircionario_conceitos where checkdir = '0'");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><?=$artigosl[palavra]?></td>
    <td width="31%" align="center"><a href="edit.php?conceitos=editar&id=<?=$artigosl[id]?>">Editar</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;<a href="edit.php?conceitos=deletar&id=<?=$artigosl[id]?>">Deletar</a></td>
  </tr>
  <? } ?>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="100%" colspan="2"><b><a href="edit.php?smileys=index" class="ircmania1">Smiley</a></b></td>
  </tr>
  <?
  $artigosp = mysql_query("select * from dircionario_smileys where checkdir = '0'");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><?=$artigosl[smiley]?></td>
    <td width="31%" align="center"><a href="edit.php?smileys=editar&id=<?=$artigosl[id]?>">Editar</a>&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;<a href="edit.php?smileys=deletar&id=<?=$artigosl[id]?>">Deletar</a></td>
  </tr>
  <? } ?>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="100%" colspan="2"><b>Extra (Artigos publicados)</b></td>
  </tr>
  <?
  $artigosp = mysql_query("select * from artigos where topic = '0' order by sid desc limit 10");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><?=stripslashes($artigosl[title])?></td>
    <td width="31%" align="center"><a href="../view.php?sid=<?=$artigosl[sid]?>" target="_blank">Apenas Ver</a></td>
  </tr>
  <? } ?>
</table>

<br>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="80%">
  <tr>
    <td width="100%" colspan="2"><b>Extra (Arquivos publicados)</b></td>
  </tr>
  <?
  $artigosp = mysql_query("select * from download where nivel != '0' order by id desc limit 10");
  while ($artigosl = mysql_fetch_array($artigosp)) {
  ?>
  <tr>
    <td width="69%"><?=stripslashes($artigosl[titulo])?></td>
    <td width="31%" align="center"><a href="../especial.php?php=rsf&detalhes=<?=$artigosl[id]?>" target="_blank">Apenas Ver</a></td>
  </tr>
  <? } ?>
</table>