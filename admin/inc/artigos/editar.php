<?
include ("../conexao.php");

$qualtexto = mysql_query("select * from artigos where sid='$sid'");
$qual = mysql_fetch_array($qualtexto);

	$titulo = htmlspecialchars($titulo);

if (($req == "Visualizar") and (getenv("REQUEST_METHOD") == "POST")) {

	$introdu = 1;

	if (!$titulo) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Tïtulo</u>.</font><br>";
	}

	else if (!$hometext) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Chamada da matéria</u>.</font><br>";
	}

?>

	<p align="center"><b>Visualizando...</b></p>

	<table border="0" align="center" cellpadding="0" cellspacing="2" width="276" bgcolor="#fdf7db">
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b><?=stripslashes($titulo)?></b></td>
	  </tr>
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b>Autor: </b><?=stripslashes($autor)?></td>
	  </tr>
	</table>
	<br>
	<table align="center" width="276" border="0" cellpadding="0" cellspacing="2">
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;">
		<?=stripslashes($hometext)?></td>
	  </tr>
	</table>
	<br>
	<table align="center" width="70%" border="0" cellpadding="0" cellspacing="2">
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;">
		<?=stripslashes($bodytext)?></td>
	  </tr>
	</table>

<br>
<hr color="#000000" width="80%" size="1">
<br>

<?
}

if ((getenv("REQUEST_METHOD") == "POST") and ($req == "Publicar")) {

	$introdu = 1;
	$data = time();

	if (!$titulo) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Título</u>.</font><br>";
	}

	else if (!$hometext) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Chamada da Matéria</u>.</font><br>";
	}

	else if ((!$topico) and ($nivel == '0')) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Tópico</u>.</font><br>";
	}

	else {

		if ($qual[time]) {
		$update = "update artigos set nivel='$nivel', title='$titulo', hometext='$hometext', bodytext='$bodytext', topic='$topico', informant='$autor', chavecanal='$chavecanal', chaverede='$chaverede' where sid='$sid'";
		mysql_query($update);
		$ok = "Publicado";
		}
		else {
		$update = "update artigos set nivel='$nivel', title='$titulo', time='$data', hometext='$hometext', bodytext='$bodytext', topic='$topico', informant='$autor', chk='1', chavecanal='$chavecanal', chaverede='$chaverede' where sid='$sid'";
		mysql_query($update);
		$ok = "Publicado";
		}

	}

}

if ((getenv("REQUEST_METHOD") == "POST") and ($req == "Atualizar")) {

	$introdu = 1;

	$update = "update artigos set nivel='$nivel', title='$titulo', time='$data', hometext='$hometext', bodytext='$bodytext', topic='$topico', informant='$autor', chk='0', chavecanal='$chavecanal', chaverede='$chaverede' where sid='$sid'";
	mysql_query($update);

	$ok = "Atualizado";

}

if ($ok) {
?>
<p align="center"><u><b>Enviar artigo para publicação</b></u></p>
<br>
<p align="center">Artigo <b><?=$ok?></b> com sucesso. Obrigado!</p>



<? } else { ?>
<p align="center"><u><b>Enviar artigo para publicação</b></u></p>

<form action="edit.php?artigos=editar&sid=<?=$sid?>" method="post">

<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="32%" align="right"><b>Nivel:</b></td>
    <td width="68%"><input type="text" name="nivel" value="<? if ($nivel) echo $nivel; else echo $qual[nivel]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"> (0 = publico)</td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Autor:</b></td>
    <td width="68%"><input type="text" name="autor" value="<? if ($autor) echo $autor; else echo $qual[informant]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Título:</b></td>
    <td width="68%"><input type="text" name="titulo" value="<? if ($titulo) echo stripslashes($titulo); else echo stripslashes($qual[title]); ?>" size="50" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Canal:</b></td>
    <td width="68%"><input type="text" name="chavecanal" value="<? if ($chavecanal) echo $chavecanal; else echo $qual[chavecanal]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Rede:</b></td>
    <td width="68%">
    <select size="1" name="chaverede" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
    <option value="">Selecione uma Rede:</option>
    <option value=""></option>
	<?
	$query44 = mysql_query("select * from redes where chkrede = 1");
	while ($lbb = mysql_fetch_array($query44)) {
	if (!$chaverede) $chaverede = $qual[chaverede];
	?>
    <option value="<?=$lbb[rede]?>" <? if ($lbb[rede] == "$chaverede") echo"selected";?>><?=$lbb[rede]?></option>
	<? } ?>
    <option value=""></option>
    </select>
    </td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Tópico:</b></td>
    <td width="68%">
    <select size="1" name="topico" style="font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
    <option value="">Selecione um tópico:</option>
    <option value=""></option>
	<?
	$query44 = mysql_query("select * from topics");
	while ($lbb = mysql_fetch_array($query44)) {
	if (!$topico) $topico = $qual[topic];
	?>
    <option value="<?=$lbb[topicid]?>" <? if ($lbb[topicid] == "$topico") echo"selected";?>><?=$lbb[topicname];?></option>
	<? } ?>
    <option value=""></option>
    </select></td>
  </tr>
  <tr>
    <td width="100%" colspan="2">&nbsp;<p align="center"><b><u>Chamada da Matéria:</u><br></b>(Parágrafo que irá aparecer na página principal)<b><br></b>
    <textarea rows="10" name="hometext" cols="64" style="font-family: Verdana; font-size: 10 px"><? if ($hometext) echo stripslashes($hometext); else echo stripslashes($qual[hometext]); ?></textarea><br>
    <br><u><b>Corpo</b></u><b><u> da Matéria:</u><br></b>(Texto completo)<b><br></b>
    <textarea rows="20" name="bodytext" cols="64" style="font-family: Verdana; font-size: 10 px"><? if ($bodytext) echo stripslashes($bodytext); else echo stripslashes($qual[bodytext]); ?></textarea></p>
  </tr>
  <tr>
    <td align="center" width="100%" valign="top" colspan="2"><br> 
    <input type="submit" name="req" value="Visualizar" style="font-family: Verdana; font-size: 10 px">
	<input type="submit" value="Publicar" name="req" style="font-family: Verdana; font-size: 10 px">
	<br><br><br>
	<input type="submit" value="Atualizar" name="req" style="font-family: Verdana; font-size: 10 px">
	</td>
  </tr>
</table>
</form>
<? } ?>