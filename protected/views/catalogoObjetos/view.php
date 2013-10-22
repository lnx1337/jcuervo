<?php
$this->breadcrumbs=array(
	'Catalogo Objetoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CatalogoObjetos', 'url'=>array('index')),
	array('label'=>'Create CatalogoObjetos', 'url'=>array('create')),
	array('label'=>'Update CatalogoObjetos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CatalogoObjetos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CatalogoObjetos', 'url'=>array('admin')),
);
?>

<h1>View CatalogoObjetos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'url',
	),
)); ?>
