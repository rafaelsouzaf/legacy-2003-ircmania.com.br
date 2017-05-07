<?
if ($oqueeh) {
include ("inc/busca/oqueeh.php");
}
else if ($comofunciona) {
include ("inc/busca/comofunciona.php");
}
else if ($top30) {
include ("inc/busca/top30.php");
}
else if ($indique) {
include ("inc/busca/indique.php");
}
else if (($canal) and (!$indique)) {
include ("inc/busca/info.php");
}
else {
include ("inc/busca/busca.php");
}
?>