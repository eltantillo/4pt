<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-plan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'process_id'); ?>
		<?php echo $form->textField($model,'process_id', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'process_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'project_manager_validated'); ?>
		<?php echo $form->textField($model,'project_manager_validated', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'project_manager_validated'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'technical_leader_validated'); ?>
		<?php echo $form->textField($model,'technical_leader_validated', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'technical_leader_validated'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->