<?php
$this->breadcrumbs=array(
	'Accesorios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Accesorios', 'url'=>array('index')),
	array('label'=>'Manage Accesorios', 'url'=>array('admin')),
);
?>

<h1>Crear Nuevo Accesorio</h1>
<br/>
<div style="float:'left';">
  <a href="<?php echo CController::createUrl('/accesorios'); ?>">Regresar</a>
</div>
<br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>