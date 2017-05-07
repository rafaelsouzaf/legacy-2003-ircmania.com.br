<?
include 'mysql.php';

$teste = new Mysql;
$resultado = $teste->getQuery("select * from redes where chkrede = 1 limit 5");


while ($resultado) {
echo $resultado->rede."<br>";
}


?>