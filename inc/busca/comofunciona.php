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
    <p align="justify">Os dados (redes, canais, tópicos, número de usuários) são 
    colhidos das redes de IRC por um bot a cada 60 minutos e enviados ao nosso 
    banco de dados. Através dos portais parceiros os visitantes tem acesso a 
    todas as informações de todas as redes de IRC cadastradas.<br>
    <br>
    Só permanecem em nosso banco de dados salas (canais) abertas e com no mínimo 1 
    usuário. Os canais temporariamente excluídos (com 0 usuários) retornam a lista logo que o 
    bot verificar a existência de no mínimo 01 usuário freqüentando o canal.<br>
    <br>
    Ocasionalmente poderá ocorrer de alguma rede ter zero ou poucos canais 
    publicados no sistema de busca, isso ocorrerá quando o bot entrar durante 
    netsplit ou ter a conexão resetada por qualquer motivo. No entanto tudo 
    deverá ser restabelecido na próxima hora.<br>
    <br>
    Canais que já possuem registro no banco de dados, passam a ter os dados 
    atualizados automaticamente a cada visita do bot.<br>
    <br>
    <strong><br>
    TOP 30+</strong><br>
    <br>
    O Top 30+ não é um Top definitivo, onde se marca eternamente o recorde de 
    usuários de uma sala, mas sim um Top constante, onde se mostra o número de 
    usuários das salas mais freqüentadas nos últimos 60 minutos.<br><br>
    Isso significa que a mudança no ranking é constante e o visitante do site 
    pode acompanhar de modo quase instantâneo as salas de chat mais 
    freqüentadas.<br>
    <br>
    <br>
    Dúvidas?<br>
    <a href="outros.php?contato=ok">Entre em contato</a></td>
  </tr>
</table>

<?
include ("inc/header2.php");
include ("inc/footer.php");
?>