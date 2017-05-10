<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-plan-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php
	echo '<h2>' . Language::$workStatement . '</h2>';
	echo '<h3>' . Language::$productDescription . '</h3>';
	echo '<p>' . $workStatement->product_description . '</p>';
	echo '<h3>' . Language::$scope . '</h3>';
	echo '<p>' . $workStatement->scope . '</p>';
	echo '<h3>' . Language::$objectives . '</h3>';
	echo '<p>' . $workStatement->objectives . '</p>';
	echo '<h3>' . Language::$deliverables . '</h3>';
	echo '<p>' . $workStatement->deliverables . '</p>';

	echo '<h2>' . Language::$deliveryInstructions . '</h2>';
	echo '<h3>' . Language::$releaseRequirements . '</h3>';
	echo $deliveryInstructions->release_requirements;
	echo '<h3>' . Language::$deliveryRequirements . '</h3>';
	echo $deliveryInstructions->delivery_requirements;
?>

<h2><?php echo Language::$tasks; ?></h2>
<table class="table table-hover">
	<tr>
	    <th><?php echo Language::$taskDescription; ?></th>
	    <th><?php echo Language::$duration; ?></th>
	    <th><?php echo Language::$startDate; ?></th>
	    <th><?php echo Language::$resources; ?></th>
	    <th><?php echo Language::$people; ?></th>
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

<h2><?php echo Language::$risks; ?></h2>
<table class="table table-hover">
	<tr>
	    <th><?php echo Language::$riskDescription; ?></th>
	    <th><?php echo Language::$cost; ?></th>
	</tr>
	<tr>
	<?php
	foreach ($risks as $risk) {
		echo '<td>' . $risk->risk . '</td>';
		echo '<td>$ ' . $risk->cost . '</td>';
	}?>
	</tr>
</table>

<h2><?php echo Language::$minutes; ?></h2>
<table class="table table-hover">
	<tr>
	    <th><?php echo Language::$purpose; ?></th>
	    <th><?php echo Language::$date; ?></th>
	    <th><?php echo Language::$place; ?></th>
	    <th><?php echo Language::$issuesRaised; ?></th>
	    <th><?php echo Language::$openIssues; ?></th>
	    <th><?php echo Language::$agreements; ?></th>
	    <th><?php echo Language::$nextMeeting; ?></th>
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

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Language::$finish : Language::$update, array('type'=>'submit', 'class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->