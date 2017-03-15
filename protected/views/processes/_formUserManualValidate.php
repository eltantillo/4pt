<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-manual-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php
		if ($model->change_request_details != null){
			echo '<div class="alert alert-warning">' . $model->change_request_details . '</div>';
		}
	?>

	<?php 
	echo '<h3>user_procedure</h3>';
	echo '<p>' . $model->user_procedure . '</p>';
	echo '<h3>installation_procedure</h3>';
	echo '<p>' . $model->installation_procedure . '</p>';
	echo '<h3>product_description</h3>';
	echo '<p>' . $model->product_description . '</p>';
	echo '<h3>provided_resources</h3>';
	echo '<p>' . $model->provided_resources . '</p>';
	echo '<h3>required_enviroment</h3>';
	echo '<p>' . $model->required_enviroment . '</p>';
	echo '<h3>problems_report</h3>';
	echo '<p>' . $model->problems_report . '</p>';
	echo '<h3>enter_procedure</h3>';
	echo '<p>' . $model->enter_procedure . '</p>';
	echo '<h3>messages</h3>';
	echo '<p>' . $model->messages . '</p>';
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