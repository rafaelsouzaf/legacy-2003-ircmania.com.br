<?
include ("inc/user/extra/top.php");

	$assunto = htmlentities("$assunto");
	$texto = htmlentities("$texto");

$query = mysql_query("select * from extra_novidades where usuario='$usuario' and id='$editing'");
$l = mysql_fetch_array($query);
if (!$l[assunto]) die();

if (getenv("REQUEST_METHOD") == "POST") {

	if ((!$assunto) or (!$texto)) {
	echo "<font color='#FF0000'>* Preencha os campos <u>Assunto</u> ou <u>Texto</u>.</font><br>";
	}

	else {
	$update = "update extra_novidades set assunto='$assunto', texto='$texto' where id='$editing'";
	mysql_query($update);
	$l[assunto] = $assunto;
	$l[texto] = $texto;
	echo "<font color='#FF0000'>Perfeito!<br>Novidade atualizada com sucesso!</font><br>";
	}
}
?>
<p align="center"><u><b>Novidades: Atualizando Textos!</b></u></p>
<br>
<form action="user.php" method="post">
<input type="hidden" value="<?=$parte?>" name="edit">
<input type="hidden" value="edit" name="novidades">
<input type="hidden" value="<?=$editing?>" name="editing">

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="100%">
  <tr>
    <td width="41%">Assunto:</td>
    <td width="59%"><input type="text" name="assunto" value="<?=stripslashes($l[assunto])?>" maxlength="50" size="42" style="font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="41%">Texto:</td>
    <td width="59%"><textarea rows="11" name="texto" cols="46" style="font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"><?=stripslashes($l[texto])?></textarea></td>
  </tr>
</table>
<br>
<input type="submit" value="Atualizar" style="font-family: Verdana; font-size: 10 px; float: right">
</form>