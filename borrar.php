<?php

include('class/class_lib.php');

include('Header.php');


$cons = new Mantenimiento();
$cons->borrarPreguntas($_POST['id']);

$cons = new Mantenimiento();
$cons->borrarRespuestas($_POST['id']);

header("Location: mantenimiento.php");
