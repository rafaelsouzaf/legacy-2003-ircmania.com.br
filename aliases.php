<?
if ($categoria) {
$chavetitle = "Aliases para IRC: Frases!";
include ("inc/top.php");
include ("inc/header.php");
include ("inc/aliases/aliases.php");
include ("inc/header2.php");
include ("inc/footer.php");
}
else if ($enviar) {
$chavetitle = "Enviar Alias de IRC";
include ("inc/top.php");
include ("inc/header.php");
include ("inc/aliases/enviar.php");
include ("inc/header2.php");
include ("inc/footer.php");
}
?>