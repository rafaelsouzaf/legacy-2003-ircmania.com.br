<?
include ("inc/top.php");
include ("inc/header.php");

if ($edit == "scripter") {
$parte = "scripter";
$nivel = 1;
}
if ($edit == "ircd") {
$parte = "ircd";
$nivel = 2;
}
if ($edit == "egg") {
$parte = "egg";
$nivel = 3;
}
if ($edit == "php") {
$parte = "php";
$nivel = 4;
}
if ($edit == "colunista") {
$parte = "colunista";
$nivel = 5;
}

if (($usuario) and ($edit == "pessoais")) {
include ("inc/user/pessoais.php");
}
else if (($usuario) and ($edit == "opcoes")) {
include ("inc/user/opcoes.php");
}
else if (($usuario) and ($edit == "senha")) {
include ("inc/user/senha.php");
}
else if (($usuario) and ($edit == "cancelar")) {
include ("inc/user/cancelar.php");
}


else if (($usuario) and ($edit) and ($artigos == "ok")) {
include ("inc/user/extra/artigos.php");
}
else if (($usuario) and ($edit) and ($artigos == "edit")) {
include ("inc/user/extra/artigos_edit.php");
}
else if (($usuario) and ($edit) and ($artigos == "delete")) {
include ("inc/user/extra/artigos_delete.php");
}
else if (($usuario) and ($edit != "colunista") and ($novidades == "ok")) {
include ("inc/user/extra/novidades.php");
}
else if (($usuario) and ($edit != "colunista") and ($novidades == "edit")) {
include ("inc/user/extra/novidades_edit.php");
}
else if (($usuario) and ($edit != "colunista") and ($novidades == "delete")) {
include ("inc/user/extra/novidades_delete.php");
}
else if (($usuario) and ($edit != "colunista") and ($dicas == "ok")) {
include ("inc/user/extra/dicas.php");
}
else if (($usuario) and ($edit != "colunista") and ($dicas == "edit")) {
include ("inc/user/extra/dicas_edit.php");
}
else if (($usuario) and ($edit != "colunista") and ($dicas == "delete")) {
include ("inc/user/extra/dicas_delete.php");
}
else if (($usuario) and ($edit != "colunista") and ($upload) and ($delete)) {
include ("inc/user/extra/upload_delete.php");
}
else if (($usuario) and ($edit != "colunista") and ($upload)) {
include ("inc/user/extra/upload.php");
}
else if (($usuario) and ($edit)) {
include ("inc/user/extra/index.php");
}


else if (($usuario) and ($rede)) {
include ("inc/user/rede.php");
}


else if (($usuario) and (!$nick)) {
include ("inc/user/inicio.php");
}
else if ($nick) {
include ("inc/user/nick.php");
}


include ("inc/header2.php");
include ("inc/footer.php");
?>