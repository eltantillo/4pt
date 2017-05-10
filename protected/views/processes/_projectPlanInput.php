<?php if ($workStatement != null){ ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#workStatementModal">
<?php echo Language::$workStatement; ?>
</button>

<!-- Modal -->
<div class="modal fade" id="workStatementModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo Language::$workStatement; ?></h4>
      </div>
      <div class="modal-body">
<?php 
	echo '<h3>' . Language::$productDescription . '</h3>';
	echo '<p>' . $workStatement->product_description . '</p>';
	echo '<h3>' . Language::$scope . '</h3>';
	echo $workStatement->scope;
	echo '<h3>' . Language::$objectives . '</h3>';
	echo $workStatement->objectives;
	echo '<h3>' . Language::$deliverables . '</h3>';
	echo $workStatement->deliverables;
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php if ($deliveryInstructions != null){ ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#deliveryInstructionsModal">
<?php echo Language::$deliveryInstructions; ?>
</button>

<!-- Modal -->
<div class="modal fade" id="deliveryInstructionsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo Language::$deliveryInstructions; ?></h4>
      </div>
      <div class="modal-body">
<?php
	echo '<h3>' . Language::$releaseRequirements . '</h3>';
	echo $deliveryInstructions->release_requirements;
	echo '<h3>' . Language::$deliveryRequirements . '</h3>';
	echo $deliveryInstructions->delivery_requirements;
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php if ($tasks != null){ ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tasksModal">
<?php echo Language::$tasks; ?>
</button>

<!-- Modal -->
<div class="modal fade" id="tasksModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo Language::$tasks; ?></h4>
      </div>
      <div class="modal-body">
      	<div class="table-responsive">
      	<table class="table table-hover">
      	  <tr>
      	    <th><?php echo Language::$taskDescription; ?></th>
      	    <th><?php echo Language::$duration; ?></th>
      	    <th><?php echo Language::$startDate; ?></th>
      	    <th><?php echo Language::$resources; ?></th>
      	    <th><?php echo Language::$person; ?></th>
      	  </tr>
			<?php
			foreach ($tasks as $task) {
        echo '<tr>';
				echo '<td>' . $task->task . '</td>';
				echo '<td>' . $task->duration . '</td>';
				echo '<td>' . $task->start_date . '</td>';
				echo '<td>' . $task->resources . '</td>';
				echo '<td>' . $task->people_id . '</td>';
        echo '</tr>';
			}?>
		</table>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php if ($risks != null){ ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#risksModal">
<?php echo Language::$risks; ?>
</button>

<!-- Modal -->
<div class="modal fade" id="risksModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo Language::$risks; ?></h4>
      </div>
      <div class="modal-body">
      	<div class="table-responsive">
      	<table class="table table-hover">
      	  <tr>
      	    <th><?php echo Language::$riskDescription; ?></th>
      	    <th><?php echo Language::$cost; ?></th>
      	  </tr>
			<?php
			foreach ($risks as $risk) {
        echo '<tr>';
				echo '<td>' . $risk->risk . '</td>';
				echo '<td>$ ' . $risk->cost . '</td>';
        echo '</tr>';
			}?>
		</table>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php if ($minutes != null){ ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#minutesModal">
<?php echo Language::$minutes; ?>
</button>

<!-- Modal -->
<div class="modal fade" id="minutesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo Language::$minutes; ?></h4>
      </div>
      <div class="modal-body">
      	<div class="table-responsive">
      	<table class="table table-hover">
      	  <tr>
      	    <th><?php echo Language::$purpose; ?></th>
            <th><?php echo Language::$assistants; ?></th>
      	    <th><?php echo Language::$date; ?></th>
      	    <th><?php echo Language::$place; ?></th>
      	    <th><?php echo Language::$issuesRaised; ?></th>
      	    <th><?php echo Language::$openIssues; ?></th>
      	    <th><?php echo Language::$agreements; ?></th>
      	    <th><?php echo Language::$nextMeeting; ?></th>
      	  </tr>
			<?php
			foreach ($minutes as $minute) {
        echo '<tr>';
        echo '<td>' . $minute->purpose . '</td>';
        echo '<td>' . $minute->assistants . '</td>';
				echo '<td>' . $minute->date . '</td>';
				echo '<td>' . $minute->place . '</td>';
				echo '<td>' . $minute->issues_raised . '</td>';
				echo '<td>' . $minute->open_issues . '</td>';
				echo '<td>' . $minute->agreements . '</td>';
				echo '<td>' . $minute->next_meeting . '</td>';
        echo '</tr>';
			}?>
		</table>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>