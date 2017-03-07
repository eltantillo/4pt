<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Delivery Instructions',
);
?>

<h1>Delivery Instructions</h1>

<?php
if (in_array(1, $sessionUser->rolesArray) || in_array(5, $sessionUser->rolesArray)){
	echo $this->renderPartial('_formDeliveryInstructions', array('model'=>$model));
}
?>