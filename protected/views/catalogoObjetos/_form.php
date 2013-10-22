<?php $form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);
echo $form->labelEx($model, 'Archivo:');
echo $form->fileField($model, 'url');
echo CHtml::submitButton('Guardar');
$this->endWidget();
 ?>