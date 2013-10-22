
<h2> Administrador Comics</h2>

<a href="<?php echo CController::createUrl('app/admin'); ?>">Regresar</a>

<?php
$this->layout='admin';
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'admin-comic-grid',
	'dataProvider'=>$model,
  //'filter'=>$model,
	'ajaxUpdate' => true,
	'columns'=>array(
		array(
      'header' => 'Imagen',
      //'name' => 'imagen',
      'value'=> '  CHtml::link(CHtml::image(Yii::app()->request->baseUrl."/Comics/".$data["imagen"], "", array("style"=>"height:100px;")),Yii::app()->request->baseUrl."/Comics/".$data["imagen"]) ',
      'type'=>'raw',
    ),
    array(
      'header' => 'Usuario',
      //'name' => 'id_facebook',
      'value'=>'  CHtml::link(CHtml::image("https://graph.facebook.com/".$data["id_facebook"]."/picture"), "https://www.facebook.com/".$data["id_facebook"]) ',
      'type'=>'raw', 
    ),
    array(
      'header' => 'Correo',
      'name' => 'correo',
      //'filter' => CHtml::listData(Usuarios::model()->findAll(),'id','correo'),
      'value' => '$data["correo"]'
    ),
    array(
      'header' => 'Votos',
      'name' => 'NoCompartido',
    ),
    array(
      'header' => 'Comentarios',
      'name' => 'NoComentarios',
    ),
    array(
      'header' => 'Vistas',
      'name' => 'NoVisto',
    ),
    array(
      'header' => 'Fecha',
      'name' => 'date'
    ),
    array(
      'header' => 'Oculto',
      'name'=>'isHidden',
      'value'=>'CHtml::checkBox("cb_hidden",$data["isHidden"],array("value"=>$data["id"]))',
      'type'=>'raw',
      'htmlOptions'=>array('width'=>5),
    ),
    array(
      'header' => 'Especial',
      'name'=>'isSpecial',
      'value'=>'CHtml::checkBox("cb_special",$data["isSpecial"],array("value"=>$data["id"]))',
      'type'=>'raw',
      'htmlOptions'=>array('width'=>5),
    ),
        /*
        array(
            'header' => 'compartidos',
	        'name'=>'isSpecial',
	        'value'=>'CHtml::checkBox("cb_special",$data->isSpecial,array("value"=>$data->id))',
	        'type'=>'raw',
	        'htmlOptions'=>array('width'=>5),
        ),
        */
		/*array(
			'class'=>'CButtonColumn',
		),*/
	),
)); 



?>
<script type="text/javascript">
	var BaseUrl = "/php2/jcuervo"; 
	$('input[type="checkbox"]').live("change",function () {
        var id = $(this).val();
        var check = $(this).attr('checked');
        var tipo = $(this).attr('name');
        if(tipo==="cb_hidden"){
        	$.ajax({
		      type: "POST",
		      data: { id_comic: id },
		      url: BaseUrl+"/index.php/Comics/hidden",
		      success: function(data){ alert(data); },
		      error: function(data) { 
		        console.log("no eliminado");
		      }
		    });
        }
        if(tipo==="cb_special"){
        	$.ajax({
		      type: "POST",
		      data: { id_comic: id },
		      url: BaseUrl+"/index.php/Comics/special",
		      success: function(data){ alert(data); },
		      error: function(data) { 
		        console.log("no eliminado");
		      }
		    });
        }
    });

</script>
