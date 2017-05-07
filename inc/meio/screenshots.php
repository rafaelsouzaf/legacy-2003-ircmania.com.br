<?
	$queryscreen = mysql_query("select * from download where checkdown='1' and imagem != '' and cat='4' order by id desc");
	$screens = mysql_fetch_array($queryscreen);
?>
<table width="169" border="0" cellpadding="0" cellspacing="0" background="imagens/centr_02_screenshots.gif">
  <tr>
    <td height="7" valign="top">
    </td>
  </tr>
  <tr>
    <td align="center" valign="top">
    <table width="150" height="38" border="0" cellpadding="2" cellspacing="0">
      <tr>
        <td><span class="style2"><u>Experimente e comente o script abaixo!</u></span></td>
      </tr>
      <tr>
        <td height="90" align="center">
		<?
		$nova_largura= 110;
		$nova_altura = "imagesY($screens[imagem])*$nova_largura/imagesX($screens[imagem])";
		echo "<a href='download.php?detalhes=$screens[id]'><img border='0' src='$screens[imagem]' width='$nova_largura' title='$screens[titulo]'></a>";
		?>
        </td>
      </tr>
      <tr>
        <td height="30" align="center"><strong><a href="download.php?detalhes=<?=$screens[id]?>" class="ircmania1"><?=$screens[titulo]?></a></strong></td>
      </tr>
    </table>
    </td>
  </tr>
</table>