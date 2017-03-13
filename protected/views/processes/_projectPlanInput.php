<?php if ($workStatement != null){ ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#workStatementModal">
Work Statement
</button>

<!-- Modal -->
<div class="modal fade" id="workStatementModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Work Statement</h4>
      </div>
      <div class="modal-body">
<?php 
	echo '<h3>Product Description</h3>';
	echo '<p>' . $workStatement->product_description . '</p>';
	echo '<h3>Scope</h3>';
	echo $workStatement->scope;
	echo '<h3>Objectives</h3>';
	echo $workStatement->objectives;
	echo '<h3>deliverables</h3>';
	echo $workStatement->deliverables;
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php if ($deliveryInstructions != null){ ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#deliveryInstructionsModal">
Delivery Instructions
</button>

<!-- Modal -->
<div class="modal fade" id="deliveryInstructionsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delivery Instructions</h4>
      </div>
      <div class="modal-body">
<?php
	echo '<h3>Release Requirements</h3>';
	echo $deliveryInstructions->release_requirements;
	echo '<h3>Delivery Requirements</h3>';
	echo $deliveryInstructions->delivery_requirements;
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php if ($tasks != null){ ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tasksModal">
Tasks
</button>

<!-- Modal -->
<div class="modal fade" id="tasksModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tasks</h4>
      </div>
      <div class="modal-body">
      	<div class="table-responsive">
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
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php if ($risks != null){ ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#risksModal">
Risks
</button>

<!-- Modal -->
<div class="modal fade" id="risksModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Risks</h4>
      </div>
      <div class="modal-body">
      	<div class="table-responsive">
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
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php if ($minutes != null){ ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#minutesModal">
Minutes
</button>

<!-- Modal -->
<div class="modal fade" id="minutesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Minutes</h4>
      </div>
      <div class="modal-body">
      	<div class="table-responsive">
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
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>