<?php require_once '../helpers/ConexionHelper.php'; ?>

<?php
session_start();
//1. Recoger los datos del formulario.
if (isset($_POST)) {
    $email = trim($_POST["email"]);
    $clave = $_POST["clave"];
    
    if (isset($_SESSION["error_login"])) {
        unset($_SESSION["error_login"]);
    }
    
    //2. Obtener el usuario desde la base de datos.
    $query = customQuery("SELECT * FROM usuario WHERE correo = '$email' LIMIT 1");

    if ($query && mysqli_num_rows($query) == 1) {
        $usuario = mysqli_fetch_assoc($query);
        
        //3. Comprobar si las contraseñas coinciden.     
        $verificacion = password_verify($clave, $usuario["clave"]);

        if ($verificacion) {
            //4. Crear la sesión.
            $_SESSION["usuario"] = $usuario;
            
            if (isset($_SESSION["error_login"])) {
                unset($_SESSION["error_login"]);
            }
        }
        else {
            $_SESSION["error_login"] = "Login incorrecto";
        }
    }
    else {
        $_SESSION["error_login"] = "Login incorrecto";
    }
}

//5. Redirigir al usuario.
header("Location: ../index.php");
?>