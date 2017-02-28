<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'risks-form',
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
		<?php echo $form->labelEx($model,'risk'); ?>
		<?php echo $form->textArea($model,'risk',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'risk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost'); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->