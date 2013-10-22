<?php
$this->layout='admin';
?>

<form method="POST" class="admin-login">
	<h1>Panel de Administración</h1>
	<fieldset>
		<div>
			<label>Usuario:</label>
			<input type="text" name="admin_user">
		</div>

		<div>
			<label>Contraseña:</label>
			<input type="password" name="admin_password">
		</div>
	</fieldset>
	
	<input type="submit" value="Entrar">
</form>