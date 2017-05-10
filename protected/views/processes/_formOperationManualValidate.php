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
	echo '<h3>' . Language::$operationCriteria . '</h3>';
	echo '<p>' . $model->operation_criteria . '</p>';
	echo '<h3>' . Language::$operativeEnviroment . '</h3>';
	echo '<p>' . $model->operative_enviroment . '</p>';
	echo '<h3>' . Language::$securityAlerts . '</h3>';
	echo '<p>' . $model->security_alerts . '</p>';
	echo '<h3>' . Language::$deploymentSequence . '</h3>';
	echo '<p>' . $model->deployment_sequence . '</p>';
	echo '<h3>' . Language::$faq . '</h3>';
	echo '<p>' . $model->faq . '</p>';
	echo '<h3>' . Language::$aditionalSources . '</h3>';
	echo '<p>' . $model->aditional_sources . '</p>';
	echo '<h3>' . Language::$securityCertification . '</h3>';
	echo '<p>' . $model->security_certification . '</p>';
	echo '<h3>' . Language::$guaranty . '</h3>';
	echo '<p>' . $model->guaranty . '</p>';
	?>
	

	<?php if (in_array(0, $sessionUser->rolesArray)){ ?>
	<div class="form-group">
		<?php echo $form->checkBox($model,'project_manager_validated',array('class'=>'cb', 'onchange'=>'cbChange(this)')); ?>
		<?php echo $form->labelEx($model,'project_manager_validated'); ?>
		<?php echo $form->error($model,'project_manager_validated',array('class'=>'alert alert-danger')); ?>
	</div>
	<?php } elseif (in_array(1, $sessionUser->rolesArray)) { ?>

	<div class="form-group">
		<?php echo $form->checkBox($model,'technical_leader_validated',array('class'=>'cb', 'onchange'=>'cbChange(this)')); ?>
		<?php echo $form->labelEx($model,'technical_leader_validated'); ?>
		<?php echo $form->error($model,'technical_leader_validated',array('class'=>'alert alert-danger')); ?>
	</div>
	<?php } ?>

	<div class="form-group">
		<?php echo $form->checkBox($model,'change_request',array('class'=>'cb', 'onchange'=>'cbChange(this)')); ?>
		<?php echo $form->labelEx($model,'change_request'); ?>
		<?php echo $form->error($model,'change_request',array('class'=>'alert alert-danger')); ?>

	<br><br>
	<div class="form-group lool">
		<?php echo $form->labelEx($model,'change_request_details'); ?>
		<?php echo $form->textArea($model,'change_request_details',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'change_request_details',array('class'=>'alert alert-danger')); ?>
	</div>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$finish : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
function cbChange(obj) {
    var cbs = document.getElementsByClassName("cb");
    for (var i = 0; i < cbs.length; i++) {
        cbs[i].checked = false;
    }
    obj.checked = true;
}
</script>