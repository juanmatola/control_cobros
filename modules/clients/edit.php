<?php 
    require_once __DIR__.'/Client.php';
    require_once __DIR__.'/ClientsList.php';

    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        
        $clientToDelete = new Client();
        $clientToDelete->setId($_GET['id']);

        $delete_status = $clientToDelete->delete();
    }

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
            <h3>Editar Clientes</h3>
            <a href="/">← regresar</a>
        </div>
        <img src="/assets/img/logo.png" class="img-fluid logo">
    </div>

    <?php if(isset($delete_status)):?>    
        <?php if($delete_status):?>
            <div class="bg-info my-3 py-4 text-center text-light">
                <h3>Cliente eliminado correctamente</h3>
            </div>
        <?php endif;?>
        <?php if($delete_status == false):?>
            <div class="bg-danger my-3 py-4 text-center text-light">
                <h3>Ups.. no fue posible eliminar el cliente<h3>
            </div>
        <?php endif;?>
    <?php endif;?>

    <h5 class="text-left">Clientes Info</h5>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">E-mail</th>
                <th scope="col">Web</th>
                <th scope="col">Abono</th>
                <th scope="col">Action</th>
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
                <td><a href="?action=delete&id=<?php echo $client['0']; ?>">eliminar</a></td>
            </tr>
        <?php endforeach;?>    
        </tbody>
    </table>
    
    
    <!-- Bootstrap JS -->
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>