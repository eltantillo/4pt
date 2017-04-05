<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$tasks,
);
?>

<div class="page-header">
	<h1><?php echo Language::$tasks; ?></h1>
</div>

<?php
if (in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)){
	echo $this->renderPartial('_formTasks', array(
		'model'=>$model,
		'project'=>$project
	));
}
?>