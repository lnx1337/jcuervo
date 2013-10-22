<?php
$this->breadcrumbs=array(
	'Catalogo Objetos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CatalogoObjetos', 'url'=>array('index')),
	array('label'=>'Manage CatalogoObjetos', 'url'=>array('admin')),
);
?>

<h1>Crear Nuevo Objeto</h1>
<br/>
<div style="float:'left';">
  <a href="<?php echo CController::createUrl('/catalogoObjetos'); ?>">Regresar</a>
</div>
<br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>