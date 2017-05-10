<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'operation-manual-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
	
	<?php
		if ($model->change_request_details != null){
			echo '<div class="alert alert-warning">' . $model->change_request_details . '</div>';
		}
	?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'operation_criteria'); ?>
		<?php echo $form->textArea($model,'operation_criteria',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'operation_criteria',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'operative_enviroment'); ?>
		<?php echo $form->textArea($model,'operative_enviroment',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'operative_enviroment',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'security_alerts'); ?>
		<?php echo $form->textArea($model,'security_alerts',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'security_alerts',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'deployment_sequence'); ?>
		<?php echo $form->textArea($model,'deployment_sequence',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'deployment_sequence',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'faq'); ?>
		<?php echo $form->textArea($model,'faq',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'faq',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'aditional_sources'); ?>
		<?php echo $form->textArea($model,'aditional_sources',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'aditional_sources',array('class'=>'alert alert-danger')); ?>
		<?php echo $form->fileField($model, 'aditional_sources_file'); ?>
		<?php echo $form->error($model,'aditional_sources_file',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'security_certification'); ?>
		<?php echo $form->textArea($model,'security_certification',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'security_certification',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'guaranty'); ?>
		<?php echo $form->textArea($model,'guaranty',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'guaranty',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->checkBox($model,'sent'); ?>
		<?php echo $form->labelEx($model,'sent'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$finish : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->