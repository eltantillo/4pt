<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-plan-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php
	echo '<h2>Work Statement</h2>';
	echo '<h3>Product Description</h3>';
	echo '<p>' . $workStatement->product_description . '</p>';
	echo '<h3>Scope</h3>';
	echo '<p>' . $workStatement->scope . '</p>';
	echo '<h3>Objectives</h3>';
	echo '<p>' . $workStatement->objectives . '</p>';
	echo '<h3>deliverables</h3>';
	echo '<p>' . $workStatement->deliverables . '</p>';

	echo '<h2>Delivery Instructions</h2>';
	echo '<h3>Release Requirements</h3>';
	echo $deliveryInstructions->release_requirements;
	echo '<h3>Delivery Requirements</h3>';
	echo $deliveryInstructions->delivery_requirements;
?>

<h2>Tasks</h2>
<table class="table table-hover">
	<tr>
	    <th>Task Description</th>
	    <th>Duration</th>
	    <th>Start Date</th>
	    <th>Resources</th>
	    <th>People</th>
	</tr>
	<tr>
	<?php
	foreach ($tasks as $task) {
		echo '<td>' . $task->task . '</td>';
		echo '<td>' . $task->duration . '</td>';
		echo '<td>' . $task->start_date . '</td>';
		echo '<td>' . $task->resources . '</td>';
		echo '<td>' . $task->people_id . '</td>';
	}?>
	</tr>
</table>

<h2>Risks</h2>
<table class="table table-hover">
	<tr>
	    <th>Risk Description</th>
	    <th>Cost</th>
	</tr>
	<tr>
	<?php
	foreach ($risks as $risk) {
		echo '<td>' . $risk->risk . '</td>';
		echo '<td>$ ' . $risk->cost . '</td>';
	}?>
	</tr>
</table>

<h2>Minutes</h2>
<table class="table table-hover">
	<tr>
	    <th>Purpose</th>
	    <th>Date</th>
	    <th>Place</th>
	    <th>Issues Raised</th>
	    <th>Open Issues</th>
	    <th>Agreements</th>
	    <th>Next Meeting</th>
	</tr>
	<tr>
	<?php
	foreach ($minutes as $minute) {
		echo '<td>' . $minute->purpose . '</td>';
		echo '<td>' . $minute->date . '</td>';
		echo '<td>' . $minute->place . '</td>';
		echo '<td>' . $minute->issues_raised . '</td>';
		echo '<td>' . $minute->open_issues . '</td>';
		echo '<td>' . $minute->agreements . '</td>';
		echo '<td>' . $minute->next_meeting . '</td>';
	}?>
	</tr>
</table>

	<?php if (in_array(0, $sessionUser->rolesArray)){ ?>
	<div class="form-group">
		<?php echo $form->checkbox($model,'project_manager_validated'); ?>
		<?php echo $form->labelEx($model,'project_manager_validated'); ?>
		<?php echo $form->error($model,'project_manager_validated'); ?>
	</div>

	<?php } elseif (in_array(1, $sessionUser->rolesArray)) { ?>
	<div class="form-group">
		<?php echo $form->checkbox($model,'technical_leader_validated'); ?>
		<?php echo $form->labelEx($model,'technical_leader_validated'); ?>
		<?php echo $form->error($model,'technical_leader_validated'); ?>
	</div>
	<?php } ?>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$create : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->