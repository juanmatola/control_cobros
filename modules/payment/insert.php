<?php 
    require_once __DIR__.'/Payment.php';
    require_once dirname(__DIR__).'/clients/ClientsList.php';

    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        
        
    }

    $list = new ClientsList();
    $data = $list->obtain();
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
            <h3>Registrar Nuevo Pago</h3>
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

            <form action="" method="get">
                
                <select name="client">
                    <?php foreach ($data as $client):?>
                        <option value="<?php echo $client['0']; ?>"><?php echo $client['1']; ?></option>
                    <?php endforeach;?>    
                </select>
                <?php
                    $unixtime = time(); 
                    echo date('d');
                    echo date('<br>');
                    echo date('m');
                    echo date('<br>');
                    echo date('y');

                ?>
                <input type="text" name="monto">
                <input type="date" value="" name="date" class="dnone">
                <button type="submit" class="btn btn-success">Registrar</button>
            </form>
    
    
        
    
    
    <!-- Bootstrap JS -->
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>