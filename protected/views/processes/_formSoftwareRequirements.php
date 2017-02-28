<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'software-requirements-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'processes_id'); ?>
		<?php echo $form->textField($model,'processes_id'); ?>
		<?php echo $form->error($model,'processes_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'introduction'); ?>
		<?php echo $form->textArea($model,'introduction',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'introduction'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_interface'); ?>
		<?php echo $form->textArea($model,'user_interface',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'user_interface'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'external_interfaces'); ?>
		<?php echo $form->textArea($model,'external_interfaces',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'external_interfaces'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reliability'); ?>
		<?php echo $form->textArea($model,'reliability',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'reliability'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'efficiency'); ?>
		<?php echo $form->textArea($model,'efficiency',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'efficiency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'maintenance'); ?>
		<?php echo $form->textArea($model,'maintenance',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'maintenance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'portability'); ?>
		<?php echo $form->textArea($model,'portability',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'portability'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'interoperability'); ?>
		<?php echo $form->textArea($model,'interoperability',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'interoperability'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reuse'); ?>
		<?php echo $form->textArea($model,'reuse',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'reuse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'legal'); ?>
		<?php echo $form->textArea($model,'legal',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'legal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->