<?
$conexao=mysql_connect("localhost", "vircio", "V!rc!O");
mysql_select_db("ircmania");

$query = "SELECT * FROM artigos2"; 
$resultado = mysql_query($query) or die ("erro 1"); 

while ($campo = mysql_fetch_array ($resultado)) 
{ 
$id = $campo['sid']; //chave única 
$data = $campo['time']; //data 
$data = mktime 
( 
substr($data,11,2),//hora 
substr($data,14,2),//minuto 
substr($data,17,2),//segundo 
substr($data,5,2),//mes 
substr($data,8,2),//dia 
substr($data,0,4)//ano 
);

$query_aux = "UPDATE artigos2 SET time2 = '$data' WHERE sid = '$id'";
$resultado_aux = mysql_query($query_aux) or die ("erro 2"); 
}
echo "ok";

?>