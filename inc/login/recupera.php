<table align="center" border="0" cellpadding="3" cellspacing="0" width="70%">
  <tr>
    <td width="100%">
    <p align="center"><u><b>Esqueceu sua senha?</b></u></p>
    <p align="justify">Sem problemas. Simplesmente digite seu nome de usu�rio (login) 
    e clique em &quot;Enviar Senha&quot;. Voc� receber� em seu e-mail cadastrado uma 
    mensagem autom�tica com sua senha</font>.</td>
  </tr>
</table>

<br>

<form action="login.php" method="post">
  <input type="hidden" value="ok" name="recupera">
  <table align="center" border="0" cellpadding="3" cellspacing="0" width="70%">
    <tr>
      <td width="35%">Nome de Usu�rio:</td>
      <td width="65%"><input size="26" name="login" class="form" maxlength="15"></td>
    </tr>
    <tr>
      <td width="100%" colspan="2">
      <input type="submit" value="Enviar Senha" style="font-family: Verdana; font-size: 10 px"></td>
    </tr>
  </table>
</form>


<br>
<hr color="#000000" width="70%" size="1">
<br>


<table align="center" border="0" cellpadding="3" cellspacing="0" width="70%">
  <tr>
    <td width="100%">
    <p align="center"><u><b>N�o recebeu email de libera��o de conta?</b></u></p>
    <p align="justify">Digite seu nome de usu�rio (login) e clique em &quot;Reenviar 
    Libera��o&quot;. Voc� receber� em seu e-mail cadastrado uma mensagem autom�tica 
    com as informa��es para desbloquear sua conta rec�m criada.</td>
  </tr>
</table>

<br>

<form action="login.php" method="post">
  <input type="hidden" value="ok" name="liberacao">
  <table align="center" border="0" cellpadding="3" cellspacing="0" width="70%">
    <tr>
      <td width="35%">Nome de Usu�rio:</td>
      <td width="65%"><input size="26" name="login" class="form" maxlength="15"></td>
    </tr>
    <tr>
      <td width="100%" colspan="2">
      <input type="submit" value="Reenviar Libera��o" style="font-family: Verdana; font-size: 10 px"></td>
    </tr>
  </table>
</form>