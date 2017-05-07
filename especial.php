<?
include 'conexao.php';

if ($colunista) {
$name = $colunista;
include ("inc/secoes/especial/colunista/colunista.php");
}

if ($scripter) {
$name = $scripter;
$parte = "scripter";
$partenome = "Scripter";
$nivel = 1;
}
if ($ircd) {
$name = $ircd;
$parte = "ircd";
$partenome = "IRCd Coder";
$nivel = 2;
}
if ($egg) {
$name = $egg;
$parte = "egg";
$partenome = "Eggdrop Coder";
$nivel = 3;
}
if ($php) {
$name = $php;
$parte = "php";
$partenome = "PHP Coder";
$nivel = 4;
}
if ($parte) {
include ("inc/secoes/especial/index.php");
}
?>