<?
include "conexao.php";
$query46 = mysql_query("select * from download_cat where id='$cat'");
$ld = mysql_fetch_array($query46);

if ($cat) {
$chavetitle = "Download: $ld[nome]";
include ("inc/top.php");
include ("inc/header.php");
include ("inc/download/downview.php");
include ("inc/header2.php");
include ("inc/footer.php");
}

else if ($deletar) {
$chavetitle = "Deletando...";
include ("inc/top.php");
include ("inc/header.php");
include ("inc/download/deletar.php");
include ("inc/header2.php");
include ("inc/footer.php");
}

else if ($id) {
$chavetitle = "Download";
include ("inc/top.php");
include ("inc/header.php");
include ("inc/download/downget.php");
include ("inc/header2.php");
include ("inc/footer.php");
}

else if ($enviar) {
$chavetitle = "Adicionar arquivos:";
include ("inc/top.php");
include ("inc/header.php");
include ("inc/download/downenviar.php");
include ("inc/header2.php");
include ("inc/footer.php");
}

else if ($palavrachave) {
$chavetitle = "Resultado da busca por \"$palavrachave\"";
include ("inc/top.php");
include ("inc/header.php");
include ("inc/download/downbusca.php");
include ("inc/header2.php");
include ("inc/footer.php");
}

else if ($visit) {
$chavetitle = "Os mais baixados";
include ("inc/top.php");
include ("inc/header.php");
include ("inc/download/downvisitados.php");
include ("inc/header2.php");
include ("inc/footer.php");
}

else if ($detalhes) {
$chavetitle = "Download";
include ("inc/top.php");
include ("inc/header.php");
include ("inc/download/downdetalhes.php");
include ("inc/header2.php");
include ("inc/footer.php");
}

else if ($post) {
$chavetitle = "Comentando...";
include ("inc/top.php");
include ("inc/header.php");
include ("inc/download/downcomentarios.php");
include ("inc/header2.php");
include ("inc/footer.php");
}

else if ($get) {
include ("inc/download/downget.php");
}

else {
$chavetitle = "Downloads";
include ("inc/top.php");
include ("inc/header.php");
include ("inc/download/downview.php");
include ("inc/header2.php");
include ("inc/footer.php");
}

?>