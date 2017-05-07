<?
include ("inc/user/extra/top.php");

	$titulo = htmlentities("$titulo");
	$hometext = htmlentities("$hometext");
	$bodytext = htmlentities("$bodytext");

if (($req == "Visualizar") and (getenv("REQUEST_METHOD") == "POST")) {

	$introdu = 1;

	if (!$titulo) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Tïtulo</u>.</font><br>";
	}

	else if (!$hometext) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Chamada da matéria</u>.</font><br>";
	}

?>

	<p align="center"><b>Visualizando...</b><br></p>

	<table border="0" align="center" cellpadding="0" cellspacing="2" width="80%" bgcolor="#fdf7db">
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b><?=stripslashes($titulo)?></b></td>
	  </tr>
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b>Autor: </b><?=$usuario?></td>
	  </tr>
	</table>
	<br>
	<table align="center" width="276" border="0" cellpadding="0" cellspacing="2">
	  <tr>
	    <td width="100%"><p align="justify"><font face="Verdana"><span style="font-size: 11px;">
		<?=nl2br(stripslashes($hometext))?></td>
	  </tr>
	</table>
	<br>
	<table align="center" width="90%" border="0" cellpadding="0" cellspacing="2">
	  <tr>
	    <td width="100%"><p align="justify"><font face="Verdana"><span style="font-size: 11px;">
		<?=nl2br(stripslashes($bodytext))?></td>
	  </tr>
	</table>
	<br>

<?
}

if ((getenv("REQUEST_METHOD") == "POST") and ($req == "Publicar")) {

	$introdu = 1;

	if ($titulo == null) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Título</u>.</font><br>";
	}

	else if ($hometext == null) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Chamada da Matéria</u>.</font><br>";
	}

	else {

	$data = time();
    $sql = "INSERT INTO artigos (nivel, title, time, hometext, bodytext, informant, chk) VALUES ('$nivel', '$titulo', '$data', '$hometext', '$bodytext', '$usuario', '1')"; 
    mysql_query($sql);

	mail("ircmania@ircmania.com.br", "News to Extra", "Usuario: $usuario \n\nTitulo: $titulo\n\nCampo1: $hometext\n\n",
	"From: IRCmania <ircmania@ircmania.com.br>\r\n"
	."X-Mailer: PHP/" . phpversion());

	$ok = 1;
	}

}

if ($ok) {
?>
<p align="center"><u><b>Publicado</b></u></p>
<p align="center">Artigo <u>publicado</u> com sucesso. Obrigado! Seu artigo já 
pode ser visto através do endereço:</p>
<p align="center"><a href="http://www.ircmania.com.br/especial.php?<?=$parte?>=<?=$usuario?>">
http://www.ircmania.com.br/especial.php?<?=$parte?>=<?=$usuario?></a></p>

<? } else { ?>
<p align="center"><u><b>Enviar artigo para publicação</b></u></p>
<?
if (!$introdu) {
?>
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify"><u>Você é responsável pelo que você escreve</u>. O texto 
    não passará por nenhuma edição por parte da administração do site. <b>Não são aceitos códigos HTML</b>.<br>
	<? if ($parte == "colunista") { ?>
    <br><i><b>Colunista</b>: Após publicado, o texto fica a disposição da moderação 
    do site para ser aproveitado também no TOP da página principal, nesse caso o texto 
    será revisado e formatado de acordo com as exigências do nosso design.</i><br>
    <br>
	<? } ?>
    Textos que não estejam de acordo com os critérios abaixo poderão ser deletados.</p>
    <ul>
      <li>
      <p align="justify">Não conter críticas pessoais ou termos ofensivos;</li>
      <li>
      <p align="justify">Ser <u>de preferência</u> relacionado a IRC ou chat em geral;</li>
      <li>
      <p align="justify">Estar corretamente acentuado e em linguagem formal. Por favor!</li>
      <li>
      <p align="justify">Não é recomendada a publicação de textos de outros portais como Terra, UOL, etc.</li>
    </ul>
    <hr color="#000000" size="1" width="70%"></td>
  </tr>
</table>
<br>

<?
} 
?>

<form action="user.php" method="post">
<input type="hidden" value="<?=$parte?>" name="edit">
<input type="hidden" value="ok" name="artigos">
<input type="hidden" value="1" name="lrp">
<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="32%"><b>Autor:</b></td>
    <td width="68%">
    <input type="text" name="autor" value="<?=$usuario?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1" disabled>
    </td>
  </tr>
  <tr>
    <td width="32%"><b>Título:</b></td>
    <td width="68%">
    <input type="text" name="titulo" value="<?=stripslashes($titulo)?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1">
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2">&nbsp;<p align="center"><b><u>Chamada da Matéria:</u><br></b>(Parágrafo introdutório)<b><br></b>
    <textarea rows="10" name="hometext" cols="64" style="font-family: Verdana; font-size: 10 px"><?=stripslashes($hometext)?></textarea><br>
    <br><?if ($lrp) { ?>
    <u><b>Corpo</b></u><b><u> da Matéria:</u><br>
    </b>(Texto completo)<b><br>
    </b>
    <textarea rows="20" name="bodytext" cols="64" style="font-family: Verdana; font-size: 10 px"><?=stripslashes($bodytext)?></textarea></p>
  <?}?>
  </tr>
  <tr>
    <td align="right" width="100%" valign="top" colspan="2">
    <input type="submit" name="req" value="Visualizar" style="font-family: Verdana; font-size: 10 px">  <?if ($lrp) { ?><input type="submit" value="Publicar" name="req" style="font-family: Verdana; font-size: 10 px"><?}?></td>
  </tr>
</table>
</form>

<?
if (!$introdu) {
?>
<br><br>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="100%">
	<?
	$query2 = mysql_query("select * from artigos where informant='$usuario' and nivel='$nivel' order by sid desc");
	while($l = mysql_fetch_array($query2)) { 
	?>
  <tr>
    <td width="74%"><u><?=stripslashes($l[title])?></u></td>
    <td width="26%"><p align="center"><a href="user.php?edit=<?=$parte?>&artigos=edit&editing=<?=$l[sid]?>">Editar</a>&nbsp; -&nbsp; <a href="user.php?edit=<?=$parte?>&artigos=delete&delete=<?=$l[sid]?>">Deletar</a></td>
  </tr>
	<?
	} 
	?>
</table>

<?
} 
}
?>