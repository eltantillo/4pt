<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'traceability-record-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php
		if ($model->change_request_details != null){
			echo '<div class="alert alert-warning">' . $model->change_request_details . '</div>';
		}
	?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'traceability_recordcol'); ?>
		<?php echo $form->textArea($model,'traceability_recordcol',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'traceability_recordcol'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'traceability_recordcol1'); ?>
		<?php echo $form->textField($model,'traceability_recordcol1',array('size'=>45,'maxlength'=>45, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'traceability_recordcol1'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->checkBox($model,'sent'); ?>
		<?php echo $form->labelEx($model,'sent'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->