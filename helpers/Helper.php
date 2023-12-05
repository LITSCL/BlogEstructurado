<?php
function mostrarError($errores, $campo) {
    $alerta = "";
    if (isset($errores[$campo]) && !empty(($campo))) {
        $alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . "</div>";
    }
    return $alerta;
}

function borrarErrores() {
    unset($_SESSION["errores_registro"]);
    unset($_SESSION["errores_entrada"]);
    unset($_SESSION["errores_actualizacion"]); 
}

function borrarExitos() {
    unset($_SESSION["exito_registro"]);
    unset($_SESSION["exito_actualizacion"]);
}
?>