<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'delivery-instructions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'release_requirements'); ?>
		<?php echo $form->textArea($model,'release_requirements',array('form-groups'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'release_requirements'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'delivery_requirements'); ?>
		<?php echo $form->textArea($model,'delivery_requirements',array('form-groups'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'delivery_requirements'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->