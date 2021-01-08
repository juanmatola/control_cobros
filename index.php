<?php 
    require_once __DIR__.'/modules/clients/ClientsList.php';
    $list = new ClientsList();
    $data = $list->obtain();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Cobros</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
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
        <img src="./assets/img/logo.png" class="img-fluid logo">
        <a href="./modules/clients/create.php" class="btn btn-primary" >Nuevo cliente</a>
        <a href="./modules/clients/edit.php" class="btn btn-primary" >Editar cliente</a>
        <a href="./modules/payment/category/create.php" class="btn btn-primary" >Nuevo abono</a>
        <a href="./modules/payment/category/edit.php" class="btn btn-primary" >Editar abono</a>
        <a href="./modules/payment/insert.php" class="btn btn-success" >+ Nuevo pago</a>
    </div>

    <h5 class="text-left">Clientes Info</h5>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">E-mail</th>
                <th scope="col">Web</th>
                <th scope="col">Abono</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach (array_reverse($data) as $client):?>
            <tr>
                <th scope="row"><?php echo $client['1']; ?></th>
                <td><?php echo $client['2']; ?></td>
                <td><?php echo $client['3']; ?></td>
                <td><?php echo $client['4']; ?></td>
                <td><?php echo $client['5']; ?></td>
            </tr>
        <?php endforeach;?>    
        </tbody>
    </table>
    
    
    <!-- Bootstrap JS -->
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>