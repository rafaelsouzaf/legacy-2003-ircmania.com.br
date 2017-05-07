<?
$qualtexto = mysql_query("select * from redes where rede='$rede'");
$qual = mysql_fetch_array($qualtexto);

if (($req == "Visualizar") and (getenv("REQUEST_METHOD") == "POST")) {

	$introdu = 1;

?>

	<p align="center"><b>Visualizando...</b></p>

	<table align="center" border="0" cellpadding="3" cellspacing="0" width="50%">
	  <tr>
	    <td width="100%"><font color="#808080"><b>Rede:</b> <?=$rede?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>URL:</b> <a href="<?=$url?>"><?=$url?></a></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>IRC:</b> <?=$irc?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>Server1:</b> <?=$irc1?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>Server2:</b> <?=$irc2?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>Server3:</b> <?=$irc3?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>NickServ:</b> <?=$nickserv?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>ChanServ:</b> <?=$chanserv?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>MemoServ:</b> <?=$memoserv?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>BotServ:</b> <?=$botserv?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>I-line:</b> <?=$iline?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>Admin:</b> <?=$admin?></font></td>
	  </tr>
	  <tr>
	    <td width="100%"><font color="#808080"><b>CPF:</b> <?=$cpf?></font> <a href="http://www.receita.fazenda.gov.br/Aplicacoes/ATCTA/CPF/ConsultaPublica.asp" target="_blank">receita fazenda</a></td>
	  </tr>
	</table>

<br>
<hr color="#000000" width="80%" size="1">
<br>

<?
}

if ((getenv("REQUEST_METHOD") == "POST") and ($req == "Publicar")) {

	$introdu = 1;
	$data = time();

	$update = "update redes set rede='$rede', url='$url', irc='$irc', irc1='$irc1', irc2='$irc2', irc3='$irc3', iline='$iline', admin='$admin', cpf='$cpf', chkrede='1' where rede='$rede'";
	mysql_query($update);

	$ok = "Publicado";

}

if ($ok) {
?>
<p align="center"><u><b>Adicionar Rede</b></u></p>
<br>
<p align="center">Rede <b><?=$ok?></b> com sucesso. Obrigado!</p>



<? } else { ?>
<p align="center"><u><b>Enviar Rede para publicação</b></u></p>

<form action="edit.php?redes=editar&rede=<?=$rede?>" method="post">

<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="32%" align="right"><b>Rede:</b></td>
    <td width="68%"><input type="text" name="rede" value="<? if ($rede) echo $rede; else echo $qual[rede]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>URL:</b></td>
    <td width="68%"><input type="text" name="url" value="<? if ($url) echo $url; else echo $qual[url]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>IRC:</b></td>
    <td width="68%"><input type="text" name="irc" value="<? if ($irc) echo $irc; else echo $qual[irc]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Server1:</b></td>
    <td width="68%"><input type="text" name="irc1" value="<? if ($irc1) echo $irc1; else echo $qual[irc1]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Server2:</b></td>
    <td width="68%"><input type="text" name="irc2" value="<? if ($irc2) echo $irc2; else echo $qual[irc2]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Server3:</b></td>
    <td width="68%"><input type="text" name="irc3" value="<? if ($irc3) echo $irc3; else echo $qual[irc3]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>I-Line:</b></td>
    <td width="68%"><input type="text" name="iline" value="<? if ($iline) echo $iline; else echo $qual[iline]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>Admin:</b></td>
    <td width="68%"><input type="text" name="admin" value="<? if ($admin) echo $admin; else echo $qual[admin]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td width="32%" align="right"><b>CPF:</b></td>
    <td width="68%"><input type="text" name="cpf" value="<? if ($cpf) echo $cpf; else echo $qual[cpf]; ?>" size="33" style="height: 16; font-family: Verdana; font-size: 10 px; border-style: solid; border-width: 1"></td>
  </tr>
  <tr>
    <td align="center" width="100%" valign="top" colspan="2"><br> 
    <input type="submit" name="req" value="Visualizar" style="font-family: Verdana; font-size: 10 px">
	<input type="submit" value="Publicar" name="req" style="font-family: Verdana; font-size: 10 px">
	</td>
  </tr>
</table>
</form>
<? } ?>