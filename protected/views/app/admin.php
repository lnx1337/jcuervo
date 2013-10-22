
<?php
$this->layout='admin';
?>

<h2>Resumen</h2>

<div style="float:'left';">
	<a href="<?php echo CController::createUrl('App/adminusuarios'); ?>">Reporte de Usuarios</a>
</div>
<div style="float:'left';">
	<a href="<?php echo CController::createUrl('App/admincomics'); ?>">Reporte de Memes</a>
</div>
<div style="float:'right';">
  <a href="<?php echo CController::createUrl('/catalogoPiezas'); ?>">Cuerpos, Cabezas, Ojos y Bocas para Avatar</a>
</div>
<div style="float:'right';">
	<a href="<?php echo CController::createUrl('/accesorios'); ?>">Accesorios para Avatar</a>
</div>
<div style="float:'right';">
  <a href="<?php echo CController::createUrl('/catalogoObjetos'); ?>">Objetos para Meme</a>
</div>
<div style="float:'right';">
  <a href="<?php echo CController::createUrl('/backgrounds'); ?>">Fondos para Meme</a>
</div>
<div style="float:'right';">
  <a href="<?php echo CController::createUrl('app/admin').'/admin/salir'; ?>">Salir</a>
</div>


<br><br>
<label>Numero de Usuarios: <?php echo Usuarios::model()->count(); ?></label><br>
<label>Numero de Nuevos Usuarios: <?php echo ActividadUsuario::model()->count(); ?></label><br>
<label>Numero de Comics: <?php echo Comics::model()->count(); ?></label><br>
<label>Numero de Comics votados en total: <?php echo Comics::TotalCompartidos(); ?></label><br>

