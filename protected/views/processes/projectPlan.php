<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$validation,
);
?>
<div class="page-header">
	<h1><?php echo Language::$validation; ?></h1>
</div>

<?php
	echo $this->renderPartial('_formProjectPlan', array(
		'model'=>$model,
		'sessionUser'=>$sessionUser,
     	'workStatement'=>$workStatement,
     	'deliveryInstructions'=>$deliveryInstructions,
     	'tasks'=>$tasks,
    	'risks'=>$risks,
    	'minutes'=>$minutes,));
?>