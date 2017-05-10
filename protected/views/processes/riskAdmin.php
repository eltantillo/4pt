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

<?php
if (in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)){
	echo $this->renderPartial('_formRisks', array('model'=>$model));
}
else{
	$this->redirect(array('view','id'=>$project->id));
}
?>