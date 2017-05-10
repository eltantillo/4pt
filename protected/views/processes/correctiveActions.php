<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$correctiveActions,
);
?>

<div class="page-header">
	<h1><?php echo Language::$correctiveActions; ?></h1>
</div>

<a class="btn btn-primary btn-sm" href="<?php echo Yii::app()->request->baseUrl . '/processes/correctiveactionadmin/' . $_GET['id']; ?>" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Crear acción correctiva</a><br><br>

<div class="list-group">
	<?php
	foreach ($model as $correctiveAction) {
		echo '<a href="' . Yii::app()->request->baseUrl . '/processes/correctiveactionadmin/' . $_GET['id'] .'?correctiveActionID=' . $correctiveAction->id .'" class="list-group-item">' . $correctiveAction->problem . '</a>';
	}
	?>
</div>