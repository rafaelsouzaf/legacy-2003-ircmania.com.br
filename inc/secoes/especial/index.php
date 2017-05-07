<?
include ("conexao.php");

	$query3 = mysql_query("select login,$parte from usuarios where login='$name' and $parte='1' ");
	if (!$lbbg = mysql_fetch_array($query3)) {
	die();
	}

	$query3f = mysql_query("select * from usuarios where login='$name'");
	$ls = mysql_fetch_array($query3f);

	$chavetitle = $name." - $partenome";
	$chaverede = $ls[rede];
	if ($ls[canal] == "#") 	$chavecanal = null; else $chavecanal = $ls[canal];

include ("inc/top.php");
include ("inc/header.php");

if (($parte) and ($cat)) {
include ("inc/secoes/especial/view.php");
}
else if (($parte) and ($detalhes)) {
include ("inc/secoes/especial/view.php");
}
else if (($parte) and ($dica)) {
include ("inc/secoes/especial/dica.php");
}
else if ($parte) {
include ("inc/secoes/especial/principal.php");
}
?>
<br><br>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="100%"><hr color="#808080" size="1"></td>
  </tr>
  <tr>
    <td width="100%">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
	  <tr>
	    <td width="100%">
	    <p align="center"><i>*&nbsp; Se houver algum arquivo danificado ou 
	    infectado, por favor, avise o responsável pela seção ou o
	    <a href="outros.php?contato=ok" class="ircmania1"><u>webmaster</u></a>.</i></td>
	  </tr>
	</table>
    </td>
  </tr>
</table>
<?
include ("inc/header2.php");
include ("inc/footer.php");
?>