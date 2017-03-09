<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Corrective Actions',
);
?>

<h1>Corrective Actions</h1>

<?php
	echo $this->renderPartial('_formCorrectiveActions', array('model'=>$model));
?>