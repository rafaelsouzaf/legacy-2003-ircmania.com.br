<?
include 'conexao.php';

	set_time_limit(0);
	$data = time();

//	$queryrede = mysql_query("select * from redes where rede = 'PheyNet'");
	$queryrede = mysql_query("select * from redes where chkrede = '1' order by ultima asc");
	$l = mysql_fetch_array($queryrede);

	$update = "update redes set ultima='$data' where rede='$l[rede]'";
	mysql_query($update);
	echo "Iniciando... Rede $l[rede]<br>Por favor, não interrompa o processo até estar declaradamente encerrado.<br>Aguarde...<br><br>";
	flush();

$nick = "ChatMania".rand(0,9);
$msg = " www.ChatMania.com.br ";

	$conecta = fsockopen($l[irc], 6667, $errno, $errstr, 5);

		if (!$conecta) {
		$conecta = fsockopen($l[irc1], 6667, $errno, $errstr, 5);
			if (!$conecta) {
			$conecta = fsockopen($l[irc2], 6667, $errno, $errstr, 5);
				if (!$conecta) {
				$conecta = fsockopen($l[irc3], 6667, $errno, $errstr, 5);
					if (!$conecta) {
					$conecta = fsockopen($l[irc], 6667, $errno, $errstr, 5);
						if (!$conecta) {
						echo $l[rede]." Error $errno $errstr\n";
						$hora = date("d/m/y H:i:s", $data);
//						mail("webmaster@ircmania.com.br", "IRCsearch Bot Error", "$l[rede] :::: $l[irc] -  $l[irc1] -  $l[irc2] -  $l[irc3]\n$errstr ($errno)\n$hora");
						die();
						}
					}
				}
			}
		}

	fputs($conecta,"NICK $nick\n\n");
	fputs($conecta,"USER buscando 0 0 :$msg\n\n");

while ($read = fgets($conecta,2048)) {
//echo "$read <br>"; flush();
//echo "$canal - "; flush();

	$read = str_replace("\n","",$read);
	$read = str_replace("\r","",$read);
	$read2 = explode(" ",$read);

	if ($read2[0] == "PING") {
		fputs($conecta,'PONG '.str_replace(':','',$read2[1])."\n");
		++$ping;
		if ($ping >= 10) fputs($conecta,"quit :$msg\n\n");
	}

	if (($read2[1] == 375) or ($read2[1] == 005)) {
		mysql_query("delete from redes_stats where rede = '$l[rede]'");
		fputs($conecta,"join #Mania26\n");
	}

	if (($read2[1] == 376) or ($read2[1] == 422)) {
		fputs($conecta,"list >0\n");
	}

	if ($read2[1] == 433) {
	    $nick .= rand(0,9);
	    fputs($conecta, "NICK :$nick\r\n");
	}

	if ($read2[1] == 323) {
		echo "<br><br>Processo finalizado!<br><b>$numero</b> canais encontrados.";
		fputs($conecta,"quit :$msg\n\n");
		break;
	}

	if ($read2[1] == 322) {
		$texto = implode(" ",$read2);

		$texto = ereg_replace("[0-9][0-9],[0-9][0-9]","",$texto);
		$texto = ereg_replace("[0-9][0-9],[0-9]","",$texto);
		$texto = ereg_replace("[0-9][0-9]","",$texto);
		$texto = ereg_replace("[0-9],[0-9][0-9]","",$texto);
		$texto = ereg_replace("[0-9],[0-9]","",$texto);
		$texto = ereg_replace("[0-9]","",$texto);
		$texto = str_replace("","",$texto);
		$texto = str_replace("","",$texto);
		$texto = str_replace("","",$texto);
		$texto = str_replace("","",$texto);
		$texto = str_replace("","",$texto);
		$texto = htmlspecialchars($texto);
		$texto = str_replace("'", "", $texto);
		$texto = str_replace("{", "", $texto);
		$texto = str_replace("}", "", $texto);
		$texto = str_replace("\\", "", $texto);
		$texto = str_replace(",", "", $texto);

		$palavras = split(" ",$texto,6);
		$item1 = $palavras[0];
		$item2 = $palavras[1];
		$item3 = $palavras[2];
		$canal = $palavras[3]; 						// canal
		$users = $palavras[4];						// users
		$topico = " ".substr($palavras[5],1);		// topico

		$insert = "INSERT INTO redes_stats (rede, canal, users, topico, data) VALUES ('$l[rede]', '$canal', '$users', '$topico', '$data')";
		mysql_query($insert);
		$numero++;
	}

	if (eregi("!ircmania",$read)) {
	fputs($conecta,"quit :$quit\n\n");
	break;
	}

}

// Deletando...

$datamenos = time() - 21600; // 6 horas
mysql_query("delete from redes_stats where data < '$datamenos'");
mysql_query("delete from redes_stats where users = 0");
mysql_query("delete from redes_stats where users > 3000");
mysql_query("delete from redes_stats where canal='*' or canal='#' or canal='' or canal='#*'");

?>