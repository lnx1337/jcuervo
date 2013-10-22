<?php
$this->breadcrumbs=array(
	'Cara Webs'=>array('index'),
	$model->avatar_id,
);

$this->menu=array(
	array('label'=>'List CaraWeb', 'url'=>array('index')),
	array('label'=>'Create CaraWeb', 'url'=>array('create')),
	array('label'=>'Update CaraWeb', 'url'=>array('update', 'id'=>$model->avatar_id)),
	array('label'=>'Delete CaraWeb', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->avatar_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CaraWeb', 'url'=>array('admin')),
);
?>

<h1>View CaraWeb #<?php echo $model->avatar_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'avatar_id',
		'url',
	),
)); ?>
