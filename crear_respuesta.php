<?php include('Header.php');

if (array_key_exists('crear', $_POST)) {
    $titulo = $_POST['titulo'];
    $preguntas = $_POST['preguntas'];

    if (array_key_exists('multiOption', $_POST)) {
        $multi = $_POST['multiOption'];
    } else { 
        $multi = 0;
    }

    ?>
    <div class="d-flex justify-content-center align-items-center" style="height:40rem">
        <form action="insertar_pregunta.php" method="post">
            <div class="card" style="width:40rem">
                <div class="card-header">
                    <h1><?php echo $titulo ?></h1>
                </div>
                <div class="card-body">
                    <?php for ($i = 1; $i <= $preguntas; $i++) { ?>
                        <div class="form-group">
                            <label for="">Opciones o Respuestas <?php echo $i ?></label>
                            <input type="text" name="p<?php echo $i ?>" class="form-control" placeholder="Insertar Opcion o Respuesta" required>
                        </div>
                    <?php } ?>
                    <div class="form-group d-flex justify-content-center">
                        <input type="submit" class="btn btn-primary" value="Insertar" name="insertar">
                    </div>
                    <input type="hidden" name="titulo" value="<?php echo $titulo ?>">
                    <input type="hidden" name="preguntas" value="<?php echo $preguntas ?>">
                    <input type="hidden" name="option" value="<?php echo $multi ?>">
                </div>
            </div>
        </form>

    </div>
<?php } ?>
<?php include('Footer.php') ?>