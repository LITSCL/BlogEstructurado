<?php require_once 'helpers/RedireccionHelper.php'; ?>
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
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/styles.css"/>
	<script type="text/javascript" src="vendor/jquery-3.5.0/jquery-3.5.0.min.js"></script>
</head>
<body>
	<?php require_once 'includes/header.php'; ?>
	<?php require_once 'includes/aside.php'; ?>
	
	<!-- Inicio principal. -->
	<div id="principal">
		<h1>Editar Entrada: <?=$entradaActual["titulo"]?></h1>
		
		<form action="actions/guardar-entrada.php?editar=<?=$entradaActual["id"]?>" method="POST">
			<label for="titulo">Titulo</label>
			<input type="text" name="titulo" value="<?=$entradaActual["titulo"]?>"/>
			<?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], "titulo") : ""; ?>
			
			<label for="descripcion">Descripción</label>
			<textarea name="descripcion"><?=$entradaActual["descripcion"]?></textarea>
			<?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], "descripcion") : ""; ?>
			
			<label for="categoria">Categoría</label>
			<select name="categoria">
				<?php 
				$categorias = conseguirCategorias();
				if (!empty($categorias)):
				    while ($categoria = mysqli_fetch_assoc($categorias)):
				?>
					<option value="<?=$categoria["id"]?>" <?=($categoria["id"] == $entradaActual["categoria_id"]) ? 'selected="selected"' : ""?>>
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
	
	<?php require_once "includes/footer.php"; ?>
</body>
</html>