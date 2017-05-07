<?
$querydicas = mysql_query("select * from artigos where topic='25' and chk='1' order by rand()");
$dicas = mysql_fetch_array($querydicas);

echo "<a href='view.php?sid=$dicas[sid]' class='ircmania2'>".$dicas[hometext]."</a>";
?>