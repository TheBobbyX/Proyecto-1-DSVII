<?php
include('class/class_lib.php');

include('Header.php');


$cons = new Consulta();
$preg = $cons->listarHacerEncuesta();

$cons = new Consulta();
$resp = $cons->listarRespuesta();
?>
<script type="text/javascript">
$(function(){
  var requiredCheckboxes = $(':checkbox[required]');
  requiredCheckboxes.change(function(){
    if(requiredCheckboxes.is(':checked')) {
      requiredCheckboxes.removeAttr('required');
    }else{
      requiredCheckboxes.attr('required', 'required');
    }
  });
});
</script>
<div class="d-flex justify-content-center">
    <form action="insertar_votos.php" method="post">
        <div class="card" style="width: 45rem;">
            <div class="card-header">
                <h4>Encuesta: Compras por Internet</h4>
            </div>
            <div class="card-body">
                <?php if ($preg != null) { ?>

                    <?php foreach ($preg as $keyPreg) { ?>
                        <div class="card-header mt-3">
                            <h3><?php echo $keyPreg['titulo'] ?></h3>
                        </div>
                        <table>
                            <?php if ($keyPreg['opcion'] == 1) { ?>
                                <?php foreach ($resp as $keyResp) { ?>
                                    <?php if ($keyPreg['id'] == $keyResp['idenc']) {?>
                                        <tr>
                                            <td><input type="checkbox" class="ml-4" value="<?php echo $keyResp['id'] ?>" name="<?php echo $keyResp['idenc'] ?>" required></td>
                                            <td><?php echo $keyResp['texto'] ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php } else { ?>
                                <?php foreach ($resp as $keyResp) { ?>
                                    <?php if ($keyPreg['id'] == $keyResp['idenc']) { ?>
                                        <tr>
                                            <td><input type="radio" class="ml-4" value="<?php echo $keyResp['id'] ?>" name="<?php echo $keyResp['idenc'] ?>" required></td>
                                            <td><?php echo $keyResp['texto'] ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </table>
                    <?php } ?>
                    <div class="form-group">
                        <input type="submit" name="envenc" id="" class="btn btn-success mt-5">
                    </div>
                <?php } else { ?>
                    <h3>No hay Preguntas</h3>
                <?php } ?>
            </div>
        </div>
    </form>
</div>
