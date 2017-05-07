<?
include("config.php");
include("includes/lang/pt.php");

$canal = str_replace("#","",$canal);
$nick = str_replace(" ","_",$nick);
$nick = str_replace("!","",$nick);
$nick = str_replace("@","",$nick);
$nick = str_replace("$","",$nick);
$nick = str_replace("%","",$nick);
$nick = str_replace("'","",$nick);
$nick = str_replace("&","",$nick);
$nick = str_replace("*","",$nick);
$nick = str_replace("(","",$nick);
$nick = str_replace(")","",$nick);
$nick = str_replace("+","",$nick);
$nick = str_replace("`","",$nick);
$nick = str_replace(",","",$nick);
$nick = str_replace(".","",$nick);
$nick = str_replace(";","",$nick);
$nick = str_replace("<","",$nick);
$nick = str_replace(">","",$nick);

if (!$canal) $canal = "Brasil";
if (!$nick) $nick = "IRCmania";
if (!$logo) $logo = "imagens/chatmania.gif";
if (!$url) $url = "http://www.chatmania.com.br";
if (!$rede) $rede = "vIRCio";
$id = time();
?>
<html>
<head>
<title>:: ChatMania :: <?="#".ucfirst($canal)?></title>
<?=$css?>

<script language="JavaScript"><!--;

function pvt(nick) {
	u = document.nicks.nix.selectedIndex;
	nick = document.nicks.nix.options[u].value;
	nick = nick.replace(/[\@\+\%]/, "");
    document.envia.f.msg.value = "/msg "+nick+" ";
    document.envia.f.msg.focus();
}

function nixreload(namelist) {
    if (namelist) {
	var a=0,b=0;
	for (a = document.nicks.nix.options.length; a > 0; a--) {
	    document.nicks.nix.options[a] = null;
	}
	names = namelist.split(":");
		for (a = 0; a < names.length; a++) {
		    if (names[a].length > 0) {
			document.nicks.nix.options[b] = new Option(names[a], names[a]);
		    b++;
		    }
		}
    }
    return true;
}

//-->
</script>
</head>
<body bgcolor="#5B0000" text="#AACCAA" topmargin="3" leftmargin="3" background="imagens/fondo.gif">

<div id="Layer1" style="position:absolute; left:65px; top:13px; width:468px; height:60px; z-index:1">
<IFRAME WIDTH=468 HEIGHT=60 MARGINWIDTH=0 MARGINHEIGHT=0 HSPACE=0 VSPACE=0 FRAMEBORDER=0 SCROLLING=no BORDERCOLOR=#000000 SRC='includes/banner.php'></iframe>
</div>

<table width="100%" height="100%" cellspacing="1" cellpadding="4" bgcolor="#AACCAA">
  <tr>
	<td bgcolor="#ffffff" width="90%" height="100%">
	<iframe frameborder="0" height="430" width="100%" name="out" src="main.php?rede=<?=$rede?>&nick=<?=$nick?>&canal=<?=$canal?>&id=<?=$id?>" valign="bottom" marginwidth="0" marginheight="0"></iframe>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="50%">
    <p align="center">
    <a target="_blank" style="color: #000000; font-family: Tahoma; font-size: 10 px" href="http://www.ircmania.com.br">
    www.ircmania.com.br</a></td>
    <td width="50%">
    <p align="center">
    <a target="_blank" style="font-family: Tahoma; font-size: 10 px; color: #000000" href="http://www.chatmania.com.br">
    www.chatmania.com.br</a></td>
  </tr>
</table>
	</td>
	<td bgcolor="#ffffff" width="10%" valign="top" align="center">
    #<?=ucfirst($canal)?><br>
    <form name="nicks" onSubmit="return false;" action="javascript: return false">
	<select name="nix" size="20" onClick="pvt()" style="width: 140; border-width: 0; border-style: solid; border-color: #ffffff; font-family: 'Fixedsys', 'Verdana', 'Arial'; color: #000000; background-color: #FDFFDC"></select>
    </form>
	<a href="<?=$url?>" target="_blank"><img border="0" src="<?=$logo?>"></a>
	</td>
 </tr>
 <tr>
	<td bgcolor="#FDFFDC">
    <iframe frameborder="0" height="25" width="100%" src="envia.php?id=<?=$id?>" name="envia" marginwidth="0" marginheight="0"></iframe>
	</td>
	<td bgcolor="#FDFFDC">
	<iframe frameborder="0" height="25" width="100%" name="out" src="mudar.php?id=<?=$id?>" valign="bottom" marginwidth="0" marginheight="0"></iframe>
	</td>
 </tr>
</table>
</body>