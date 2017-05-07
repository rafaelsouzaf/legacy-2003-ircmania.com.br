<script type="text/javascript">
<!--
function popupforms(myform, windowname)
{
if (! window.focus)return true;
window.open('', windowname, 'height=500,width=777,scrollbars=nos,status=no,resizable=no');
myform.target=windowname;
return true;
}
//-->
</script>

<?
function webirc ($quando) {

$irede = mysql_query("select * from redes where chkrede = '1' order by rand()");
$iredel = mysql_fetch_array($irede);

$randrede = mysql_query("select * from redes_stats where rede = '$iredel[rede]' and users > 30 order by rand()");

	if ($randol = mysql_fetch_array($randrede)) {
	global $redei, $canali, $useri;
	$redei = $randol[rede];
	$canali = $randol[canal];
	$useri = $randol[users];
	}
	else {
	++$quando;
	if ($quando >= 40) return;
	webirc($quando);
	}

}

webirc($quando);
?>

<form onsubmit="popupforms(this, 'join')" action="chat/index.php" method="post">
<table width="154" border="0" cellpadding="0" cellspacing="0" background="imagens/direita_bg2.gif">
  <tr>
    <td height="26" align="center" valign="middle">
    <input name="nick" type="text" class="formwebirc" value="<? if ($usuario) { echo $usuario; } else { echo "Apelido"; } ?>" onFocus="this.value=''"></td>
  </tr>
  <tr>
    <td height="26" align="center" valign="middle">
    <input name="canal" type="text" class="formwebirc1" value="<?if ($chavecanal) { echo $chavecanal;} else { echo $canali;} ?>">
    <input name="users" type="text" class="formwebirc2" value="<?=$useri?>" disabled>
	</td>
  </tr>
  <tr>
    <td height="26" align="center" valign="middle">
    <select size="1" name="rede" class="formwebirc">
    <option value="">Escolha a Rede:</option>
    <option value="">----</option>
	<?
	$randoqueryb = mysql_query("select * from redes where chkrede = 1");
	while ($randolb = mysql_fetch_array($randoqueryb)) {
	?>
    <option value="<?=$randolb[rede]?>" <? if ($chaverede) { if  ($randolb[rede] == $chaverede) { echo "selected";} }  else { if ($randolb[rede] == $redei) { echo "selected"; } }?>>Rede <?=$randolb[rede]?></option>
	<? } ?>
    </select></td>
  </tr>
  <tr>
    <td height="30" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="imageField" type="image" src="imagens/botao_entrar.gif" border="0" width="50" height="19"></td>
  </tr></form>
</table>