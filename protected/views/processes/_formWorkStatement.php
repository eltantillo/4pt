<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'work-statement-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php
		if ($model->change_request_details != null){
			echo '<div class="alert alert-warning">' . $model->change_request_details . '</div>';
		}
	?>
	

	<div class="form-group">
		<?php echo $form->labelEx($model,'product_description'); ?>
		<?php echo $form->textArea($model,'product_description',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Propósito y requisitos generales del cliente.')); ?>
		<?php echo $form->error($model,'product_description',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'scope'); ?>
		<?php echo $form->textArea($model,'scope',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'Que sí y que no está incluído.')); ?>
		<?php echo $form->error($model,'scope',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'objectives'); ?>
		<?php echo $form->textArea($model,'objectives',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'objectives',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'deliverables'); ?>
		<?php echo $form->textArea($model,'deliverables',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'deliverables',array('class'=>'alert alert-danger')); ?>
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