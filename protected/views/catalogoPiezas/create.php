<?php
$this->breadcrumbs=array(
  'Catalogo Piezas Avatar'=>array('index'),
  'Create',
);
?>

<h1>Crear Nueva Pieza Avatar</h1>
<br/>
<div style="float:'left';">
  <a href="<?php echo CController::createUrl('/catalogoPiezas'); ?>">Regresar</a>
</div>
<br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>