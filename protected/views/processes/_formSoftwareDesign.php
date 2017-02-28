<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'software-design-form',
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
		<?php echo $form->labelEx($model,'high_lvl_design'); ?>
		<?php echo $form->textArea($model,'high_lvl_design',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'high_lvl_design'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'low_lvl_design'); ?>
		<?php echo $form->textArea($model,'low_lvl_design',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'low_lvl_design'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->