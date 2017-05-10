<?php if (!$model->isNewRecord) {echo '<form method="POST" action="' . Yii::app()->baseUrl . '/processes/riskdelete/' . $_GET['id'] . '?riskID=' . $model->id . '"><button class="btn btn-danger btn-sm delete" type="submit"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ' . Language::$delete . '</button></form>';} ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'risks-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'risk'); ?>
		<?php echo $form->textArea($model,'risk',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'risk',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo $form->textField($model,'cost', array('class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'cost',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$finish : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->