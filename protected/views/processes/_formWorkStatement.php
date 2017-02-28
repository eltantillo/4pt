<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'work-statement-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'process_id'); ?>
		<?php echo $form->textField($model,'process_id',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'process_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'product_description'); ?>
		<?php echo $form->textArea($model,'product_description',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'product_description'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'scope'); ?>
		<?php echo $form->textArea($model,'scope',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'scope'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'objectives'); ?>
		<?php echo $form->textArea($model,'objectives',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'objectives'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'deliverables'); ?>
		<?php echo $form->textArea($model,'deliverables',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'deliverables'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sent'); ?>
		<?php echo $form->textField($model,'sent',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'sent'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'project_manager_validated'); ?>
		<?php echo $form->textField($model,'project_manager_validated',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'project_manager_validated'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'technical_leader_validated'); ?>
		<?php echo $form->textField($model,'technical_leader_validated',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'technical_leader_validated'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'change_request'); ?>
		<?php echo $form->textField($model,'change_request',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'change_request'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'change_request_details'); ?>
		<?php echo $form->textArea($model,'change_request_details',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'change_request_details'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->