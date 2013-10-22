<?php
$this->breadcrumbs=array(
	'Catalogo Objetoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CatalogoObjetos', 'url'=>array('index')),
	array('label'=>'Create CatalogoObjetos', 'url'=>array('create')),
	array('label'=>'View CatalogoObjetos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CatalogoObjetos', 'url'=>array('admin')),
);
?>

<h1>Update CatalogoObjetos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>