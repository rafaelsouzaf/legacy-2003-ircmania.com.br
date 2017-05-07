<p align="center"><u><b>WebChat em seu WebSite</b></u></p>

<br>

<table align="center" border="0" cellpadding="0" cellspacing="3" width="80%">
  <tr>
    <td width="100%">
    <p align="justify">A seguir estão exemplos de códigos HTML para que você 
    possa acrescentar o nosso webchat em sua home-page.<br>
    <br>
    Observe que você também pode personalizar o layout do WebChat acrescentando 
    o seu logotipo no lugar do logotipo padrão</p>
    <hr color="#000000" size="1" width="70%"></td>
  </tr>
</table>

<br>


<? if ((!$canal) and (!$rede)) { ?>

<form action="outros.php?noseusite=ok" method="post">
<table align="center" border="0" cellpadding="0" cellspacing="2" width="50%">
  <tr>
    <td width="50%">Canal (sala):</td>
    <td width="50%">
    <input class="loginuser" maxLength="15" name="canal" size="20"></td>
  </tr>
  <tr>
    <td width="50%">Rede:</td>
    <td width="50%">
	<select name="rede" class="loginsenha">
	<option value="" selected>Rede:</option>
	<option value="">---</option>
	<option value="">Todas</option>
	<option value="">---</option>
	<?
	$randred = mysql_query("select * from redes where chkrede = 1");
	while ($randredl = mysql_fetch_array($randred)) {
	?>
	<option value="<?=$randredl[rede]?>"><?=$randredl[rede]?></option>
	<? } ?>
	</select>
	</td>
  </tr>
  <tr>
    <td width="100%" colspam="2"><input type="submit" value="Gerar Código" name="Entrar" style="font-family: Verdana; font-size: 10 px"></td>
  </tr>
</table>
</form>

<? } else { ?>


<?
$canal = str_replace("#","",$canal);
?>

<p align="center">#<b><?=ucfirst($canal)?></b><br>(Rede <?=$rede?>)</p>

<table cellPadding="0" width="90%" align="center" border="0">
  <tr>
    <td width="100%"><b><font color="#ff0000">Modelo I</font></b>
    <br>Código HTML:
    <p align="center">
    <textarea style="color: #804000; font-family: Verdana; font-size: 10 px" name="textarea" rows="23" cols="72">
<html>
<head>
<title>::: WebChat - Chatmania.com.br :::</title>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>
<body>

<a href="javascript:;" onClick="MM_openBrWindow('http://www.chatmania.com.br/chat/?canal=<?=$canal?>&amp;rede=<?=$rede?>','webchat','status=no,scrollbars=no,resizable=no,width=777,height=500')">
<img src="http://www.chatmania.com.br/imagens/entre.gif" width="79" height="76" border="0"></a>

</body>
</html>
	</textarea></p>
    <p><b>Exemplo:</b></p>
    <blockquote>
      <p><a href="javascript:;" onClick="MM_openBrWindow('chat/?rede=<?=$rede?>&canal=<?=$canal?>','chat','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=777,height=500')">
		<img border="0" src="imagens/entre.gif" width="79" height="76"></a></p>
    </blockquote>
    </td>
  </tr>
</table>



<br>
<hr color="#000000" size="1" width="90%">
<br>





<table cellPadding="0" width="90%" align="center" border="0">
  <tr>
    <td width="100%"><b><font color="#ff0000">Modelo II</font></b> (Escolha de apelido e seu logotipo)<br>
    Código HTML:
    <p align="center">
    <textarea style="color: #804000; font-family: Verdana; font-size: 10 px" name="textarea" rows="31" cols="72">
<html>
<head>
</head>

<script type="text/javascript">
<!--
function popupforms(myform, windowname)
{
if (! window.focus)return true;
window.open('', windowname, 'height=500,width=777,scrollbars=no,status=no,resizable=no');
myform.target=windowname;
return true;
}
//-->
</script>
<body>

<form onsubmit="popupforms(this, 'join')" action="http://www.chatmania.com.br/chat/?" method="get">
<input type="hidden" name="canal" value="<?=$canal?>">
<input type="hidden" name="rede" value="<?=$rede?>">
<input type="hidden" name="logo" value="http://www.seusite.com/seulogo.jpg">
<input type="hidden" name="url" value="http://www.seusite.com">
<input value="SeuApelido" name="nick" size="20">
<input type="submit" value="Entrar" name="Entrar">
</form>

</body>
</html>
</textarea></p>
    <p><b>Exemplo:</b></p>
    <blockquote>
      <form onsubmit="popupforms(this, 'join')" action="chat/?" method="get">
        <input type="hidden" name="canal" value="<?=$canal?>">
        <input type="hidden" name="rede" value="<?=$rede?>">
		<input type="hidden" name="logo" value="http://www.seusite.com/seulogo.jpg">
		<input type="hidden" name="url" value="http://www.seusite.com">
        <input value="SeuApelido" name="nick" size="20">
        <input type="submit" value="Entrar" name="Entrar">
      </form>
    </blockquote>
    </td>
  </tr>
</table>

<? } ?>