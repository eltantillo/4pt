<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Corrective Actions',
);
?>

<h1>Corrective Actions</h1>

<a class="btn btn-primary btn-sm" href="<?php echo Yii::app()->request->baseUrl . '/processes/correctiveactionadmin/' . $_GET['id']; ?>" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Create Corrective Action</a><br><br>

<div class="list-group">
	<?php
	foreach ($model as $correctiveAction) {
		echo '<a href="' . Yii::app()->request->baseUrl . '/processes/correctiveactionadmin/' . $_GET['id'] .'?correctiveActionID=' . $correctiveAction->id .'" class="list-group-item">' . $correctiveAction->problem . '</a>';
	}
	?>
</div>