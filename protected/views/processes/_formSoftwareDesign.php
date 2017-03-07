<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'software-design-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'high_lvl_design'); ?>
		<?php echo $form->textArea($model,'high_lvl_design',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'high_lvl_design'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'low_lvl_design'); ?>
		<?php echo $form->textArea($model,'low_lvl_design',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'low_lvl_design'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->