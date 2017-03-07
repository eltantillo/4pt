<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'User Manual',
);
?>

<h1>User Manual</h1>

<?php
	echo $this->renderPartial('_formUserManual', array('model'=>$model));
?>