<?
if ($add) {
include ("inc/top.php");
include ("inc/header.php");
include ("inc/comentarios/add.php");
include ("inc/header2.php");
include ("inc/footer.php");
}
else if ($reply) {
include ("inc/top.php");
include ("inc/header.php");
include ("inc/comentarios/reply.php");
include ("inc/header2.php");
include ("inc/footer.php");
}
else if ($view) {
include ("inc/top.php");
include ("inc/header.php");
include ("inc/comentarios/view.php");
include ("inc/header2.php");
include ("inc/footer.php");
}
else if ($deletar) {
include ("inc/top.php");
include ("inc/header.php");
include ("inc/comentarios/deletar.php");
include ("inc/header2.php");
include ("inc/footer.php");
}
else {
include ("inc/comentarios/comentarios.php");
}
?>