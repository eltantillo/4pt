<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'software-requirements-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php
		if ($model->change_request_details != null){
			echo '<div class="alert alert-warning">' . $model->change_request_details . '</div>';
		}
	?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'introduction'); ?>
		<?php echo $form->textArea($model,'introduction',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'introduction',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'user_interface'); ?>
		<?php echo $form->textArea($model,'user_interface',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'user_interface',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'external_interfaces'); ?>
		<?php echo $form->textArea($model,'external_interfaces',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'external_interfaces',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'reliability'); ?>
		<?php echo $form->textArea($model,'reliability',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'reliability',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'efficiency'); ?>
		<?php echo $form->textArea($model,'efficiency',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'efficiency',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'maintenance'); ?>
		<?php echo $form->textArea($model,'maintenance',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'maintenance',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'portability'); ?>
		<?php echo $form->textArea($model,'portability',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'portability',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'interoperability'); ?>
		<?php echo $form->textArea($model,'interoperability',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'interoperability',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'reuse'); ?>
		<?php echo $form->textArea($model,'reuse',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'reuse',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'legal'); ?>
		<?php echo $form->textArea($model,'legal',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'legal',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->checkBox($model,'sent'); ?>
		<?php echo $form->labelEx($model,'sent',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->