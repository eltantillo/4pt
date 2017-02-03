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
		<?php echo $form->checkBox($model, 'scope'); ?>
		<?php echo $form->labelEx($model,'scope') . '<br>'; ?>

		<?php echo $form->checkBox($model, 'communication_plan'); ?>
		<?php echo $form->labelEx($model,'communication_plan') . '<br>'; ?>

		<?php echo $form->checkBox($model, 'general_purpose'); ?>
		<?php echo $form->labelEx($model,'general_purpose') . '<br>'; ?>

		<?php echo $form->checkBox($model, 'specific_objectives'); ?>
		<?php echo $form->labelEx($model,'specific_objectives') . '<br>'; ?>

		<?php echo $form->checkBox($model, 'justification'); ?>
		<?php echo $form->labelEx($model,'justification') . '<br>'; ?>

		<?php echo $form->checkBox($model, 'tool'); ?>
		<?php echo $form->labelEx($model,'tool') . '<br>'; ?>

		<?php echo $form->checkBox($model, 'communication_type'); ?>
		<?php echo $form->labelEx($model,'communication_type') . '<br>'; ?>

		<?php echo $form->checkBox($model, 'roles'); ?>
		<?php echo $form->labelEx($model,'roles') . '<br>'; ?>

		<?php echo $form->checkBox($model, 'risk'); ?>
		<?php echo $form->labelEx($model,'risk') . '<br>'; ?>
		<?php echo $form->checkBox($model, 'impact'); ?>
		<?php echo $form->labelEx($model,'impact') . '<br>'; ?>

		<?php echo $form->checkBox($model, 'answer'); ?>
		<?php echo $form->labelEx($model,'answer') . '<br>'; ?>

		<?php echo $form->checkBox($model, 'testing'); ?>
		<?php echo $form->labelEx($model,'testing') . '<br>'; ?>

		<?php echo $form->checkBox($model, 'people'); ?>
		<?php echo $form->labelEx($model,'people') . '<br>'; ?>
		
		<?php echo $form->checkBox($model, 'timetable'); ?>
		<?php echo $form->labelEx($model,'timetable') . '<br>'; ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::htmlButton(Language::$reset, array('type'=>'reset', 'class'=>'btn btn-default')); ?>
		<?php echo CHtml::htmlButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->