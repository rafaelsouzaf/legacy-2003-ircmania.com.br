<?
$publi = mysql_query("select * from artigos where chk = '1' order by time desc");
$pul = mysql_fetch_array($publi);

echo "Leia & Comente: <a href='../view.php?sid=$pul[sid]' target='_blank'>$pul[title]</a><br>";
?>