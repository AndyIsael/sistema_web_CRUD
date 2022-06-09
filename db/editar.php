<?php
    include("conexion.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM productos WHERE id = $id";
        $resultado = mysqli_query($con, $query);
        if (mysqli_num_rows($resultado) == 1){
            $fila = mysqli_fetch_array($resultado);
            $id = $fila['id'];
            $nombre = $fila['nombre'];
            $cantidad = $fila['cantidad'];
            $tipo = $fila['tipo'];
        }
    }

    if(isset($_POST['actualizar'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $tipo = $_POST['tipo'];

        $query = "UPDATE productos set nombre='$nombre', cantidad='$cantidad', tipo='$tipo' WHERE id=$id";
        $resultado = mysqli_query($con, $query);

        $_SESSION['mensaje'] = '¡Registro actualizado con exito!';
        $_SESSION['mensaje_tipo'] = 'warning';
        header("Location: /sistema_web/index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="/sistema_web/index.php" class="navbar-brand"> Sistema web </a>
        </div>
    </nav>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">

                    <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <p>Id: <?php echo $id; ?></p>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualizar nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" name="cantidad" value="<?php echo $cantidad; ?>" class="form-control" placeholder="Actualizar cantidad">
                        </div>
                        <div class="form-group">
                            <input type="text" name="tipo" value="<?php echo $tipo; ?>" class="form-control" placeholder="Actualizar Tipo">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="actualizar" value="Guardar producto">
                    </from>

                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>