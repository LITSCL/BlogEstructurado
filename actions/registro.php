<?php require_once '../helpers/ConexionHelper.php'; ?>

<?php
session_start();
if (isset($_POST["boton"])) {
    //1. Obtener los datos del formulario.
    $nombre = isset($_POST["nombre"]) ? mysqli_real_escape_string($db, $_POST["nombre"]) : false; //Esto es un operador ternario (Similar a una condición IF).
    $apellido = isset($_POST["apellido"]) ? mysqli_real_escape_string($db, $_POST["apellido"]) : false; //La función "mysqli_real_escape_string" permite hacer un escape de string "Evitar una injección SQL".
    $email = isset($_POST["email"]) ? mysqli_real_escape_string($db, $_POST["email"]) : false;
    $clave = isset($_POST["clave"]) ? mysqli_real_escape_string($db, $_POST["clave"]) : false;
    
    //2. Crear el Array de errores.
    $errores = array();
    
    //3. Validar los datos que llegaron desde el formulario.
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        
    }
    else {
        $errores["nombre"] = "El nombre no es valido";
    }
    
    if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {
        
    }
    else {
        $errores["apellido"] = "El apellido no es valido";
    }
    
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
    }
    else {
        $errores["email"] = "El email no es valido";
    }
    
    if (!empty($clave)) {
        
    }
    else {
        $errores["clave"] = "La clave no puede estar vacia";
    }
    
    if (count($errores) == 0) {
        //4. Cifrar la contraseña.
        $claveCifrada = password_hash($clave, PASSWORD_BCRYPT, ["cost" => 4]); //El primer parámetro indica la variable a cifrar, el segundo indica el protocolo de encriptación y el cuarto parámetro indica cuantas veces se va a encriptar la variable.
        
        //5. Insertar el usuario en la base de datos.
        $query = guardarUsuario($nombre, $apellido, $email, $claveCifrada);
        
        if ($query) {
            $_SESSION["exito_registro"] = "El registro se ha completado exitosamente";
        }
        else {
            $_SESSION["errores_registro"]["registro"] = "Error al guardar el usuario en la BD";
        } 
    }
    else {
        $_SESSION["errores_registro"] = $errores;
        header("Location: ../index.php");
    }
}
header("Location: ../index.php");
?>