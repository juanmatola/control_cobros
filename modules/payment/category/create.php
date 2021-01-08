<?php
    if (isset($_POST['send_detect'])) {
       
        require_once './Abono.php';

        $new_abono = new Abono();
        $new_abono->name = $_POST['name'];
        $new_abono->amount = $_POST['amount']; 

        $save_status = $new_abono->save();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago | Control de Cobros</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <style>
        body{
            padding: 0px 50px;

            background-color: rgb(240,240,240);
            min-height: 100vh;
        }   
        .logo{
            height: 100px;
            width: auto;
        }
    </style>
</head>
<body>

    <div class="d-flex justify-content-around align-items-center py-4">
        <div>
            <h3>Registrar Nuevo Abono</h3>
            <a href="/">← regresar</a>
        </div>
        <img src="/assets/img/logo.png" class="img-fluid logo">
    </div>

    <?php if(isset($save_status)):?>    
        <?php if($save_status):?>
            <div class="bg-success my-3 py-4 text-center text-light">
                <h3>Abono cargado correctamente</h3>
            </div>
        <?php endif;?>
        <?php if($save_status == false):?>
            <div class="bg-danger my-3 py-4 text-center text-light">
                <h3>Ups.. no fue posible cargar el nuevo abono<h3>
            </div>
        <?php endif;?>
    <?php endif;?>

    <form action="" method="POST">
        <input type="text" name="send_detect" class="d-none">
        <label for="name">Nombre:</label>
        <input type="text" name="name">
        <label for="amount">Monto:</label>
        <input type="text" name="amount">
        <button type="submit" class="btn btn-success">Registrar Abono</button>
    </form>

    <!-- Bootstrap JS -->
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>