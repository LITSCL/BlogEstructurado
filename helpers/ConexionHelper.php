<?php
$host = "localhost";
$usuario = "root";
$clave = "root";
$baseDeDatos = "dbblogestructurado";
$puerto = 3306;

$db = mysqli_connect($host, $usuario, $clave, $baseDeDatos, $puerto);

mysqli_query($db, "SET NAMES 'utf8'");

if (!isset($_SESSION)) {
    session_start();
}

function guardarUsuario($nombre, $apellido, $email, $claveCifrada) {
    global $db;
    $sql = "INSERT INTO usuario VALUES(null, '$nombre', '$apellido', '$email', '$claveCifrada', CURDATE())";
    $query = mysqli_query($db, $sql);
    return $query;
}

function guardarCategoria($nombre) {
    global $db;
    $sql = "INSERT INTO categoria VALUES(null, '$nombre')";
    $query = mysqli_query($db, $sql);
    return $query;
}

function guardarEntrada($titulo, $descripcion, $usuario, $categoria) {
    global $db;
    $sql = "INSERT INTO entrada VALUES(null, '$titulo', '$descripcion', CURDATE(), $usuario, $categoria)"; //Las variables "usuario" y "categoria" no deben estar en comillas ya que son números.
    $query = mysqli_query($db, $sql);
    return $query;
}

function conseguirCategorias() {
    global $db;
    $sql = "SELECT * FROM categoria ORDER BY id ASC";
    $categorias = mysqli_query($db, $sql);
    
    $resultado = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $resultado = $categorias;
        return $resultado;
    }
}

function conseguirCategoria($id) {
    global $db;
    $sql = "SELECT * FROM categoria WHERE id = $id";
    $categoria = mysqli_query($db, $sql);
    
    $resultado = array();
    if ($categoria && mysqli_num_rows($categoria) >= 1) {
        $resultado = mysqli_fetch_assoc($categoria);
        return $resultado;
    }
}

function conseguirEntradas($limite = null, $categoria = null, $busqueda = null) { //Si no se entrega el segundo parámetro, por defecto será NULL... Lo mismo pasa con el tercer parámetro.
    global $db;
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entrada e" . " INNER JOIN categoria c ON e.categoria_id = c.id";
    
    if (!empty($categoria)) {
        $sql.=" WHERE e.categoria_id = $categoria";
    }
    
    if (!empty($busqueda)) {
        $sql.=" WHERE e.titulo LIKE '%$busqueda%'";
    }
    
    $sql.=" ORDER BY e.id DESC";
    
    if ($limite == true) {
        $sql.=" LIMIT 4";
    }
    
    $entradas = mysqli_query($db, $sql);
    $resultado = array();
    
    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $resultado = $entradas;
        return $resultado;
    }
}

function conseguirEntrada($id) {
    global $db;
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellido) AS usuario FROM entrada e" . " INNER JOIN usuario u ON e.usuario_id = u.id" . " INNER JOIN categoria c ON e.categoria_id = c.id". " WHERE e.id = $id";
    $entrada = mysqli_query($db, $sql);
    
    $resultado = array();
    if ($entrada && mysqli_num_rows($entrada) >= 1) {
        $resultado = mysqli_fetch_assoc($entrada);
        return $resultado;
    }
}

function actualizarUsuario($id, $nombre, $apellido, $email) {
    global $db;
    $sql = "UPDATE usuario SET " . "nombre = '$nombre', " . "apellido = '$apellido', " . "correo = '$email' " . "WHERE id = " . $id;
    $query = mysqli_query($db, $sql);
    return $query;
}

function actualizarEntrada($titulo, $descripcion, $categoria, $idEntrada, $idUsuario) {
    global $db;
    $sql = "UPDATE entrada SET titulo='$titulo', descripcion='$descripcion', categoria_id=$categoria" . " WHERE id=$idEntrada AND usuario_id=$idUsuario";
    $query = mysqli_query($db, $sql);
    return $query;
}

function borrarEntrada($idUsuario, $idEntrada) {
    global $db;
    $sql = "DELETE FROM entrada WHERE usuario_id = $idUsuario AND id = $idEntrada";
    $query = mysqli_query($db, $sql);
    return $query;
}

function customQuery($sql) {
    global $db;
    try {
        $query = mysqli_query($db, $sql);
    } catch (Exception $ex) {
        return false;
    }
    return $query;
}
?>