<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Project Plan Validation',
);
?>

<h1>Project Plan Validation</h1>

<?php
	echo $this->renderPartial('_formProjectPlan', array('model'=>$model, 'sessionUser'=>$sessionUser));
?>