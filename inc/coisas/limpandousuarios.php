<?
include '../../conexao.php';

$query = mysql_query("select * from usuarios where chklog = '0'");
while ($l = mysql_fetch_array($query)) {

echo $l[idus]." - ".$l[free]."<br>";

}
?>