<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Software Component',
);
?>

<div class="page-header">
	<h1>Software Component</h1>
</div>

<a class="btn btn-primary btn-sm" href="<?php echo Yii::app()->request->baseUrl . '/processes/softwarecomponentadmin/' . $_GET['id']; ?>" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Create Software Component</a><br><br>

<div class="list-group">
	<?php
	foreach ($model as $softwareComponent) {
		echo '<a href="' . Yii::app()->request->baseUrl . '/processes/softwarecomponentadmin/' . $_GET['id'] .'?softwareComponentID=' . $softwareComponent->id .'" class="list-group-item">' . $softwareComponent->name . '</a>';
	}
	?>
</div>