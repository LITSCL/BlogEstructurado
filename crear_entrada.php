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
		<h1>Crear Entrada</h1>
		
		<form action="actions/guardar-entrada.php" method="POST">
			<label for="titulo">Titulo</label>
			<input type="text" name="titulo"/>
			<?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], "titulo") : ""; ?>
			
			<label for="descripcion">Descripción</label>
			<textarea name="descripcion"></textarea>
			<?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], "descripcion") : ""; ?>
			
			<label for="categoria">Categoría</label>
			<select name="categoria">
				<?php 
				$categorias = conseguirCategorias();
				if (!empty($categorias)):
				    while ($categoria = mysqli_fetch_assoc($categorias)):
				?>
					<option value="<?=$categoria["id"]?>">
						<?=$categoria["nombre"]?>
					</option>
				<?php 
				    endwhile;
				endif;
				?>
			</select>
			<?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], "categoria") : ""; ?>
			
			<input type="submit" value="Guardar"/>
		</form>
		<?php borrarErrores(); ?>
	</div>
    <!-- Fin principal. -->

	<?php require_once 'includes/footer.php'; ?>
</body>
</html>