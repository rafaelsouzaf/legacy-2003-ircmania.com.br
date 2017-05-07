<?
$conexao=mysql_connect("200.42.38.39", "vircio", "V!rc!O");
mysql_select_db("vircio");

$query = "SELECT * FROM nuke_users"; 
$resultado = mysql_query($query) or die ("erro 1"); 

while ($campo = mysql_fetch_array($resultado)) {

if ($campo[pn_email]) {
echo "$campo[pn_email]; ";
}

}
?>
