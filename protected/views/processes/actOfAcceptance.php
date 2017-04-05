<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$actOfAcceptance,
);
?>

<div class="page-header">
	<h1><?php echo Language::$actOfAcceptance; ?></h1>
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