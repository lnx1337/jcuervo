<?php
/* @var $this UsuariosComicsComentariosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuarios Comics Comentarioses',
);

$this->menu=array(
	array('label'=>'Create UsuariosComicsComentarios', 'url'=>array('create')),
	array('label'=>'Manage UsuariosComicsComentarios', 'url'=>array('admin')),
);
?>

<h1>Usuarios Comics Comentarioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
