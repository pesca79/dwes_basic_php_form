<!DOCTYPE html>
<html>
<head>
<script src="jquery-1.3.2.min.js" type="text/javascript"></script>   
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
body { 
background-image: url("images/fondo.jpg"); 
background-position: center 25%; background-size: cover;
font-size: large;
}
.rojo {
color:red;
font-weight:bold;
font-size: large;
} 
span {
color:yellow;
font-weight:bold;
font-size: large;
} 
</style>
<script>
function blinktext() {
  var f = document.getElementById('blink');
  var g = document.getElementById('blink2');
  var h = document.getElementById('blink3');
  var i = document.getElementById('blink4');
  var j = document.getElementById('blink5');
  var k = document.getElementById('blink6');
  var l = document.getElementById('blink7');  
  setInterval(function() {
    f.style.visibility = (f.style.visibility == 'hidden' ? '' : 'hidden');
    g.style.visibility = (g.style.visibility == 'hidden' ? '' : 'hidden');
    h.style.visibility = (h.style.visibility == 'hidden' ? '' : 'hidden');
    i.style.visibility = (i.style.visibility == 'hidden' ? '' : 'hidden');
    j.style.visibility = (j.style.visibility == 'hidden' ? '' : 'hidden');
    k.style.visibility = (k.style.visibility == 'hidden' ? '' : 'hidden');
    l.style.visibility = (l.style.visibility == 'hidden' ? '' : 'hidden');
    m.style.visibility = (m.style.visibility == 'hidden' ? '' : 'hidden');    
  }, 800);
}
</script>
</head>
<body onload="blinktext()">
<?php
// https://www.mclibre.org/consultar/php/ejercicios/con-formularios/controles-formularios-2/controles-formularios-2-14-2.php

include_once "funciones.php";



$nombre      = recoge("nombre");
$apellidos   = recoge("apellidos");
$edad        = recoge("edad");
$peso        = recoge("peso");
$sexo        = recoge("genero"); // El control no se llama sexo para evitar el proxy de Conselleria
$estadoCivil = recoge("estadoCivil");
$cine        = recoge("cine");
$deporte     = recoge("deporte");
$literatura  = recoge("literatura");
$musica      = recoge("musica");
$tebeos      = recoge("tebeos");
$television  = recoge("television");

$nombreOk      = false;
$apellidosOk   = false;
$edadOk        = false;
$pesoOk        = false;
$sexoOk        = false;
$estadoCivilOk = false;
$cineOk        = false;
$deporteOk     = false;
$literaturaOk  = false;
$musicaOk      = false;
$tebeosOk      = false;
$televisionOk  = false;

if ($nombre == "") {
    print "  <p class=\"aviso\">Debe escribir su nombre.</p>\n";
    print "\n";
} else {
    $nombreOk = true;
}

if ($apellidos == "") {
    print "  <p class=\"aviso\">No ha escrito sus apellidos.</p>\n";
    print "\n";
} else {
    $apellidosOk = true;
}

if ($edad == "...") {
    print "  <p class=\"aviso\">No ha indicado su edad.</p>\n";
    print "\n";
} elseif ($edad != "1" && $edad != "2" && $edad != "3" && $edad != "4") {
    print "  <p class=\"aviso\">Por favor, indique su grupo de edad.</p>\n";
    print "\n";
} else {
    $edadOk = true;
}

if ($peso == "") {
    print "  <p class=\"aviso\">No ha escrito su peso.</p>\n";
    print "\n";
} elseif (!is_numeric($peso)) {
    print "  <p class=\"aviso\">No ha escrito el peso como número.</p>\n";
    print "\n";
} elseif (!ctype_digit($peso)) {
    print "  <p class=\"aviso\">No ha escrito el peso como número entero.</p>\n";
    print "\n";
} elseif ($peso > 250) {
    print "  <p class=\"aviso\">El peso es superior a 250 kg.</p>\n";
    print "\n";
} else {
    $pesoOk = true;
}

if ($sexo == "") {
    print "  <p class=\"aviso\">No ha indicado su sexo.</p>\n";
    print "\n";
} elseif ($sexo != "hombre" && $sexo != "mujer") {
    print "  <p class=\"aviso\">Por favor, indique si su sexo es hombre o mujer.</p>\n";
    print "\n";
} else {
    $sexoOk = true;
}

if ($estadoCivil == "") {
    print "  <p class=\"aviso\">No ha indicado su estado civil.</p>\n";
    print "\n";
} elseif ($estadoCivil != "soltero" && $estadoCivil != "casado" && $estadoCivil != "otro") {
    print "  <p class=\"aviso\">Por favor, indique si su estado civil es soltero, casado u otro.</p>\n";
    print "\n";
} else {
    $estadoCivilOk = true;
}

if ($cine != "" && $cine != "on") {
    print "  <p class=\"aviso\">Por favor, indique si le gusta o no el cine.</p>\n";
    print "\n";
} else {
    $cineOk = true;
}

if ($deporte != "" && $deporte != "on") {
    print "  <p class=\"aviso\">Por favor, indique si le gusta o no el deporte.</p>\n";
    print "\n";
} else {
    $deporteOk = true;
}

if ($literatura != "" && $literatura != "on") {
    print "  <p class=\"aviso\">Por favor, indique si le gusta o no la literatura.</p>\n";
    print "\n";
} else {
    $literaturaOk = true;
}

if ($musica != "" && $musica != "on") {
    print "  <p class=\"aviso\">Por favor, indique si le gusta o no la música.</p>\n";
    print "\n";
} else {
    $musicaOk = true;
}

if ($tebeos != "" && $tebeos != "on") {
    print "  <p class=\"aviso\">Por favor, indique si le gustan o no los tebeos.</p>\n";
    print "\n";
} else {
    $tebeosOk = true;
}

if ($television != "" && $television != "on") {
    print "  <p class=\"aviso\">Por favor, indique si le gusta o no la televisión.</p>\n";
    print "\n";
} else {
    $televisionOk = true;
}

if ($nombreOk && $apellidosOk && $edadOk && $pesoOk && $sexoOk && $estadoCivilOk && $cineOk && $deporteOk && $literaturaOk && $musicaOk && $tebeosOk && $televisionOk) {
    print "  <p class='rojo'>Su nombre es <span id='blink'><strong class='amarillo'>$nombre</strong></span></p>\n";
    print "\n";
    print "  <p class='rojo'>Sus apellidos son <span id='blink2'><strong>$apellidos</strong></span></p>\n";
    
    print "\n";

    if ($edad == 1) {
        print "  <p class='rojo'>Tiene <span id='blink3'><strong>menos de 20 años</strong></span></p>\n";
    } elseif ($edad == 2) {
        print "  <p class='rojo'>Tiene <span id='blink3'><strong>entre 20 y 39 años</strong></span></p>\n";
    } elseif ($edad == 3) {
        print "  <p class='rojo'>Tiene <span id='blink3'><strong>entre 40 y 59 años</strong></span></p>\n";
    } else {
        print "  <p class='rojo'>Tiene <span id='blink3'><strong>60 o más años</strong></span></p>\n";
    }
    print "\n";

    print "  <p class='rojo'>Su peso es de <span id='blink4'><strong>$peso</strong> kg.</span></p>\n";
    print "\n";

    if ($sexo == "hombre") {
        print "  <p class='rojo'>Es un <span id='blink5'><strong>hombre</strong></span></p>\n";
    } else {
        print "  <p class='rojo'>Es una <span id='blink5'><strong>mujer</strong></span></p>\n";
    }
    print "\n";

    if ($estadoCivil == "soltero") {
        print "  <p class='rojo'>Su estado civil es <span id='blink6'><strong>soltero</strong></span></p>\n";
    } elseif ($estadoCivil == "casado") {
        print "  <p class='rojo'>Su estado civil es <span id='blink6'><strong>casado</strong></span></p>\n";
    } else {
        print "  <p class='rojo'>Su estado civil no es <span id='blink6'><strong>ni soltero ni casado</strong></span></p>\n";
    }
    print "\n";

    if ($cine != "on" && $deporte != "on" && $literatura != "on" && $musica != "on" && $tebeos != "on" && $television != "on") {
        print "  <p class=\"aviso\">No ha marcado ninguna afición.</p>\n";
    } else {
        print "  <p class='rojo'>Le gusta: <span id='blink7'>";
        if ($cine == "on") {
            print "<br><strong>el cine</strong><br>";
        }
        if ($deporte == "on") {
            print "<strong>el deporte</strong><br>";
        }
        if ($literatura == "on") {
            print "<strong>la literatura</strong><br>";
        }
        if ($musica == "on") {
            print "<strong>la música</strong><br>";
        }
        if ($tebeos == "on") {
            print "<strong>los tebeos</strong><br>";
        }
        if ($television == "on") {
            print "<strong>la televisión</strong><br>";
        }
        print "</span></p>\n";
        print "\n";
    }
}
?>
</body>
</html>
