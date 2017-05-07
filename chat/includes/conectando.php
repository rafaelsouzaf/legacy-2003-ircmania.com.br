<?

	$query = mysql_query("select * from redes where rede='$rede'");
	$conex = mysql_fetch_array($query);

	if (!$conex[rede]) {
	echo "*** <font color='#FF0000'>*** A rede <b>$rede</b> não está cadastrada em nosso banco de dados.</font><br>";
	flush();
	die();
	}

		if ($rede == "VirtuaLife") {
		$conecta = fsockopen('gunsnroses.virtualife.com.br', '6667', $errno, $errstr, 5); flush();
		}
		else if ($rede == "PHEYnet") {
		$conecta = fsockopen('oasis.phey.net', '21600', $errno, $errstr, 5); flush();
		}
		else {
		$conecta = fsockopen($conex[irc], '6667', $errno, $errstr, 5); flush();
		}

	if (!$conecta) {
	echo "*** Conectando ao servidor 2...<br>";
	$conecta = fsockopen($conex[irc1], '6667', $errno, $errstr, 5); flush();

		if (!$conecta) {
		echo "*** Conectando ao servidor 3...<br>";
		$conecta = fsockopen($conex[irc2], '6667', $errno, $errstr, 5); flush();

			if (!$conecta) {
			echo "*** Conectando ao servidor 4...<br>";
			$conecta = fsockopen($conex[irc3], '6667', $errno, $errstr, 5); flush();

				if (!$conecta) {
				echo "<br>*** Não foi possível conectar a rede $rede. Se desejar escolha outra rede de chat:<br><br>";
				?>
				<form action="main.php?rede=<?=$rede?>&username=<?=$username?>&canal=<?=$canal?>&id=<?=$id?>&imgs=<?=$imgs?>" method="post">
			    <select size="1" name="rede" class="formwebirc">
			    <option value="">Escolha a Rede:</option>
			    <option value="">----</option>
				<?
				$randoqueryb = mysql_query("select * from redes where chkrede = '1'");
				while ($randolb = mysql_fetch_array($randoqueryb)) {
				?>
			    <option value="<?=$randolb[rede]?>">Rede <?=$randolb[rede]?></option>
				<? } ?>
			    </select>
				<input type="submit" value="Entrar">
				</form>

				<?
				flush();
				}
			}
		}
	}

	if ($conecta) {
	fputs($conecta, "USER $ident $REMOTE_ADDR chatmania :$REMOTE_ADDR www.chatmania.com.br\r\n");
	fputs($conecta, "NICK :".$nick."\r\n");
	socket_set_blocking($conecta, false);
	}

?>