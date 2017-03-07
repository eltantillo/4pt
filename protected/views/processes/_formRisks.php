<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'risks-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'risk'); ?>
		<?php echo $form->textArea($model,'risk',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'risk'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->