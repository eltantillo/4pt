<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$maintenanceManual,
);
?>

<div class="page-header">
	<h1><?php echo Language::$maintenanceManual; ?></h1>
</div>

<?php
if ((in_array(0, $sessionUser->rolesArray) && !$model->project_manager_validated) || (in_array(1, $sessionUser->rolesArray) && !$model->technical_leader_validated)){
	echo $this->renderPartial('_formMaintenanceManualValidate', array('model'=>$model, 'sessionUser'=>$sessionUser));
}
elseif (in_array(5, $sessionUser->rolesArray)){
	echo $this->renderPartial('_formMaintenanceManual', array('model'=>$model));
}
else{
	$this->redirect(array('view','id'=>$project->id));
}
?>