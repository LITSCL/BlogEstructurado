<?php require_once 'helpers/ConexionHelper.php'; ?>
<?php require_once 'helpers/Helper.php'; ?>

<!-- Cabecera. -->
<header id="cabecera">
	<!-- Logo. -->
	<div id="logo">
		<a href="index.php">Blog de VideoJuegos</a>
	</div>

	<!-- Menu. -->
	<nav id="menu">
		<ul>
			<li><a href="index.php">Inicio</a></li>
			<?php 
			$categorias = conseguirCategorias(); 
			?>
			<?php 
			if (!empty($categorias)):
    			while ($categoria = mysqli_fetch_assoc($categorias)): 
    		?>
    				<li><a href="categoria.php?id=<?=$categoria["id"]?>"><?=$categoria["nombre"]?></a></li>
    		<?php 
    			endwhile; 
			endif;
			?>
			<li><a href="index.php">Sobre mí</a></li>
			<li><a href="index.php">Contacto</a></li>
		</ul>
	</nav>
	<div class="clearfix"></div>
</header>

<div id="contenedor">