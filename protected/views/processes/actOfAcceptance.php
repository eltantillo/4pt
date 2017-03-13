<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Act of Acceptance',
);
?>

<h1>Act of Acceptance</h1>

<?php 
echo $this->renderPartial('_projectPlanInput', array(
  'workStatement'=>$workStatement,
  'deliveryInstructions'=>$deliveryInstructions,
  'tasks'=>$tasks,
  'risks'=>$risks,
  'minutes'=>$minutes,
)) . '<br><br>';
echo $this->renderPartial('_formActOfAcceptance', array('model'=>$model,'sessionUser'=>$sessionUser));
?>