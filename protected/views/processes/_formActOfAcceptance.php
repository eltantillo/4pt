<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'act-of-acceptance-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php if (in_array(0, $sessionUser->rolesArray)){ ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'register'); ?>
		<?php echo $form->textArea($model,'register',array('form-groups'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'register'); ?>
	</div>

	<div class="form-group">
	<div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date', array('class'=>'form-control', 'id'=>'datetimepicker')); ?>
		<?php echo $form->error($model,'date'); ?>
	</div></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'delivered_items'); ?>
		<?php echo $form->textArea($model,'delivered_items',array('form-groups'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'delivered_items'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'criteria_verification'); ?>
		<?php echo $form->textArea($model,'criteria_verification',array('form-groups'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'criteria_verification'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'pending_issues'); ?>
		<?php echo $form->textArea($model,'pending_issues',array('form-groups'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'pending_issues'); ?>
	</div>
<?php } else {
	echo '<h3>register</h3>';
	echo '<p>' . $model->register . '</p>';
	echo '<h3>date</h3>';
	echo '<p>' . $model->date . '</p>';
	echo '<h3>delivered_items</h3>';
	echo '<p>' . $model->delivered_items . '</p>';
	echo '<h3>criteria_verification</h3>';
	echo '<p>' . $model->criteria_verification . '</p>';
	echo '<h3>pending_issues</h3>';
	echo '<p>' . $model->pending_issues . '</p>';
?>
	<div class="form-group">
		<?php echo $form->checkbox($model,'client_validated'); ?>
		<?php echo $form->labelEx($model,'client_validated'); ?>
		<?php echo $form->error($model,'client_validated'); ?>
	</div>
<?php } ?>
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