<?php
if (array_key_exists('envenc', $_POST)) {
    include('class/class_lib.php');

    foreach ($_POST as $key) {
        if (is_numeric($key)) {
            $con = new Consulta();

            $voto = $con->consultarVoto($key);

            foreach ($voto as $v) {
                $nVoto = $v['votos'];
            }

            $nVoto += 1;

            $con = new Consulta();
            $con->guardarVoto($nVoto, $key);
        }
    }
}

include('Header.php')
?>

<div class="d-flex justify-content-center align-items-center" style="height: 40rem;">
    <div class="form text-center">
        <div class="form-group">
            <h1>Encuesta Realizada con Exito</h1>
        </div>
        <div class="form-group">
            <a href="index.php" class="btn btn-success">Volver</a>
        </div>
    </div>
</div>
