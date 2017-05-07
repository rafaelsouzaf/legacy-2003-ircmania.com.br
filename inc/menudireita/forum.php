  <tr>
    <td><img src="imagens/direita_forum.gif" width="160" height="23"></td>
  </tr>

  <tr>
    <td height="117" align="center" valign="middle">

	<?
	function limitecharsc ($texto) {
		unset($final);
		$bah = explode (" ", $texto);
		for ($bah3 = 0; $bah3 <= count($bah); $bah3++) {
			if (strlen($bah[$bah3]) > 13) { $bah2 = substr($bah[$bah3], 0, 13)."(...)"; }
			else { $bah2 = $bah[$bah3]; }
			$final .= $bah2 ." ";
		}
		return trim($final);
	}

	if (!$quesera) $quesera = 1;
	
	$queryfor = mysql_query("select * from forum_msg where reid = '0' and catid= '$quesera' order by id desc limit 4");
	while ($queryforl = mysql_fetch_array($queryfor)) {

	$numcom = mysql_query("select * from forum_msg where reid = '$queryforl[id]'");
	$numcoml = mysql_num_rows($numcom);
	
	$mensagem = substr($queryforl[mensagem], 0, 130);
	$mensagem = strtolower(stripslashes($mensagem));
	
	$mensagem = limitecharsc($mensagem);
	?>
	
		<table border="0" cellpadding="4" cellspacing="0" width="100%" background="imagens/direita_userreg_bg.gif">
		  <tr>
		    <td width="100%"><span class="style1"><?=$queryforl[autor]?></span><br>
		    <span class="style2"><a href="forum.php?ver=<?=$queryforl[id]?>" class="ircmania1" title="Respostas: <?=$numcoml?>"><?=ucfirst($mensagem)?></a> (...)</span></td>
		  </tr>
		  <tr>
		    <td height="1">
		    <img src="imagens/direita_userreg_azul_bg.gif" width="152" height="1"></td>
		  </tr>
		</table>
	
	
	<?
	}
	?>

    </td>
  </tr>