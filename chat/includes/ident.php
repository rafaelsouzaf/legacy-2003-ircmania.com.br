<?
$ident = explode('.', $REMOTE_ADDR);
$ident0 = dechex($ident[0]);
$ident1 = dechex($ident[1]);
$ident2 = dechex($ident[2]);
$ident3 = dechex($ident[3]);
$ident = $ident0.$ident1.$ident2.$ident3;
?>