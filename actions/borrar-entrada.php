<?php require_once '../helpers/ConexionHelper.php'; ?>

<?php
session_start();
if (isset($_SESSION["usuario"]) && isset($_GET["id"])){
    $idUsuario = $_SESSION["usuario"]["id"];
    $idEntrada = $_GET["id"];
    $query = borrarEntrada($idUsuario, $idEntrada);
}
header("Location: ../index.php");
?>