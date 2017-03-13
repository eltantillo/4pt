<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Progress Report',
);
?>

<h1>Progress Report</h1>

<?php
  echo $this->renderPartial('_projectPlanInput', array(
      'workStatement'=>$workStatement,
      'deliveryInstructions'=>$deliveryInstructions,
      'tasks'=>$tasks,
      'risks'=>$risks,
      'minutes'=>$minutes,
    )) . '<br><br>';
	echo $this->renderPartial('_formProgressReport', array('model'=>$model));
?>