<?php
if (array_key_exists('insertar',$_POST)) {
    include('class/class_lib.php');
    $titulo = $_POST['titulo'];
    $preguntas = $_POST['preguntas'];
    $option = $_POST['option'];

    $fechaActual = date("Y-m-d");

    $preg = new Preguntas();

    $preg->guardarPreguntas($titulo,$fechaActual,$option);

    $results = $preg->consultID();

    foreach ($results as $result) {
        $id = $result['id'];
    }

    $preg = new Preguntas();
    for ($i=1; $i <= $preguntas ; $i++) {

        $texto = $_POST['p'.$i];

        $preg->insertarRespuesta($texto, "0" , $id);
    }
}
header("Location: mantenimiento.php")
?>
