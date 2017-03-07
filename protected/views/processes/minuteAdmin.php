<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Minutes',
);
?>

<h1>Minutes</h1>

<?php
if (in_array(5, $sessionUser->rolesArray) || in_array(7, $sessionUser->rolesArray)){
	echo $this->renderPartial('_formMinutes', array('model'=>$model));
}
?>