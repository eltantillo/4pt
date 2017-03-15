<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Risks',
);
?>

<div class="page-header">
	<h1>Risks</h1>
</div>

<a class="btn btn-primary btn-sm" href="<?php echo Yii::app()->request->baseUrl . '/processes/riskadmin/' . $_GET['id']; ?>" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Create risk</a><br><br>

<div class="list-group">
	<?php
	foreach ($model as $risk) {
		echo '<a href="' . Yii::app()->request->baseUrl . '/processes/riskadmin/' . $_GET['id'] .'?riskID=' . $risk->id .'" class="list-group-item">' . $risk->risk . '</a>';
	}
	?>
</div>