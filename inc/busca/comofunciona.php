<?
$chavetitle = "Como funciona o sistema de busca";

include ("inc/top.php");
include ("inc/header.php");
include ("inc/busca/top.php");
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <strong><font size="2"><u>Como funciona?</u></font></strong></td>
  </tr>
</table>

<br>

<table cellPadding="0" width="80%" align="center" border="0">
  <tr>
    <td width="100%">
    <p align="justify">Os dados (redes, canais, t�picos, n�mero de usu�rios) s�o 
    colhidos das redes de IRC por um bot a cada 60 minutos e enviados ao nosso 
    banco de dados. Atrav�s dos portais parceiros os visitantes tem acesso a 
    todas as informa��es de todas as redes de IRC cadastradas.<br>
    <br>
    S� permanecem em nosso banco de dados salas (canais) abertas e com no m�nimo 1 
    usu�rio. Os canais temporariamente exclu�dos (com 0 usu�rios) retornam a lista logo que o 
    bot verificar a exist�ncia de no m�nimo 01 usu�rio freq�entando o canal.<br>
    <br>
    Ocasionalmente poder� ocorrer de alguma rede ter zero ou poucos canais 
    publicados no sistema de busca, isso ocorrer� quando o bot entrar durante 
    netsplit ou ter a conex�o resetada por qualquer motivo. No entanto tudo 
    dever� ser restabelecido na pr�xima hora.<br>
    <br>
    Canais que j� possuem registro no banco de dados, passam a ter os dados 
    atualizados automaticamente a cada visita do bot.<br>
    <br>
    <strong><br>
    TOP 30+</strong><br>
    <br>
    O Top 30+ n�o � um Top definitivo, onde se marca eternamente o recorde de 
    usu�rios de uma sala, mas sim um Top constante, onde se mostra o n�mero de 
    usu�rios das salas mais freq�entadas nos �ltimos 60 minutos.<br><br>
    Isso significa que a mudan�a no ranking � constante e o visitante do site 
    pode acompanhar de modo quase instant�neo as salas de chat mais 
    freq�entadas.<br>
    <br>
    <br>
    D�vidas?<br>
    <a href="outros.php?contato=ok">Entre em contato</a></td>
  </tr>
</table>

<?
include ("inc/header2.php");
include ("inc/footer.php");
?>