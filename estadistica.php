<?php
include('class/class_lib.php');

include('Header.php');

$cons = new Consulta();
$preg = $cons->listarReporte();

$cons = new Consulta();
$resp = $cons->listarRespuesta();

$value = $_POST['radio'];

?>
<div class="d-flex justify-content-center align-items-center" style="height:45rem">
    <div class="card " style="width: 50rem;">
        <div class="card-header">
            <h1>Resultado de Reporte</h1>
        </div>
        <div class="card-body">
            <?php if ($preg != null) { ?>
                <?php foreach ($preg as $keyPreg) { ?>
                    <?php if ($keyPreg['titulo'] == $value) { ?>
                        <div class="card-header mt-3">
                            <h4><?php echo $keyPreg['titulo'] ?></h4>
                        </div>
                        <table class="table text-center">
                            <?php foreach ($resp as $keyResp) { ?>
                                <?php if ($keyPreg['id'] == $keyResp['idenc']) { ?>
                                    <tr>
                                        <td style="width: 30rem;"><?php echo $keyResp['texto'] ?></td>
                                        <td><?php echo $keyResp['votos'] ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </table>
                    <?php } ?>
                <?php } ?>
            <?php } else { ?>
                <h3>No Existen Reportes</h3>
            <?php } ?>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-5">
    <a href="seleccion_reporte.php" class="btn btn-success">Regresar</a>
</div>
