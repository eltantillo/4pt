<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Operation Manual',
);
?>

<h1>Operation Manual</h1>

<?php
	echo $this->renderPartial('_formOperationManual', array('model'=>$model));
?>