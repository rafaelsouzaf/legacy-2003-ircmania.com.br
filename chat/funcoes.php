<?
function fim () {
	if (file_exists($filename)) {
	unlink($filename);
	}
	die();
}

function mirc2hex ($cor)
{
	switch ((int) $cor) {
		case 0:
			return '#FFFFFF';
		case 1:
			return '#000000';
		case 2:
			return '#00007F';
		case 3:
			return '#009300';
		case 4:
			return '#FF0000';
		case 5:
			return '#7F0000';
		case 6:
			return '#9C009C';
		case 7:
			return '#FC7F00';
		case 8:
			return '#FFFF00';
		case 9:
			return '#00FC00';
		case 10:
			return '#009393';
		case 11:
			return '#00FFFF';
		case 12:
			return '#0000FC';
		case 13:
			return '#FF00FF';
		case 14:
			return '#7F7F7F';
		case 15:
			return '#D2D2D2';
	}
}


function mirchtml ($texto)
{
	$texto = htmlspecialchars($texto);
	
	$wrap = false;
	
	$bold = false;
	$uline = false;
	$tmptxt = '';
	$temfundo = false;
	$cortexto = '';
	$corfundo = '';
	$numcf = 0;
	$numct = 0;
	$numb = 0;
	$numu = 0;
	$espaço = false;
	
	$txtlen = strlen($texto);
	$chrlen = 0;
	$maxlen = 60;
	
	for ($i = 0; $i < $txtlen; $i++) {
		switch ($texto{$i}) {
			case ' ':
				if ($espaço) {
					$tmptxt .= '&nbsp;';
					$espaço = false;
				}
				else {
					$tmptxt .= $texto{$i};
					$espaço = true;
				}
				$chrlen = 0;
				break;
			case '': // bold
				$bold = !$bold;
				if ($bold) {
					$tmptxt .= '<b>';
					$numb++;
				}
				else {
					$tmptxt .= '</b>';
					$numb--;
				}
				break;
			case '': // uline
				$uline = !$uline;
				if ($uline) {
					$tmptxt .= '<u>';
					$numu++;
				}
				else {
					$tmptxt .= '</u>';
					$numu--;
				}
				break;
			case '': // desliga formataçao
				while ($numcf + $numct > 0) {
					if ($bold) {
						$bold = false;
						$tmptxt .= '</b>';
						$numb--;
					}
					if ($uline) {
						$uline = false;
						$tmptxt .= '</u>';
						$numu--;
					}
					if ($numcf > 0) {
						$tmptxt .= '</span>';
						$numcf--;
					}
					if ($numct > 0) {
						$tmptxt .= '</font>';
						$numct--;
					}
				};
				break;
			case '': // texto em negativo
				if ($i == $txtlen - 1) break;
				$tmptxt .= "<font color=\"" . mirc2hex(0) . "\">";
				$numct++;
				$tmptxt .= "<span style=\"background-color: " . mirc2hex(1) . "\">";
				$numcf++;
				break;
			case '': // cor
				if ($i == $txtlen - 1) break;
				if (!is_numeric($texto{$i+1})) { //desliga a cor
					while ($numcf + $numct > 0) {
						if ($numcf > 0) {
							$tmptxt .= '</span>';
							$numcf--;
						}
						if ($numct > 0) {
							$tmptxt .= '</font>';
							$numct--;
						}
					};
					break;
				}
				for ($x = $i + 1; $x <= $i + 5; $x++) {
					if (is_numeric($texto{$x})) {
						if ($temfundo) {
							if (strlen($corfundo) < 2) $corfundo .= $texto{$x};
							else break;
						}
						else {
							if (strlen($cortexto) < 2) $cortexto .= $texto{$x};
							else break;
						}
					}
					elseif ($texto{$x} == ',') $temfundo = true;
					else break;
					if ($x == $txtlen - 1) break;
				}
				if ($corfundo == '') $temfundo = false;
				$i += strlen($cortexto);
				if (($cortexto != '') and ($cortexto > 15)) {
					if ($cortexto == '99') $cortexto = '-1';
					else $cortexto %= 16;
				}
				if ($temfundo) {
					$i += strlen($corfundo) + 1;
					if ($corfundo > 15) {
						if ($corfundo == '99') $corfundo = '-1';
						else $corfundo %= 16;
					}
				}
				if ($cortexto != '') {
					if ($cortexto == '-1') {
						while ($numct > 0) {
							if ($numct > 0) {
								$tmptxt .= '</font>';
								$numct--;
							}
						};
						break;
					}
					$tmptxt .= "<font color=\"" . mirc2hex($cortexto) . "\">";
					$numct++;
				}
				if (($temfundo) and ($corfundo != '')) {
					if ($corfundo == '-1') {
						while ($numcf > 0) {
							if ($numcf > 0) {
								$tmptxt .= '</span>';
								$numcf--;
							}
						};
						break;
					}	
					$tmptxt .= "<span style=\"background-color: " . mirc2hex($corfundo) . "\">";
					$numcf++;
				}
				$temfundo = false;
				$cortexto = '';
				$corfundo = '';
				break;
			default: // texto
				$tmptxt .= $texto{$i};
				if ($wrap) $chrlen++;
				break;
		}
		if (($wrap) and ($chrlen >= $maxlen)) {
			$tmptxt .= ' ';
			$chrlen = 0;
		}
	}
	while ($numb + $numu + $numcf + $numct > 0) {
		if ($numb > 0) {
			$tmptxt .= '</b>';
			$numb--;
		}
		if ($numu > 0) {
			$tmptxt .= '</u>';
			$numu--;
		}
		if ($numcf > 0) {
			$tmptxt .= '</span>';
			$numcf--;
		}
		if ($numct > 0) {
			$tmptxt .= '</font>';
			$numct--;
		}
	}
	return $tmptxt;
}

?>