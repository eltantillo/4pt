<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maintenance-manual-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
	
	<?php
		if ($model->change_request_details != null){
			echo '<div class="alert alert-warning">' . $model->change_request_details . '</div>';
		}
	?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'enviroment'); ?>
		<?php echo $form->textArea($model,'enviroment',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Compiladores, herramientas de diseño, construcción y pruebas')); ?>
		<?php echo $form->error($model,'enviroment',array('class'=>'alert alert-danger')); ?>
		<?php echo $form->fileField($model, 'enviroment_file'); ?>
		<?php echo $form->error($model,'enviroment_file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->checkBox($model,'sent'); ?>
		<?php echo $form->labelEx($model,'sent'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$finish : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->