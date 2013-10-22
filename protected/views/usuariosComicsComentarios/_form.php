<?php
/* @var $this UsuariosComicsComentariosController */
/* @var $model UsuariosComicsComentarios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-comics-comentarios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_usuarios_id'); ?>
		<?php echo $form->textField($model,'tbl_usuarios_id'); ?>
		<?php echo $form->error($model,'tbl_usuarios_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tbl_comics_id'); ?>
		<?php echo $form->textField($model,'tbl_comics_id'); ?>
		<?php echo $form->error($model,'tbl_comics_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'comment'); ?>
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