<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'work-statement-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php
		if ($model->change_request_details != null){
			echo '<div class="alert alert-warning">' . $model->change_request_details . '</div>';
		}
	?>

	<?php 
	echo '<h3>' . Language::$highLevelDesign . '</h3>';
	echo '<p>' . $model->high_lvl_design . '</p>';
	echo '<h3>' . Language::$lowLevelDesign . '</h3>';
	echo '<p>' . $model->low_lvl_design . '</p>';
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