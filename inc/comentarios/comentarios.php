<?
if (!$sid) {
die();
}

if (!$usuario) { ?>

	<br><hr color="#C0C0C0" width="80%" size="1">
	<p align="center"><b>Para comentar você deve se <a href="login.php?cadastro=ok">registrar</a> no site.</b></p>
	<hr color="#C0C0C0" width="80%" size="1"><br>

<? } else { ?>

	<hr color="#C0C0C0" width="80%" size="1">
	<form action="comentarios.php" method="post">
	<p align="center">
	<input type="hidden" value="1" name="add">
	<input type="hidden" value="<?=$sid?>" name="sid">
	<input type="submit" value="#  Enviar Comentário  #" style="font-family: Verdana; font-size: 10 px">
	</p></form>
	<hr color="#C0C0C0" width="80%" size="1"><br>

<? }

function raiz () {

	global $sid,$usuario;

	$veradm = mysql_query("select login,admin from usuarios where login='$usuario'");
	$veradml = mysql_fetch_array($veradm);

	$query = mysql_query("select * from comentarios where sid='$sid' and pid='0' order by tid asc");
	while ($l = mysql_fetch_array($query)) {
	?>

	<br><a name="<?=$l[tid]?>"></a>
	<table border="0" cellpadding="0" cellspacing="2" width="100%" bgcolor="#fdf7db">
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b><?=stripslashes($l[subject])?></b></td>
	  </tr>
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b>Autor:</b> <?echo "<a href='user.php?nick=$l[name]' class='ircmania1'>$l[name]</a>";?> &nbsp;&nbsp;&nbsp;&nbsp;<b>Data</b> <? echo date("d/m/y H:i", $l[date]);?></td>
	  </tr>
	</table>
	
	<table border="0" cellpadding="0" cellspacing="2">
	  <tr>
	    <td width="100%"><p><font face="Verdana"><span style="font-size: 11px;">
		<?=nl2br(stripslashes($l[comment]))?></td>
	  </tr>
	</table>
	<br>

	<p align="center">[ <a href="comentarios.php?reply=1&pid=<?=$l[tid]?>">Responder</a> <? if ($veradml[admin]) echo "| <a href='comentarios.php?deletar=1&sid=$l[sid]&tid=$l[tid]'>Deletar</a> "; ?>]</p>

	<?
	replys($l[tid]);
	}
}

function replys ($id) {
$queryreply = mysql_query("select * from comentarios where pid='$id'");
	echo "<ul>";
	while ($lbre = mysql_fetch_array($queryreply)) { ?>

	<li><a href="comentarios.php?view=<?=$lbre[pid]?>#<?=$lbre[tid]?>" class="ircmania1"><u><?=$lbre[subject]?></u></a> por <?echo $lbre[name];?> em <? echo date("d/m/y H:i", $lbre[date]); ?></li>

	<?
	replys($lbre[tid]);

}
	echo "</ul>";
}
raiz();
?>