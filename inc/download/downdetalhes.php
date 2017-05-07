<?
include ("inc/download/downtop.php"); 

	$query = mysql_query("select * from download where checkdown='1' and id='$detalhes'");
	$lcat = mysql_fetch_array($query);
	$imgsize = GetImageSize("$lcat[imagem]");
?>

<table align="center" border="0" cellpadding="3" cellspacing="0" width="90%">
  <tr>
    <td width="100%" colspan="2"><b>
    <img border="0" src="imagens/down.gif" width="9" height="9">&nbsp;</b><font color="#000000"><a href="download.php?get=<?=$lcat[id];?>" class="ircmania1"><b><u><?=$lcat[titulo];?></u></b></a> <?if ($lcat[imagem]) { echo "(<a href='$lcat[imagem]' target='_blank'>Imagem</a>)";} ?></font></td>
  </tr>
  <tr>
    <td width="100%" colspan="2"><font color="#808080"><b>Descrição:</b> <?=$lcat[descricao];?></font></td>
  </tr>
<? if ($lcat[nivel] == 0) { ?>
  <tr>
    <td width="100%" colspan="2"><font color="#808080"><b>Desenvolvedor:</b> <? if ($lcat[website]) { echo "<a href='$lcat[website]' target='_blank'>"; } ?><?=$lcat[website];?></a></font></td>
  </tr>
  <tr>
    <td width="50%"><font color="#808080"><b>Tamanho:</b> <?=$lcat[tamanho];?></font></td>
    <td width="50%"><font color="#808080"><b>Versão:</b> <?=$lcat[versao];?></font></td>
  </tr>
<? } ?>
  <tr>
    <td width="50%"><font color="#808080"><b>Data:</b> <? echo date("d/m/y - H:i", $lcat["data"]);?></font></td>
    <td width="50%"><font color="#808080"><b>Download:</b> <?=$lcat[ndown];?></font></td>
  </tr>
</table>
<br><br>
<?
include ("inc/download/downcomentarios.php");
?>