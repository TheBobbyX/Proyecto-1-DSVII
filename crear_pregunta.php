<?php
include('Header.php');
?>
<div class="d-flex justify-content-center align-items-center" style="height:40rem">
    <form action="crear_respuesta.php" method="post">
        <div class="card" style="width:33.3rem">
            <div class="card-header">
                <h2>Crear Pregunta</h2>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <h3>Pregunta</h3>
                    <input type="text" class="form-control" name="titulo" placeholder="Inserte pregunta" required>
                </div>
                <div class="form-group">
                    <h3>Numero de Respuestas</h3>
                    <input type="number" class="form-control" name="preguntas" placeholder="Inserte Numero de Respuesta" min="0" max="10" required>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="multiOption" value="1">
                        <label class="custom-control-label" for="customCheck1">Seleccion Multiple</label>
                    </div>
                    <input type="submit" class="btn btn-primary" name="crear">
                </div>
            </div>
        </div>
    </form>
</div>

<?php include('Footer.php') ?>
