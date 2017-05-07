<?
	$query3 = mysql_query("select login,$parte from usuarios where login='$usuario'");
	$ls = mysql_fetch_array($query3);

	if (!$ls[$parte]) {
	die();
	}

	if ($parte == "colunista") $xmostra = 1;
?>

Seção: <font color="#FF0000"><b><?=$parte?></b></font>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
  <tr>
    <td width="100%">
    <ul>
      <li><a href="user.php?edit=<?=$parte?>&artigos=ok" class="ircmania1"><u>Inserir/Editar <b>Artigos</b></u></a></li>
      <? if (!$xmostra) { ?><li><a href="user.php?edit=<?=$parte?>&novidades=ok" class="ircmania1"><u>Inserir/Editar <b>Novidades</b></u></a></li><? } ?>
      <? if (!$xmostra) { ?><li><a href="user.php?edit=<?=$parte?>&dicas=ok" class="ircmania1"><u>Inserir/Editar <b>Dicas</b></u></a></li><? } ?>
      <? if (!$xmostra) { ?><li><a href="user.php?edit=<?=$parte?>&upload=ok" class="ircmania1"><u>Inserir/Editar <b>Arquivo</b></u></a></li><? } ?>
    </ul>
    </td>
  </tr>
</table>
<hr color="#C0C0C0" width="80%" size="1">
<br>