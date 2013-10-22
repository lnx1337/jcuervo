<?php
/* @var $this ComicsController */
/* @var $model Comics */

$this->breadcrumbs=array(
	'Comics'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Comics', 'url'=>array('index')),
	array('label'=>'Create Comics', 'url'=>array('create')),
	array('label'=>'View Comics', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Comics', 'url'=>array('admin')),
);
?>

<h1>Update Comics <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>