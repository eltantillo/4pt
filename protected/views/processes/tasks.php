<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Tasks',
);
?>

<div class="page-header">
	<h1>Tasks</h1>
</div>

<a class="btn btn-primary btn-sm" href="<?php echo Yii::app()->request->baseUrl . '/processes/taskadmin/' . $_GET['id']; ?>" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Create task</a><br><br>

<div class="list-group">
	<?php
	foreach ($model as $task) {
		$responsable = people::model()->findByAttributes(array('id'=>$task->people_id));
		if ($responsable === null){$responsable = new people;}

		echo '<a href="' . Yii::app()->request->baseUrl . '/processes/taskadmin/' . $_GET['id'] .'?taskID=' . $task->id .'" class="list-group-item"><strong>' . $task->task . '</strong><br>Duration: ' . $task->duration . 'hrs<br>Start date: ' . $task->start_date . '<br>Cost: $' . $task->resources . '<br>Responsable: ' . $responsable->first_name. ' ' . $responsable->middle_name. ' ' . $responsable->last_name. '</a>';
	}
	?>
</div>