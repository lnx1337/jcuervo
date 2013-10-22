<?php
$this->breadcrumbs=array(
  'Catalogo Piezas',
);
?>

<h1>Piezas Avatar</h1>

<div style="float:'left';">
  <a href="<?php echo CController::createUrl('catalogoPiezas/create'); ?>">Crear Nueva Pieza</a>
</div>
<div style="float:'left';">
  <a href="<?php echo CController::createUrl('app/Admin'); ?>">Regresar</a>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'admin-piezas-grid',
  'dataProvider'=>$dataProvider->search(),
  'columns'=>array(
    array(
      'header' => 'Nombre',
      'name' => 'url'
    ),
    array(
      'header' => 'Tipo',
      'value' => '$data -> AvatarTipo -> descripcion'
    ),
    array(
      'header' => 'Imagen',
      'value'=> '
        $data->tipo_pieza_id == 3 ? CHtml::image(Yii::app()->request->baseUrl."/images/cabezas/".$data->url, "") : 
        ($data->tipo_pieza_id == 4 ? CHtml::image(Yii::app()->request->baseUrl."/images/cuerpos/".$data->url, "") : 
        ($data->tipo_pieza_id == 5 ? CHtml::image(Yii::app()->request->baseUrl."/images/ojos/".$data->url, "") : 
        ($data->tipo_pieza_id == 6 ? CHtml::image(Yii::app()->request->baseUrl."/images/bocas/".$data->url, "") : 
        "hola")))',
      'type'=>'raw',
    ),
    array(
      'class'=>'CButtonColumn',
      'template' => '{delete}',
      'deleteButtonUrl'=>'Yii::app()->createUrl("/catalogoPiezas/delete", $data->primaryKey)',
    ),
  ),
));
?>
