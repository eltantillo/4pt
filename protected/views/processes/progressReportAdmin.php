<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Progress Report',
);
?>

<h1>Progress Report</h1>

<?php
	echo $this->renderPartial('_formProgressReport', array('model'=>$model));
?>