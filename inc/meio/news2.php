      <tr>
        <td height="4" background="imagens/centro_03_noticias.gif">
		</td>
      </tr>
<?
	$wherenews = "where nivel='0' and chk='1' and topic != '19' and topic != '18' and topic != '25'";
	$query = mysql_query("select * from artigos $wherenews order by time desc limit 3");

	while ($news = mysql_fetch_array($query)) {

	$qcom = mysql_query("select * from comentarios where sid='$news[sid]'");
	$qcoml = mysql_num_rows($qcom);
?>

      <tr>
        <td align="center" valign="middle" background="imagens/centro_02_noticias.gif">
			<table width="277" border="0" cellpadding="2" cellspacing="0">
			  <tr>
			    <td colspan="3">
				<a class="ircmania4" href="view.php?sid=<?=$news[sid]?>"><b><u><?=$news[title]?></b></u></a>
			    </td>
			  </tr>
			  <tr>
			    <td width="142"><span class="style3">por: </span><a href="user.php?nick=<?=$news[informant]?>"><?=$news[informant]?></a> </td>
			    <td width="134" align="right"><span class="style3"><? echo date("d/m - H:i", $news[time]);?></span></td>
			  </tr>
			</table>
		</td>
      </tr>
      <tr>
        <td align="center" valign="middle">
			<table width="277" border="0" cellpadding="2" cellspacing="0">
			  <tr>
			    <td width="100%" colspan="2" valign="top">
			    <span class="style9"><a href="view.php?sid=<?=$news[sid]?>" class="ircmania22" <? if ($news[bodytext]) echo "title='Leia Mais...'"; ?> >
			    <?=$news[hometext]?></a></span></td>
			  </tr>
			  <tr>
			    <td width="50%"><span class="style3"><strong><a href="view.php?sid=<?=$news[sid]?>"><? if ($qcoml) echo "Comentários: ".$qcoml; else echo "Comentar?"; ?></a></strong></span></td>
			    <td width="50%" align="right">
				<img src="imagens/centro_01_print.gif" width="14" height="11">&nbsp;
				<img src="imagens/centro_01_amigo.gif" width="14" height="11">&nbsp;</td>
			  </tr>
			</table>
        </td>
      </tr>
      <tr>
        <td height="7"> </td>
      </tr>
<? } ?>