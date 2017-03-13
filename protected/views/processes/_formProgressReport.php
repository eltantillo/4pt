<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'software-design-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'task_status'); ?>
		<?php echo $form->textArea($model,'task_status',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'task_status'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'results_status'); ?>
		<?php echo $form->textArea($model,'results_status',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'results_status'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'resources_status'); ?>
		<?php echo $form->textArea($model,'resources_status',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'resources_status'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'costs_status'); ?>
		<?php echo $form->textArea($model,'costs_status',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'costs_status'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'calendar_status'); ?>
		<?php echo $form->textArea($model,'calendar_status',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'calendar_status'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'risks_status'); ?>
		<?php echo $form->textArea($model,'risks_status',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'risks_status'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'deviations_record'); ?>
		<?php echo $form->textArea($model,'deviations_record',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'deviations_record'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->