<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$softwareDesign,
);
?>

<div class="page-header">
	<h1><?php echo Language::$softwareDesign; ?></h1>
</div>

<?php
if (in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)){
	echo $this->renderPartial('_formSoftwareDesignValidate', array('model'=>$model, 'sessionUser'=>$sessionUser));
}
else{
	echo $this->renderPartial('_softwareRequirementsInput', array('softwareRequirements'=>$softwareRequirements,)) . '<br><br>';
	echo $this->renderPartial('_formSoftwareDesign', array('model'=>$model));
}
?>