<?php require_once '../helpers/ConexionHelper.php'; ?>

<?php
if (isset($_POST)) {
    $nombre = isset($_POST["nombre"]) ? mysqli_real_escape_string($db, $_POST["nombre"]) : false;
    
    $errores = array();
    
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        
    }
    else {
        $errores["nombre"] = "El nombre no es valido";
    }
    
    if (count($errores) == 0) {
        $query = guardarCategoria($nombre);
    }
}

header("Location: ../index.php");
?>