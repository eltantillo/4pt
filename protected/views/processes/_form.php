<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'processes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'project_id'); ?>
		<?php echo $form->textField($model,'project_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'project_id',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->