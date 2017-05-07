<?
	$query3f = mysql_query("select * from usuarios where login='$name'");
	$ls = mysql_fetch_array($query3f);

	$sql = "select count(id) as vl from download where autor='$name' and nivel='$nivel'"; 
	$qry = mysql_query($sql); 
	$nartigos = mysql_fetch_array($qry);

		$totalq = mysql_query("select * from download where autor='$name' and nivel='$nivel'");
		$totalcoments = 0;
		while ($ll = mysql_fetch_array($totalq)) {
		$totalcoments = $totalcoments + $ll[ndown];
		}
?>

<table align="center" border="0" cellpadding="2" cellspacing="0" width="80%">
  <tr>
    <td width="50%" valign="top"><p align="center">

		<? if ($ls[foto]) {
		$nova_largura= 110;
		$nova_altura = "imagesY($ls[foto])*$nova_largura/imagesX($ls[foto])";
		echo "<a href='user.php?nick=$name'><img border='0' src='imagens/user/fotos/$ls[foto]' width='$nova_largura' style='border: 1px solid #FF8000'></a>";
		}
		else { echo "<img border='0' src='imagens/user/fotos/modelo.gif' style='border: 1px solid #FF8000' width='110'>";}?></p>

	</td>
    <td width="50%" valign="top"><p align="justify">

		<table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" cellspacing="0">
		  <tr>
		    <td width="50%"><b>Nick:</b></td>
		    <td width="50%"><a href="user.php?nick=<?=$ls[login]?>" class="ircmania1"><?=$ls[login]?></a></td>
		  </tr>
		  <tr>
		    <td width="50%"><b>Registro:</b></td>
		    <td width="50%"><? echo date("d/m/y", $ls[dataregistro]);?></td>
		  </tr>
		  <tr>
		    <td width="100%" colspan="2"><hr color="#C0C0C0" size="1"></td>
		  </tr>
			  <tr>
		    <td width="100%" colspan="2">Número de arquivos enviados: <b>
			    <?=$nartigos['vl']?></b></td>
		  </tr>
		  <tr>
		    <td width="100%" colspan="2">-<br>
		    Número total de downloads gerados pelos arquivos: <b><?=$totalcoments?></b></td>
		  </tr>
	</table>


</td>
  </tr>
</table>

<br>