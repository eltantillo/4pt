<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Software Requirements',
);
?>

<h1>Software Requirements</h1>

<?php
if (in_array(0, $sessionUser->rolesArray) || in_array(1, $sessionUser->rolesArray)){
	echo $this->renderPartial('_formWorkStatementValidate', array('model'=>$model, 'sessionUser'=>$sessionUser));
}
else{
	echo $this->renderPartial('_formSoftwareRequirements', array('model'=>$model));
}
?>