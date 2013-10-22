<?php
/* @var $this UsuariosComicsComentariosController */
/* @var $model UsuariosComicsComentarios */

$this->breadcrumbs=array(
	'Usuarios Comics Comentarioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsuariosComicsComentarios', 'url'=>array('index')),
	array('label'=>'Manage UsuariosComicsComentarios', 'url'=>array('admin')),
);
?>

<h1>Create UsuariosComicsComentarios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>