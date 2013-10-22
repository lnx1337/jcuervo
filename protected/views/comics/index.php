<?php
/* @var $this ComicsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comics',
);

$this->menu=array(
	array('label'=>'Create Comics', 'url'=>array('create')),
	array('label'=>'Manage Comics', 'url'=>array('admin')),
);
?>

<h1>Comics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
