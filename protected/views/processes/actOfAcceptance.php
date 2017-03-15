<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Act of Acceptance',
);
?>

<div class="page-header">
	<h1>Act of Acceptance</h1>
</div>

<?php 
echo $this->renderPartial('_projectPlanInput', array(
  'workStatement'=>$workStatement,
  'deliveryInstructions'=>$deliveryInstructions,
  'tasks'=>$tasks,
  'risks'=>$risks,
  'minutes'=>$minutes,
));
echo $this->renderPartial('_formActOfAcceptance', array('model'=>$model,'sessionUser'=>$sessionUser));
?>