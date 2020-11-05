<?php
include('class/class_lib.php');

include('header.php');

$cons = new Consulta();
$preg = $cons->listarEncuesta();

$cons = new Consulta();
$resp = $cons->listarRespuesta();
?>
<div class="d-flex justify-content-center">
    <div class="card " style="width: 50rem;">

        <div class="card-header d-flex justify-content-between justify-items-center">
            <div class="">
                <h3>Mantenimiento de Preguntas y Respuestas</h3>
            </div>
            <div class="w-40">
                <a class="btn btn-success" href="crear_pregunta.php">Crear</a>
            </div>
        </div>
        <div class="card-body">
            <?php if ($preg != null) { ?>
                <?php foreach ($preg as $keyPreg) { ?>
                    <div class="card-header mt-3 row d-flex justify-content-between">
                        <h4><?php echo $keyPreg['titulo'] ?></h4>
                        <div class="d-flex justify-content-between">
                            <form action="Borrar.php" method="post">
                                <button type="submit" class="btn btn-danger">Borrar</button>
                                <input type="hidden" name="id" value="<?php echo $keyPreg['id'] ?>">
                            </form>
                            <form action="editar.php" method="post">
                                <button type="submit" class="btn btn-warning ml-3">Editar</button>
                                <input type="hidden" name="id" value="<?php echo $keyPreg['id'] ?>">
                            </form>

                        </div>

                    </div>

                    <table class="ml-5">
                        <?php foreach ($resp as $keyResp) { ?>
                            <?php if ($keyPreg['id'] == $keyResp['idenc']) { ?>
                                <tr>
                                    <td><?php echo $keyResp['texto'] ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </table>
                <?php } ?>
            <?php } else { ?>
                <h3>No Existen Preguntas</h3>
            <?php } ?>
        </div>
    </div>
</div>
