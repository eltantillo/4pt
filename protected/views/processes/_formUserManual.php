<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-manual-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'user_procedure'); ?>
		<?php echo $form->textArea($model,'user_procedure',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'user_procedure'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'installation_procedure'); ?>
		<?php echo $form->textArea($model,'installation_procedure',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'installation_procedure'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'product_description'); ?>
		<?php echo $form->textArea($model,'product_description',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'product_description'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'provided_resources'); ?>
		<?php echo $form->textArea($model,'provided_resources',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'provided_resources'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'required_enviroment'); ?>
		<?php echo $form->textArea($model,'required_enviroment',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'required_enviroment'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'problems_report'); ?>
		<?php echo $form->textArea($model,'problems_report',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'problems_report'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'enter_procedure'); ?>
		<?php echo $form->textArea($model,'enter_procedure',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'enter_procedure'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'messages'); ?>
		<?php echo $form->textArea($model,'messages',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'messages'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->