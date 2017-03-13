<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Operation Manual',
);
?>

<h1>Operation Manual</h1>

<?php
if (in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)){
	echo $this->renderPartial('_formWorkStatementValidate', array('model'=>$model, 'sessionUser'=>$sessionUser));
}
else{
	echo $this->renderPartial('_softwareRequirementsInput', array('softwareRequirements'=>$softwareRequirements,));
	echo $this->renderPartial('_softwareDesignInput', array('softwareDesign'=>$softwareDesign,)) . '<br><br>';
	echo $this->renderPartial('_formOperationManual', array('model'=>$model));
}
?>