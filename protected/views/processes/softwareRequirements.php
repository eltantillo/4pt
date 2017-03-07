<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Software Requirements',
);
?>

<h1>Software Requirements</h1>

<?php
	echo $this->renderPartial('_formSoftwareRequirements', array('model'=>$model));
?>