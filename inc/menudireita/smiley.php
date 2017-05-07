  <tr>
    <td><img src="imagens/direita_smiley.gif" width="160" height="23"></td>
  </tr>

  <tr>
    <td height="117" align="center" valign="middle">

<?
	$querysmiley = mysql_query("select * from dircionario_smileys where checkdir = '1' order by rand()");
	$smiley = mysql_fetch_array($querysmiley);

	echo "<font size=7>".$smiley[smiley]."</font><br><br><a href='outros.php?dircionario_smileys=ok' class='ircmania1'><u>".$smiley[descricao]."</u></a>";
?>

    </td>
  </tr>