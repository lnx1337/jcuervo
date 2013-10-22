<?php
$this->breadcrumbs=array(
  'Accesorios',
);
?>

<h1>Accesorios</h1>

<div style="float:'left';">
  <a href="<?php echo CController::createUrl('accesorios/create'); ?>">Crear Nuevo Accesorio</a>
</div>
<div style="float:'left';">
  <a href="<?php echo CController::createUrl('app/Admin'); ?>">Regresar</a>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'admin-accesorios-grid',
  'dataProvider'=>$dataProvider,
  'columns'=>array(
    array(
      'header' => 'Nombre',
      'name' => 'url'
    ),
    array(
      'header' => 'Imagen',
      'value'=> 'CHtml::image(Yii::app()->request->baseUrl."/images/accesorios/".$data->url, "")',
      'type'=>'raw',
    ),
    array(
      'class'=>'CButtonColumn',
      'template' => '{delete}',
      'deleteButtonUrl'=>'Yii::app()->createUrl("/accesorios/delete", array("id" =>  $data["id"]))',
    ),
  ),
));
?>
