<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'templates-form',
	'enableAjaxValidation'=>false,
));
$templatesArray = array();
array_push($templatesArray, 'Ninguna');
?>

	<p class="note"><?php echo Language::$requiredFields; ?></p>

	<div class="form-group">
		<?php echo $form->errorSummary($model, '', '',
		array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('maxlength'=>64, 'class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->checkBox($model, 'work_statement'); ?>
		<?php echo $form->labelEx($model,'work_statement') . '<br>'; ?>
		<?php echo $form->checkBox($model, 'delivery_instructions'); ?>
		<?php echo $form->labelEx($model,'delivery_instructions') . '<br>'; ?>
		<?php echo $form->checkBox($model, 'tasks'); ?>
		<?php echo $form->labelEx($model,'tasks') . '<br>'; ?>
		<?php echo $form->checkBox($model, 'risks'); ?>
		<?php echo $form->labelEx($model,'risks') . '<br>'; ?>
		<?php echo $form->checkBox($model, 'minutes'); ?>
		<?php echo $form->labelEx($model,'minutes') . '<br>'; ?>

		<?php echo $form->checkBox($model, 'progress_report'); ?>
		<?php echo $form->labelEx($model,'progress_report') . '<br>'; ?>
		<?php echo $form->checkBox($model, 'corrective_actions'); ?>
		<?php echo $form->labelEx($model,'corrective_actions') . '<br>'; ?>

		<?php echo $form->checkBox($model, 'software_requirements'); ?>
		<?php echo $form->labelEx($model,'software_requirements') . '<br>'; ?>
		<?php echo $form->checkBox($model, 'user_manual'); ?>
		<?php echo $form->labelEx($model,'user_manual') . '<br>'; ?>
		<?php echo $form->checkBox($model, 'software_design'); ?>
		<?php echo $form->labelEx($model,'software_design') . '<br>'; ?>
		<?php echo $form->checkBox($model, 'operation_manual'); ?>
		<?php echo $form->labelEx($model,'operation_manual') . '<br>'; ?>
		<?php echo $form->checkBox($model, 'maintenance_manual'); ?>
		<?php echo $form->labelEx($model,'maintenance_manual') . '<br>'; ?>
		<?php echo $form->checkBox($model, 'software_components'); ?>
		<?php echo $form->labelEx($model,'software_components') . '<br>'; ?>
		<?php echo $form->checkBox($model, 'test_reports'); ?>
		<?php echo $form->labelEx($model,'test_reports') . '<br>'; ?>
		<?php echo $form->checkBox($model, 'act_of_acceptance'); ?>
		<?php echo $form->labelEx($model,'act_of_acceptance') . '<br>'; ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::htmlButton(Language::$reset, array('type'=>'reset', 'class'=>'btn btn-default')); ?>
		<?php echo CHtml::htmlButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->