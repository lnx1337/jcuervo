<?php
/* @var $this ComicsController */
/* @var $model Comics */

$this->breadcrumbs=array(
	'Comics'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Comics', 'url'=>array('index')),
	array('label'=>'Create Comics', 'url'=>array('create')),
	array('label'=>'Update Comics', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Comics', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Comics', 'url'=>array('admin')),
);
?>

<h1>View Comics #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'imagen',
		'date',
	),
)); ?>
