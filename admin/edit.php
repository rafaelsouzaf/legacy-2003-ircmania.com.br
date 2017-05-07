<?
include 'top.php';

if ($artigos == "editar") {
include 'inc/artigos/editar.php';
}
else if ($artigos == "deletar") {
include 'inc/artigos/deletar.php';
}
else if ($artigos == "index") {
include 'inc/artigos/index.php';
}


else if ($download == "editar") {
include 'inc/download/editar.php';
}
else if ($download == "deletar") {
include 'inc/download/deletar.php';
}
else if ($download == "index") {
include 'inc/download/index.php';
}


else if ($redes == "editar") {
include 'inc/redes/editar.php';
}
else if ($redes == "deletar") {
include 'inc/redes/deletar.php';
}
else if ($redes == "index") {
include 'inc/redes/index.php';
}


else if ($aliases == "editar") {
include 'inc/aliases/editar.php';
}
else if ($aliases == "deletar") {
include 'inc/aliases/deletar.php';
}
else if ($aliases == "index") {
include 'inc/aliases/index.php';
}


else if ($abreviaturas == "editar") {
include 'inc/abreviaturas/editar.php';
}
else if ($abreviaturas == "deletar") {
include 'inc/abreviaturas/deletar.php';
}
else if ($abreviaturas == "index") {
include 'inc/abreviaturas/index.php';
}


else if ($comandos == "editar") {
include 'inc/comandos/editar.php';
}
else if ($comandos == "deletar") {
include 'inc/comandos/deletar.php';
}
else if ($comandos == "index") {
include 'inc/comandos/index.php';
}


else if ($conceitos == "editar") {
include 'inc/conceitos/editar.php';
}
else if ($conceitos == "deletar") {
include 'inc/conceitos/deletar.php';
}
else if ($conceitos == "index") {
include 'inc/conceitos/index.php';
}


else if ($smileys == "editar") {
include 'inc/smileys/editar.php';
}
else if ($smileys == "deletar") {
include 'inc/smileys/deletar.php';
}
else if ($smileys == "index") {
include 'inc/smileys/index.php';
}


else if ($usuarios == "deletar") {
include 'inc/usuarios/deletar.php';
}
else if ($usuarios == "index") {
include 'inc/usuarios/index.php';
}

else if ($estatistica == "index") {
include 'inc/estatistica/index.php';
}
?>