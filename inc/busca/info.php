<?
$chavetitle = "Info de #$canal da rede $rede de IRC";

include ("inc/top.php");
include ("inc/header.php");
include ("inc/busca/top.php");

if (getenv("REQUEST_METHOD") == "POST") {

	if (!$msg) {
	echo "<font color='#FF0000'>* Por favor, preencha o campo <u>Comentário</u>.</font><br><br>";
	}

	else {

		if ($usuario) {
		$mensageiro = $usuario;
		} else {
		$mensageiro = "Anonymous";
		}

	$data = time();
	$msg = htmlentities($msg);
	$sqlww = "INSERT INTO livro (canal, rede, nick, ip, msg, data) VALUES ('$canal', '$rede', '$mensageiro', '$REMOTE_ADDR', '$msg', '$data')"; 
	mysql_query($sqlww);
	}

}

$qrede = mysql_query("select * from redes_stats where rede='$rede' and canal='#$canal'");
$qredel = mysql_fetch_array($qrede);

$qredeb = mysql_query("select * from redes where rede='$rede'");
$qredebl = mysql_fetch_array($qredeb);
?>

<table cellPadding="0" width="90%" align="center" border="0" bordercolor="#000000" style="border-style: dotted; border-width: 1">
  <tr>
    <td width="100%"><span style="font-size: 11px"><b>#<u><?=ucfirst($canal)?></u> (Rede <?=$qredebl[rede]?>)</b><br><br>Link para essa página:<br>
    <font color="#0000ff">
    <a href="http://www.chatmania.com.br/busca.php?canal=<?=ucfirst($canal)?>&rede=<?=ucfirst($rede)?>">
    www.chatmania.com.br/busca.php?<font color="#0000ff">canal=</font><font color="#ff0000"><?=ucfirst($canal)?></font><font color="#0000ff">&amp;rede=</font><font color="#ff0000"><?=ucfirst($rede)?></font></a></font><br>
    </td>
  </tr>
</table>

<br>

<table cellPadding="0" width="90%" align="center" border="0">
  <tr>
    <td width="100%" valign="top">
    <p align="center">
    <a href="javascript:;" onClick="MM_openBrWindow('chat/?rede=<?=$rede?>&canal=<?=$canal?>','chat','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=777,height=500')">
	<img border="0" src="imagens/entre.gif" width="79" height="76"></a></p>
    <blockquote>
      <p align="justify"><?=ucfirst($qredel[topico])?></p>
    </blockquote>
    </td>
  </tr>
</table>

<table cellSpacing="0" cellPadding="3" width="90%" align="center" border="0" bordercolor="#000000" style="border-style: dotted; border-width: 1">
  <tr>
    <td vAlign="top" width="50%"><b>U</b>suários: <?=$qredel[users]?><br>
    <b>D</b>ata: <? echo date("d/m/y - H:i", $qredel[data])?><br>
    <br>
    <b>E</b>sse canal de Chat faz parte<br>
    da rede <b><?=ucfirst($rede)?></b> de IRC<br>
    <br>
    <b>S</b>ite Oficial da Rede:<br>
    <a href="http://<?=$qredebl[url]?>" target="_blank"><?=$qredebl[url]?></a></td>
    <td vAlign="top" width="50%">
    <p align="right"><b>I</b>niciante em Chat?<br>
    <a href="outros.php?oqueehirc=ok">Clique aqui</a></p>
    <ul>
      <li>
      <a href="javascript:window.external.AddFavorite('http://www.ChatMania.com.br',%20' ChatMania.com.br - Buscando por salas de chat...')">
      Adicione aos favoritos</a></li>
      <li>
	  <a href="javascript:;" onClick="MM_openBrWindow('busca.php?indique=ok&canal=<?=$canal?>&rede=<?=$rede?>','indique','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=250,height=230')">
      Indique essa sala</a></li>
      <li>
      <a href="outros.php?noseusite=ok&canal=<?=$canal?>&rede=<?=$rede?>">
      Adicione ao seu WebSite</a></li>
    </ul>
    </td>
  </tr>
</table>

<br>
<br>

<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
  <tr>
    <td width="100%">
		<div style='height: 300px; overflow: auto; border: 1px solid'>
		<table bgColor="#ffffff" border="0" cellpadding="0" cellspacing="3" width="100%" style="border-collapse: collapse" bordercolor="#808000">
		  <tr>
		    <td width="100%">

	<?

	if (!isset($x)) {
		$x = "1";
	}

$npag = 15;
$inicio = $x - 1;
$inicio = $inicio * $npag;
$qdef = "select * from livro where rede='$rede' and canal='$canal' order by data desc";
$sql = mysql_query("$qdef LIMIT $inicio,$npag");
$todos = mysql_query($qdef);

$tr = mysql_num_rows($todos);
$tp = ceil($tr / $npag);

	while ($lver = mysql_fetch_array($sql)) {
	?>

<table border="0" cellpadding="2" cellspacing="0" width="100%" bgcolor="#f3f3f3">
  <tr>
    <td width="50%" valign="top"><font face="Verdana"><span style="font-size: 10px;"><strong>Nick: </strong><?=$lver[nick]?></span></font></td>
    <td width="50%" valign="top" align="right"><font face="Verdana"><span style="font-size: 10px;"><strong>Data: </strong><? echo date("d/m/y - H:i", $lver[data]);?></span></font></td>
  </tr>
</table>

<table border="0" cellpadding="5" cellspacing="0" width="100%">
  <tr>
    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><? echo $lver[msg]; ?></span></font></td>
  </tr>
</table>
<br>

<?
}

echo "<center><br>";

$anterior = $x - 1; 
$proximo = $x + 1; 

	if ($x > 1) { 
	echo "<a href='$PHP_SELF?$parte=$name&x=$anterior'><u>Anterior</u></a> | "; 
	} 
	else {
	echo "<u>Anterior</u> | ";
	}

if ($tr > $npag) { 

for ($d=1;$d <= $tp; $d++) { 
if ($x == $d) { $pages = $pages . $d . " | "; } 
else { $pages = $pages . "<a href=\"$PHP_SELF?$parte=$name&x=$d\"><u>$d</u></a> |" . " "; } 
} 
echo $pages;

} 

	if ($x < $tp) {
	echo " <a href='$PHP_SELF?$parte=$name&x=$proximo'><u>Próxima</u></a>";
	}
	else {
	echo " <u>Próxima</u>";
	}
?>

	</td>
  </tr>
</table>
</div>
</td>
  </tr>
</table>

<br>

<form method="POST" action="busca.php?canal=<?=$canal?>&rede=<?=$rede?>">
<table cellSpacing="0" cellPadding="4" width="90%" align="center" border="0">
  <tr>
    <td width="100%"><font face="Courier New" color="#ff8040" size="5"><b>Envie sua Mensagem</b></font></td>
  </tr>
  <tr>
    <td width="100%"><b>Nick:</b><br>
    <input maxLength="30" size="30" name="nick" value="<? if ($usuario) echo $usuario; else echo "Anonymous"; ?>" style="font-family: Verdana; font-size: 10 px" disabled>
    </td>
  </tr>
  <tr>
    <td width="100%"><b>Comentário: (Nào é aceito códigos HTML)</b><br>
    <textarea name="msg" rows="7" cols="60" style="font-family: Verdana; font-size: 10 px"></textarea></td>
  </tr>
  <tr>
    <td width="100%">
    <input type="submit" value="Enviar Mensagem" name="B1" style="font-family: Verdana; font-size: 10 px"></td>
  </tr>
  <tr>
    <td width="100%"><hr SIZE="1"></td>
  </tr>
</table>
</form>

<?
include ("inc/header2.php");
include ("inc/footer.php");
?>