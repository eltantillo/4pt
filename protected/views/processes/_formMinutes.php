<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'minutes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_plan_id'); ?>
		<?php echo $form->textField($model,'project_plan_id'); ?>
		<?php echo $form->error($model,'project_plan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purpose'); ?>
		<?php echo $form->textArea($model,'purpose',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'purpose'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'assistants'); ?>
		<?php echo $form->textArea($model,'assistants',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'assistants'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'place'); ?>
		<?php echo $form->textArea($model,'place',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'place'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'previous_minute_id'); ?>
		<?php echo $form->textField($model,'previous_minute_id'); ?>
		<?php echo $form->error($model,'previous_minute_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'minutescol'); ?>
		<?php echo $form->textField($model,'minutescol',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'minutescol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'issues_raised'); ?>
		<?php echo $form->textArea($model,'issues_raised',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'issues_raised'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'open_issues'); ?>
		<?php echo $form->textArea($model,'open_issues',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'open_issues'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agreements'); ?>
		<?php echo $form->textArea($model,'agreements',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'agreements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'next_meeting'); ?>
		<?php echo $form->textField($model,'next_meeting'); ?>
		<?php echo $form->error($model,'next_meeting'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_validated'); ?>
		<?php echo $form->textField($model,'client_validated'); ?>
		<?php echo $form->error($model,'client_validated'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->