<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tasks-form',
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
		<?php echo $form->labelEx($model,'task'); ?>
		<?php echo $form->textArea($model,'task',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'task'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model,'duration'); ?>
		<?php echo $form->error($model,'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resources'); ?>
		<?php echo $form->textField($model,'resources'); ?>
		<?php echo $form->error($model,'resources'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'people_id'); ?>
		<?php echo $form->textField($model,'people_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'people_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->