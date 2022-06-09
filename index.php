<?php
include("db/conexion.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="index.php" class="navbar-brand"> Sistema web </a>
    </div>
</nav>


    <div class="container p-4">
        <div class="row">
        <p>
            <div class="card card-body">
                <form action="" method="get">
                    <div class="form-group">
                        <input type="text" name="tipo_producto" class="form-control" placeholder="Buscar producto">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="enviar" value="Buscar">
                </form>
            </div>
            
        </p>

            <div class="col-md-4">
            
                <div class="card card-body">
                    <form action="db/guardar.php" method="POST">
                
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del producto">
                        </div>
                        <div class="form-group">
                            <input type="text" name="cantidad" class="form-control" placeholder="Cantidad">
                        </div>
                        <div class="form-group">
                            <input type="text" name="tipo" class="form-control" placeholder="Tipo">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="guardar" value="Guardar producto">
                    </form>
                </div>

                <?php if (isset($_SESSION['mensaje'])) { ?>
                    <div class="alert alert-<?= $_SESSION['mensaje_tipo']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensaje']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php session_unset(); } ?>

            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Tipo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = "SELECT * FROM productos";
                        if(isset($_GET['enviar'])) {
                            $tipo_producto = $_GET['tipo_producto'];

                            $query = "SELECT * FROM productos WHERE tipo LIKE '$tipo_producto'";
                        }

                        $resultado_pro = mysqli_query($con, $query);

                        while($fila = mysqli_fetch_array($resultado_pro)){ ?>
                            <tr>
                                <td><?php echo $fila['id'] ?></td>
                                <td><?php echo $fila['nombre'] ?></td>
                                <td><?php echo $fila['cantidad'] ?></td>
                                <td><?php echo $fila['tipo'] ?></td>
                                <td>
                                    <a href="db/editar.php?id=<?php echo $fila['id']?>">
                                        Editar
                                    </a>
                                    <a href="db/eliminar.php?id=<?php echo $fila['id']?>">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>