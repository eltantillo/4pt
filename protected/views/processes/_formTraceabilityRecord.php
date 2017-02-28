<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'traceability-record-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'processes_id'); ?>
		<?php echo $form->textField($model,'processes_id'); ?>
		<?php echo $form->error($model,'processes_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'traceability_recordcol'); ?>
		<?php echo $form->textArea($model,'traceability_recordcol',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'traceability_recordcol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'traceability_recordcol1'); ?>
		<?php echo $form->textField($model,'traceability_recordcol1',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'traceability_recordcol1'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->