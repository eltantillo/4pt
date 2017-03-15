<?php if (in_array(0, $sessionUser->rolesArray) && !$model->isNewRecord) {echo '<form method="POST" action="' . Yii::app()->baseUrl . '/processes/minutedelete/' . $_GET['id'] . '?minuteID=' . $model->id . '"><button class="btn btn-danger btn-sm delete" type="submit"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ' . Language::$delete . '</button></form>';} ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'minutes-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php if (in_array(0, $sessionUser->rolesArray)){ ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'purpose'); ?>
		<?php echo $form->textArea($model,'purpose',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'purpose'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'assistants'); ?>
		<?php echo $form->textArea($model,'assistants',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'assistants'); ?>
	</div>

	<div class="form-group">
	<div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date', array('class'=>'form-control', 'id'=>'datetimepicker')); ?>
		<?php echo $form->error($model,'date'); ?>
	</div></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'place'); ?>
		<?php echo $form->textArea($model,'place',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'place'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'previous_minute_id'); ?>
		<?php echo $form->textField($model,'previous_minute_id', array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'previous_minute_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'issues_raised'); ?>
		<?php echo $form->textArea($model,'issues_raised',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'issues_raised'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'open_issues'); ?>
		<?php echo $form->textArea($model,'open_issues',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'open_issues'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'agreements'); ?>
		<?php echo $form->textArea($model,'agreements',array('rows'=>6, 'cols'=>50, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'agreements'); ?>
	</div>

	<div class="form-group">
	<div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'next_meeting'); ?>
		<?php echo $form->textField($model,'next_meeting', array('class'=>'form-control', 'id'=>'datetimepicker2')); ?>
		<?php echo $form->error($model,'next_meeting'); ?>
	</div></div>
	</div>
<?php }else{

echo '<h3>Purpose</h3>';
echo '<p>' . $model->purpose . '</p>';
echo '<h3>Date</h3>';
echo '<p>' . $model->date . '</p>';
echo '<h3>Place</h3>';
echo '<p>' . $model->place . '</p>';
echo '<h3>Issues Raised</h3>';
echo '<p>' . $model->issues_raised . '</p>';
echo '<h3>Open Issues</h3>';
echo '<p>' . $model->open_issues . '</p>';
echo '<h3>Agreements</h3>';
echo '<p>' . $model->agreements . '</p>';
echo '<h3>Next Meeting</h3>';
echo '<p>' . $model->next_meeting . '</p>';

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
        $('#datetimepicker2').datetimepicker({
	        format: 'YYYY-MM-DD HH:mm'
	    });
    });
</script>