<?
$query = mysql_query("select * from usuarios where login='$usuario'");
$l = mysql_fetch_array($query);

	$nomecompleto = htmlentities("$nomecompleto");
	$email = htmlentities("$email");
	$cidade = htmlentities("$cidade");
	$homepage = htmlentities("$homepage");
	$ocupacao = htmlentities("$ocupacao");
	$icq = htmlentities("$icq");
	$messenger = htmlentities("$messenger");
	$filme = htmlentities("$filme");
	$livro = htmlentities("$livro");
	$prato = htmlentities("$prato");
	$lugar = htmlentities("$lugar");
	$temor = htmlentities("$temor");
	$sonho = htmlentities("$sonho");
	$personalidade = htmlentities("$personalidade");
	$boarecordacao = htmlentities("$boarecordacao");
	$marecordacao = htmlentities("$marecordacao");
	$virciado = htmlentities("$virciado");
	$sexovirtual = htmlentities("$sexovirtual");
	$ondefica = htmlentities("$ondefica");
	$atividadesinternet = htmlentities("$atividadesinternet");
	$atividadesdiaadia = htmlentities("$atividadesdiaadia");
	$sobrevoce = htmlentities("$sobrevoce");
	$abobrinha = htmlentities("$abobrinha");
	$descricao = htmlentities("$descricao");
	$canal = htmlentities("$canal");

if ((getenv("REQUEST_METHOD") == "POST") and (!$arquivo) and (!$deletarfoto)) {

	if (($email == null) or ($nomecompleto == null)) {
	echo "<font color='#FF0000'>* Não é permitido deixar os campos <u>Nome Completo</u> ou <u>E-mail</u> em branco.</font><br>";
	}

	if (($nomecompleto != $l[nome_completo]) and ($nomecompleto != null)) {
	$update = "update usuarios set nome_completo='$nomecompleto' where login='$usuario'";
	mysql_query($update);
	$l[nome_completo] = stripslashes($nomecompleto);
	}

	if (($email != $l[email]) and ($email != null)){
	$update = "update usuarios set email='$email' where login='$usuario'";
	mysql_query($update);
	$l[email] = stripslashes($email);
	}

	if ($cidade != $l[cidade]) {
	$update = "update usuarios set cidade='$cidade' where login='$usuario'";
	mysql_query($update);
	$l[cidade] = stripslashes($cidade);
	}

	if ($estado != $l[estado]) {
	$update = "update usuarios set estado='$estado' where login='$usuario'";
	mysql_query($update);
	$l[estado] = stripslashes($estado);
	}

	if ($homepage != $l[homepage]) {
	$update = "update usuarios set homepage='$homepage' where login='$usuario'";
	mysql_query($update);
	$l[homepage] = stripslashes($homepage);
	}

	if ($ocupacao != $l[ocupacao]) {
	$update = "update usuarios set ocupacao='$ocupacao' where login='$usuario'";
	mysql_query($update);
	$l[ocupacao] = stripslashes($ocupacao);
	}

	if ($icq != $l[icq]) {
	$update = "update usuarios set icq='$icq' where login='$usuario'";
	mysql_query($update);
	$l[icq] = stripslashes($icq);
	}

	if ($messenger != $l[messenger]) {
	$update = "update usuarios set messenger='$messenger' where login='$usuario'";
	mysql_query($update);
	$l[messenger] = stripslashes($messenger);
	}

	if ($estadocivil != $l[estadocivil]) {
	$update = "update usuarios set estadocivil='$estadocivil' where login='$usuario'";
	mysql_query($update);
	$l[estadocivil] = stripslashes($estadocivil);
	}

	if ($sexo != $l[sexo]) {
	$update = "update usuarios set sexo='$sexo' where login='$usuario'";
	mysql_query($update);
	$l[sexo] = stripslashes($sexo);
	}

	if ($idade != $l[idade]) {
	$update = "update usuarios set idade='$idade' where login='$usuario'";
	mysql_query($update);
	$l[idade] = stripslashes($idade);
	}

	if ($signo != $l[signo]) {
	$update = "update usuarios set signo='$signo' where login='$usuario'";
	mysql_query($update);
	$l[signo] = stripslashes($signo);
	}

	if ($fumante != $l[fumante]) {
	$update = "update usuarios set fumante='$fumante' where login='$usuario'";
	mysql_query($update);
	$l[fumante] = stripslashes($fumante);
	}

	if ($filme != $l[filme]) {
	$update = "update usuarios set filme='$filme' where login='$usuario'";
	mysql_query($update);
	$l[filme] = stripslashes($filme);
	}

	if ($livro != $l[livro]) {
	$update = "update usuarios set livro='$livro' where login='$usuario'";
	mysql_query($update);
	$l[livro] = stripslashes($livro);
	}

	if ($prato != $l[prato]) {
	$update = "update usuarios set prato='$prato' where login='$usuario'";
	mysql_query($update);
	$l[prato] = stripslashes($prato);
	}

	if ($lugar != $l[lugar]) {
	$update = "update usuarios set lugar='$lugar' where login='$usuario'";
	mysql_query($update);
	$l[lugar] = stripslashes($lugar);
	}

	if ($temor != $l[temor]) {
	$update = "update usuarios set temor='$temor' where login='$usuario'";
	mysql_query($update);
	$l[temor] = stripslashes($temor);
	}

	if ($sonho != $l[sonho]) {
	$update = "update usuarios set sonho='$sonho' where login='$usuario'";
	mysql_query($update);
	$l[sonho] = stripslashes($sonho);
	}

	if ($personalidade != $l[personalidade]) {
	$update = "update usuarios set personalidade='$personalidade' where login='$usuario'";
	mysql_query($update);
	$l[personalidade] = stripslashes($personalidade);
	}

	if ($boarecordacao != $l[boarecordacao]) {
	$update = "update usuarios set boarecordacao='$boarecordacao' where login='$usuario'";
	mysql_query($update);
	$l[boarecordacao] = stripslashes($boarecordacao);
	}

	if ($marecordacao != $l[marecordacao]) {
	$update = "update usuarios set marecordacao='$marecordacao' where login='$usuario'";
	mysql_query($update);
	$l[marecordacao] = stripslashes($marecordacao);
	}

	if ($virciado != $l[virciado]) {
	$update = "update usuarios set virciado='$virciado' where login='$usuario'";
	mysql_query($update);
	$l[virciado] = stripslashes($virciado);
	}

	if ($sexovirtual != $l[sexovirtual]) {
	$update = "update usuarios set sexovirtual='$sexovirtual' where login='$usuario'";
	mysql_query($update);
	$l[sexovirtual] = stripslashes($sexovirtual);
	}

	if ($ondefica != $l[ondefica]) {
	$update = "update usuarios set ondefica='$ondefica' where login='$usuario'";
	mysql_query($update);
	$l[ondefica] = stripslashes($ondefica);
	}

	if ($atividadesinternet != $l[atividadesinternet]) {
	$update = "update usuarios set atividadesinternet='$atividadesinternet' where login='$usuario'";
	mysql_query($update);
	$l[atividadesinternet] = stripslashes($atividadesinternet);
	}

	if ($atividadesdiaadia != $l[atividadesdiaadia]) {
	$update = "update usuarios set atividadesdiaadia='$atividadesdiaadia' where login='$usuario'";
	mysql_query($update);
	$l[atividadesdiaadia] = stripslashes($atividadesdiaadia);
	}

	if ($sobrevoce != $l[sobrevoce]) {
	$update = "update usuarios set sobrevoce='$sobrevoce' where login='$usuario'";
	mysql_query($update);
	$l[sobrevoce] = stripslashes($sobrevoce);
	}

	if ($abobrinha != $l[abobrinha]) {
	$update = "update usuarios set abobrinha='$abobrinha' where login='$usuario'";
	mysql_query($update);
	$l[abobrinha] = stripslashes($abobrinha);
	}

	if ($descricao != $l[descricao]) {
	$update = "update usuarios set descricao='$descricao' where login='$usuario'";
	mysql_query($update);
	$l[descricao] = stripslashes($descricao);
	}

	if ($rede != $l[rede]) {
	$update = "update usuarios set rede='$rede' where login='$usuario'";
	mysql_query($update);
	$l[rede] = stripslashes($rede);
	}

	if ($canal != $l[canal]) {
	$update = "update usuarios set canal='$canal' where login='$usuario'";
	mysql_query($update);
	$l[canal] = stripslashes($canal);
	}

echo "<p align='center'><font color='#FF0000'>* Ok. Informações atualizadas com sucesso!</font><br></p>";

}
?>
<p align="justify"><?=$usuario?>,<br>
<br>
Esta é sua página de informações pessoais. Todas as informações aqui colocadas, 
com exceção do <u>E-mail</u> e da <u>Senha</u>, estarão visíveis para os 
visitantes do site através da página:<br>
<br>
<a target="_blank" href="http://www.ircmania.com.br/user.php?nick=<?=$usuario;?>">
http://www.ircmania.com.br/user.php?nick=<?=$usuario?></a></p>

<p align="center"><u><b>Edite a vontade!</b></u></p>
<br>

<form action="user.php?edit=pessoais" method="post">
<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="100%">
  <tr>
    <td width="50%">Nome completo: (exigido)</td>
    <td width="50%"><input type="text" name="nomecompleto" value="<?=$l[nome_completo];?>" maxlength="50" size="30" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">E-mail (exigido):</td>
    <td width="50%"><input type="text" name="email" value="<?=$l[email];?>" size="30" maxlength="32" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Home-Page</td>
    <td width="50%"><input type="text" name="homepage" value="<?=$l[homepage];?>" size="30" maxlength="50" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Ocupação:</td>
    <td width="50%"><input type="text" name="ocupacao" value="<?=stripslashes($l[ocupacao]);?>" size="30" maxlength="30" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">ICQ:</td>
    <td width="50%"><input type="text" name="icq" value="<?=$l[icq];?>" size="23" maxlength="15" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Messenger:</td>
    <td width="50%"><input type="text" name="messenger" value="<?=$l[messenger];?>" size="23" maxlength="30" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Cidade:</td>
    <td width="50%"><input type="text" name="cidade" value="<?=$l[cidade];?>" size="23" maxlength="50" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Estado:</td>
    <td width="50%"><select size="1" name="estado" style="font-family: Verdana; font-size: 10 px">
		<option value="">Escolha:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		<option value="">---</option>
		<option value="AC" <? if ($l[estado] == "AC") echo "selected"; ?>>AC</option>
		<option value="AL" <? if ($l[estado] == "AL") echo "selected"; ?>>AL</option>
		<option value="AM" <? if ($l[estado] == "AM") echo "selected"; ?>>AM</option>
		<option value="AP" <? if ($l[estado] == "AP") echo "selected"; ?>>AP</option>
		<option value="BA" <? if ($l[estado] == "BA") echo "selected"; ?>>BA</option>
		<option value="CE" <? if ($l[estado] == "CE") echo "selected"; ?>>CE</option>
		<option value="DF" <? if ($l[estado] == "DF") echo "selected"; ?>>DF</option>
		<option value="ES" <? if ($l[estado] == "ES") echo "selected"; ?>>ES</option>
		<option value="GO" <? if ($l[estado] == "GO") echo "selected"; ?>>GO</option>
		<option value="MA" <? if ($l[estado] == "MA") echo "selected"; ?>>MA</option>
		<option value="MG" <? if ($l[estado] == "MG") echo "selected"; ?>>MG</option>
		<option value="MS" <? if ($l[estado] == "MS") echo "selected"; ?>>MS</option>
		<option value="MT" <? if ($l[estado] == "MT") echo "selected"; ?>>MT</option>
		<option value="PA" <? if ($l[estado] == "PA") echo "selected"; ?>>PA</option>
		<option value="PB" <? if ($l[estado] == "PB") echo "selected"; ?>>PB</option>
		<option value="PE" <? if ($l[estado] == "PE") echo "selected"; ?>>PE</option>
		<option value="PI" <? if ($l[estado] == "PI") echo "selected"; ?>>PI</option>
		<option value="PR" <? if ($l[estado] == "PR") echo "selected"; ?>>PR</option>
		<option value="RJ" <? if ($l[estado] == "RJ") echo "selected"; ?>>RJ</option>
		<option value="RN" <? if ($l[estado] == "RN") echo "selected"; ?>>RN</option>
		<option value="RO" <? if ($l[estado] == "RO") echo "selected"; ?>>RO</option>
		<option value="RR" <? if ($l[estado] == "RR") echo "selected"; ?>>RR</option>
		<option value="RS" <? if ($l[estado] == "RS") echo "selected"; ?>>RS</option>
		<option value="SC" <? if ($l[estado] == "SC") echo "selected"; ?>>SC</option>
		<option value="SE" <? if ($l[estado] == "SE") echo "selected"; ?>>SE</option>
		<option value="SP" <? if ($l[estado] == "SP") echo "selected"; ?>>SP</option>
		<option value="TO" <? if ($l[estado] == "TO") echo "selected"; ?>>TO</option>
	</select>
	</td>
  </tr>
  <tr>
    <td width="50%">Estado Civil:</td>
    <td width="50%"><select size="1" name="estadocivil" style="font-family: Verdana; font-size: 10 px"><option value=" " <?if($l[estadocivil]==null){echo"selected";}?>>Escolha:</option><option value="Solteiro(a)" <?if($l[estadocivil]=="Solteiro(a)"){echo"selected";}?>>Solteiro(a)</option><option value="Casado(a)" <?if($l[estadocivil]=="Casado(a)"){echo"selected";}?>>Casado(a)</option><option value="Namorado(a)" <?if($l[estadocivil]=="Namorado(a)"){echo"selected";}?>>Namorado(a)</option></select></td>
  </tr>
  <tr>
    <td width="50%">Sexo:</td>
    <td width="50%"><select size="1" name="sexo" style="font-family: Verdana; font-size: 10 px"><option value="" <?if($l[sexo]==null){echo"selected";}?>>Escolha:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option><option value="Masculino" <?if($l[sexo]=="Masculino"){echo"selected";}?>>Masculino</option><option value="Feminino" <?if($l[sexo]=="Feminino"){echo"selected";}?>>Feminino</option></select></td>
  </tr>
  <tr>
    <td width="50%">Idade:</td>
    <td width="50%"><select size="1" name="idade" style="font-family: Verdana; font-size: 10 px">
    <option value="" <?if($l[idade]==null){echo"selected";}?>>Escolha:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
	<option value="">&nbsp;</option>
	<?
	for ($i = 10; $i <= 80; $i++)  { ?>
	<option value="<?=$i;?>" <?if ($l[idade] == $i) { echo"selected";}?>><?=$i;?></option>
	<? } ?>
	</select></td>
  </tr>
  <tr>
    <td width="50%">Signo:</td>
    <td width="50%"><select size="1" name="signo" style="font-family: Verdana; font-size: 10 px">
		<option value="" <?if(!$l[signo]){echo"selected";}?>>Escolha:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		<option value="Áries" <?if($l[signo]=="Áries"){echo"selected";}?>>Áries</option>
		<option value="Touro" <?if($l[signo]=="Touro"){echo"selected";}?>>Touro</option>
		<option value="Gêmeos" <?if($l[signo]=="Gêmeos"){echo"selected";}?>>Gêmeos</option>
		<option value="Câncer" <?if($l[signo]=="Câncer"){echo"selected";}?>>Câncer</option>
		<option value="Leão" <?if($l[signo]=="Leão"){echo"selected";}?>>Leão</option>
		<option value="Virgem" <?if($l[signo]=="Virgem"){echo"selected";}?>>Virgem</option>
		<option value="Libra" <?if($l[signo]=="Libra"){echo"selected";}?>>Libra</option>
		<option value="Escorpião" <?if($l[signo]=="Escorpião"){echo"selected";}?>>Escorpião</option>
		<option value="Sagitário" <?if($l[signo]=="Sagitário"){echo"selected";}?>>Sagitário</option>
		<option value="Capricórnio" <?if($l[signo]=="Capricórnio"){echo"selected";}?>>Capricórnio</option>
		<option value="Aquário" <?if($l[signo]=="Aquário"){echo"selected";}?>>Aquário</option>
		<option value="Peixes" <?if($l[signo]=="Peixes"){echo"selected";}?>>Peixes</option></select>
	</td>
  </tr>
  <tr>
    <td width="50%">Fumante?</td>
    <td width="50%"><select size="1" name="fumante" style="font-family: Verdana; font-size: 10 px">
		<option value="" <?if($l[fumante]==null){echo"selected";}?>>Escolha:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
		<option value="Sim" <?if($l[fumante]=="Sim"){echo"selected";}?>>Sim</option>
		<option value="Não" <?if($l[fumante]=="Não"){echo"selected";}?>>Não</option>
		<option value="As vezes" <?if($l[fumante]=="As vezes"){echo"selected";}?>>As vezes</option>
	</td>
  </tr>
</table>

<br>
<hr color="#C0C0C0" width="80%" size="1">
<br>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="100%">
  <tr>
    <td width="50%">Rede de Chat preferida:</td>
    <td width="50%">
	<select name="rede" class="loginsenha">
	<option value="">Rede:</option>
	<option value="">---</option>
	<?
	$queryrede = mysql_query("select * from redes where chkrede = '1' order by rede");
	while ($queryredel = mysql_fetch_array($queryrede)) {
	?>
	<option value="<?=$queryredel[rede]?>" <? if ($l[rede] == $queryredel[rede]) echo "selected";?>><?=$queryredel[rede]?></option>
	<?
	}
	?>
	<option value="">---</option>
</select>
  </tr>
  <tr>
    <td width="50%">Canal de Chat (Apenas 1):</td>
    <td width="50%">
    <input type="text" name="canal" value="<?=$l[canal];?>" size="23" maxlength="50" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
</table>

<br>
<hr color="#C0C0C0" width="80%" size="1">
<br>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="100%">
  <tr>
    <td width="50%">Um filme:</td>
    <td width="50%">
    <input type="text" name="filme" value="<?=$l[filme];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Um livro:</td>
    <td width="50%">
    <input type="text" name="livro" value="<?=$l[livro];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Um prato:</td>
    <td width="50%">
    <input type="text" name="prato" value="<?=$l[prato];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Um lugar:</td>
    <td width="50%">
    <input type="text" name="lugar" value="<?=$l[lugar];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Um temor:</td>
    <td width="50%">
    <input type="text" name="temor" value="<?=$l[temor];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Um sonho:</td>
    <td width="50%">
    <input type="text" name="sonho" value="<?=$l[sonho];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Uma personalidade:</td>
    <td width="50%">
    <input type="text" name="personalidade" value="<?=$l[personalidade];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Uma boa recordação:</td>
    <td width="50%">
    <input type="text" name="boarecordacao" value="<?=$l[boarecordacao];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Uma má recordação:</td>
    <td width="50%">
    <input type="text" name="marecordacao" value="<?=$l[marecordacao];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%" height="20">Se considera vIRCiado(a)?</td>
    <td width="50%" height="20">
    <input type="text" name="virciado" value="<?=$l[virciado];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Já fez sexo virtual?</td>
    <td width="50%">
    <input type="text" name="sexovirtual" value="<?=$l[sexovirtual];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Onde fica na Internet (irc, icq, etc)?</td>
    <td width="50%">
    <input type="text" name="ondefica" value="<?=$l[ondefica];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Quais suas atividades na Internet?</td>
    <td width="50%">
    <input type="text" name="atividadesinternet" value="<?=$l[atividadesinternet];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Quais suas atividades no dia-a-dia?</td>
    <td width="50%">
    <input type="text" name="atividadesdiaadia" value="<?=$l[atividadesdiaadia];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Diga um pouco sobre você:</td>
    <td width="50%">
    <input type="text" name="sobrevoce" value="<?=$l[sobrevoce];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
  <tr>
    <td width="50%">Abobrinha final... fique a vontade :)</td>
    <td width="50%">
    <input type="text" name="abobrinha" value="<?=$l[abobrinha];?>" size="39" maxlength="250" style="height: 16; font-family: Verdana; font-size: 10 px; color: #FF8000; border: 1px solid #999999"></td>
  </tr>
</table>


<?
if ($l[colunista]) { ?>
<br>
<hr color="#C0C0C0" width="80%" size="1">
<br>

<table border="1" cellpadding="2" style="border-collapse: collapse" bordercolor="#E0E0E0" width="100%">
  <tr>
    <td width="50%"><b>Colunista</b>:<br>Sua descrição:</td>
    <td width="50%">
    <textarea rows="6" cols="40" name="descricao" style="font-family: Verdana; font-size: 10 px"><?=$l[descricao]?></textarea>
    </td>
  </tr>
</table>
<br>
<? } ?>

<input type="submit" value="Atualizar Dados" style="font-family: Verdana; font-size: 10 px; float: right">
</form>

<br><br><hr color="#C0C0C0" width="40%" size="1"><br>

<?
include ("inc/user/upload.php");
?>