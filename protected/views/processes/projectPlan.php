<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Project Plan Validation',
);
?>
<div class="page-header">
	<h1>Project Plan Validation</h1>
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