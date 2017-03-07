<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	$project->title,
);
?>

<h1><?php echo $project->title . ' (' . $project->acronym . ')'; ?></h1>
<!--
<h2>Project Plan</h2>
<?php if (
	((in_array(1, $sessionUser->rolesArray)) &&
	($workStatement === null ||
	!$workStatement->sent ||
	$workStatement->change_request)) ||

	((in_array(5, $sessionUser->rolesArray) || in_array(7, $sessionUser->rolesArray)) &&
	$workStatement != null	&&
	$workStatement->sent &&
	!$workStatement->change_request) &&
	((in_array(5, $sessionUser->rolesArray) && !$workStatement->project_manager_validated) ||
	(in_array(7, $sessionUser->rolesArray)) && !$workStatement->technical_leader_validated)
	){ ?>
	<a href="<?php echo Yii::app()->request->baseUrl . '/processes/workstatement/' . $project->id; ?>">Work Statement</a><br>

<?php } if (in_array(1, $sessionUser->rolesArray) || in_array(7, $sessionUser->rolesArray)){ ?>
<a href="<?php echo Yii::app()->request->baseUrl . '/processes/deliveryinstructions/' . $project->id; ?>">Delivery Instructions</a><br>

<?php } if (in_array(5, $sessionUser->rolesArray) || in_array(7, $sessionUser->rolesArray)){ ?>
<a href="<?php echo Yii::app()->request->baseUrl . '/processes/tasks/' . $project->id; ?>">Tasks</a><br>

<?php } if (in_array(5, $sessionUser->rolesArray) || in_array(7, $sessionUser->rolesArray)){ ?>
<a href="<?php echo Yii::app()->request->baseUrl . '/processes/risks/' . $project->id; ?>">Risks</a><br>

<?php } if (in_array(5, $sessionUser->rolesArray) || in_array(7, $sessionUser->rolesArray)){ ?>
<a href="<?php echo Yii::app()->request->baseUrl . '/processes/minutes/' . $project->id; ?>">Minutes</a><br>
<?php } ?>

<h2>Project Execution</h2>
<a href="#">Progress Report</a><br>
<a href="#">Corrective Actions</a><br>

<h2>Software Implementation</h2>
<a href="<?php echo Yii::app()->request->baseUrl . '/processes/softwarerequirements/' . $project->id; ?>">Software Requirements</a> <br>
<a href="<?php echo Yii::app()->request->baseUrl . '/processes/usermanual/' . $project->id; ?>">User Manual</a><br>
<a href="<?php echo Yii::app()->request->baseUrl . '/processes/softwaredesign/' . $project->id; ?>">Software Design</a><br>
<a href="<?php echo Yii::app()->request->baseUrl . '/processes/traceabilityrecord/' . $project->id; ?>">Traceability Record</a><br>
<a href="<?php echo Yii::app()->request->baseUrl . '/processes/operationmanual/' . $project->id; ?>">Operation Manual</a><br>
<a href="<?php echo Yii::app()->request->baseUrl . '/processes/maintenancemanual/' . $project->id; ?>">Maintenance Manual</a><br>
<a href="<?php echo Yii::app()->request->baseUrl . '/processes/softwarecomponent/' . $project->id; ?>">Software Component</a><br>
<a href="<?php echo Yii::app()->request->baseUrl . '/processes/testreports/' . $project->id; ?>">Test Report</a><br>


<ul class="list-group">
  <li class="list-group-item">
    <span class="badge">14</span>
    Cras justo odio
  </li>
</ul>
-->

<h2>Project Plan</h2>
<div class="row">
  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-book gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Work Statement</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/workstatement/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-list-alt gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Delivery Instructions</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/deliveryinstructions/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-check gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Tasks <span class="badge">14</span></h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/tasks/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-alert gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Risks</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/risks/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-time gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Minutes</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/minutes/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

</div>


<h2>Project Execution</h2>
<div class="row">

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-sort-by-attributes gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Progress Report</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-edit gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Corrective Actions</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

</div>


<h2>Software Implementation</h2>
<div class="row">

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-list gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Requirements</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/softwarerequirements/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-question-sign gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>User Manual</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/usermanual/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-dashboard gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Software Design</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/softwaredesign/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-stats gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Traceability Record</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/traceabilityrecord/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-info-sign gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Operation Manual</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/operationmanual/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-wrench gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Maintenance Manual</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/maintenancemanual/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-screenshot gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Software Component</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/softwarecomponent/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="thumbnail text-center">
      <span class="glyphicon glyphicon-console gi" aria-hidden="true"></span>
      <div class="caption">
        <h3>Test Report</h3>
        <p>The workstatement is the first step in the ISO-29110 Process execution</p>
        <p><a href="<?php echo Yii::app()->request->baseUrl . '/processes/testreports/' . $project->id; ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>

</div>