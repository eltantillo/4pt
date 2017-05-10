<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$userManual,
);
?>

<div class="page-header">
	<h1><?php echo Language::$userManual; ?></h1>
</div>

<?php
if ((in_array(0, $sessionUser->rolesArray) && !$model->project_manager_validated) || (in_array(1, $sessionUser->rolesArray) && !$model->technical_leader_validated)){
	echo $this->renderPartial('_formUserManualValidate', array('model'=>$model, 'sessionUser'=>$sessionUser));
}
elseif (in_array(3, $sessionUser->rolesArray)){
	echo $this->renderPartial('_softwareRequirementsInput', array('softwareRequirements'=>$softwareRequirements,));
	echo $this->renderPartial('_softwareDesignInput', array('softwareDesign'=>$softwareDesign,)) . '<br><br>';
	echo $this->renderPartial('_formUserManual', array('model'=>$model));
}
else{
	$this->redirect(array('view','id'=>$project->id));
}
?>