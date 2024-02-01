<?php require_once 'helpers/RedireccionHelper.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside.php'; ?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/styles.css"/>
	<script type="text/javascript" src="vendor/jquery-3.5.0/jquery-3.5.0.min.js"></script>
</head>
<body>
	<!-- Inicio principal. -->
	<div id="principal">
		<h1>Crear Categoría</h1>
		
		<form action="actions/guardar-categoria.php" method="POST">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre"/>
			<input type="submit" value="Guardar"/>
		</form>
	</div>
    <!-- Fin principal. -->

	<?php require_once "includes/footer.php"; ?>
</body>
</html>