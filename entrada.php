<?php require_once 'helpers/ConexionHelper.php'; ?>
<?php require_once 'helpers/Helper.php'; ?>

<?php 
$entradaActual = conseguirEntrada($_GET["id"]);
if (!isset($entradaActual["id"])) { //Si el usuario coloca un ID que no existe en la url, se le redirige al index.php.
    header("Location: index.php");
}
?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/styles.css"/>
	<script type="text/javascript" src="vendor/jquery-3.5.0/jquery-3.5.0.min.js"></script>
</head>
<body>
	<?php require_once 'includes/header.php'; ?>
	<?php require_once 'includes/aside.php'; ?>

	<!-- Inicio principal. -->
	<div id="principal">
		<h1><?=$entradaActual["titulo"]?></h1>
		<a href="categoria.php?id=<?=$entradaActual["categoria_id"]?>"><h2><?=$entradaActual["categoria"]?></h2></a>
		<h4><?=$entradaActual["fecha"]?> | <?=$entradaActual["usuario"]?></h4>
		<p><?=$entradaActual["descripcion"]?></p>
		<br/>
	<?php if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]["id"] == $entradaActual["usuario_id"]): ?>
		<a href="editar_entrada.php?id=<?=$entradaActual["id"]?>" class="boton boton-verde">Editar entrada</a>
		<a href="actions/borrar-entrada.php?id=<?=$entradaActual["id"]?>" class="boton">Borrar entrada</a>
	<?php endif;?>
	</div>
	<!-- Fin principal. -->

	<?php require_once 'includes/footer.php'; ?>
</body>
</html>