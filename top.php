<?
include("conexao.php");
include("inc/login/banidos.php");
include("inc/login/decode.php");
//include("inc/login/estatistica.php");
?>

<html>

<head>
<title><?=$chavetitle;?> :: IRCMania.com.br - Tudo em matéria de IRC ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META NAME="KEYWORDS" CONTENT="IRC, chat, irc network, irc shell, ircd, eggdrop, wircd, services, webchat, webirc, ircontros, icq, msn, messenger, trellian, wservices, script, mirc scripts, tcl, psybnc, mirc, bitchx, pirch, xchat, dalnet, quakenet, undernet, irc server, internet relay chat, chatting, mIRC, hacker, Channel, irc protocol, operator, irc client, server list, denial of service, ddos, canales, dlls, Screenshots, addon, addons, bahamut, unreal, irc search engine, IRC News"> 
<META NAME="DESCRIPTION" CONTENT="IRCmania - Tudo em matéria de IRC">
<style type="text/css">
<!--
body, td, th {
	overflow-x:hidden; overflow-y: auto;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
body {
	overflow-x:hidden; overflow-y: auto;
	background-color: #ffffff;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
.ircmania { text-decoration: none; color: #FF8000}
.ircmania:hover { text-decoration: none; color: #FF8000}
.ircmania:active { text-decoration: none; color: #FF8000}

.ircmania1 { text-decoration: none; color: #000000}
.ircmania1:hover { text-decoration: underline; color: #000000}
.ircmania1:active { text-decoration: none; color: #000000}

.ircmania2 { text-decoration: none; color: #999999}
.ircmania2:hover { text-decoration: none; color: #000000}
.ircmania2:active { text-decoration: none; color: #999999}

.ircmania22 { text-decoration: none; color: #000000}
.ircmania22:hover { text-decoration: none; color: #000000}
.ircmania22:active { text-decoration: none; color: #000000}

.ircmania3 { text-decoration: none; color: #99CC00}
.ircmania3:hover { text-decoration: underline; color: #99CC00}
.ircmania3:active { text-decoration: none; color: #99CC00}

.ircmania4 { text-decoration: underline; font-size: 11px; color: #000000}
.ircmania4:hover { text-decoration: underline; color: #000000}
.ircmania4:active { text-decoration: underline; color: #000000}

.ircmania5 { text-decoration: none; color: #000000}
.ircmania5:hover { text-decoration: none; color: #999999}
.ircmania5:active { text-decoration: none; color: #999999}

.formwebirc {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bolder;
	color: #99CC00;
	height: 16px;
	width: 130px;
	border: 1px solid #999999;
}

.formwebirc1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bolder;
	color: #99CC00;
	height: 16px;
	width: 100px;
	border: 1px solid #999999;
}

.formwebirc2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bolder;
	color: #99CC00;
	height: 16px;
	width: 25px;
	border: 1px solid #999999;
}

.form {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bolder;
	background-color: #FFFFFF;
	height: 16px;
	width: 130px;
	border: 1px solid #999999;
	text-align: left;
}
.style1 {
	color: #6699CC;
	font-weight: bold;
	text-align: left;
}
.style2 {color: #666666;
		 text-align: left;}
.style3 {
	color: #FF9900;
	font-weight: bold;
	text-align: left;
}
.style5 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #ffffff;

	font-weight: bold;
	text-align: left;
}
.style9 {color: #999999;
	     text-align: left;}
.style10 {
	color: #FF9900;
	font-weight: bold;
	text-align: left;
}
.style13 {
	color: #878954;
	font-weight: bold;
	text-align: left;
}

.loginuser {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	color: #999999;
	background-color: #FFFFFF;
	height: 16px;
	width: 101px;
	border: 1px solid #000000;
	text-align: left;
}
.loginsenha {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	color: #999999;
	background-color: #FFFFFF;
	height: 16px;
	width: 77px;
	border: 1px solid #000000;
	text-align: left;
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function launchClient() {
  var width = 184;
  var height = 354;
  var x = screen.availWidth - width - 8;
  var y = screen.availTop;
  window.open("http://www.msn2go.com/client/", "MSN2Go", "width=" + width + ",height=" + height + ",left=" + x + ",top=" + y + ",directories=no,location=no,menubar=no,personalbar=no,resizable=no,scrollbars=no,status=no,toolbar=no");
}
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
function icq2go() {
	var leftpos = (screen.availWidth - 200)-40;
	resiz = (navigator.appName=="Netscape") ? 0 : 1;
	window.open("http://www.icq.com/icq2go/flicq.html", "TOFI1","width=176,height=441,top=40,left="+leftpos+",directories=no,location=no,menubar=no,scrollbars=no,status=no,titlebar=no,toolbar=no,resizable="+resiz+"");
}
function MM_displayStatusMsg(msgStr) { //v1.0
  status=msgStr;
  document.MM_returnValue = true;
}
//-->
</SCRIPT>
</head>
<body background="imagens/main_bg.jpg" link="#FF8000" vlink="#FF8000" alink="#FF8000" onLoad="MM_displayStatusMsg(':: www.IRCmania.com.br ::');return document.MM_returnValue" topmargin="0" leftmargin="0">

<script>
if (screen.width > 1000) {
document.write("<table align='center' border='0' cellpadding='0' cellspacing='0' width='955'>");
document.write("<tr><td width='778'>");
}
</script>

<table align="center" width="778" height="213" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="175" valign="top">
      <table width="175" height="66" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="175" height="130" align="center" valign="middle"><a href="index.php"><img src="imagens/logo.gif" border="0" width="175" height="130" title="Página Inicial"></a></td>
        </tr>
        <tr>
          <td width="175" height="83" background="imagens/topo04.gif"></td>
        </tr>
      </table>
    </td>
    <td width="603" valign="top">
    <table width="603" height="213" border="0" cellpadding="0" cellspacing="0">
      <tr valign="top">
        <td width="248" height="100">
        <img src="imagens/<?if (($_SERVER["HTTP_HOST"] == "ircmania.ubbi.com.br") or ($_SERVER["HTTP_HOST"] == "www.brasiltoner.com.br") or ($_SERVER["HTTP_HOST"] == "www.ircmania.com.br")) echo "topo01.gif"; else echo "topo01b.gif"; ?>" width="248" height="100"></td>
        <td width="114" height="100">
        <img src="imagens/<?if (($_SERVER["HTTP_HOST"] == "ircmania.ubbi.com.br") or ($_SERVER["HTTP_HOST"] == "www.brasiltoner.com.br") or ($_SERVER["HTTP_HOST"] == "www.ircmania.com.br")) echo "topo02.gif"; else echo "topo02b.gif"; ?>" width="114" height="100"></td>
        <td width="241" height="100" background="<?if($usuario){echo"imagens/topo_03_logado.gif";}else{echo"imagens/topo03.gif";}?>">
        <table width="229" height="98" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td height="11" align="right" valign="middle">
			<?if($usuario){ echo"<a href='login.php?deslog=7j3783fr'><img src='imagens/topo_login_quero_esqueci_logado.gif' width='221' height='13' border='0'></a>";}else{?>
            <img src="imagens/topo_login_quero_esqueci.gif" width="221" height="13" border="0" usemap="#top_quero_esqueci"><map name="top_quero_esqueci"><area shape="rect" coords="1,0,108,18" href="login.php?cadastro=ok"><area shape="rect" coords="113,-2,217,16" href="login.php?recupera=ok"></map><?}?></td>
          </tr>
          <tr>
            <td colspan="2">
            <table width="165" height="36" border="0" align="right" cellpadding="0" cellspacing="0">
              <tr align="left"><?if($usuario){ include("inc/login/top_logado.php");}else{include("inc/login/top_deslogado.php");}?>
              </tr>
            </table>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="right"><strong><a href="index.php" class="ircmania1">Início</a> | <a href="outros.php?arquivo=ok" class="ircmania1">Arquivo</a> | <a href="outros.php?busca=ok" class="ircmania1">Busca</a> | 
            <a href="outros.php?contato=ok" class="ircmania1">Contato</a>&nbsp;&nbsp; </strong></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
          </tr>
        </table>
        </td>
      </tr>
      <tr valign="top">
        <td colspan="3">
        <table width="603" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="125" height="113" rowspan="2" align="center" valign="bottom" background="imagens/topo05.gif">
            <table width="101" height="66" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="22" colspan="2"><form action="busca.php" method="get">
                <input name="palavra" value="#" type="text" class="loginuser" size="20"></td>
              </tr>
              <tr>
                <td width="81" valign="top">
                <select name="redeirc" class="loginsenha">
				<option value="" selected>Redes:</option>
				<option value="">---</option>
				<option value="">Todas</option>
				<option value="">---</option>
				<?
				$randoqueryb = mysql_query("select * from redes where chkrede = 1");
				while ($randolb = mysql_fetch_array($randoqueryb)) {
				?>
			    <option value="<?=$randolb[rede]?>"><?=$randolb[rede]?></option>
				<? } ?>
				</select></td>
                <td valign="top">
                <input name="i" type="image" src="imagens/botao_ok.gif" border="0" width="21" height="16"></td>
              </tr></form>
            </table>
            </td>
            <td width="478" height="75" valign="top" background="imagens/topo06.gif">
            <table width="470" height="62" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="right" valign="bottom">
				<script type="text/javascript"><!--
				google_ad_client = "pub-5562056925078946";
				google_ad_width = 468;
				google_ad_height = 60;
				google_ad_format = "468x60_as";
				google_ad_channel ="";
				google_ad_type = "text_image";
				google_color_border = "CCCCCC";
				google_color_bg = "FFFFFF";
				google_color_link = "000000";
				google_color_url = "666666";
				google_color_text = "333333";
				//--></script>
				<script type="text/javascript"
				  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
				</td>
              </tr>
            </table>
            </td>
          </tr>
          <tr>
            <td width="478" height="38" valign="top">
            <img src="imagens/topo07.gif" width="478" height="38"></td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>