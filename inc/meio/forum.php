<?
function limitechars ($texto) {
	unset($final);
	$bah = explode (" ", $texto);
	for ($bah3 = 0; $bah3 <= count($bah); $bah3++) {
		if (strlen($bah[$bah3]) > 13) { $bah2 = substr($bah[$bah3], 0, 13)."(...)"; }
		else { $bah2 = $bah[$bah3]; }
		$final .= $bah2 ." ";
	}
	return trim($final);
}

$queryfor = mysql_query("select * from forum_msg where reid = '0' order by id desc limit 5");
while ($queryforl = mysql_fetch_array($queryfor)) {

$numcom = mysql_query("select * from forum_msg where reid = '$queryforl[id]'");
$numcoml = mysql_num_rows($numcom);

$mensagem = substr($queryforl[mensagem], 0, 100);
$mensagem = strtolower(stripslashes($mensagem));

$mensagem = limitechars($mensagem);
?>

  <tr>
    <td height="90" align="center" valign="middle" class="style2">
    <table width="156" height="18" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><span class="style3"><b>[<?=$queryforl[autor]?>]</b></span>
		<a href="forum.php?ver=<?=$queryforl[id]?>" class="ircmania5" title="Respostas: <?=$numcoml?>"><?=ucfirst($mensagem)?></a> (...)<br>
        <img src="imagens/carinhas.gif" width="77" height="17"> </td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td height="1" align="center" class="style2">
    <img src="imagens/centro_02_chatbox_1pxh.gif" width="169" height="1"></td>
  </tr>

<?
}
?>