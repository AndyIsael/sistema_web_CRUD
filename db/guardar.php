<?php

include("conexion.php");

if(isset($_POST['guardar'])){
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $tipo = $_POST['tipo'];

    $query = "INSERT INTO productos(nombre, cantidad, tipo) VALUES ('$nombre', '$cantidad', '$tipo')";
    $resultado = mysqli_query($con, $query);
    
    if(!$resultado){
        die("Error");
    }

    $_SESSION['mensaje'] = '¡Registro guardado con exito!';
    $_SESSION['mensaje_tipo'] = 'success';

    header("Location: /sistema_web/index.php");
}

?>