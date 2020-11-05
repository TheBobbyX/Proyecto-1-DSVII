<?php include('Header.php'); ?>

<div class="d-flex justify-content-center align-items-center" style="height:30rem">
    <div class="card" style="width:30rem; height: 20rem;">
        <div class="card-header">
            <h2>Reporte</h2>
        </div>
        <div class="card-body">
            <form action="estadistica.php" method="post">
                <div class="form-group custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="customCheck1" name="radio" value="Sexo" required>
                    <label class="custom-control-label" for="customCheck1">Género</label>
                </div>

                <div class="form-group custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="customCheck2" name="radio" value="Rango de edad" required>
                    <label class="custom-control-label" for="customCheck2">Rango de Edad</label>
                </div>

                <div class="form-group custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="customCheck3" name="radio" value="Rango Salarial" required>
                    <label class="custom-control-label" for="customCheck3">Ingreso Salarial</label>
                </div>

                <div class="form-group custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="customCheck4" name="radio" value="Provincia" required>
                    <label class="custom-control-label" for="customCheck4">Provincia</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Consultar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('Footer.php'); ?>