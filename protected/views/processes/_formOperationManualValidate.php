<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'operation-manual-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php
		if ($model->change_request_details != null){
			echo '<div class="alert alert-warning">' . $model->change_request_details . '</div>';
		}
	?>

	<?php 
	echo '<h3>operation_criteria</h3>';
	echo '<p>' . $model->operation_criteria . '</p>';
	echo '<h3>operative_enviroment</h3>';
	echo '<p>' . $model->operative_enviroment . '</p>';
	echo '<h3>security_alerts</h3>';
	echo '<p>' . $model->security_alerts . '</p>';
	echo '<h3>deployment_sequence</h3>';
	echo '<p>' . $model->deployment_sequence . '</p>';
	echo '<h3>faq</h3>';
	echo '<p>' . $model->faq . '</p>';
	echo '<h3>aditional_sources</h3>';
	echo '<p>' . $model->aditional_sources . '</p>';
	echo '<h3>security_certification</h3>';
	echo '<p>' . $model->security_certification . '</p>';
	echo '<h3>guaranty</h3>';
	echo '<p>' . $model->guaranty . '</p>';
	?>
	

	<?php if (in_array(0, $sessionUser->rolesArray)){ ?>
	<div class="form-group">
		<?php echo $form->checkBox($model,'project_manager_validated'); ?>
		<?php echo $form->labelEx($model,'project_manager_validated'); ?>
		<?php echo $form->error($model,'project_manager_validated'); ?>
	</div>
	<?php } elseif (in_array(1, $sessionUser->rolesArray)) { ?>

	<div class="form-group">
		<?php echo $form->checkBox($model,'technical_leader_validated'); ?>
		<?php echo $form->labelEx($model,'technical_leader_validated'); ?>
		<?php echo $form->error($model,'technical_leader_validated'); ?>
	</div>
	<?php } ?>

	<div class="form-group">
		<?php echo $form->checkBox($model,'change_request'); ?>
		<?php echo $form->labelEx($model,'change_request'); ?>
		<?php echo $form->error($model,'change_request'); ?>

	<br><br>
	<div class="form-group lool">
		<?php echo $form->labelEx($model,'change_request_details'); ?>
		<?php echo $form->textArea($model,'change_request_details',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'change_request_details'); ?>
	</div>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->