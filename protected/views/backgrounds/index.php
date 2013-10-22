<?php
$this->breadcrumbs=array(
  'Fondos',
);
?>

<h1>Fondos</h1>

<div style="float:'left';">
  <a href="<?php echo CController::createUrl('backgrounds/create'); ?>">Crear Nuevo Fondo</a>
</div>
<div style="float:'left';">
  <a href="<?php echo CController::createUrl('app/Admin'); ?>">Regresar</a>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'admin-backgrounds-grid',
  'dataProvider'=>$dataProvider,
  'columns'=>array(
    array(
      'header' => 'Nombre',
      'name' => 'url'
    ),
    array(
      'header' => 'Imagen',
      'value'=> 'CHtml::image(Yii::app()->request->baseUrl."/images/backgrounds/".$data->url, "")',
      'type'=>'raw',
    ),
    array(
      'class'=>'CButtonColumn',
      'template' => '{delete}',
      'deleteButtonUrl'=>'Yii::app()->createUrl("/backgrounds/delete", array("id" =>  $data["id_background"]))',
    ),
  ),
));
?>
