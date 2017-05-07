<p><font color="#C0C0C0" size="1" face="Verdana">Info de:</font><br>
<font face="Verdana" size="2"><b><u><?=$nick;?></u>&nbsp;&nbsp;&nbsp;&nbsp;~!</b></font></p>

<p align="center">
<?
$query = mysql_query("select * from usuarios where login='$nick' and chklog=1");
if ($l = mysql_fetch_array($query)) {

	if ($l[foto]) {
	$nova_largura= 130;
	$nova_altura = "imagesY($l[foto])*$nova_largura/imagesX($l[foto])";
	echo "<a href='imagens/user/fotos/$l[foto]' target='_blank'><img border='0' src='imagens/user/fotos/$l[foto]' width='$nova_largura' style='border: 3px solid #FF8000'></a>";

	}
	else { echo "<img border='0' src='imagens/user/fotos/modelo.gif' style='border: 3px solid #FF8000' width='200'>";}

?>
</p>

<br>

<table align="center" border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="90%">
  <tr>
    <td width="50%"><b>Nick:</b></td>
    <td width="50%"><?=$l[login];?></td>
  </tr>
  <tr>
    <td width="50%"><b>Nome:</b></td>
    <td width="50%"><?=$l[nome_completo];?></td>
  </tr>
  <tr>
    <td width="50%"><b>Data registro:</b></td>
    <td width="50%"><? echo date("d/m/y H:i:s", $l[dataregistro]); ?></td>
  </tr>
  <tr>
    <td width="50%"><b>E-mail:</b></td>
    <td width="50%"><? if ($l[config_email]) echo $l[email]; else echo "N/D";?></td>
  </tr>
<? if ($l[cidade]) {?>
  <tr>
    <td width="50%"><b>Cidade:</b></td>
    <td width="50%"><?=$l[cidade];?></td>
  </tr>
<?} if ($l[estado]) {?>
  <tr>
    <td width="50%"><b>Estado:</b></td>
    <td width="50%"><?=$l[estado];?></td>
  </tr>
<?} if ($l[homepage] && $l[homepage] != 'http://') {?>
  <tr>
    <td width="50%"><b>Home-Page:</b></td>
    <td width="50%"><?=$l[homepage];?></td>
  </tr>
<?} if ($l[ocupacao]) {?>
  <tr>
    <td width="50%"><b>Ocupação:</b></td>
    <td width="50%"><?=$l[ocupacao];?></td>
  </tr>
<?} if ($l[icq]) {?>
  <tr>
    <td width="50%"><b>ICQ:</b></td>
    <td width="50%"><?=$l[icq];?></td>
  </tr>
<?} if ($l[messenger]) {?>
  <tr>
    <td width="50%"><b>Messenger:</b></td>
    <td width="50%"><?=$l[messenger];?></td>
  </tr>
<?} if ($l[estadocivil]) {?>
  <tr>
    <td width="50%"><b>Estado Civil:</b></td>
    <td width="50%"><?=$l[estadocivil];?></td>
  </tr>
<?} if ($l[sexo]) {?>
  <tr>
    <td width="50%"><b>Sexo:</b></td>
    <td width="50%"><?=$l[sexo];?></td>
  </tr>
<?} if ($l[idade]) {?>
  <tr>
    <td width="50%"><b>Idade:</b></td>
    <td width="50%"><?=$l[idade];?></td>
  </tr>
<?} if ($l[signo]) {?>
  <tr>
    <td width="50%"><b>Signo:</b></td>
    <td width="50%"><?=$l[signo];?></td>
  </tr>
<?} if ($l[fumante]) {?>
  <tr>
    <td width="50%"><b>Fumante?</b></td>
    <td width="50%"><?=$l[fumante];?></td>
  </tr>
<?}?>
</table>

<br>
<hr color="#C0C0C0" width="80%" size="1">
<br>

<table border="1" cellpadding="4" style="border-collapse: collapse" bordercolor="#E0E0E0" width="100%">
<? if ($l[filme]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Um filme:</strong><br><?=$l[filme];?></td>
  </tr>
<?} if ($l[livro]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Um livro:</strong><br><?=$l[livro];?></td>
  </tr>
<?} if ($l[prato]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Um prato:</strong><br><?=$l[prato];?></td>
  </tr>
<?} if ($l[lugar]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Um lugar:</strong><br><?=$l[lugar];?></td>
  </tr>
<?} if ($l[temor]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Um temor:</strong><br><?=$l[temor];?></td>
  </tr>
<?} if ($l[sonho]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Um sonho:</strong><br><?=$l[sonho];?></td>
  </tr>
<?} if ($l[personalidade]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Uma personalidade:</strong><br><?=$l[personalidade];?></td>
  </tr>
<?} if ($l[boarecordacao]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Uma boa recordação:</strong><br><?=$l[boarecordacao];?></td>
  </tr>
<?} if ($l[marecordacao]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Uma má recordação:</strong><br><?=$l[marecordacao];?></td>
  </tr>
<?} if ($l[virciado]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Se considera vIRCiado(a)?</strong><br><?=$l[virciado];?></td>
  </tr>
<?} if ($l[sexovirtual]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Já fez sexo virtual?</strong><br><?=$l[sexovirtual];?></td>
  </tr>
<?} if ($l[ondefica]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Onde fica na Internet (irc, icq, etc)?</strong><br><?=$l[ondefica];?></td>
  </tr>
<?} if ($l[atividadesinternet]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Quais suas atividades na Internet?</strong><br><?=$l[atividadesinternet];?></td>
  </tr>
<?} if ($l[atividadesdiaadia]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Quais suas atividades no dia-a-dia?</strong><br><?=$l[atividadesdiaadia];?></td>
  </tr>
<?} if ($l[sobrevoce]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Diga um pouco sobre você:</strong><br><?=$l[sobrevoce];?></td>
  </tr>
<?} if ($l[abobrinha]) {?>
  <tr>
    <td width="100%" valign="top"><strong>Abobrinha final... fique a vontade :)</strong><br><?=$l[abobrinha];?></td>
  </tr>
<?}?>
</table>

<br>
<hr color="#C0C0C0" width="80%" size="1">
<br>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="100%"><u>Últimos 10 textos publicados por <?=$nick?>:</u><ul>
	<?
	$query0 = mysql_query("select * from artigos where informant='$l[login]' order by sid desc limit 10");
	while ($lee = mysql_fetch_array($query0)) {
	?>
	<li><a href="view.php?sid=<?=$lee[sid]?>" class="ircmania1"><?=$lee[title]?></a></li>
	<?
	}
	?>
    </ul>

    <p><u>Últimos 10 comentários postados por <?=$nick?>:</u></p>
    <ul>
	<?
	$query7 = mysql_query("select * from comentarios where name='$l[login]' order by tid desc limit 10");
	while ($lgg = mysql_fetch_array($query7)) { ?>
	<li><a href="view.php?sid=<?=$lgg[sid]?>#<?=$lgg[tid]?>" class="ircmania1"><?=$lgg[subject]?></a></li>
	<?
	}
	?>
    </ul>
    </td>
  </tr>
</table>

<?
} else {
echo "Nenhuma informação disponível sobre <u>$nick</u>";
}
?>