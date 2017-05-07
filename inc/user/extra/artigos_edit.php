<?
include ("inc/user/extra/top.php");

	$titulo = htmlentities("$titulo");
	$hometext = htmlentities("$hometext");
	$bodytext = htmlentities("$bodytext");

$query = mysql_query("select * from artigos where informant='$usuario' and sid='$editing' and nivel!='0'");
$l = mysql_fetch_array($query);
if (!$l[title]) die();

if (getenv("REQUEST_METHOD") == "POST") {

	if (($titulo == null) or ($hometext == null)) {
	echo "<font color='#FF0000'>* Preencha os campos <u>Título</u> ou <u>Chamada da Matéria</u>.</font><br>";
	}

	else {

	$update = "update artigos set title='$titulo', hometext='$hometext', bodytext='$bodytext' where sid='$editing' and informant='$usuario' and nivel!='0'";
	mysql_query($update);
	$l[title] = $titulo;
	$l[hometext] = $hometext;
	$l[bodytext] = $bodytext;
	echo "<font color='#FF0000'>Perfeito!<b><br> Artigo atualizado com sucesso!</font><br>";
}
}
?>
<p align="center"><u><b>Atualizando Textos!</b></u></p>
<br>
<form action="user.php" method="post">
<input type="hidden" value="<?=$parte?>" name="edit">
<input type="hidden" value="edit" name="artigos">
<input type="hidden" value="<?=$editing?>" name="editing">

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="100%">
  <tr>
    <td width="32%"><b>Autor:</b></td>
    <td width="68%">
    <input type="text" name="autor" value="<?=$usuario?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1" disabled>
    </td>
  </tr>
  <tr>
    <td width="32%"><b>Título:</b></td>
    <td width="68%">
    <input type="text" name="titulo" value="<?=stripslashes($l[title])?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2">&nbsp;<p align="center"><b><u>Chamada da Matéria:</u><br></b>(Parágrafo introdutório)<b><br></b>
    <textarea rows="10" name="hometext" cols="64" style="font-family: Verdana; font-size: 10 px"><?=stripslashes($l[hometext])?></textarea><br>
    <br>
    <u><b>Corpo</b></u><b><u> da Matéria:</u><br>
    </b>(Texto completo)<b><br>
    </b>
    <textarea rows="20" name="bodytext" cols="64" style="font-family: Verdana; font-size: 10 px"><?=stripslashes($l[bodytext])?></textarea></p>
  </tr>
</table>
<br>
<input type="submit" value="Atualizar" style="font-family: Verdana; font-size: 10 px; float: right">
</form>