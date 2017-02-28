<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'test-report-form',
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
		<?php echo $form->labelEx($model,'resume'); ?>
		<?php echo $form->textArea($model,'resume',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'resume'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'test_case'); ?>
		<?php echo $form->textArea($model,'test_case',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'test_case'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tester_id'); ?>
		<?php echo $form->textField($model,'tester_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tester_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'defect_level'); ?>
		<?php echo $form->textArea($model,'defect_level',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'defect_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'affected_functions'); ?>
		<?php echo $form->textArea($model,'affected_functions',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'affected_functions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'origin_date'); ?>
		<?php echo $form->textField($model,'origin_date'); ?>
		<?php echo $form->error($model,'origin_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resolution_date'); ?>
		<?php echo $form->textField($model,'resolution_date'); ?>
		<?php echo $form->error($model,'resolution_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'solver_id'); ?>
		<?php echo $form->textField($model,'solver_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'solver_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->