<table width="160" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="115" align="center" valign="middle">

	<?include ("inc/menudireita/webirc.php");?>

    </td>
  </tr>

<?
if ($PHP_SELF == "/view.php") {
include ("inc/menudireita/smiley.php");
include ("inc/menudireita/colunistas.php");
include ("inc/menudireita/scripter.php");
include ("inc/menudireita/codersegg.php");
include ("inc/menudireita/codersircd.php");
}
else if ($PHP_SELF == "/outros.php") {
include ("inc/menudireita/colunistas.php");
include ("inc/menudireita/scripter.php");
include ("inc/menudireita/codersegg.php");
include ("inc/menudireita/codersircd.php");
include ("inc/menudireita/smiley.php");
}
else if ($scripter) {
$quesera = 3; //utilizado pelo bloco de forum para selecionar os topicos
include ("inc/menudireita/scripter.php");
include ("inc/menudireita/dicas.php");
include ("inc/menudireita/contato.php");
include ("inc/menudireita/forum.php");
}
else if ($ircd) {
$quesera = 4; //utilizado pelo bloco de forum para selecionar os topicos
include ("inc/menudireita/codersircd.php");
include ("inc/menudireita/dicas.php");
include ("inc/menudireita/contato.php");
include ("inc/menudireita/forum.php");
}
else if ($egg) {
$quesera = 5; //utilizado pelo bloco de forum para selecionar os topicos
include ("inc/menudireita/codersegg.php");
include ("inc/menudireita/dicas.php");
include ("inc/menudireita/contato.php");
include ("inc/menudireita/forum.php");
}
else if ($php) {
include ("inc/menudireita/codersphp.php");
include ("inc/menudireita/dicas.php");
include ("inc/menudireita/contato.php");
include ("inc/menudireita/forum.php");
}
else if ($colunista) {
include ("inc/menudireita/colunistas.php");
include ("inc/menudireita/contato.php");
include ("inc/menudireita/forum.php");
}
else {
include ("inc/menudireita/colunistas.php");
include ("inc/menudireita/scripter.php");
include ("inc/menudireita/codersegg.php");
include ("inc/menudireita/codersircd.php");
//include ("inc/menudireita/publicidade.php");
}
?>

</table>