<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Minutes',
);
?>

<div class="page-header">
	<h1>Minutes</h1>
</div>

<?php echo $this->renderPartial('_formMinutes', array('model'=>$model, 'sessionUser'=>$sessionUser)); ?>