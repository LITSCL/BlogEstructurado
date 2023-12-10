<?php require_once '../helpers/ConexionHelper.php'; ?>

<?php
if (isset($_POST)) {
    $titulo = isset($_POST["titulo"]) ? mysqli_real_escape_string($db, $_POST["titulo"]) : false;
    $descripcion = isset($_POST["descripcion"]) ? mysqli_real_escape_string($db, $_POST["descripcion"]) : false;
    $usuario = $_SESSION["usuario"]["id"];
    $categoria = isset($_POST["categoria"]) ? (int)$_POST["categoria"] : false;
    
    $errores = array();
    
    if (!empty($titulo)) {
        
    }
    else {
        $errores["titulo"] = "El titulo no es valido";
    }
    
    if (empty($descripcion)) {
        $errores["descripcion"] = "La descripción no es valida";
    }
    
    if (empty($categoria) && !is_numeric($categoria)) {
        $errores["categoria"] = "La categoría no es valida";
    }
    
    if (count($errores) == 0) {
        if (isset($_GET["editar"])) {
            $idUsuario= $_SESSION["usuario"]["id"];
            $idEntrada = $_GET["editar"];
            $query = actualizarEntrada($titulo, $descripcion, $categoria, $idEntrada, $idUsuario);
        }
        else {
            $query = guardarEntrada($titulo, $descripcion, $usuario, $categoria);
        }
        
        header("Location: ../index.php");
    }
    else {
        $_SESSION["errores_entrada"] = $errores;
        if (isset($_GET["editar"])) {
            header("Location: ../editar_entrada.php?id=" . $_GET["editar"]);
        }
        else {
            header("Location: ../crear_entrada.php");
        }     
    }
}
?>