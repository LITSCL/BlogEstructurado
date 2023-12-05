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
		<h1>Todas las entradas</h1>
		<?php 
		$entradas = conseguirEntradas();
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
    	endif;
    	?>
	</div>
	<!-- Fin principal. -->

	<?php require_once 'includes/footer.php'; ?>
</body>
</html>