<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'corrective-actions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_execution_id'); ?>
		<?php echo $form->textField($model,'project_execution_id'); ?>
		<?php echo $form->error($model,'project_execution_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'problem'); ?>
		<?php echo $form->textArea($model,'problem',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'problem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'solution'); ?>
		<?php echo $form->textArea($model,'solution',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'solution'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'corrective_actions'); ?>
		<?php echo $form->textArea($model,'corrective_actions',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'corrective_actions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'responsible_id'); ?>
		<?php echo $form->textField($model,'responsible_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'responsible_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'open_date'); ?>
		<?php echo $form->textField($model,'open_date'); ?>
		<?php echo $form->error($model,'open_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'close_date'); ?>
		<?php echo $form->textField($model,'close_date'); ?>
		<?php echo $form->error($model,'close_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'complete'); ?>
		<?php echo $form->textField($model,'complete'); ?>
		<?php echo $form->error($model,'complete'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->