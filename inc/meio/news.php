<?
	$wherenews = "where nivel='0' and chk='1' and topic != '19' and topic != '18' and topic != '25'";
	$query = mysql_query("select * from artigos $wherenews order by time desc limit 3");

	while ($news = mysql_fetch_array($query)) {

	$qcom = mysql_query("select * from comentarios where sid='$news[sid]'");
	$qcoml = mysql_num_rows($qcom);
?>

      <tr>
        <td height="30" align="center" valign="middle" background="imagens/centro_01_noticias.gif">
			<table width="276" height="30" border="0" cellpadding="0" cellspacing="0">
			  <tr>
			    <td colspan="3"><span class="style5"><?=$news[title]?>
			    </span></td>
			  </tr>
			  <tr>
			    <td width="142"><span class="style8">por: </span><a href="user.php?nick=<?=$news[informant]?>"><?=$news[informant]?></a> </td>
			    <td width="134" align="right"><span class="style8"><? echo date("d/m/y - H:i", $news[time]);?></span></td>
			  </tr>
			</table>
      </tr>
      <tr>
        <td align="center" valign="middle">
			<table border="0" cellpadding="0" cellspacing="3" width="277">
			  <tr>
			    <td width="100%" colspan="2" valign="top">
			    <span class="style9"><a href="view.php?sid=<?=$news[sid]?>" class="ircmania22">
			    <?=$news[hometext]?></a></span></td>
			  </tr>
			  <tr>
			    <td width="50%"><span class="style3"><strong><a href="view.php?sid=<?=$news[sid]?>"><? if ($qcoml) echo "Comentários: ".$qcoml; else echo "Comentar?"; ?></a></strong></span></td>
			    <td width="50%" align="right">
			        <img src="imagens/centro_01_print.gif" width="14" height="11">&nbsp;
			        <img src="imagens/centro_01_amigo.gif" width="14" height="11"> </td>
			  </tr>
			</table>
        </td>
      </tr>

<? } ?>