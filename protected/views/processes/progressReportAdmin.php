<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$progressReport,
);
?>

<div class="page-header">
	<h1><?php echo Language::$progressReport; ?></h1>
</div>

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