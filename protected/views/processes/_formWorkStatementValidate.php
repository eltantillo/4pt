<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'work-statement-form',
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php
		if ($model->change_request_details != null){
			echo '<div class="alert alert-warning">' . $model->change_request_details . '</div>';
		}
	?>

<?php 
echo '<h3>' . Language::$productDescription . '</h3>';
echo '<p>' . $model->product_description . '</p>';
echo '<h3>' . Language::$scope . '</h3>';
echo '<p>' .$model->scope . '</p>';
echo '<h3>' . Language::$objectives . '</h3>';
echo '<p>' .$model->objectives . '</p>';
echo '<h3>' . Language::$deliverables . '</h3>';
echo '<p>' .$model->deliverables . '</p>';
 ?><br>

	<?php if (in_array(0, $sessionUser->rolesArray)){ ?>
	<div class="form-group">
		<?php echo $form->checkBox($model,'project_manager_validated',array('class'=>'cb', 'onchange'=>'cbChange(this)')); ?>
		<?php echo $form->labelEx($model,'project_manager_validated'); ?>
		<?php echo $form->error($model,'project_manager_validated',array('class'=>'alert alert-danger')); ?>
	</div>

	<?php } elseif (in_array(1, $sessionUser->rolesArray)) { ?>
	<div class="form-group">
		<?php echo $form->checkBox($model,'technical_leader_validated',array('class'=>'cb', 'onchange'=>'cbChange(this)')); ?>
		<?php echo $form->labelEx($model,'technical_leader_validated'); ?>
		<?php echo $form->error($model,'technical_leader_validated',array('class'=>'alert alert-danger')); ?>
	</div>
	<?php } ?>

	<div class="form-group">
		<?php echo $form->checkBox($model,'change_request',array('class'=>'cb', 'onchange'=>'cbChange(this)')); ?>
		<?php echo $form->labelEx($model,'change_request'); ?>
		<?php echo $form->error($model,'change_request',array('class'=>'alert alert-danger')); ?>

	<br><br>
	<div class="form-group lool">
		<?php echo $form->labelEx($model,'change_request_details'); ?>
		<?php echo $form->textArea($model,'change_request_details',array('rows'=>6, 'cols'=>50, 'class'=>'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'change_request_details',array('class'=>'alert alert-danger')); ?>
	</div>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$finish : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
function cbChange(obj) {
    var cbs = document.getElementsByClassName("cb");
    for (var i = 0; i < cbs.length; i++) {
        cbs[i].checked = false;
    }
    obj.checked = true;
}
</script>