<?
include 'conexao.php';

if (($id) and (!$deletar)) {
include ("inc/forum/msg.php");
}

else if ($ver) {
include ("inc/forum/msg_ver.php");
}

else if ($novamsg) {
include ("inc/forum/nova.php");
}

else if ($responder) {
include ("inc/forum/responder.php");
}

else if ($busca) {
include ("inc/forum/busca.php");
}

else if ($deletar) {
include ("inc/forum/deletar.php");
}

else {
include ("inc/forum/index.php");
}
?>