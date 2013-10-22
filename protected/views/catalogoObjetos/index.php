<?php
$this->breadcrumbs=array(
	'Catalogo Objetos',
);
?>

<h1>Objetos</h1>

<div style="float:'left';">
  <a href="<?php echo CController::createUrl('catalogoObjetos/create'); ?>">Crear Nuevo Objeto</a>
</div>
<div style="float:'left';">
  <a href="<?php echo CController::createUrl('app/Admin'); ?>">Regresar</a>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'admin-objetos-grid',
  'dataProvider'=>$dataProvider,
  'columns'=>array(
    array(
      'header' => 'Nombre',
      'name' => 'url'
    ),
    array(
      'header' => 'Imagen',
      'value'=> 'CHtml::image(Yii::app()->request->baseUrl."/images/objetos/".$data->url, "")',
      'type'=>'raw',
    ),
    array(
      'class'=>'CButtonColumn',
      'template' => '{delete}',
      'deleteButtonUrl'=>'Yii::app()->createUrl("/catalogoObjetos/delete", array("id" =>  $data["id"]))',
    ),
  ),
));
?>
