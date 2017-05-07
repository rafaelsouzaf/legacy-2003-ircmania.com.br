<?

	$chavetitle = "Fórum dos sites IRCmania e ChatMania";

include ("inc/top.php");
include ("inc/header.php");
include ("inc/forum/top.php");
?>

<table border="0" cellpadding="5" cellspacing="0" width="100%">
  <tr>
    <td width="100%" colspan="4"><b>Oficiais</b><br>
    Discussões sobre Chat, IRC e assuntos relacionados.</td>
  </tr>
  <tr>
    <td width="65%"><u>Nome do Fórum / Descrição</u></td>
    <td width="10%" align="center"><u>Mensagens</u></td>
    <td width="25%" align="center"><u>Última</u></td>
  </tr>
</table>

<table border="0" cellpadding="5" cellspacing="0" width="100%">
<?
$qforum = mysql_query("select * from forum order by id");
for ($x = 0 ; $qforuml = mysql_fetch_array($qforum); $x++) {
$cor = ($x%2) ? 'white':'#f3f3f3';

	$sql = "select count(id) as vl from forum_msg where catid='$qforuml[id]'";
	$qry = mysql_query($sql);
	$nsalas = mysql_fetch_array($qry);

	$fult = mysql_query("select * from forum_msg where catid = '$qforuml[id]' order by data desc limit 1");
	$fultl = mysql_fetch_array($fult);
?>
  <tr>
    <td width="3%" bgcolor="<?=$cor?>"><img border="0" src="imagens/forum/new.gif" width="16" height="10"></td>
    <td width="62%" bgcolor="<?=$cor?>"><a href="forum.php?id=<?=$qforuml[id]?>" class="ircmania1"><b><u><?=$qforuml[nome]?></u></b></a><br><?=$qforuml[descricao]?></td>
    <td width="10%" align="center" bgcolor="<?=$cor?>"><?=$nsalas[vl]?></td>
    <td width="25%" align="center" bgcolor="<?=$cor?>"><? echo date("M d, H:i", $fultl[data])?><br>por <?=$fultl[autor]?></td>
  </tr>
<? } ?>
</table>

<br>
<hr color="#000000" width="80%" size="1">
<br>

<?
include ("inc/header2.php");
include ("inc/footer.php");
?>