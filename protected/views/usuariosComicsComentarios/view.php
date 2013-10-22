<?php
/* @var $this UsuariosComicsComentariosController */
/* @var $model UsuariosComicsComentarios */

$this->breadcrumbs=array(
	'Usuarios Comics Comentarioses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UsuariosComicsComentarios', 'url'=>array('index')),
	array('label'=>'Create UsuariosComicsComentarios', 'url'=>array('create')),
	array('label'=>'Update UsuariosComicsComentarios', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UsuariosComicsComentarios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsuariosComicsComentarios', 'url'=>array('admin')),
);
?>

<h1>View UsuariosComicsComentarios #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tbl_usuarios_id',
		'tbl_comics_id',
		'comment',
		'date',
	),
)); ?>
