<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$softwareComponents,
);
?>

<div class="page-header">
	<h1><?php echo Language::$softwareComponents; ?></h1>
</div>

<a class="btn btn-primary btn-sm" href="<?php echo Yii::app()->request->baseUrl . '/processes/softwarecomponentadmin/' . $_GET['id']; ?>" role="button"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Crear componente de software</a><br><br>

<div class="list-group">
	<?php
	foreach ($model as $softwareComponent) {
		echo '<a href="' . Yii::app()->request->baseUrl . '/processes/softwarecomponentadmin/' . $_GET['id'] .'?softwareComponentID=' . $softwareComponent->id .'" class="list-group-item">' . $softwareComponent->name . '</a>';
	}
	?>
</div>