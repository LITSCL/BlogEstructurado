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
		<h1>Editar Perfil</h1>
		<?php if (isset($_SESSION["exito_actualizacion"])): ?>
    		    <div class="alerta alerta-exito"><?php echo $_SESSION["exito_actualizacion"] ?></div>
    	<?php elseif(isset($_SESSION["errores_actualizacion"]["actualizacion"])): ?>
    			<div class="alerta alerta-error"><?php echo $_SESSION["errores_actualizacion"]["actualizacion"] ?></div>
    	<?php endif; ?>
    	<form action="actions/actualizar-usuario.php" method="POST">
    		<label for="nombre">Nombre</label> 
    		<input type="text" name="nombre" value="<?=$_SESSION["usuario"]["nombre"];?>" />
    		<?php echo isset($_SESSION["errores_actualizacion"]) ? mostrarError($_SESSION["errores_actualizacion"], "nombre") : ""; ?>
    			
    		<label for="apellido">Apellido</label> 
    		<input type="text" name="apellido" value="<?=$_SESSION["usuario"]["apellido"];?>" /> 
    		<?php echo isset($_SESSION["errores_actualizacion"]) ? mostrarError($_SESSION["errores_actualizacion"], "apellido") : ""; ?>
    			
    		<label for="email">Email</label> 
    		<input type="email" name="email" value="<?=$_SESSION["usuario"]["correo"];?>" />
    		<?php echo isset($_SESSION["errores_actualizacion"]) ? mostrarError($_SESSION["errores_actualizacion"], "email") : ""; ?>
    			
    		<input type="submit" name="boton" value="Modificar" />

    		<?php borrarErrores(); ?>
    		<?php borrarExitos(); ?>
    	</form>
	</div>
    <!-- Fin principal. -->

	<?php require_once 'includes/footer.php'; ?>
</body>
</html>