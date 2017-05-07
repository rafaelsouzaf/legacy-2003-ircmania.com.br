<?
function raiz () {

	global $view,$usuario;

	$veradm = mysql_query("select login,admin from usuarios where login='$usuario'");
	$veradml = mysql_fetch_array($veradm);

	$query = mysql_query("select * from comentarios where pid='$view'");
	while ($l = mysql_fetch_array($query)) { ?>

	<br><a name="<?=$l[tid]?>"></a>
	<table border="0" cellpadding="0" cellspacing="2" width="100%" bgcolor="#fdf7db">
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b><?=$l["subject"]?></b></td>
	  </tr>
	  <tr>
	    <td width="100%"><font face="Verdana"><span style="font-size: 11px;"><b>Autor:</b> <?echo "<a href='user.php?nick=$l[name]' class='ircmania1'>$l[name]</a>";?> - <b>Data</b> <? echo date("d/m/y H:i", $l[date]);?></td>
	  </tr>
	</table>
	
	<table border="0" cellpadding="0" cellspacing="2">
	  <tr>
	    <td width="100%"><p><font face="Verdana"><span style="font-size: 11px;">
		<?=nl2br($l[comment])?></td>
	  </tr>
	</table>
	<br>

	<p align="center">[ <a href="comentarios.php?reply=1&pid=<?=$l["tid"]?>">Responder</a> | <a href="view.php?sid=<?=$l['sid']?>">Retornar</a> <? if ($veradml[admin]) echo "| <a href='comentarios.php?deletar=1&sid=$l[sid]&tid=$l[tid]'>Deletar</a> "; ?>]</p>

	<?
	replys($l['tid']);
	}
}

function replys ($id) {
$queryreply = mysql_query("select * from comentarios where pid='$id'");
	echo "<ul>";
	while ($lbre = mysql_fetch_array($queryreply)) { ?>

	<li><a href="comentarios.php?view=<?=$lbre[pid]?>#<?=$lbre[tid]?>" class="ircmania1"><u><?=$lbre['subject']?></u></a>  por <?=$lbre[name]?> em <? echo date("d/m/y H:i", $lbre[date]); ?></li>

	<?
	replys($lbre['tid']);

}
	echo "</ul>";
}
raiz();
?>