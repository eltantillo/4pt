<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'delivery-instructions-form',
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
		<?php echo $form->labelEx($model,'release_requirements'); ?>
		<?php echo $form->textArea($model,'release_requirements',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'release_requirements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery_requirements'); ?>
		<?php echo $form->textArea($model,'delivery_requirements',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'delivery_requirements'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->