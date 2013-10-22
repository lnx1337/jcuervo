<?php
/* @var $this ComicsController */
/* @var $model Comics */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comics-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
        'onsubmit'=>"return false;",/* Disable normal form submit */
        'onkeypress'=>" if(event.keyCode == 13){ send(); } " )
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'imagen'); ?>
		<?php echo $form->textField($model,'imagen',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'imagen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->