<?php if (!$model->isNewRecord) {echo '<form method="POST" action="' . Yii::app()->baseUrl . '/processes/taskdelete/' . $_GET['id'] . '?taskID=' . $model->id . '"><button class="btn btn-danger btn-sm delete" type="submit"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ' . Language::$delete . '</button></form>';} ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tasks-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'task'); ?>
		<?php echo $form->textArea($model,'task',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'task'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model,'duration', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'duration'); ?>
	</div>

	<div class="form-group">
    <div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date', array('class'=>'form-control', 'id'=>'datetimepicker')); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'resources'); ?>
		<?php echo $form->textField($model,'resources', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'resources'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'people_id'); ?>
		<?php echo $form->textField($model,'people_id',array('size'=>10,'maxlength'=>10, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'people_id'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm'
    });
    });
</script>