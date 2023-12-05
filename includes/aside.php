<?php require_once 'helpers/Helper.php'; ?>

<!-- Barra lateral. -->
<aside id="lateral">
    <div id="buscador" class="bloque-lateral">
    	<h3>Buscar</h3>
    	<form action="buscar.php" method="POST">
    		<input type="text" name="busqueda" /> 
    		<input type="submit" value="Buscar" />
    	</form>
    </div>
    	
	<?php if (isset($_SESSION["usuario"])): ?>
		<div class="bloque-lateral">
			<h3><?php echo "Bienvenido, " . $_SESSION["usuario"]["nombre"] . " " . $_SESSION["usuario"]["apellido"]; ?></h3>
			<a href="crear_entrada.php" class="boton boton-verde">Crear entrada</a>
			<a href="crear_categoria.php" class="boton">Crear categoria</a>
			<a href="editar_perfil.php" class="boton boton-naranjo">Editar perfil</a>
			<a href="actions/logout.php" class="boton boton-rojo">Cerrar sesion</a>
		</div>
	<?php endif; ?>
	
	<?php if (!isset($_SESSION["usuario"])): ?>
    	<div id="login" class="bloque-lateral">
    		<h3>Identificate</h3>
    	<?php if (isset($_SESSION["error_login"])): ?>
    		<div class="alerta alerta-error">
    			<h3><?= $_SESSION["error_login"] ?></h3>
    		</div>
    	<?php endif; ?>
    		<form action="actions/login.php" method="POST">
    			<label for="email">Email</label> <input type="email" name="email" />
    
    			<label for="clave">Contraseña</label> 
    			<input type="password" name="clave" /> 
    			
    			<input type="submit" value="Entrar" />
    		</form>
    	</div>
    
    	<div id="registro" class="bloque-lateral">
    		<h3>Registrate</h3>
    		<?php if (isset($_SESSION["exito_registro"])): ?>
    		    	<div class="alerta alerta-exito"><?php echo $_SESSION["exito_registro"] ?></div>
    		<?php elseif(isset($_SESSION["errores_registro"]["registro"])): ?>
    				<div class="alerta alerta-error"><?php echo $_SESSION["errores_registro"]["registro"] ?></div>
    		<?php endif; ?>
    		<form action="actions/registro.php" method="POST">
    			<label for="nombre">Nombre</label> 
    			<input type="text" name="nombre" />
    			<?php echo isset($_SESSION["errores_registro"]) ? mostrarError($_SESSION["errores_registro"], "nombre") : ""; ?>
    			
    			<label for="apellido">Apellido</label> 
    			<input type="text" name="apellido" /> 
    			<?php echo isset($_SESSION["errores_registro"]) ? mostrarError($_SESSION["errores_registro"], "apellido") : ""; ?>
    			
    			<label for="email">Email</label> 
    			<input type="email" name="email" />
    			<?php echo isset($_SESSION["errores_registro"]) ? mostrarError($_SESSION["errores_registro"], "email") : ""; ?>
    			
    			<label for="clave">Contraseña</label> 
    			<input type="password" name="clave" /> 
    			<?php echo isset($_SESSION["errores_registro"]) ? mostrarError($_SESSION["errores_registro"], "clave") : ""; ?>
    			
    			<input type="submit" name="boton" value="Registrar" />
    			
    			<?php borrarErrores(); ?>
    			<?php borrarExitos(); ?>
    		</form>
    	</div>
	<?php endif; ?>
</aside>