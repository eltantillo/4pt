<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Software Design',
);
?>

<div class="page-header">
	<h1>Software Design</h1>
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