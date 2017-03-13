<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Minutes',
);
?>

<h1>Minutes</h1>

<?php echo $this->renderPartial('_formMinutes', array('model'=>$model, 'sessionUser'=>$sessionUser)); ?>