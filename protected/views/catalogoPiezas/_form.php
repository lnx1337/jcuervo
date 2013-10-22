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
echo '<br/>';
echo $form->labelEx($model, 'Tipo:');
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo $form->listBox($model, 'tipo_pieza_id', array(3=>'Cabeza', 4=>'Cuerpo', 5=>'Ojo', 6=>'Boca'));
echo '<br/><br/>';
echo CHtml::submitButton('Guardar');
$this->endWidget();
 ?>