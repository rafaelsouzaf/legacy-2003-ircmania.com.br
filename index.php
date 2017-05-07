<?
if ($_SERVER["HTTP_HOST"] == "chatmania.ubbi.com.br") {
header ("Location: chatmania.php");
//header ("Location: busca.php?redeirc=&palavra=");
}

include ("inc/top.php");
?>
<table align="center" width="778" height="217" border="0" cellpadding="0" cellspacing="0"  bgcolor="#FDFFDC">
  <tr valign="top">
    <td width="153" rowspan="2" background="imagens/menu_bg.gif">
    <?include ("inc/menu.php");?></td>
    <td colspan="2">
    <img border="0" src="imagens/centro_top.gif" width="465" height="13"></td>
    <td width="160" rowspan="2" background="imagens/direita_bg.gif"><?include ("inc/menudireita/index.php");?></td>
  </tr>
  <tr valign="top">
    <td width="292" align="center">
	<?
	include ("inc/meio/index.php");
	?>
    </td>
  </tr>
</table>
<?
include ("inc/footer.php");
?>
