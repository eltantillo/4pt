<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Software Component',
);
?>

<h1>Software Component</h1>

<?php
	echo $this->renderPartial('_formSoftwareComponent', array('model'=>$model));
?>