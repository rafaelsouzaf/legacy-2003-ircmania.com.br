<?
set_time_limit(0);

class voto {

	function voto() {

		$this->conecta = fsockopen('localhost', 6667);
		fputs($this->conecta,"NICK voto\n\n");
		fputs($this->conecta,"USER voto voto voto :voto\n\n");

		while ($read = fgets($this->conecta)) {

			$separa = explode(" ",$read);

			if ($separa[0] == "PING")
				fputs($this->conecta, 'PONG '.str_replace(':','',$separa[1])."\n");
				
			if ($separa[1] == 375) {

				fputs($this->conecta,"join #mania28\n");
				fputs($this->conecta,"nickserv identify torrada171\n");
				fputs($this->conecta,"imode voto -bckrgvydef\n");

			}

			if (($separa[1] == "PRIVMSG") and ($separa[3] == ":candidato") and ($separa[4])) {

				$teste1 = null;
				$teste2 = null;
				$teste3 = null;
				$teste4 = null;

				$nickVotante = explode("!", substr($separa[0], 1));
				$nickVotante = $nickVotante[0];
				$nickCandidato = $separa[4];
				$nickCandidato = str_replace("\r\n", "", $nickCandidato);

				$teste1 = $this->verificaEleitor($nickVotante);

				if ($teste1) {
					ob_clean();
					$teste2 = $this->verificaWhois($nickVotante);
				}

				if ($teste2) {
					ob_clean();
					$teste3 = $this->verificaInfo($nickVotante);
				}

				if ($teste3) {
					ob_clean();
					$teste4 = $this->verificaCandidato($nickCandidato, $nickVotante);
				}

				if ($teste4) {
					ob_clean();
					$this->efetivaVoto($nickVotante, $nickCandidato);

					fputs($this->conecta, "PRIVMSG $nickVotante :##### Voto contabilizado! Agradecemos a participação :-) #####\n");
					fputs($this->conecta, "PRIVMSG $nickVotante :##### Os 5 candidatos mais votados serão IRCops #####\n");
					fputs($this->conecta, "PRIVMSG $nickVotante :##### O primeiro candidato será founder do canal #Ajuda #####\n");
					fputs($this->conecta, "PRIVMSG $nickVotante :##### O Resultado sairá no próximo dia XX #####\n");

				}

			}

			ob_clean();

		}

	}
	
	function verificaWhois($votante) {

		fputs($this->conecta,"whois $votante\n");
		while ($read = fgets($this->conecta)) {

			$separa = explode(" ",$read);

			if ($separa[0] == "PING")
				fputs($this->conecta, 'PONG '.str_replace(':','',$separa[1])."\n");

			if ($separa[1] == 307) {

				fputs($this->conecta, "PRIVMSG $votante :Ok - Usuário $votante é registrado!\n");
				return true;

			}

			if ($separa[1] == 318) {

				fputs($this->conecta, "PRIVMSG $votante :Erro - Usuário $votante NAO é registrado!\n");
				return false;

			}

		}

	}

	function verificaInfo($votante) {

		fputs($this->conecta, "nickserv info $votante\n");
		while ($read = fgets($this->conecta)) {

			$separa = explode(" ",$read);

			if ($separa[0] == "PING")
				fputs($this->conecta, 'PONG '.str_replace(':','',$separa[1])."\n");

			if (($separa[1] == "NOTICE") and ($separa[28])) {

				$dias = str_replace("", "", $separa[20]);

				if ($dias > 89) {

					fputs($this->conecta, "PRIVMSG $votante :Ok - Usuário $votante está registrado a $dias dias\n");
					return true;

				}

				if ($dias <= 89) {

					fputs($this->conecta, "PRIVMSG $votante :Erro - Usuário $votante está registrado a APENAS $dias dias\n");
					return false;

				}

			}

			if ($separa[5] == "não") {

					fputs($this->conecta, "PRIVMSG $votante :Erro - Usuário $votante nao está habilitado\n");
					return false;

			}

			if ($separa[4] == "informação") {

					fputs($this->conecta, "PRIVMSG $votante :Erro - Informações (/nickserv info) sobre $votante nao pode estar privada!\n");
					return false;

			}

		}

	}

	function verificaCandidato($candidato, $nickVotante) {

		fputs($this->conecta, "nickserv info $candidato\n");
		while ($read = fgets($this->conecta)) {

			$separa = explode(" ",$read);

			if ($separa[0] == "PING")
				fputs($this->conecta, 'PONG '.str_replace(':','',$separa[1])."\n");

			if (($separa[1] == "NOTICE") and ($separa[28])) {

				$dias = str_replace("", "", $separa[20]);

				if ($dias > 89) {

					fputs($this->conecta, "PRIVMSG $nickVotante :Ok - Candidato $candidato está habilitado\n");
					return true;

				}

				if ($dias <= 89) {

					fputs($this->conecta, "PRIVMSG $nickVotante :Erro - Candidato $candidato nao está habilitado\n");
					return false;

				}

			}

			if ($separa[5] == "não") {

					fputs($this->conecta, "PRIVMSG $nickVotante :Erro - Candidato $candidato nao está habilitado\n");
					return false;

			}

			if ($separa[4] == "informação") {

					fputs($this->conecta, "PRIVMSG $nickVotante :Erro - Informações (/nickserv info) sobre $candidato nao pode estar privada!\n");
					return false;

			}

		}

	}


	function verificaEleitor($votante) {

		mysql_connect("localhost", "vircio", "V!rc!O") or die ("Erro ao conectar");
		mysql_select_db("ircmania") or die ("Erro ao selecionar base");

		$query = mysql_query("select * from votacao where eleitor = '$votante'");
		if (mysql_num_rows($query)) {

			fputs($this->conecta, "PRIVMSG $votante :Erro - Usuário $votante já votou!\n");
			mysql_close();
			return false;

		} else {

			mysql_close();
			return true;

		}

	}

	function efetivaVoto($votante, $votado) {

		mysql_connect("localhost", "vircio", "V!rc!O") or die ("Erro ao conectar");
		mysql_select_db("ircmania") or die ("Erro ao selecionar base");

		$sql = "INSERT INTO votacao (candidato, eleitor) VALUES ('$votado', '$votante')"; 
		mysql_query($sql);

		mysql_close();
		return;

	}


}

while (true)
	$teste = new voto;

?>