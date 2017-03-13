<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Delivery Instructions',
);
?>

<h1>Delivery Instructions</h1>

<?php echo $this->renderPartial('_formDeliveryInstructions', array('model'=>$model)); ?>