<html>
<head>
<title>::: Indique :::</title>
</head>

<body topmargin="2" leftmargin="2">
<? 
Function IsValidEmail($email){ 
    if( !ereg( "^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_\,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$", $email ) ){ 
        return false; 
    } else { 
        return true; 
    } 
} 

if (isset($acao)){ 

    If (!IsValidEmail($rmt_email) OR !IsValidEmail($dest_email)){ 
        print "<b style=\"color:#FF0000\"><font face=\"Verdana\"><span style=\"font-size: 11px;\">Endereço de<br>e-mail inválido.</b><br><br> 
            Clique <a href=\"javascript:history.back()\">aqui</a> para Voltar"; 
        Exit(); 
    } 
    $str_mensagem = "<html><body>Oi $dest_nome,<br><br>Visitei essa página e achei interessante. É a página de informações (número de usuários, tópico, livro de visitas, WebChat e muito mais) do canal #$canal (Rede $rede):<br><br><a href=\"http://www.chatmania.com.br/busca.php?canal=$canal&rede=$rede\">http://www.chatmania.com.br/busca.php?canal=$canal&rede=$rede</a><br><br>O site ChatMania.com.br possui um sistema de busca que atualiza a cada 60 minutos os dados dos canais das principais redes de Chat em língua portuguesa.</body></html>"; 
    mail($dest_email,"ChatMania - #$canal ($rede)",$str_mensagem,"Content-type:text/html;\nFrom: $rmt_email\n"); 
    print "<font face=\"Verdana\"><span style=\"font-size: 11px;\">Mensagem enviada com sucesso para:<br><br><b>$dest_nome<br>($dest_email)!</b><br><br> 
        <a href=\"javascript:window.close()\"><font face=\"Verdana\"><span style=\"font-size: 11px;\">Clique aqui para fechar</a>"; 
} 

if (empty($acao)){
?>

<form action="busca.php?indique=ok&canal=<?=$canal?>&rede=<?=$rede?>" method="post">
  <input type="hidden" name="acao" value="ok">

  <table border="0" cellpadding="0" cellspacing="6" style="font-family: Verdana; font-size: 11 px" width="100%">
    <tr>
      <td width="100%"><b>Preencha os campos para<br>
      indicar essa página a um amigo</b><br>&nbsp;<fieldset>
      <legend>Seus dados</legend>
	<table border="0" cellpadding="0" cellspacing="3" width="100%" style="font-family: Verdana; font-size: 11 px">
        <tr>
          <td width="60%">Nome:</td>
          <td width="40%"><input type="text" size="20" name="rmt_nome" style="font-family: Verdana; font-size: 10 px"></td>
        </tr>
        <tr>
          <td width="60%">E-mail:</td>
          <td width="40%"><input type="text" size="20" name="rmt_email" style="font-family: Verdana; font-size: 10 px"></td>
        </tr>
      </table>
      </fieldset><br>
      <fieldset>
      <legend>Dados do seu amigo</legend>
	<table border="0" cellpadding="0" cellspacing="3" width="100%" style="font-family: Verdana; font-size: 11 px">
        <tr>
          <td width="60%">Nome:</td>
          <td width="40%"><input type="text" size="20" name="dest_nome" style="font-family: Verdana; font-size: 10 px"></td>
        </tr>
        <tr>
          <td width="60%">E-mail:</td>
          <td width="40%"><input type="text" size="20" name="dest_email" style="font-family: Verdana; font-size: 10 px"></td>
        </tr>
      </table>
      </fieldset><br>
      <input type="submit" value="Enviar" style="font-family: Verdana; font-size: 10 px"></td>
    </tr>
  </table>

</form>

<? 
} 
?> 
</body>
</html> 