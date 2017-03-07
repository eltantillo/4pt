<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Risks',
);
?>

<h1>Risks</h1>

<?php
if (in_array(5, $sessionUser->rolesArray) || in_array(7, $sessionUser->rolesArray)){
	echo $this->renderPartial('_formRisks', array('model'=>$model));
}
?>