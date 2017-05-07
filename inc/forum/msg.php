<?

	$chavetitle = "Fórum dos sites IRCmania e ChatMania";

include ("inc/top.php");
include ("inc/header.php");
include ("inc/forum/top.php");

$queryd = mysql_query("select * from forum where id = '$id'");
$querydl = mysql_fetch_array($queryd);
?>

<a href="forum.php?novamsg=<?=$id?>">
<img border="0" src="imagens/forum/nova_mensagem.gif" width="93" height="25"></a>

<br><br>

<table border="0" cellpadding="5" cellspacing="0" width="100%">
  <tr>
    <td width="100%" colspan="4"><b><?=$querydl[nome]?></b><br>
    <?=$querydl[descricao]?></td>
  </tr>
  <tr>
    <td width="70%"><u>Tópico</u></td>
    <td width="5%" align="center"><u>Respostas</u></td>
    <td width="25%" align="center"><u>Última</u></td>
  </tr>
</table>



<table border="0" cellpadding="5" cellspacing="0" width="100%">
<?

	if (!isset($x)) {
		$x = "1";
	}

$npag = 20;
$inicio = $x - 1; 
$inicio = $inicio * $npag; 
$where = "where chkaliases='1' and categoria='$categoria'";
$qdef = "select * from forum_msg where catid = '$id' and reid = '0' order by id desc"; 
$sql = mysql_query("$qdef LIMIT $inicio,$npag"); 
$todos = mysql_query($qdef); 

$tr = mysql_num_rows($todos); 
$tp = ceil($tr / $npag); 

for ($u = 0 ; $qforuml = mysql_fetch_array($sql); $u++) {

$ultimaforum = mysql_query("select * from forum_msg where reid = '$qforuml[id]' order by id desc"); 
$ultimaforuml = mysql_fetch_array($ultimaforum);

$cor = ($u%2) ? 'white':'#f3f3f3';
$mensagem = substr($qforuml[mensagem], 0, 80);
$mensagem = strtolower($mensagem);

	$sqla = "select count(id) as vl from forum_msg where reid='$qforuml[id]'";
	$qry = mysql_query($sqla);
	$nsalas = mysql_fetch_array($qry);
?>
  <tr>
    <td width="3%" bgcolor="<?=$cor?>"><img border="0" src="imagens/forum/new.gif" width="16" height="10"></td>
    <td width="62%" bgcolor="<?=$cor?>"><a href="forum.php?ver=<?=$qforuml[id]?>" class="ircmania1"><b><u><?=ucfirst(stripslashes($qforuml[topico]))?></u></b></a><br><?=ucfirst(stripslashes($mensagem))?>(...)</td>
    <td width="10%" align="center" bgcolor="<?=$cor?>"><?=$nsalas[vl]?></td>
    <td width="25%" align="center" bgcolor="<?=$cor?>"><? echo date("M d, H:i", $ultimaforuml[data])?><br>por <?=$ultimaforuml[autor]?></td>
  </tr>
<? } ?>
</table>

<?

echo "<center><br><br>";

$anterior = $x - 1; 
$proximo = $x + 1; 

	if ($x > 1) { 
	echo "<a href='forum.php?id=$id&x=$anterior'><u>Anterior</u></a> | "; 
	} 
	else {
	echo "<u>Anterior</u> | ";
	}

if ($tr > $npag) { 

for ($d=1;$d <= $tp; $d++) { 
if ($x == $d) { $pages = $pages . $d . " | "; } 
else { $pages = $pages . "<a href=\"forum.php?id=$id&x=$d\"><u>$d</u></a> |" . " "; } 
} 
echo $pages;

} 

	if ($x < $tp) {
	echo " <a href='forum.php?id=$id&x=$proximo'><u>Próxima</u></a>";
	}
	else {
	echo " <u>Próxima</u>";
	}


include ("inc/header2.php");
include ("inc/footer.php");
?>