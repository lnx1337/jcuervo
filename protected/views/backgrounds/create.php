<?php
$this->breadcrumbs=array(
  'Backgrounds'=>array('index'),
  'Create',
);
?>

<h1>Crear Nuevo Fondo</h1>
<br/>
<div style="float:'left';">
  <a href="<?php echo CController::createUrl('/backgrounds'); ?>">Regresar</a>
</div>
<br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>