<?php
/* @var $this UsuariosComicsComentariosController */
/* @var $data UsuariosComicsComentarios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_usuarios_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_usuarios_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_comics_id')); ?>:</b>
	<?php echo CHtml::encode($data->tbl_comics_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />


</div>