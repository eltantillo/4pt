<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Traceability Record',
);
?>

<h1>Traceability Record</h1>

<?php
	echo $this->renderPartial('_formTraceabilityRecord', array('model'=>$model));
?>