<?php
    include("conexion.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM productos WHERE id = $id";
        $resultado = mysqli_query($con, $query);

        if(!$resultado) {
            die("Error");
        }
        
        $_SESSION['mensaje'] = '┬íRegistro eliminado con exito!';
        $_SESSION['mensaje_tipo'] = 'danger';
        header("Location: /sistema_web/index.php");
    }
?>