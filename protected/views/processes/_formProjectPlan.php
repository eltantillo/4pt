<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-plan-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php if (in_array(0, $sessionUser->rolesArray)){ ?>
	<div class="form-group">
		<?php echo $form->checkbox($model,'project_manager_validated'); ?>
		<?php echo $form->labelEx($model,'project_manager_validated'); ?>
		<?php echo $form->error($model,'project_manager_validated'); ?>
	</div>

	<?php } elseif (in_array(1, $sessionUser->rolesArray)) { ?>
	<div class="form-group">
		<?php echo $form->checkbox($model,'technical_leader_validated'); ?>
		<?php echo $form->labelEx($model,'technical_leader_validated'); ?>
		<?php echo $form->error($model,'technical_leader_validated'); ?>
	</div>
	<?php } ?>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->