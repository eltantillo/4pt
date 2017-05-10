<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'delivery-instructions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'release_requirements'); ?>
		<?php echo $form->textArea($model,'release_requirements',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Hardware, software, documentación, etc...')); ?>
		<?php echo $form->error($model,'release_requirements',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'delivery_requirements'); ?>
		<?php echo $form->textArea($model,'delivery_requirements',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Requisitos solicitados por el cliente para liberar el producto.')); ?>
		<?php echo $form->error($model,'delivery_requirements',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$finish : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->