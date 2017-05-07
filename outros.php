<?
include ("inc/top.php");
include ("inc/header.php");

if ($oqueehirc) {
include ("inc/outros/oqueehirc.php");
}
else if ($oqueehircd) {
include ("inc/outros/oqueehircd.php");
}
else if ($oqueehscript) {
include ("inc/outros/oqueehscript.php");
}
else if ($oqueehegg) {
include ("inc/outros/oqueehegg.php");
}
else if ($oqueehaliases) {
include ("inc/outros/oqueehaliases.php");
}
else if ($quemsomos) {
include ("inc/outros/quemsomos.php");
}
else if ($condicoes) {
include ("inc/outros/condicoes.php");
}
else if ($noseusite) {
include ("inc/outros/noseusite.php");
}
else if ($dircionario) {
include ("inc/outros/dircionario.php");
}
else if ($dircionario_conceitos) {
include ("inc/outros/dircionario_conceitos.php");
}
else if ($dircionario_smileys) {
include ("inc/outros/dircionario_smileys.php");
}
else if ($dircionario_abreviaturas) {
include ("inc/outros/dircionario_abreviaturas.php");
}
else if ($dircionario_comandos) {
include ("inc/outros/dircionario_comandos.php");
}
else if ($contato) {
include ("inc/outros/contato.php");
}
else if ($instalando) {
include ("inc/outros/instalando.php");
}
else if ($enviartexto) {
include ("inc/outros/enviartexto.php");
}
else if ($arquivo) {
include ("inc/outros/arquivo.php");
}
else if ($busca) {
include ("inc/outros/busca.php");
}
else  {
header ("index.php");
}


include ("inc/header2.php");
include ("inc/footer.php");
?>