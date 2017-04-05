<?php
$this->breadcrumbs=array(
	Language::$processes=>array('index'),
	$project->title=>array($_GET['id']),
	Language::$deliveryInstructions,
);
?>

<div class="page-header">
	<h1><?php echo Language::$deliveryInstructions; ?></h1>
</div>

<?php echo $this->renderPartial('_formDeliveryInstructions', array('model'=>$model)); ?>