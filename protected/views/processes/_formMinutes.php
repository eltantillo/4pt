<?php if (in_array(0, $sessionUser->rolesArray) && !$model->isNewRecord) {echo '<form method="POST" action="' . Yii::app()->baseUrl . '/processes/minutedelete/' . $_GET['id'] . '?minuteID=' . $model->id . '"><button class="btn btn-danger btn-sm delete" type="submit"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ' . Language::$delete . '</button></form>';} ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'minutes-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php if (in_array(0, $sessionUser->rolesArray)){ ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'purpose'); ?>
		<?php echo $form->textArea($model,'purpose',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'purpose',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'assistants'); ?>
		<?php echo $form->textArea($model,'assistants',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'assistants',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
	<div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date', array('class'=>'form-control', 'readonly'=>true, 'id'=>'datetimepicker')); ?>
		<?php echo $form->error($model,'date',array('class'=>'alert alert-danger')); ?>
	</div></div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'place'); ?>
		<?php echo $form->textField($model,'place',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'place',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'issues_raised'); ?>
		<?php echo $form->textArea($model,'issues_raised',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'issues_raised',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'open_issues'); ?>
		<?php echo $form->textArea($model,'open_issues',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'open_issues',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'agreements'); ?>
		<?php echo $form->textArea($model,'agreements',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'agreements',array('class'=>'alert alert-danger')); ?>
	</div>

	<div class="form-group">
	<div class="row"><div class='col-sm-12'>
		<?php echo $form->labelEx($model,'next_meeting'); ?>
		<?php echo $form->textField($model,'next_meeting', array('class'=>'form-control', 'readonly'=>true, 'id'=>'datetimepicker2')); ?>
		<?php echo $form->error($model,'next_meeting',array('class'=>'alert alert-danger')); ?>
	</div></div>
	</div>
<?php }else{

echo '<h3>' . Language::$purpose .'</h3>';
echo '<p>' . $model->purpose . '</p>';
echo '<h3>' . Language::$assistants .'</h3>';
echo '<p>' . $model->assistants . '</p>';
echo '<h3>' . Language::$date .'</h3>';
echo '<p>' . $model->date . '</p>';
echo '<h3>' . Language::$place .'</h3>';
echo '<p>' . $model->place . '</p>';
echo '<h3>' . Language::$issuesRaised .'</h3>';
echo '<p>' . $model->issues_raised . '</p>';
echo '<h3>' . Language::$openIssues .'</h3>';
echo '<p>' . $model->open_issues . '</p>';
echo '<h3>' . Language::$agreements .'</h3>';
echo '<p>' . $model->agreements . '</p>';
echo '<h3>' . Language::$nextMeeting .'</h3>';
echo '<p>' . $model->next_meeting . '</p>';

?>

	<div class="form-group">
		<?php echo $form->checkbox($model,'client_validated'); ?>
		<?php echo $form->labelEx($model,'client_validated'); ?>
		<?php echo $form->error($model,'client_validated',array('class'=>'alert alert-danger')); ?>
	</div>
<?php } ?>
	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$finish : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
	        ignoreReadonly: true,
          format: 'YYYY-MM-DD HH:mm'
	    });
        $('#datetimepicker2').datetimepicker({
	        ignoreReadonly: true,
          format: 'YYYY-MM-DD HH:mm'
	    });
    });
	/*$(document).ready(function() {
		$("#minutes_purpose").Editor();
		$("#minutes_assistants").Editor();
		$("#minutes_issues_raised").Editor();
		$("#minutes_open_issues").Editor();
		$("#minutes_agreements").Editor();
	});*/
</script>