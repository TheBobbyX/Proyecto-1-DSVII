<?php

include('class/class_lib.php');

include('Header.php');


$cons = new Mantenimiento();
$preg = $cons->editarPreguntas($_POST['id']);

$cons = new Mantenimiento();
$resp = $cons->editarRespuestas($_POST['id']);
?>

<div class="d-flex justify-content-center">
    <div class="card p-3" style="width: 40rem;">
        <form action="guardarEditado.php" method="post" class="form">
            <div class="form-group card-header">
                <h3>Pregunta</h3>
                <input type="text" class="form-control" value="<?php echo $preg[1] ?>" name="preguntaNueva" required>
                <input type="hidden" name="preguntaVieja" value="<?php echo $preg[1] ?>">
            </div>
            <?php foreach ($resp as $key) { ?>
                <div class="form-group">
                    <label for="">Respuesta</label>
                    <input type="text" class="form-control" value="<?php echo $key['texto'] ?>" name="<?php echo $key['id'] ?>" required>
                </div>
            <?php } ?>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>

</div>

<?php include('Footer.php'); ?>
