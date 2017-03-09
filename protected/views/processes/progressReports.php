<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Progress Reports',
);
?>

<h1>Progress Reports</h1>

<a class="btn btn-primary btn-sm" href="<?php echo Yii::app()->request->baseUrl . '/processes/progressreportadmin/' . $_GET['id']; ?>" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Create Progress Report</a><br><br>

<div class="list-group">
	<?php
	foreach ($model as $progressReport) {
		echo '<a href="' . Yii::app()->request->baseUrl . '/processes/progressreportadmin/' . $_GET['id'] .'?progressReportID=' . $progressReport->id .'" class="list-group-item">' . $progressReport->task_status . '</a>';
	}
	?>
</div>