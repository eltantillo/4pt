<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-plan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'process_id'); ?>
		<?php echo $form->textField($model,'process_id'); ?>
		<?php echo $form->error($model,'process_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_manager_validated'); ?>
		<?php echo $form->textField($model,'project_manager_validated'); ?>
		<?php echo $form->error($model,'project_manager_validated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'technical_leader_validated'); ?>
		<?php echo $form->textField($model,'technical_leader_validated'); ?>
		<?php echo $form->error($model,'technical_leader_validated'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->