<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	'Traceability Record',
);
?>

<div class="page-header">
	<h1>Traceability Record</h1>
</div>

<?php
if (in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)){
	echo $this->renderPartial('_formTraceabilityRecordValidate', array('model'=>$model, 'sessionUser'=>$sessionUser));
}
else{
	echo $this->renderPartial('_softwareRequirementsInput', array('softwareRequirements'=>$softwareRequirements,)) . '<br><br>';
	echo $this->renderPartial('_formTraceabilityRecord', array('model'=>$model));
}
?>