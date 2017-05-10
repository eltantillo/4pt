<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$risks,
);
?>

<div class="page-header">
	<h1><?php echo Language::$risks; ?></h1>
</div>

<a class="btn btn-primary btn-sm" href="<?php echo Yii::app()->request->baseUrl . '/processes/riskadmin/' . $_GET['id']; ?>" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Crear riesgo</a><br><br>

<div class="list-group">
	<?php
	foreach ($model as $risk) {
		echo '<a href="' . Yii::app()->request->baseUrl . '/processes/riskadmin/' . $_GET['id'] .'?riskID=' . $risk->id .'" class="list-group-item"><strong>' . $risk->title . '</strong><br>' . $risk->risk . '<br>' . Language::$cost . ': $' . $risk->cost .'</a>';
	}
	?>
</div>