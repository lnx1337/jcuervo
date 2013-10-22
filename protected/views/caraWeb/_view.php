<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('avatar_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->avatar_id), array('view', 'id'=>$data->avatar_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />


</div>