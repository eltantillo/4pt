<?php
$this->breadcrumbs=array(
	'Processes'=>array('index'),
	'Project'=>array($_GET['id']),
	'Delivery Instructions',
);
?>

<div class="page-header">
	<h1>Delivery Instructions</h1>
</div>

<?php echo $this->renderPartial('_formDeliveryInstructions', array('model'=>$model)); ?>