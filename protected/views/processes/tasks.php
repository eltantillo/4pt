<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Tasks',
);
?>

<h1>Tasks</h1>

<a class="btn btn-primary btn-sm" href="<?php echo Yii::app()->request->baseUrl . '/processes/taskadmin/' . $_GET['id']; ?>" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Create task</a><br><br>

<div class="list-group">
	<?php
	foreach ($model as $task) {
		echo '<a href="' . Yii::app()->request->baseUrl . '/processes/taskadmin/' . $_GET['id'] .'?taskID=' . $task->id .'" class="list-group-item">' . $task->task . '</a>';
	}
	?>
</div>