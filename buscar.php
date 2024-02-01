<?php require_once 'helpers/ConexionHelper.php'; ?>
<?php require_once 'helpers/Helper.php'; ?>

<?php 
if (!isset($_POST["busqueda"])) { //Si el usuario coloca un ID que no existe en la url, se le redirige al index.php.
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
		<h1>Busqueda: <?=$_POST["busqueda"]?></h1>
		<?php 
		$entradas = conseguirEntradas(null, null, $_POST["busqueda"]);
		if (!empty($entradas)):
    		while ($entrada = mysqli_fetch_assoc($entradas)):
    	?>
            	<article class="entrada">
        			<a href="entrada.php?id=<?=$entrada["id"]?>">
        				<h2><?=$entrada["titulo"]?></h2>
        				<span class="fecha"><?=$entrada["categoria"] . " | " . $entrada["fecha"]?></span>
        				<p>
							<?=substr($entrada["descripcion"], 0, 300) . "..."?>
        				</p>
        			</a>
        		</article>
    	<?php 
    	    endwhile;
    	else:
    	?>
    		<div class="alerta-error">No hay entradas en esta categoría</div>
    	<?php
    	endif;
    	?>
	</div>
	<!-- Fin principal. -->

	<?php require_once 'includes/footer.php'; ?>
</body>
</html>