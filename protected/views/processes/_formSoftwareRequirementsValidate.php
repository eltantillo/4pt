<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'software-requirements-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php
		if ($model->change_request_details != null){
			echo '<div class="alert alert-warning">' . $model->change_request_details . '</div>';
		}
	?>

	<?php 
	echo '<h3>' . Language::$introduction .'</h3>';
	echo '<p>' . $model->introduction . '</p>';
	echo '<h3>' . Language::$userInterface .'</h3>';
	echo '<p>' . $model->user_interface . '</p>';
	echo '<h3>' . Language::$externalInterfaces .'</h3>';
	echo '<p>' . $model->external_interfaces . '</p>';
	echo '<h3>' . Language::$reliability .'</h3>';
	echo '<p>' . $model->reliability . '</p>';
	echo '<h3>' . Language::$efficiency .'</h3>';
	echo '<p>' . $model->efficiency . '</p>';
	echo '<h3>' . Language::$maintenance .'</h3>';
	echo '<p>' . $model->maintenance . '</p>';
	echo '<h3>' . Language::$portability .'</h3>';
	echo '<p>' . $model->portability . '</p>';
	echo '<h3>' . Language::$interoperability .'</h3>';
	echo '<p>' . $model->interoperability . '</p>';
	echo '<h3>' . Language::$reuse .'</h3>';
	echo '<p>' . $model->reuse . '</p>';
	echo '<h3>' . Language::$legal .'</h3>';
	echo '<p>' . $model->legal . '</p>';
	?>
	

	<?php if (in_array(0, $sessionUser->rolesArray)){ ?>
	<div class="form-group">
		<?php echo $form->checkBox($model,'project_manager_validated'); ?>
		<?php echo $form->labelEx($model,'project_manager_validated'); ?>
		<?php echo $form->error($model,'project_manager_validated',array('class'=>'alert alert-danger')); ?>
	</div>
	<?php } elseif (in_array(1, $sessionUser->rolesArray)) { ?>

	<div class="form-group">
		<?php echo $form->checkBox($model,'technical_leader_validated'); ?>
		<?php echo $form->labelEx($model,'technical_leader_validated'); ?>
		<?php echo $form->error($model,'technical_leader_validated',array('class'=>'alert alert-danger')); ?>
	</div>
	<?php } ?>

	<div class="form-group">
		<?php echo $form->checkBox($model,'change_request'); ?>
		<?php echo $form->labelEx($model,'change_request'); ?>
		<?php echo $form->error($model,'change_request',array('class'=>'alert alert-danger')); ?>

	<br><br>
	<div class="form-group lool">
		<?php echo $form->labelEx($model,'change_request_details'); ?>
		<?php echo $form->textArea($model,'change_request_details',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'change_request_details',array('class'=>'alert alert-danger')); ?>
	</div>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->