<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Arquivos</u></font></strong></td>
  </tr>
</table>

<br><br>

<script language="JavaScript">
		<!--
			function MM_jumpMenu(targ,selObj,restore){ //v3.0
			eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
			if (restore) selObj.selectedIndex=0;
			}
		//-->
</script>

<table align="center" border="0" cellpadding="10" cellspacing="0" width="70%">
  <tr>
    <td width="100%" align="center">

	<select name="rede" onChange="MM_jumpMenu('parent',this,0)" name="f" style="font-family: Verdana; font-size: 10 px">
	<option value="outros.php?arquivo=ok">Tópicos:</option>
	<option value="outros.php?arquivo=ok">---</option>
	<?
	$resultado = mysql_query("select * from topics");
	while ($l = mysql_fetch_array($resultado)) {
	?>
	<option value="outros.php?arquivo=ok&topic=<?=$l[topicid]?>" <? if ($topic == $l[topicid]) echo "selected"; ?>><?=$l[topicname]?></option>
	<? } ?>
	<option value="outros.php?arquivo=ok">---</option></select>
</td>
  </tr>
</table>
<br>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
  <tr>
    <td width="100%">
    <p align="justify">Aqui estão todos os artigos publicados no site desde 
    Agosto de 2001. Para visualizar determinado assunto, selecione-o 
    através do campo acima.</td>
  </tr>
</table>

<br>
<hr color="#000000" width="80%" size="1">
<br>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="90%">
<?

if (!$topic) echo "<p><font color='#FF0000'>Selecione um tópico acima.</font></p>";

	$where = "where topic='$topic' and chk='1' and nivel='0'";

	$query888 = mysql_query("select * from artigos $where order by time desc");
	$meses = array("01"=>"Janeiro", "02"=>"Fevereiro", "03"=>"Março", "04"=>"Abril", "05"=>"Maio", "06"=>"Junho", "07"=>"Julho", "08"=>"Agosto", "09"=>"Setembro", "10"=>"Outubro", "11"=>"Novembro", "12"=>"Dezembro");

	while ($l = mysql_fetch_array($query888)) {

//	$sql = "select count(tid) as vl from comentarios where sid='$l[sid]'"; 
//	$qry = mysql_query($sql); 
//	$nartigos = mysql_fetch_array($qry);

	if (date("m", $l[time]) != $mesatual) {
	echo "<tr><td width=\"100%\"><br><u>". $meses[date("m", $l[time])] ." de ". date("Y", $l[time]) ."</u><br><br></td></tr>";
	}
	$mesatual = date("m", $l[time]);

?>

  <tr>
    <td width="92%">&nbsp;&nbsp;&nbsp;&nbsp;- <a href="view.php?sid=<?=$l[sid]?>" class="ircmania1"><?=$l[title]?></a></td>

  </tr>

<?
}
?>
</table>