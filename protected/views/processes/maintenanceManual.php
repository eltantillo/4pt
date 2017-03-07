<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Maintenance Manual',
);
?>

<h1>Maintenance Manual</h1>

<?php
	echo $this->renderPartial('_formMaintenanceManual', array('model'=>$model));
?>