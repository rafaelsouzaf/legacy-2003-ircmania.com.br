<?
$mysql_host = "127.0.0.1";
$mysql_user = "vircio";
$mysql_pass = "V!rc!O";
$mysql_db = "ircmania";

	$link = mysql_connect($mysql_host, $mysql_user, $mysql_pass);
	mysql_select_db($mysql_db);
	if (!$link) die("Erro ao conectar no Bando de Dados. Tente novamente daqui a alguns minutos");

include("config.php");
include("includes/ident.php");
include("includes/lang/pt.php");
include("funcoes.php");

	$canal = $HTTP_GET_VARS['canal'];
	$nick = $HTTP_GET_VARS['nick'];
	$id = $HTTP_GET_VARS['id'];

set_time_limit(3600);
?>
<html>
<head>
<title>ChatMania</title>
<?=$css?>

<script language="JavaScript">
<!--;
interID = setInterval('scrollBy(0,200)', 1);
//-->
</script>

</head>
<body bgcolor="<?=$chan_bg?>" text="<?=$chan_fg?>" bgproperties="fixed" background="imagens/fundo.gif">
<br><br><br><br><br>
*** <?=$lang_verifica1?><br>
*** <?=$lang_verifica2?><br>
*** <?=$lang_verifica3?><br><br>
<?
include("includes/conectando.php");
mysql_close($link);

while($conecta) {
    $out = fgets($conecta, 4096);
    $out = rtrim($out);

	if (preg_match("/PING (:.+)/", $out, $matches)) {
	    fputs($conecta, "PONG $matches[1]\r\n");
		fputs($conecta, "NAMES #$canal\r\n");

			if ($users > 65) {
		    echo "*** Atualizando lista de nicks ...<br>";
			}

		$ping++;

		if ($ping > 60) {
		fputs($conecta, "QUIT :www.ChatMania.com.br\r\n");
		}


	} elseif (preg_match("/.+433.+:nickname is already in use/i", $out)) {
	    $nick .= rand(0,9);
	    echo "<font color='$ircColors[7]'>Apelido atualmente em uso, mudando para: $nick</font><br>\n";
	    fputs($conecta, "NICK :$nick\r\n");
		$nick = $nick;

	} elseif (preg_match("/:([^\s]+) NOTICE ([^\s]+) :(.+)/", $out, $matches)) {
	    $src = $matches[1];
		$text = mirchtml($matches[3]);

		if (preg_match("/([^!]+)!.+/", $src, $matches)) {
		$src = $matches[1];
		}
		echo "<font color='$ircColors[5]'>-$src- $text</font><br>";

	} elseif (preg_match("/:([^!]+)![^\s]+ QUIT :(.+)/", $out, $matches)) {
	    echo "<font color='$ircColors[2]'>*** $matches[1] saiu &lt;=</font><br>";

			if ($matches[1] == $nick) {
			fputs($conecta, "QUIT :www.ChatMania.com.br\r\n");
			}

			if ($users < 65) {
			fputs($conecta, "NAMES #$canal\r\n");
			}

	} elseif (preg_match("/$matches[0] (\d+) ([^\s]+) (.+)/i", $out, $matches)) {

	    if ($matches[1] == "376") {
		fputs($conecta, "JOIN #$canal\r\n");
		}

	    else if ($matches[1] == "353") {
			if (preg_match("/= (\#[^\s]+) :(.+)/", $matches[3], $match)) {
			$namelist .= $match[2];
			}
	    }

		else if ($matches[1] == "366") {
			if (preg_match("/(#[^\s]+)/", $matches[3], $match)) {
				$arro = explode(" ", $namelist);
				natcasesort($arro);
				$namelist = implode(":", $arro);
				$users = count($arro);
				?>
				<script language="JavaScript">
				<!--
				   parent.document.title = ':: ChatMania -> <?="#".ucfirst($canal)?> = <?=$users?> usuário(s)';
				// -->
				</script>
				<?
			    echo "\n<script language='JavaScript'>\n<!--;\n\nparent.nixreload(':$namelist');\n\n//-->\n</script>\n\n";
			    $namelist = "";
			}
	    }

		else if ($matches[1] == "332") {
			if (preg_match("/(#[^\s]+) :(.+)/", $matches[3], $match)) {
				$match[2] = mirchtml($match[2]);
			    echo "<font color='$ircColors[7]'>--- Tópico do $match[1] é: $match[2]</font><br>";
			}
	    }


####################
########## whois
####################

		else if ($matches[1] == "311") {
			if (preg_match("/(.+) (.+) (.+) (.+) :(.*)/", $matches[3], $match)) {
				$match[5] = mirchtml($match[5]);
			    echo "<font color='$ircColors[7]'>--------------------------------------------------------------------<br>---  $match[1] é $match[2]@$match[3]<br>--- Nome Real: $match[5]</font><br>";
			}
	    }
		else if ($matches[1] == "312") {
			if (preg_match("/(.+) (.+) :(.*)/", $matches[3], $match)) {
			    echo "<font color='$ircColors[7]'>---  Servidor: $match[2] ($match[3])</font><br>";
			}
	    }
		else if ($matches[1] == "313") {
			if (preg_match("/(.+) :(.*)/", $matches[3], $match)) {
			    echo "<font color='$ircColors[7]'>---  $match[1] $match[2]</font><br>";
			}
	    }
		else if ($matches[1] == "317") {
			if (preg_match("/(.+) (.+) (.+) :(.*)/", $matches[3], $match)) {
				$inativo = date("s", $match[2]);
				$online = date("d/m/y - H:i", $match[3]);
			    echo "<font color='$ircColors[7]'>--- Inativo há: $inativo segundos ::: Online Desde: $online</font><br>";
			}
	    }
		else if ($matches[1] == "319") {
			if (preg_match("/(.+) :(.*)/", $matches[3], $match)) {
			    echo "<font color='$ircColors[7]'>---  Salas: $match[2]</font><br>";
			}
	    }
		else if ($matches[1] == "318") {
			    echo "<font color='$ircColors[7]'>--------------------------------------------------------------------</font><br>";
	    }

####################
########## whois fim
####################

		else if ($matches[1] == "401") {
		echo "<font color='$ircColors[7]'>--- Opss! Canal/Nick não encontrado!</font><br>";
	    }

		else if ($matches[1] == "465") {
			if (preg_match("/:(.*)/", $matches[3], $match)) {
		    echo "<font color='$ircColors[4]'>--- Opss! Você foi banido deste servidor - $match[1].<br>--- Ou entre em contato com a administração do portal relatando o problema => <a href='mailto:webmaster@chatmania.com.br'>webmaster@chatmania.com.br</a></font><br><br>";
			}
	    }

		else if ($matches[1] == "474") {
			if (preg_match("/#(.+) :(.+)/", $matches[3], $match)) {
			echo "<br><font color='$ircColors[7]'>--- Opss! --- Você está banido da sala #$match[1]. Por favor, escolhe outra sala ou tenta mais tarde.</font><br>";
			}
	    }

		else if ($matches[1] == "477") {
		echo "<br><font color='$ircColors[7]'>--- Você precisa estar com o seu apelido registrado e identificado para entrar na sala #$canal da rede $rede. Digite <b>/nickserv help</b> para mais informações.</font><br>";
	    }

		else {
//		echo "<font color='$ircColors[12]'>-$serv_name- $matches[3]</font><br>";
	    }

	} elseif (preg_match("/:([^!]+)![^\s]+ PRIVMSG ([^\s]+) :(.+)/", $out, $matches)) {

		$msgpura = $matches[3];
	    $matches[3] = mirchtml($matches[3]);

	    if (preg_match("/\001(\w+)(.*)/i", $matches[3], $match)) {

			if ($match[1] == "VERSION") {
			    fputs($conecta, "NOTICE $matches[1] :\001VERSION www.ChatMania.com.br -  PHPChat\r\n");
			} elseif ($match[1] == "PING") {
			    fputs($conecta, "NOTICE $matches[1] :\001PING$match[2]\r\n");
			} elseif ($match[1] == "CLIENTINFO") {
			    fputs($conecta, "NOTICE $matches[1] :\001CLIENTINFO ip: $REMOTE_ADDR ; {$HTTP_SERVER_VARS['REMOTE_HOST']}\001\r\n");
			    fputs($conecta, "NOTICE $matches[1] :\001CLIENTINFO useragent: {$HTTP_SERVER_VARS['HTTP_USER_AGENT']}\001\r\n");
			} elseif ($match[1] == "ACTION") {
			    $matches[3] = substr($matches[3],7);
			    echo "<font color='$ircColors[6]'>* $matches[1] $matches[3]</font><br>";
			} elseif ($match[1] == "DCC") {
			    preg_match("/^[\W]*(\w+)\s+([^\s]+)\s+\d+\s+\d+[\s\d]*/", "$match[2]", $blaat);
			    echo "<font color='$ircColors[5]'>-- Ignored DCC from $matches[1] ($blaat[1] $blaat[2])</font><br>";
			    fputs($conecta, "NOTICE $matches[1] :Desculpe, mas meu cliente (www.ChatMania.com.br -  PHPChat) não suporta DCC.\r\n");
			} else {
			    echo "CTCP: $matches[3]<br>";
			}
			} elseif (!preg_match("/^#.+/", $matches[2])) {
				echo "<table border=0 cellpadding=0 cellspacing=2 width=100% bgcolor=#EAEAEA><tr><td width=100%>";
				echo "* &lt;<font color='$ircColors[7]'>$matches[1]</font>&gt; (Privado) $matches[3]";
				echo "</td></tr></table>";

		} else {
			echo "&lt;$matches[1]&gt; $matches[3]<br>";
	    }

	} elseif (preg_match("/:([^!]+)![^\s]+ NICK :(.+)/", $out, $matches)) {
		echo "<font color='$ircColors[3]'>*** $matches[1] é agora $matches[2]</font><br>";

			if ($users < 65) {
			fputs($conecta, "NAMES #$canal\r\n");
			}

	} elseif (preg_match("/:([^!]+)![^\s]+ JOIN :(.+)/", $out, $matches)) {
	    echo "<font color='$ircColors[3]'>*** $matches[1] entrou =&gt;</font><br>";

			if ($users < 65) {
			fputs($conecta, "NAMES #$canal\r\n");
			}
	    
	} elseif (preg_match("/:([^!]+)![^\s]+ PART (.+)/", $out, $matches)) {
	    if (preg_match("/(#[^\s]+) :(.+)/", $matches[2], $match)) {
		echo "<font color='$ircColors[2]'>*** $matches[1] saiu &lt;=</font><br>";
	    } else {
		echo "<font color='$ircColors[2]'>*** $matches[1] saiu &lt;=</font><br>";
	    }

			if ($users < 65) {
			fputs($conecta, "NAMES #$canal\r\n");
			}

	} elseif (preg_match("/:([^!]+)![^\s]+ TOPIC (#[^\s]+) :(.*)/", $out, $matches)) {
		$matches[3] = mirchtml($matches[3]);
	    echo "<font color='$ircColors[7]'>--- $matches[1] mudou tópico para: $matches[3]</font><br>";

	} elseif (preg_match("/:([^!]+)![^\s]+ MODE (#[^\s]+) ([^\s]+) (.+)/", $out, $matches)) {
	    echo "<font color='$ircColors[7]'>--- $matches[1] setou modo $matches[3] em $matches[4]</font><br>";

	} elseif (preg_match("/:([^\s]+) MODE ([^\s]+) :(.+)/", $out, $matches)) {
	    echo "<font color='$ircColors[7]'>--- $matches[1] setou modo $matches[3] em $matches[2]</font><br>";

	} elseif (preg_match("/:([^!]+)![^\s]+ KICK (#[^\s]+) (.*) :(.*)/ ", $out, $matches)) {
		$matches[4] = mirchtml($matches[4]);

		if ($matches[3] == $nick) {
		echo "<font color='$ircColors[4]'>--- Você foi expulso da sala #$canal por $matches[1] ($matches[4])</font><br>";
		fim();

		} else {
		echo "<font color='$ircColors[4]'>--- $matches[3] foi expulso(a) da sala #$canal por $matches[1] ($matches[4])</font><br>";
		}

			if ($users < 65) {
			fputs($conecta, "NAMES #$canal\r\n");
			}

	} else {
//		echo "$out<br>";
	}

    flush();
    usleep(2500);
}

fclose($conecta);
fim();

?>