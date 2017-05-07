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
<p align="justify">Parabéns, o usuário <b><?=$login;?></b> está liberado e pronto para a 
utilização. Para se logar ao site utilize o formulário que está no canto 
superior direito desta página.<br>
<br>
Obrigado!<br>
<br>
Equipe IRCmania</p>

<?
}
if ($trancado) { ?>
<p align="center"><u><b>Opss!!! Dados Errados</b></u></p>
<p align="justify">Os dados para liberação de conta que você utilizou estão 
incorretos. Reveja seu e-mail e clique no endereço que lá consta.<br>
<br>
Obrigado!<br>
Att,<br>
<br>
Equipe IRCmania</p>
<?
}
?>