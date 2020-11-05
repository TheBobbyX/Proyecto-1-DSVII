<?php

include('class/class_lib.php');

include('Header.php');

if (array_key_exists("preguntaNueva", $_POST)) {

    for ($i = 0; $i < sizeof($_POST); $i++) {

        if (array_keys($_POST)[$i] == "preguntaNueva") {
            $con = new Mantenimiento();
            $con->guardarPreguntaEditada($_POST['preguntaNueva'], $_POST['preguntaVieja']);
        } else if (is_numeric(array_keys($_POST)[$i])) {
            $con = new Mantenimiento();
            $con->guardarRespuestaEditada($_POST[array_keys($_POST)[$i]], array_keys($_POST)[$i]);
        }
    }
}

header("Location:mantenimiento.php");
