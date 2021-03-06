<?php
    require_once dirname(__DIR__).'/payment/category/AbonoList.php';

    $list = new AbonoList();
    $data = $list->obtain();

    if (isset($_POST['send_detect'])) {
       
        require_once './Client.php';

        $new_client = new Client();
        $new_client->name = $_POST['name'];
        $new_client->phone = $_POST['phone']; 
        $new_client->email = $_POST['email']; 
        $new_client->web = $_POST['web'];
        if ($_POST['abono'] == "null") {
            $new_client->abono = NULL;
        }else {
            $new_client->abono = $_POST['abono'];
        }
        $save_status = $new_client->save();
    }
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
        form{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
        }
        .form-titles p{
            display: inline-block;
            width: 18%;
            padding-left: 25px;
        }
        .success_alert{
            background-color: green;
        }
        @media(max-width: 768px){
            .form-titles p{
                display: block;
            }
            form{
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <div class="d-flex justify-content-around align-items-center py-4">
        <div>
            <h3>Crear Nuevo Cliente</h3>
            <a href="/">← regresar</a>
        </div>
        <img src="/assets/img/logo.png" class="img-fluid logo">
    </div>

    <?php if(isset($save_status)):?>    
        <?php if($save_status):?>
            <div class="success_alert my-3 py-4 text-center text-light">
                <h3>Cliente cargado correctamente</h3>
            </div>
        <?php endif;?>
        <?php if($save_status == false):?>
            <div class="bg-danger my-3 py-4 text-center text-light">
                <h3>Ups.. no fue posible cargar el nuevo cliente<h3>
            </div>
        <?php endif;?>
    <?php endif;?>

    <h5 class="text-left">Información de Nuevo Cliente</h5>

    <form action="" method="post">
        <input type="text" name="send_detect" class="d-none">
        <div>
            <p>Nombre</p>
            <input type="text" name="name">
        </div>
        <div>
            <p>Teléfono</p>
            <input type="text" name="phone">
        </div>
        <div>
            <p>Email</p>
            <input type="text" name="email">
        </div>
        <div>
            <p>Web</p>
            <input type="text" name="web">
        </div>
        <div>
            <p>Suscripción</p>
            <select name="abono" class="w-100">

                <option value="null">--Sin Abono--</option>

                <?php foreach ($data as $client):?>

                    <option value="<?php echo $client['0']; ?>"><?php echo $client['1']; ?></option>

                <?php endforeach;?> 
            </select>
        </div>
        <button type="submit" class="btn btn-success my-3">Guardar</button>
    </form>

     <!-- Bootstrap JS -->
     <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>