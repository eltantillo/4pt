<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Software Design',
);
?>

<h1>Software Design</h1>

<?php
	echo $this->renderPartial('_formSoftwareDesign', array('model'=>$model));
?>