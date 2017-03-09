<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Test Reports',
);
?>

<h1>Test Reports</h1>

<?php
	echo $this->renderPartial('_formTestReport', array('model'=>$model));
?>