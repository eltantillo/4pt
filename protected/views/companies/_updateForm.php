<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'companies-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php echo Language::$requiredFields; ?></p>

	<div class="form-group">
		<?php echo $form->errorSummary($model, '', '',
		array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>64, 'class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>32,'maxlength'=>128, 'class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>16,'maxlength'=>16, 'class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php echo $form->dropDownList($model,'language',array('es'=>'Español','en_us'=>'English', 'class'=>'dropdown-menu')); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::htmlButton(Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>