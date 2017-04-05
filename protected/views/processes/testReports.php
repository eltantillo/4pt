<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$testReport,
);
?>

<div class="page-header">
	<h1><?php echo Language::$testReport; ?></h1>
</div>

<a class="btn btn-primary btn-sm" href="<?php echo Yii::app()->request->baseUrl . '/processes/testreportadmin/' . $_GET['id']; ?>" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Create Test Report</a><br><br>

<div class="list-group">
	<?php
	foreach ($model as $testReport) {
		echo '<a href="' . Yii::app()->request->baseUrl . '/processes/testreportadmin/' . $_GET['id'] .'?testReportID=' . $testReport->id .'" class="list-group-item">' . $testReport->resume . '</a>';
	}
	?>
</div>