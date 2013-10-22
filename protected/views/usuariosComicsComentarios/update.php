<?php
/* @var $this UsuariosComicsComentariosController */
/* @var $model UsuariosComicsComentarios */

$this->breadcrumbs=array(
	'Usuarios Comics Comentarioses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsuariosComicsComentarios', 'url'=>array('index')),
	array('label'=>'Create UsuariosComicsComentarios', 'url'=>array('create')),
	array('label'=>'View UsuariosComicsComentarios', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UsuariosComicsComentarios', 'url'=>array('admin')),
);
?>

<h1>Update UsuariosComicsComentarios <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>