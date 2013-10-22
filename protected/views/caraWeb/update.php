<?php
$this->breadcrumbs=array(
	'Cara Webs'=>array('index'),
	$model->avatar_id=>array('view','id'=>$model->avatar_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CaraWeb', 'url'=>array('index')),
	array('label'=>'Create CaraWeb', 'url'=>array('create')),
	array('label'=>'View CaraWeb', 'url'=>array('view', 'id'=>$model->avatar_id)),
	array('label'=>'Manage CaraWeb', 'url'=>array('admin')),
);
?>

<h1>Update CaraWeb <?php echo $model->avatar_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>