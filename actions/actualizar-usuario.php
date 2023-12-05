<?php require_once '../helpers/ConexionHelper.php'; ?>

<?php
//session_start();
if (isset($_POST["boton"])) {
    //1. Obtener los datos del formulario.
    $nombre = isset($_POST["nombre"]) ? mysqli_real_escape_string($db, $_POST["nombre"]) : false; //Esto es un operador ternario (Similar a una condición IF).
    $apellido = isset($_POST["apellido"]) ? mysqli_real_escape_string($db, $_POST["apellido"]) : false; //La función "mysqli_real_escape_string" permite. hacer un escape de string "Evitar una inyección SQL".
    $email = isset($_POST["email"]) ? mysqli_real_escape_string($db, $_POST["email"]) : false;
    
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
    
    if (count($errores) == 0) { 
        $usuario = $_SESSION["usuario"];
        
        //4. Comprobar si el Email ya existe en otro registro.
        $query = customQuery("SELECT id, correo FROM usuario WHERE correo = '$email'");
        $usuarioEmail = mysqli_fetch_assoc($query);

        if ($usuario["id"] == $usuarioEmail["id"] || empty($usuarioEmail)) {
            //5. Actualizar el usuario en la base de datos.      
            $query = actualizarUsuario($usuario["id"], $nombre, $apellido, $email);
            
            if ($query) {
                $_SESSION["usuario"]["nombre"] = $nombre;
                $_SESSION["usuario"]["apellido"] = $apellido;
                $_SESSION["usuario"]["correo"] = $email;
                
                $_SESSION["exito_actualizacion"] = "Tus datos se han actualizado exitosamente";
            }
            else {
                $_SESSION["errores_actualizacion"]["actualizacion"] = "Error al actualizar el usuario en la BD";
            } 
        }
        else {
            $_SESSION["errores_actualizacion"]["actualizacion"] = "Error al actualizar el usuario en la BD (El correo ya existe)";
        }

    }
    else {
        $_SESSION["errores_actualizacion"] = $errores;
    }
}
header("Location: ../editar_perfil.php");
?>