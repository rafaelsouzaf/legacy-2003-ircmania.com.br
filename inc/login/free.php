<?
$query = mysql_query("select * from usuarios where free='$free' and login='$login' and chklog=0");

	if (mysql_num_rows($query)) {
	$update = "update usuarios set free='', chklog='1' where login='$login'";
	mysql_query($update);
	$destrancado = 1;
	}
	else {
	$trancado = 1;
	}
if ($destrancado) { ?>

<p align="center"><u><b>Login liberado!</b></u></p>
<p align="justify">Parab�ns, o usu�rio <b><?=$login;?></b> est� liberado e pronto para a 
utiliza��o. Para se logar ao site utilize o formul�rio que est� no canto 
superior direito desta p�gina.<br>
<br>
Obrigado!<br>
<br>
Equipe IRCmania</p>

<?
}
if ($trancado) { ?>
<p align="center"><u><b>Opss!!! Dados Errados</b></u></p>
<p align="justify">Os dados para libera��o de conta que voc� utilizou est�o 
incorretos. Reveja seu e-mail e clique no endere�o que l� consta.<br>
<br>
Obrigado!<br>
Att,<br>
<br>
Equipe IRCmania</p>
<?
}
?>